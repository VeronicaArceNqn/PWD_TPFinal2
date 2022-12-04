<?php
include_once "../../../configuracion.php";
//$idusuario=2;
//$idcompraestadotipo=1;
  
$datos=data_submitted();
 

$respuesta=false;
$seactualizo=false;


if (isset($datos["idcompra"])){
    
      
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
