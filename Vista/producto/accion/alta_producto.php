<?php
include_once "../../../configuracion.php";
$data = data_submitted();
$respuesta = false;
if (isset($data['pronombre'])){
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