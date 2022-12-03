<?php
include_once "../../../configuracion.php";


$idcompra = 1;
$idproducto = 6;
$cantidad = 5;
  ///datos recibidos
$data["idcompra"] = $idcompra;
$data["cicantidad"] = $cantidad;
$data["idproducto"]=$idproducto;
$objControlCI=new ABMcompraitem();
$arre=$objControlCI->agregarProducto($data);
print_r($arre);

?>