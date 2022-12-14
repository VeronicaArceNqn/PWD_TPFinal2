<?php
class ABMcompraitem
{
    //Espera como parámetro un arrego asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    public function abm($datos)
    {
        $resp = false;
        if ($datos['accion'] == 'editar') {
            if ($this->modificacion($datos)) {
                $resp = true;
            }
        }
        if ($datos['accion'] == 'borradoLogico') {
            /*if($this->bajaLogica($datos)){
                $resp =true;
            }*/
        }
        if ($datos['accion'] == 'nuevo') {
            $objCompraitem = null;
            if (isset($datos['idcompraitem'])) {
                $arraycompraitem = ['idcompraitem' => $datos['idcompraitem']];
                //print_r($arraycompraitem);
                $objCompraitem = $this->buscar($arraycompraitem);
                //echo "<br>objCompraitem me devuelve de buscar : <br>";
                //print_r($objAbmce);
            }
            if ($objCompraitem == null) {
                // $mensajeResultado = $this->verificarUsuarioMail($datos);
                //print_r($datos);
                //print_r($mensajeResultado['Resultado']);
                //if ($mensajeResultado==null) {
                if (isset($datos['accion'])) {
                    //echo $datos['accion'];
                    // print_r($datos);
                    if ($this->alta($datos)) {
                        $resp = true;
                    }
                }
                /*} else {
                        echo $mensajeResultado['Mensaje'];
                    }*/
            } else {
                echo "El correo electrónico ya esta registrado";
            }
        }



        return $resp;
    }
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     *@param array $param
     *@return CompraItem
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('idcompraitem', $param) and array_key_exists('idproducto', $param) and array_key_exists('idcompra', $param) and array_key_exists('cicantidad', $param)) {
            $obj = new CompraItem();
            $objProducto = new Producto();
            $objProducto->setIdproducto($param['idproducto']);
            $objProducto->cargar();

            $objCompra = new Compra();
            $objCompra->setIdcompra($param['idcompra']);
            $objCompra->cargar();

            $obj->setear($param['idcompraitem'], $objProducto, $objCompra, $param['cicantidad']);
        } else {
            if (array_key_exists('idcompraitem', $param)) {
                $obj = new CompraItem();
                $obj->setIdcompraitem($param['idcompraitem']);
                $obj->cargar();
            }
            if (array_key_exists('idproducto', $param)) {

                $objProducto = new Producto();
                $objProducto->setIdproducto($param['idproducto']);
                $objProducto->cargar();
                $obj->setObjProducto($objProducto);
            }
            if (array_key_exists('idcompra', $param)) {
                $objCompra = new Compra();
                $objCompra->setIdcompra($param['idcompra']);
                $objCompra->cargar();
                $obj->setObjCompra($objCompra);
            }

            if (array_key_exists('cicantidad', $param)) {




                $obj->setCicantidad($param["cicantidad"]);
            }
        }
        //print_r($obj);
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return CompraItem
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['idcompraitem'])) {
            $obj = new CompraItem();
            $obj->setear($param['idcompraitem'], null, null, null);
        }
        return $obj;
    }
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['idcompraitem']))
            $resp = true;
        //echo "SeteadosCamposClaves". $resp;
        return $resp;
    }
    public function alta($param)
    {
        //print_r($param);
        $resp = false;
        $param['idcompraitem'] = null;

        $elObjcitem = $this->cargarObjeto($param);
        if ($elObjcitem != null and $elObjcitem->insertar()) {
            $resp = true;
        }
        return $resp;
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */

    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjcitem = $this->cargarObjetoConClave($param);
            if ($elObjcitem != null and $elObjcitem->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjcitem = $this->cargarObjeto($param);
            //print_r($param);
            if ($elObjcitem != null and $elObjcitem->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }
    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param)
    {
        $where = " true ";
        //echo "Este dato ingresa a Buscar en ABMusuario";

        //print_r($param);
        //echo "<br>";
        //print_r ($param['usmail']);
        if ($param <> NULL) {
            if (isset($param['idcompraitem']))
                $where .= " and idcompraitem = " . $param['idcompraitem'];
            if (isset($param['idproducto']))
                $where .= " and idproducto =" . $param['idproducto'];
            if (isset($param['idcompra']))
                $where .= " and idcompra =" . $param['idcompra'];
            if (isset($param['cicantidad']))
                $where .= " and cicantidad =" . $param['cicantidad'];
        }
        //print_r($where);
        //echo "<br>";
        $arreglo = CompraItem::listar($where);
        //echo "Estoy en buscar \n";
        //print_r($arreglo);

        return $arreglo;
    }
    public function agregarProducto($param)
    {



        $cntrlProducto = new ABMproducto();
        $datosProd["idproducto"] = $param["idproducto"];
        $arreProducto = $cntrlProducto->buscar($datosProd);
        $objProducto = null;
        $resultado = [];
        if (count($arreProducto) == 1) {
            $objProducto = $arreProducto[0];
        }
        if ($objProducto != null) {

            //obtenemos su stock    
            $cantStock = $objProducto->getProcantstock();
            //si la cantidad es menor o igual a la cantidad stock del producto
            if ($param["cicantidad"] <= $cantStock) {


                //verificamos si el item ya esta agregado en el carrito(compra)
                $datositemc["idcompra"] = $param["idcompra"];
                $datositemc["idproducto"] = $param["idproducto"];
                $cantStock = $cantStock - $param["cicantidad"];
                $arreitemBuscado = $this->buscar($datositemc);

                if (count($arreitemBuscado) == 1) {

                    $idcompraitem = $arreitemBuscado[0]->getIdcompraitem();
                    //se modifica la cantidad el item al carrito
                    $cicantidad = $arreitemBuscado[0]->getCicantidad();
                    $datositemc["idcompraitem"] = $idcompraitem;
                    //incrementamos +1 cicantidad, la cantidad es enviada desde compra/index.php por defecto es 1 
                    $datositemc["cicantidad"] = $cicantidad + $param["cicantidad"];
                    $seagrego = $this->modificacion($datositemc);
                } else {
                    //se agrega el item al carrito
                    $datositemc["idcompra"] = $param["idcompra"];
                    $datositemc["idproducto"] = $datosProd["idproducto"];
                    $datositemc["cicantidad"] = $param["cicantidad"];
                    $seagrego = $this->alta($datositemc);
                }
                $resultado["seagrego"] = $seagrego;
                $data["idproducto"] =  $datosProd["idproducto"];
                $data["procantstock"] = $cantStock;
                //se actualiza el stock
                $res = $cntrlProducto->modificacion($data);
                $resultado["seactualizo"] = $res;
            }
        }
        return $resultado;
    }
    public function devolverProductos($data)
    {
        //con el idcompra, obtenemos los items o productos comprados(objetos CompraItem) 
        $arrproductos = $this->buscar($data);
        /*recorremos todos los objetos CompraItem, para eliminar cada item o producto
             y devolver la cantidad a su stock*/
        $resultado = array();

        foreach ($arrproductos as $objCI) {
            $idcompraitem = $objCI->getIdcompraitem();
            $objProducto = $objCI->getObjProducto();
            $idproducto = $objProducto->getIdproducto();
            $cicantidad = $objCI->getCicantidad();

            $procantstock = $objProducto->getProcantstock();
            //datos del producto 
            $data["idproducto"] = $idproducto;
            $data["procantstock"] = $procantstock + $cicantidad;
            //actualizamos el stock del producto
            $objCtrlProducto = new ABMproducto();
            $res = $objCtrlProducto->modificacion($data);
            ////////////////////////
            $datos["idcompraitem"] = $idcompraitem;
            //si eliminamos el item
            // $result = $this->baja($datos);
            
            //sino solo se actualiza el stock
            $resultado[]["seborro"] = true;
            $resultado[]["sedevolvio"] = $res;
        }
        return $resultado;
    }
    function cambiarCantidadItem($param)
    {
        $datos["idcompraitem"] = $param["idcompraitem"];
        $objCompraItem = $this->buscar($datos);
        $cicantidadactual = $objCompraItem[0]->getCicantidad();
        $resultado = false;
        if ($cicantidadactual == $param["cicantidad"]) {
            $cant = $param["cicantidad"];
            $resultado = true;
        } else {
            if ($cicantidadactual < $param["cicantidad"]) {
                $cant = $param["cicantidad"] - $cicantidadactual;

                $operacion = "resta";
            } else {

                $cant = $cicantidadactual - $param["cicantidad"];
                $operacion = "suma";
            }
            $idproducto = $objCompraItem[0]->getObjProducto()->getIdproducto();
            $cantStock = $objCompraItem[0]->getObjProducto()->getProcantstock();
            if ($cant <= $cantStock) {
                $data["idproducto"] = $idproducto;
                //se le agrega al stock
                if ($operacion == "suma") {
                    $data["procantstock"] = $cantStock + $cant;
                }
                //se descuenta al stock
                if ($operacion == "resta") {
                    $data["procantstock"] = $cantStock - $cant;
                }

                //actualizamos el stock del producto
                $objCtrlProducto = new ABMproducto();
                $res = $objCtrlProducto->modificacion($data);
                if ($res)
                  {
                      $resultado = $this->modificacion($param);
                  }

            } else {
                $resultado = false;
            }
        }
        return $resultado;
    }
}
