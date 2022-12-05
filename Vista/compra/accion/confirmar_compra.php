<?php
include_once "../../../configuracion.php";
//$idusuario=2;
//$idcompraestadotipo=1;
  
$datos=data_submitted();
$objSesion=new Session(); 
$idusuario=$objSesion->getUsuario()->getIdusuario();

$respuesta=[];

$param["idusuario"]=$idusuario;
$param["idcompraestadotipo"] = 0;
$param["cefechafin"]="null";
$objCntrlCE= new ABMcompraestado();
$objEstado=$objCntrlCE->verificarEstado($param);

$idcompra=-1;
$idcompraestado=-1;

if($objEstado!=null)
{
  $idcompra=$objEstado->getObjCompra()->getIdcompra();
  $idcompraestado=$objEstado->getIdcompraestado();


}
if ($idcompra!=-1){
    $datos["idusuario"]=$idusuario;
    $datos["idcompraestado"]=$idcompraestado;  
    $datos["idcompra"]=$idcompra;  
    $objCtrlCE=new ABMcompraestado();  

    $respuesta= $objCtrlCE->cambiarEstado($datos); 
 
      
   

}
else{ $mensaje="no se pudo concretar";
}
$retorno['respuesta'] = $respuesta["seagrego"];
$retorno['seactualizo'] = $respuesta["seactualizo"];
if (isset($mensaje)){
   
    $retorno['errorMsg']=$mensaje;

}
    echo json_encode($retorno);
