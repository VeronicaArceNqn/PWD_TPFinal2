<?php
include_once "../../../configuracion.php";
$data = data_submitted();
$respuesta = false;
//
/*$data["idproducto"]=1;
$data["pronombre"]="Sony";
$data["prodetalle"]="camara 2mpx hd";
$data["precio"]=10000;
$data["procantstock"]=10;
$data["tipo"]="Camaras";
$data["urlimagen"]="https://i.ibb.co/ygNPwx6/c4.webp";
*/if (isset($data['pronombre'])){
    $objC = new ABMproducto();
    $respuesta = $objC->alta($data);

  //  $retorno['entra'] = "si entro";
}
$retorno['respuesta'] = $respuesta;

if (!$respuesta){
    
    $retorno['errorMsg']="No pudo crearse el producto";
    
}
echo json_encode($retorno);
?>