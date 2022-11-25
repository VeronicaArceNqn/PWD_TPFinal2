<?php
include_once "../../../configuracion.php";
$idusuario=3;
$data["idusuario"]=$idusuario;
$hoy = date("Y-m-d H:i:s");   
$data["cofecha"]=$hoy;

$respuesta=false;
if (isset($data['idusuario'])){

    $objC = new ABMcompra();
    //creamos la compra
    $objCompra = $objC->alta($data);
    if ($objCompra==null){
        $mensaje = "No pudo crearse el pedido";
    }
    else{
        $respuesta=true;
        $datos["idcompra"]=$objCompra->getIdcompra();
        $datos["idcompraestadotipo"]=0;
         $datos["idusuario"]=$idusuario;
         $datos["cefechaini"]=$hoy;
         $datos["cefechafin"]=null;
         //crear el estado
        $objCtrlCE=new ABMcompraestado();
        $objCompra = $objCtrlCE->alta($datos);
    
    }

}

$retorno['respuesta'] = $respuesta;
if (isset($mensaje)){
   
    $retorno['errorMsg']=$mensaje;

}
    echo json_encode($retorno);
?>