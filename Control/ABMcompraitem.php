<?php
class ABMcompraitem{
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
            $objCompraitem=null;
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
    *@return CompraItem
    */
    private function cargarObjeto($param){
        $obj = null;

        if (array_key_exists('idcompraitem', $param) and array_key_exists('idproducto', $param) and array_key_exists('idcompra', $param) and array_key_exists('cicantidad', $param) ){
            $obj = new CompraItem();
            
            $objProducto = new Producto();
            $objProducto->setIdproducto($param['idproducto']);
            $objProducto->cargar();

            $objCompra = new Compra();
            $objCompra->setIdcompra($param['idcompra']);
            $objCompra->cargar();

            $obj->setear($param['idcompraitem'], $objProducto, $objCompra, $param['cicantidad']);
        }
        //print_r($obj);
        return $obj;
    }
    
     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return CompraItem
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        if(isset($param['idcompraitem'])){
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

     private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idcompraitem']))
            $resp = true;
        //echo "SeteadosCamposClaves". $resp;
        return $resp;
     }
     public function alta($param){
        //print_r($param);
        $resp = false;
        $param['idcompraitem']=null;

        $elObjcitem = $this->cargarObjeto($param);
        if ($elObjcitem!=null and $elObjcitem->insertar()){
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
            $elObjcitem = $this->cargarObjetoConClave($param);
            if($elObjcitem!=null and $elObjcitem->modificar("borradoLogico")){
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
            $elObjcitem = $this->cargarObjeto($param);
            //print_r($param);
            if($elObjcitem!=null and $elObjcitem->modificar()){
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
            if(isset($param['idcompraitem'])) 
                $where.=" and idcompraitem = ".$param['idcompraitem'];
            if(isset($param['idproducto'])) 
                $where.=" and idproducto =".$param['idproducto'];
            if(isset($param['idcompra'])) 
                $where.=" and idcompra =".$param['idcompra'];
            if(isset($param['cicantidad'])) 
                $where.=" and cicantidad =".$param['cicantidad'];  
            
        }
        //print_r($where);
        //echo "<br>";
        $arreglo = CompraItem::listar($where);
        //echo "Estoy en buscar \n";
        //print_r($arreglo);
    
        return $arreglo;
       }
      
   
}



?>