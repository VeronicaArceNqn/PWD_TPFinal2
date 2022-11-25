<?php 
include_once "../../../configuracion.php";
$data = data_submitted();
$objControl = new ABMUsuario();
$list = $objControl->buscar($data);
$arreglo_salida =  array();
foreach ($list as $elem ){
    
    $nuevoElem['idusuario'] = $elem->getidusuario();
    $nuevoElem["usnombre"]=$elem->getusnombre();
    $nuevoElem["uspass"]=$elem->getuspass();
    $nuevoElem["usmail"]=$elem->getusmail();
    $nuevoElem["usdeshabilitado"]=$elem->getusdeshabilitado();
    
    array_push($arreglo_salida,$nuevoElem);
}
//verEstructura($arreglo_salida);
echo json_encode($arreglo_salida,0,2);

?>