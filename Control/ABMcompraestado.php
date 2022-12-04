<?php
class ABMcompraestado
{
    //Espera como parámetro un arrego asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    public function abm($datos)
    {
        $resp = false;
        if ($datos['accion'] == 'editar') {
            if ($this->modificacion($datos)) {
                $resp = true;
            } else {
                echo "no esta registrado";
            }
        }
        if ($datos['accion'] == 'borradoLogico') {
            if ($this->bajaLogica($datos)) {
                $resp = true;
            }
        }
        if ($datos['accion'] == 'nuevo') {
            $objAbmce = null;
            if (isset($datos['idcompraestado'])) {
                $arrayabmce = ['idcompraestado' => $datos['idcompraestado']];
                //print_r($arrayabmce);
                $objAbmce = $this->buscar($arrayabmce);
                //echo "<br>objAbmce me devuelve de buscar : <br>";
                //print_r($objAbmce);
            }
            if ($objAbmce == null) {
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
     *@return CompraEstado
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('idcompraestado', $param) and array_key_exists('idcompra', $param) and array_key_exists('idcompraestadotipo', $param) and array_key_exists('cefechaini', $param) and array_key_exists('cefechafin', $param) and array_key_exists('idusuario', $param)) {
            $obj = new CompraEstado();

            $objCompra = new Compra();
            $objCompra->setIdcompra($param['idcompra']);
            $objCompra->cargar();

            $objCet = new CompraEstadoTipo();
            $objCet->setIdcompraestadotipo($param['idcompraestadotipo']);
            $objCet->cargar();

            $objusuario = new Usuario();
            $objusuario->setidusuario($param['idusuario']);
            $objusuario->cargar();

            $obj->setear($param['idcompraestado'], $objCompra, $objCet, $param['cefechaini'], $param['cefechafin'], $objusuario);
        } else {
            if (array_key_exists('idcompraestado', $param)) {
                $obj = new CompraEstado();
                $obj->setIdcompraestado($param['idcompraestado']);
                $obj->cargar();
            }

            if (array_key_exists('idcompra', $param)) {
                $objCompra = new Compra();
                $objCompra->setIdcompra($param['idcompra']);
                $objCompra->cargar();
                $obj->setObjcompra($objCompra);
            }
            if (array_key_exists('idcompraestadotipo', $param)) {
                $objCet = new CompraEstadoTipo();
                $objCet->setIdcompraestadotipo($param['idcompraestadotipo']);
                $objCet->cargar();
                $obj->setObjcompraestadotipo($objCet);
            }
            if (array_key_exists('cefechaini', $param)) {
                $obj->setCefechaini($param['cefechaini']);
            }
            if (array_key_exists('cefechafin', $param)) {
                if ($param['cefechafin'] == null) {
                    $fechafin = "null";
                } else {
                    $fechafin = $param['cefechafin'];
                }
                $obj->setCefechafin($fechafin);
            }
            if (array_key_exists('idusuario', $param)) {
                $objusuario = new Usuario();
                $objusuario->setidusuario($param['idusuario']);
                $objusuario->cargar();
                $obj->setObjUsuario($objusuario);
            }
        }





        //    $obj->setear($param['idcompraestado'], $objCompra, $objCet, $param['cefechaini'], $param['cefechafin'],$objusuario);

        //print_r($obj);
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return CompraEstado
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['idcompraestado'])) {
            $obj = new CompraEstado();
            $obj->setear($param['idcompraestado'], null, null, null, null, null);
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
        if (isset($param['idcompraestado']))
            $resp = true;
        //echo "SeteadosCamposClaves". $resp;
        return $resp;
    }
    public function alta($param)
    {
        //print_r($param);
        $resp = false;
        $param['idcompraestado'] = null;

        $elObjce = $this->cargarObjeto($param);
        if ($elObjce != null and $elObjce->insertar()) {
            $resp = true;
        }
        return $resp;
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */

    public function bajaLogica($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjce = $this->cargarObjetoConClave($param);
            if ($elObjce != null and $elObjce->modificar("borradoLogico")) {
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
            $elObjce = $this->cargarObjeto($param);
            //print_r($param);
            if ($elObjce != null and $elObjce->modificar()) {
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
    public function buscar($param = null)
    {
        $where = " true ";
      
        if ($param <> NULL) {


            if (isset($param['idcompraestado'])) {
                $where .= " and idcompraestado = " . $param['idcompraestado'];
            }
            if (isset($param['idcompra'])) {
                $where .= " and idcompra =" . $param['idcompra'];
            }
            //condicion para buscar idcompraestadotipo mayor a un valor
            if (isset($param['idcompraet'])) {
                $where .= " and idcompraestadotipo > " . $param['idcompraet'];
            } else {
                //sino buscamos por idcompraestadotipo igual a un valor
                if (isset($param['idcompraestadotipo'])) {
                    $where .= " and idcompraestadotipo =" . $param['idcompraestadotipo'];
                }
            }
            if (isset($param['cefechaini'])) {
                $where .= " and cefechaini ='" . $param['cefechaini'] . "'";
            }
            if (isset($param['cefechafin'])) {
                $where .= " and cefechafin is " . $param['cefechafin'] . "";
            }
            if (isset($param['idusuario'])) {
                $where .= " and idusuario = " . $param['idusuario'];
            }
        }

       // echo "<br>" . $where;
        $arreglo = CompraEstado::listar($where);
        //echo "Estoy en buscar \n";
        //print_r($arreglo);

        return $arreglo;
    }
    public function verificarEstado($param)
    {
        $objCompraEstado=null;
        $arreCompraEstado=$this->buscar($param);
        if(count($arreCompraEstado)==1)
        {
            $objCompraEstado=$arreCompraEstado[0];
        }
        return $objCompraEstado;
    }
    public function cambiarEstado($datos)
    {
        $hoy = date("Y-m-d H:i:s");
        $datos["cefechaini"]=$hoy;
        $datos["cefechafin"]="null";
       
       $seagrego=false;
       $seactualizo=false;
       
       
       if (isset($datos["idcompra"])){
           
           
          
           $param["idcompraestado"]=$datos["idcompraestado"];  
             
           //agregamos el nuevo estado 
           $seagrego = $this->alta($datos); 
           //para actualizar asignamos la fecha fin del estado anterior 
           //print_r($seactualizo);
           $seactualizo = $this->modificacion($param);     
             
          
       }       
       $resultado["seagrego"]=$seagrego;
       $resultado["seactualizo"]=$seactualizo;

       return $resultado;

    }
}
