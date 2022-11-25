<?php
class ABMproducto{
    //Espera como parámetro un arrego asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    public function abm($datos){
        $resp = false;
        if($datos['accion']=='editar'){
            if($this->modificacion($datos)){
                $resp = true;
            }
        }/*
        if($datos['accion']=='borradoLogico'){
            if($this->bajaLogica($datos)){
                $resp =true;
            }
        }*/
        if ($datos['accion'] == 'nuevo') {
            $objProducto=null;
            if (isset($datos['pronombre'])) {
                $arraymail = ['pronombre' => $datos['pronombre']];
                
                //echo "<br>objProducto me devuelve de buscar : <br>";
                //print_r($objProducto);
            }
            if ($objProducto == null) {
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
                echo "El Producto ya esta registrado";
            }
        }



        return $resp;

        }
     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    *@param array $param
    *@return Producto
    */
    private function cargarObjeto($param){
        $obj = null;

        if (array_key_exists('idproducto', $param) and array_key_exists('pronombre', $param) and array_key_exists('prodetalle', $param) and array_key_exists('procantstock', $param) and array_key_exists('tipo', $param) and array_key_exists('precio', $param) and array_key_exists('urlimagen', $param) ){
            $obj = new Producto();
            $obj->setear($param['idproducto'], $param['pronombre'], $param['prodetalle'], $param['procantstock'], $param['tipo'], $param['precio'], $param['urlimagen']);
        }
        return $obj;
    }
    
     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Producto
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        if(isset($param['idproducto'])){
            $obj = new Producto();
            $obj->setear($param['idproducto'], null, null, null, null, null,null);
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
        if (isset($param['idproducto']))
            $resp = true;
        //echo "SeteadosCamposClaves". $resp;
        return $resp;
     }
     public function alta($param){
        $resp = false;
        $param['idproducto']=null;

        $elObjProducto = $this->cargarObjeto($param);
        if ($elObjProducto!=null and $elObjProducto->insertar()){
            $resp = true;
        }
        return $resp;
     }
      /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    
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
    public function modificacion($param){
        $resp = false;
        if($this->seteadosCamposClaves ($param)){
            $elObjProducto = $this->cargarObjeto($param);
            //print_r($param);
            if($elObjProducto!=null and $elObjProducto->modificar($param)){
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
    public function buscar($param){
        $where = " true ";
       
        if($param<>NULL){
            if(isset($param['idproducto'])) 
                $where.=" and idproducto = ".$param['idproducto'];
            if(isset($param['pronombre'])) 
                $where.=" and pronombre ='".$param['pronombre']."'";
            if(isset($param['prodetalle'])) 
                $where.=" and prodetalle ='".$param['prodetalle']."'";
                if(isset($param['tipo'])) 
                $where.=" and tipo ='".$param['tipo']."'";
            
        }
       
        $arreglo = Producto::listar($where);
       
        return $arreglo;
       }
      /**
     * Busca un objeto producto, 
     * @param array $param
     * @return Producto 
     */
    /*public function verificarUsuarioMail($datos)
    {
        $objUsuario = NULL;
        $listaUsuario = $this->buscar($datos);
        //print_r($datos);
        //print_r($listaUsuario);
        if (count($listaUsuario)==1){
            $objUsuario= $listaUsuario[0];
        }
        echo "retorno de verificar usuario : ";
        print_r($objUsuario);
        return $objUsuario;
    }*/
}



?>