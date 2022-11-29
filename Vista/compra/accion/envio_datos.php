<?php 

include_once "../../../configuracion.php";
$datos=data_submitted();
/*$idproducto=2;
if (isset($_GET['idproducto'])) {
    $idproducto = $_GET['idproducto'];
}
$datos["idproducto"]=$idproducto;
*/
$datos["respuesta"]=true;
$datos["errorMsg"]="todo ok";

echo json_encode($datos);
?>