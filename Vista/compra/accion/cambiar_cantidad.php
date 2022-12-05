<?php
include_once "../../../configuracion.php";
$valores=data_submitted();
/*$cantidad = 1;
$idcompraitem = 119;
$valores["idcompraitem"]=$idcompraitem;
$valores["cicantidad"]=$cantidad;
*/$objControlCI=new ABMcompraitem();
$res=$objControlCI->cambiarCantidadItem($valores);


$retorno["resultado"]=$res;




echo $res;
?>