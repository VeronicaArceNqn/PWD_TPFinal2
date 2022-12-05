<?php
class ABMproducto
{
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     *@param array $param
     *@return Producto
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('idproducto', $param) and (array_key_exists('pronombre', $param)) and array_key_exists('prodetalle', $param) and array_key_exists('procantstock', $param) and array_key_exists('tipo', $param) and (array_key_exists('precio', $param)) and (array_key_exists('urlimagen', $param))) {
            $obj = new Producto();
            $obj->setear($param["idproducto"],$param['pronombre'],$param['prodetalle'],$param['procantstock'],$param['tipo'],$param['precio'],$param["urlimagen"]);
        } else {
            if (array_key_exists('idproducto', $param)) {
                $obj = new Producto();
                $obj->setIdproducto($param["idproducto"]);
                $obj->cargar();
                if (array_key_exists('pronombre', $param))
                    $obj->setPronombre($param['pronombre']);

                if (array_key_exists('prodetalle', $param))
                    $obj->setProdetalle($param['prodetalle']);

                if (array_key_exists('procantstock', $param))
                    $obj->setProcantstock($param['procantstock']);

                if (array_key_exists('tipo', $param))
                    $obj->setTipo($param['tipo']);

                if (array_key_exists('precio', $param))
                    $obj->setPrecio($param['precio']);

                if (array_key_exists('urlimagen', $param))
                    $obj->setUrlimagen($param["urlimagen"]);
            }
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Producto
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['idproducto'])) {
            $obj = new Producto();
            $obj->setear($param['idproducto'], null, null, null, null, null, null);
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
        if (isset($param['idproducto']))
            $resp = true;
        //echo "SeteadosCamposClaves". $resp;
        return $resp;
    }
    public function alta($param)
    {
        $resp = false;
        /*if (array_key_exists('idproducto', $param)) {
        $param['idproducto'] = null;
        }*/
        $elObjProducto = $this->cargarObjeto($param);
        if ($elObjProducto != null and $elObjProducto->insertar()) {
            $resp = true;
        }
        return $resp;
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    //consideramos poner stock en 0
    /*public function bajaLogica($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjProducto = $this->cargarObjetoConClave($param);
            if($elObjProducto!=null and $elObjProducto->modificar($param)){
                $resp = true;
            }
        }
        return $resp;
    }*/
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjProducto = $this->cargarObjeto($param);
            //   print_r($elObjProducto);
            if ($elObjProducto != null and $elObjProducto->modificar()) {
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
    public function actualizarStock($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $arreObjProducto = $this->buscar($param);
            //print_r($param);
            if ($arreObjProducto[0] != null and $arreObjProducto[0]->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * Recupera los datos de la persona por numero de documento
     * @param int idproducto
     * @return array en caso de encontrar los datos, false en caso contrario 
     */
    public function buscar($param)
    {
        $where = " true ";

        if ($param <> NULL) {
            if (isset($param['idproducto'])) {
                $where .= " and idproducto = " . $param['idproducto'];
            }
            if (isset($param['pronombre']))
                $where .= " and pronombre ='" . $param['pronombre'] . "'";
            if (isset($param['prodetalle']))
                $where .= " and prodetalle ='" . $param['prodetalle'] . "'";
            if (isset($param['tipo']))
                $where .= " and tipo ='" . $param['tipo'] . "'";
            if (isset($param['enstock'])){
                $where .= " and procantstock > 0";
               }
            }

        $arreglo = Producto::listar($where);

        return $arreglo;
    }
    
}
