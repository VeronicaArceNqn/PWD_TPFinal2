<?php
include_once "../../../configuracion.php";
//$idusuario=2;
//$idcompraestadotipo=1;
  
$datos=data_submitted();
 /*
//datos requeridos
 $datos["idcompraestadotipo"]=$idcompraestadotipo;
 $datos["idusuario"]=$idusuario;
 $datos["idcompraestado"]=1;
 $datos["idcompra"]=1;
 //fin datos requeridos
 */
 $hoy = date("Y-m-d H:i:s");
 $datos["cefechaini"]=$hoy;
 $datos["cefechafin"]="null";

$respuesta=false;
$seactualizo=false;


if (isset($datos["idcompra"])){
    
    
   
    $objCtrlCE=new ABMcompraestado();  
    $param["idcompraestado"]=$datos["idcompraestado"];  
      
    //agregamos el nuevo estado 
    $respuesta = $objCtrlCE->alta($datos); 
    //para actualizar asignamos la fecha fin del estado anterior 
    //print_r($seactualizo);
    $seactualizo = $objCtrlCE->modificacion($param);     
      
   

}
else{ $mensaje="no se pudo concretar";
}
$retorno['respuesta'] = $respuesta;
$retorno['seactualizo'] = $seactualizo;
if (isset($mensaje)){
   
    $retorno['errorMsg']=$mensaje;

}
    echo json_encode($retorno);
