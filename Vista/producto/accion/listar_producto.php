<?php 
include_once "../../../configuracion.php";
$data = data_submitted();
$objControl = new ABMproducto();
$lista = $objControl->buscar($data);
$arreglo_salida =  array();
foreach ($lista as $elem ){
    
    $nuevoElem['idproducto'] = $elem->getIdproducto();
    $nuevoElem["pronombre"]=$elem->getPronombre();
    $nuevoElem["prodetalle"]=$elem->getProdetalle();
    $nuevoElem["procantstock"]=$elem->getProcantstock();
    
    $nuevoElem["tipo"]=$elem->getTipo();   
    
    $nuevoElem["precio"]=$elem->getPrecio();  
    
    $nuevoElem["urlimagen"]=$elem->getUrlimagen();  
    array_push($arreglo_salida,$nuevoElem);
}
//verEstructura($arreglo_salida);
echo json_encode($arreglo_salida,0,2);

?>