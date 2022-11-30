<?php
include_once "../../../configuracion.php";
/*$idusuario = 2;
$idproducto = 1;
$cantidad = 1;*/
$data=data_submitted();
//datos recibidos        
/*$data["idusuario"] = $idusuario;
$data["idproducto"]=$idproducto;
$data["cicantidad"]=$cantidad;*/
//----------------//

$hoy = date("Y-m-d H:i:s");
$data["cofecha"] = $hoy;

///datos del producto

$respuesta = false;
$seagrego = false;
if (isset($data['idusuario'])) {

    $objC = new ABMcompra();
    //creamos la compra
    $objCompra = $objC->alta($data);
    if ($objCompra == null) {
        $mensaje = "No pudo crearse el pedido";
    } else {
        $idcompra=$objCompra->getIdcompra();
        $datos["idcompra"] = $idcompra;
        $datos["idcompraestadotipo"] = 0;
        $datos["idusuario"] = $data["idusuario"];
        $datos["cefechaini"] = date("Y-m-d H:i:s");
        $datos["cefechafin"] = "null";
        //creamos compra estado "en confeccion"
        $objCtrlCE = new ABMcompraestado();
        $objEstado = $objCtrlCE->alta($datos);
        
        //verificamos stock
        
        $objCtrlProd = new ABMproducto();
        $arrayAsoc["idproducto"] = $idproducto;
        $arreProd = $objCtrlProd->buscar($arrayAsoc);
        $respuesta = true;
        if (count($arreProd) == 1) {
             $cantStock=$arreProd[0]->getProcantstock();
  
             if ($data["cicantidad"]<=$cantStock) {
                //se agrega el item al carrito
                 
                $datositem["idcompra"]= $idcompra;
                $datositem["idproducto"]=$data["idproducto"];
                $datositem["cicantidad"]=$data["cicantidad"];
                $cantStock=$cantStock-$datositem["cicantidad"];
                $param["idproducto"]= $idproducto;
                $param["procantstock"]=$cantStock;
                $objCtrlProd->modificacion($param);

                $objC = new ABMcompraitem();
                $seagrego = $objC->alta($datositem);
            }
        }
    }
}

$retorno['respuesta'] = $respuesta;

$retorno['seagrego'] = $seagrego;
if (isset($mensaje)) {

    $retorno['errorMsg'] = $mensaje;
}
echo json_encode($retorno);
