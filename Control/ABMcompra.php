<?php 
class ABMcompra{
    //Espera como parámetro un arrego asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    public function abm($datos){
        $resp = false;
        if($datos['accion']=='editar'){
           /* if($this->modificacion($datos)){
                $resp = true;
            }*/
        }
        if($datos['accion']=='borradoLogico'){
            /*if($this->bajaLogica($datos)){
                $resp =true;
            }*/
        }
        if ($datos['accion'] == 'nuevo') {
            $objAbmcompra=null;
            if (isset($datos['idcompra'])) {
                $arraycompra = ['idcompra' => $datos['idcompra']];
                //print_r($arraycompra);
                $objAbmcompra = $this->buscar($arraycompra);
                //echo "<br>objAbmcompra me devuelve de buscar : <br>";
                //print_r($objAbmcompra);
            }
            if ($objAbmcompra == null) {
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
            }
            else {
                echo "El correo electrónico ya esta registrado";
            }
        }



        return $resp;

        }
     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    *@param array $param
    *@return Compra
    */
    private function cargarObjeto($param){
        $obj = null;

        if (array_key_exists('idcompra', $param) and array_key_exists('cofecha', $param) and array_key_exists('idusuario', $param)  ){
            $obj = new Compra();
            
            $objUsuario = new Usuario();
            $objUsuario->setIdusuario($param['idusuario']);
            $objUsuario->cargar();

            $obj->setear($param['idcompra'], $param['cofecha'], $objUsuario);
        }
        //print_r($obj);
        return $obj;
    }
    
     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Compra
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        if(isset($param['idcompra'])){
            $obj = new Compra();
            $obj->setear($param['idcompra'], null, null);
        }
        return $obj;
    }
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

     private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idcompra']))
            $resp = true;
        //echo "SeteadosCamposClaves". $resp;
        return $resp;
     }
     public function alta($param){
        //print_r($param);
        $resp = null;
        $param['idcompra']=null;

        $elObjcompra = $this->cargarObjeto($param);
        if ($elObjcompra!=null and $elObjcompra->insertar()){
            $resp = $elObjcompra;
        }
        return $resp;
     }
      /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    /*

    public function bajaLogica($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjcompra = $this->cargarObjetoConClave($param);
            if($elObjcompra!=null and $elObjcompra->modificar("borradoLogico")){
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
    /*
    public function modificacion($param){
        $resp = false;
        if($this->seteadosCamposClaves ($param)){
            $elObjcet = $this->cargarObjeto($param);
            //print_r($param);
            if($elObjcet!=null and $elObjcet->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }*/
    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param){
        $where = " true ";
        //echo "Este dato ingresa a Buscar en ABMusuario";
        
        //print_r($param);
        //echo "<br>";
        //print_r ($param['usmail']);
        if($param<>NULL){
            if(isset($param['idcompra'])) 
                $where.=" and idcompra = ".$param['idcompra'];
            if(isset($param['cofecha'])) 
                $where.=" and cofecha ='".$param['cofecha'];
                if (isset($param['idusuario']))
                $where .= " and idusuario = ".$param['idusuario'];
            
        }
        //print_r($where);
        //echo "<br>";
        $arreglo = Compra::listar($where);
        //echo "Estoy en buscar \n";
        //print_r($arreglo);
    
        return $arreglo;
       }
      
   
}

?>