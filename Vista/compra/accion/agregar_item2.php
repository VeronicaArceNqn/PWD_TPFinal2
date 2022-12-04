<?php
include_once "../../../configuracion.php";
//verificamos si hay una compra en confeccion


$idcompra = 1;
$idproducto = 8;
$cantidad = 8;
  ///datos recibidos
$data["idcompra"] = $idcompra;
$data["cicantidad"] = $cantidad;
$data["idproducto"]=$idproducto;
$objControlCI=new ABMcompraitem();
$arre=$objControlCI->agregarProducto($data);
print_r($arre);

?>