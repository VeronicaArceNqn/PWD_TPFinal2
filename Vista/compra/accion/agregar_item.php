<?php
include_once "../../../configuracion.php";
$data["idusuario"]=4;
$data["idproducto"]=1;

$data["cantidad"]=1;

$respuesta=false;
if (isset($data['idusuario'])){

    $objC = new ABMcompraitem();
    $objCompra = $objC->alta($data);
    if ($objCompra==null){
        $mensaje = "No pudo crearse el pedido";
    }
    else{$respuesta=true;}
}

$retorno['respuesta'] = $respuesta;
if (isset($mensaje)){
   
    $retorno['errorMsg']=$mensaje;

}
    echo json_encode($retorno);
?>