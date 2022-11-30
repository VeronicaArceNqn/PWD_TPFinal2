<?php
include_once "../../../configuracion.php";
$idcompra = 1;
//$idusuario = 3;
$idproducto = 4;
$cantidad = 1;
  ///datos recibidos
$data["idcompra"] = $idcompra;
$data["cicantidad"] = $cantidad;
$data["idproducto"]=$idproducto;

//print_r($data);

$seagrego = false;
$respuesta = false;
if (isset($data['idcompra'])) {
    $objCtrlProd = new ABMproducto();
    $arrayAsoc["idproducto"] = $data["idproducto"];
    $arreProd = $objCtrlProd->buscar($arrayAsoc);
      //  print_r($arreProd);
        //si lo encuentra
        if (count($arreProd) == 1) {
            $respuesta=true;
             //obtenemos su stock    
             $cantStock=$arreProd[0]->getProcantstock();
              //si la cantidad es menor o igual a la cantidad stock del producto
             if ($data["cicantidad"]<=$cantStock) {
               
                $cantStock=$cantStock-$data["cicantidad"];
                $param["idproducto"]= $data["idproducto"];
                $param["procantstock"]=$cantStock;
                //se actualiza el stock
               $objCtrlProd->modificacion($param);
                //se agrega el item al carrito
                $objC = new ABMcompraitem();
                $datositem["idcompra"]= $data["idcompra"];
                $datositem["idproducto"]=$data["idproducto"];
                $datositem["cicantidad"]=$data["cicantidad"];
                $seagrego = $objC->alta($datositem);
            }
        }
}


$retorno['respuesta'] = $respuesta;
$retorno['seagrego'] = $seagrego;
if (isset($mensaje)) {

    $retorno['errorMsg'] = $mensaje;
}
echo json_encode($retorno);
