<?php
class ABMcompraestadotipo{
    //Espera como parámetro un arrego asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    public function abm($datos){
        $resp = false;
        if($datos['accion']=='editar'){
            if($this->modificacion($datos)){
                $resp = true;
            }
        }
        if($datos['accion']=='borradoLogico'){
            if($this->bajaLogica($datos)){
                $resp =true;
            }
        }
        if ($datos['accion'] == 'nuevo') {
            $objAbmcet=null;
            if (isset($datos['cetdescripcion'])) {
                $arraymail = ['cetdescripcion' => $datos['cetdescripcion']];
                //print_r($arraymail);
                $objAbmcet = $this->buscar($arraymail);
                //echo "<br>objAbmcet me devuelve de buscar : <br>";
                //print_r($objAbmcet);
            }
            if ($objAbmcet == null) {
                // $mensajeResultado = $this->verificarUsuarioMail($datos);
                //print_r($datos);
                //print_r($mensajeResultado['Resultado']);
                //if ($mensajeResultado==null) {
                    if (isset($datos['accion'])) {
                        //echo $datos['accion'];
                        //print_r($datos);
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
    *@return CompraEstadoTipo
    */
    private function cargarObjeto($param){
        $obj = null;

        if (array_key_exists('idcompraestadotipo', $param) and array_key_exists('cetdescripcion', $param) and array_key_exists('cetdetalle', $param)  ){
            $obj = new CompraEstadoTipo();
            $obj->setear($param['idcompraestadotipo'], $param['cetdescripcion'], $param['cetdetalle']);
        }
        //print_r($obj);
        return $obj;
    }
    
     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return CompraEstadoTipo
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        if(isset($param['idcompraestadotipo'])){
            $obj = new CompraEstadoTipo();
            $obj->setear($param['idcompraestadotipo'], null, null);
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
        if (isset($param['idcompraestadotipo']))
            $resp = true;
        //echo "SeteadosCamposClaves". $resp;
        return $resp;
     }
     public function alta($param){
        
        $resp = false;
        //$param['idcompraestadotipo']=null;

        $elObjcet = $this->cargarObjeto($param);
        
        if ($elObjcet!=null and $elObjcet->insertar()){
            $resp = true;
        }
        return $resp;
     }
      /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    
    public function bajaLogica($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjcet = $this->cargarObjetoConClave($param);
            if($elObjcet!=null and $elObjcet->modificar("borradoLogico")){
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
    }
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
            if(isset($param['idcompraestadotipo'])) 
                $where.=" and idcompraestadotipo = ".$param['idcompraestadotipo'];
            if(isset($param['cetdescripcion'])) 
                $where.=" and cetdescripcion ='".$param['cetdescripcion']."'";
            
        }
        //print_r($where);
        //echo "<br>";
        $arreglo = CompraEstadoTipo::listar($where);
        //echo "Estoy en buscar \n";
        //print_r($arreglo);
    
        return $arreglo;
       }
      
   
}



?>