<?php
include_once "../../../configuracion.php";
$datos["idcompra"]=6;  
//$datos=data_submitted();
$objCtrlCI=new ABMcompraitem();
$arreRes=$objCtrlCI->devolverProductos($datos); 
print_r($arreRes);
?>