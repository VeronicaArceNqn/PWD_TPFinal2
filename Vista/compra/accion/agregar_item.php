<?php
include_once "../../../configuracion.php";
//$datos=data_submitted();
$cantidad = 1;
$idproducto = 7;

//$cantidad = $datos["cicantidad"];
//$idproducto = $datos["idproducto"];
//verificamos si hay una compra en confeccion
$objSesion = new Session();
$idusuario =$objSesion->getUsuario()->getIdusuario();
$param["idusuario"] = $idusuario;
$param["idcompraestadotipo"] = 0;
$param["cefechafin"] = "null";
$objCntrlCE = new ABMcompraestado();

$objEstado = $objCntrlCE->verificarEstado($param);
$retorno["seagrego"]=false;
$retorno["seactualizo"]=false;
//si hay una compra en confeccion
if ($objEstado != null) {
    //obtenemos el idcompra de a traves de la compra estado
    $idcompra = $objEstado->getObjCompra()->getIdcompra();


    ///datos recibidos
    $data["idcompra"] = $idcompra;
    $data["cicantidad"] = $cantidad;
    $data["idproducto"] = $idproducto;
    $objControlCI = new ABMcompraitem();
    $arre = $objControlCI->agregarProducto($data);
    $retorno["seagrego"]= $arre["seagrego"];
    $retorno["seactualizo"]= $arre["seactualizo"];
    //echo"Ya hay una compra en confeccion y se agrego el producto<br>";
    // print_r($arre);
} else {
    $hoy = date("Y-m-d H:i:s");
    $data["cofecha"] = $hoy;
    $data["idusuario"] = $idusuario;
    $objC = new ABMcompra();
    //creamos la compra
    $objCompra = $objC->alta($data);

    $idcompra = $objCompra->getIdcompra();
    $datos["idcompra"] = $idcompra;
    $datos["idcompraestadotipo"] = 0;
    $datos["idusuario"] = $idusuario;
    $datos["cefechaini"] = $data["cofecha"];
    $datos["cefechafin"] = "null";
    //creamos compra estado "en confeccion"
    $objCtrlCE = new ABMcompraestado();
    $objEstado = $objCtrlCE->alta($datos);
    // agregamos el producto        
    $data["idcompra"] = $idcompra;
    $data["cicantidad"] = $cantidad;
    $data["idproducto"] = $idproducto;
    $objControlCI = new ABMcompraitem();
    $arre = $objControlCI->agregarProducto($data);
    $retorno["seactualizo"]= $arre["seactualizo"];
    $retorno["seagrego"]= $arre["seagrego"];
    
    // echo "Se crea la compra en confeccion<br>";
    //print_r($objEstado);
}
echo json_encode($retorno);