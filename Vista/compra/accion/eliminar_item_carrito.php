<?php 

include_once "../../../configuracion.php";
$datos=data_submitted();
$respuesta=false;
$seactualizo=false;
if (isset($datos['idcompraitem'])&&isset($datos['idproducto'])&&isset($datos["cicantidad"])) {
    $idproducto = $datos['idcompraitem'];
    $objCtrlProd = new ABMproducto();
    $arrayAsoc["idproducto"] = $datos["idproducto"];
    $arreProd = $objCtrlProd->buscar($arrayAsoc);
    if (count($arreProd) == 1) {
         //obtenemos su stock    
         $cantStock=$arreProd[0]->getProcantstock();
          //si la cantidad es menor o igual a la cantidad stock del producto
         
           
            $cantStock=$cantStock+$datos["cicantidad"];
            $param["idproducto"]= $datos["idproducto"];
            $param["procantstock"]=$cantStock;
            //se actualiza el stock
           
           $seactualizo=$objCtrlProd->modificacion($param);
           $objC = new ABMcompraitem();
           $data["idcompraitem"]=$datos['idcompraitem'];
           $respuesta=$objC->baja($data);
        
    }
}
else{
    $mensaje="Error al pasar los datos";
}

$retorno["respuesta"]=$respuesta;
$retorno["seactualizo"]=$seactualizo;
if(isset($mensaje))
{
    $retorno["errorMsg"]=$mensaje;
}
echo json_encode($retorno);
?>