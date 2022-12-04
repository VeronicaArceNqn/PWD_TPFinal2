<?php
include_once "../../../configuracion.php";

$param["idusuario"]=2;
$param["idcompraestadotipo"] = 0;
$param["cefechafin"]="null"; 
//$datos=data_submitted();
$objCtrlCE=new ABMcompraestado();
$arreRes=$objCtrlCE->verificarEstado($param);
print_r($arreRes);
?>