<?php
include_once "../../../configuracion.php";
$idusuario=8;
$hoy = date("Y-m-d H:i:s");   
$datos["idcompra"]=7;
$datos["idcompraestadotipo"]=0;
 $datos["idusuario"]=$idusuario;
 $datos["cefechaini"]=$hoy;
 $datos["cefechafin"]='null';



$respuesta=false;
if (isset($datos['idcompra'])){

             
        $objCtrlCE=new ABMcompraestado();
        $respuesta = $objCtrlCE->alta($datos);
        
    //$respuesta=true;

}
else $mensaje="no se pudo concretar";
$retorno['respuesta'] = $respuesta;
if (isset($mensaje)){
   
    $retorno['errorMsg']=$mensaje;

}
    echo json_encode($retorno);
