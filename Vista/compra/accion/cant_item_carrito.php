<?php
include_once "../../../configuracion.php";

//$data["idcompra"]=1;
  ///datos recibidos
$data["idcompra"] = 1;
$objControlCI=new ABMcompraitem();
$arre=$objControlCI->buscar($data);
$cant=count($arre);

$retorno['cantproductos'] = $cant;

echo $cant;
?>