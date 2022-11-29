<?php
class Session{

    public function __construct(){
        if (!session_start()) {
            return false;
        } else {
            return true;
        }
      }
   
    /**
     * Actualiza las variables de sesión con los valores ingresados.
     */
    public function iniciar($nombreUsuario,$psw){
        $resp = false;
        $obj = new ABMUsuario();
        $param['usnombre']=$nombreUsuario;
        $param['uspass']=$psw;
        $param['usdeshabilitado']=null;

        $resultado = $obj->buscar($param);
        if(count($resultado) > 0){
            $usuario = $resultado[0];
            $_SESSION['idusuario']=$usuario->getidusuario();
            $resp = true;
        } else {
            $this->cerrar();
        }
        return $resp;
    }
    
    /**
     * Valida si la sesión actual tiene usuario y psw válidos. Devuelve true o false.
     */
    public function validar(){
        $resp = false;
        if($this->activa() && isset($_SESSION['idusuario']))
            $resp=true;
        return $resp;
    }
    
    /**
     *Devuelve true o false si la sesión está activa o no.
     */
    public function activa(){
        $resp = false;
        if ( php_sapi_name() !== 'cli' ) {
            if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                $resp = session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                $resp = session_id() === '' ? FALSE : TRUE;
            }
        }
        return $resp;
    }
   
    /**
     * Devuelve el usuario logeado.
     */
    public function getUsuario(){
        $usuario = null;
        if($this->validar()){
            $obj = new ABMUsuario();
             $param['idusuario']=$_SESSION['idusuario'];
             $resultado = $obj->buscar($param);
            if(count($resultado) > 0){
                $usuario = $resultado[0];
            }
        }
        
        return $usuario;
    }

     /**
     * Devuelve el rol del usuario logeado.
     */
    public function getRol(){
        $list_rol = null;
        if($this->validar()){
            $obj = new ABMUsuario();
             $param['idusuario']=$_SESSION['idusuario'];
             $resultado = $obj->darRoles($param);
             echo "<br>cantidad de roles encontrados</br> ".count($resultado);
            if(count($resultado) > 0){
                $list_rol = $resultado;
            }
        }
        echo "<br> ROL OK </br>";
        print_r($list_rol);
        return $list_rol;

    }
    
    /**
     *Cierra la sesión actual.
     */
    public function cerrar(){
        $resp = true;
        session_destroy();
       // $_SESSION['idusuario']=null;
        return $resp;
    }

    //recibo la URL de cada página (sin ../)
    public function tengoPermisos($url){
        
        $resp = false;
        // concateno para logra la URL como está guardada en la BD
        $urlMenu['medescripcion'] = "../".$url;
        //creo un Objeto Usuario para usar el método getUsuario de la clase sesión y así obtener el id del usuario validado
        $objUsuvalido = new Usuario();
        $objUsuvalido = $this->getUsuario();
        echo "<br>USUARIO LOGUEADO </br>";
        // del Objeto Usuario encotrado obtengo el idusuari
        $idusuvalido = $objUsuvalido->getIdUsuario();
        echo "<br>idusuario: </br>";
        print_r($idusuvalido);
        
        // el método getRol de sesion devuelve un objeto UsuarioRol por eso creo un Objeto UsuarioRol para guardar los datos. Devuelve 1, 2 o 3 roles
       // $objUsuroles = new UsuarioRol();
        
        $objUsuroles = $this->getRol();  
        $arrayroles=[];
        $i=0;
        $encontrado=false;
        while($i<count($objUsuroles)&&!$encontrado){
            $idrol =  $objUsuroles[$i]->getobjrol()->getidrol();
                $objMenuRol = new ABMmenurol();
                $param['idrol']=$idrol;
                $arraymenusrol=$objMenuRol->buscar($param);
                    $j=0;


                    
                while($j<count($arraymenusrol)&&!$encontrado)
                {
                    
                $objMenu= $arraymenusrol[$j]->getObjMenu();    // tener en cuenta a darRoles
                    if ($urlMenu['medescripcion']==$objMenu->getMedescripcion()){
                        $encontrado=true;
                    }
                  
                   $j++;
                }
           // $arrayroles[$i]=$objetoidrol;
            $i++;
        }
        
        /*
        $i=0;

        foreach($objUsuroles as $objusrol)
        {
            $objetoidrol =   $objusrol->getobjrol();
            $arrayroles[$i]=$objetoidrol;
            $i++;
        } */    
        //$objetoidrol = $objUsuroles->getobjrol();// DA ERROR
       
       // $objAbmMenu = new AbmMenu();
        //echo " envio de url ";
        //print_r($urlMenu);
          
        // creo un Objeto AbmMenu para buscar la URL ingresada
        //$menuOk = $objAbmMenu->buscar($urlMenu);   
        //$menuOkfinal = $objAbmMenu->getObjMenu();  DA ERROR
       // echo "<br> MENU OK </br>";
        //print_r($menuOk);
        //si encuentra la página creo un objeto ABMmenurol para buscar si esa página tenen los permisos según sus roles
        //if ($menuOk!=null){
            
          //  $objAbmmenu = new ABMmenurol();

           
                //$param=$objAbmMenu->Buscar($objetoidrol);
            //if ($param == $menuOk['medescripcion']){
            //    $resp=true;
            //}
            
       // }
       // echo $resp;
        return $encontrado;
    }
   
}
?>
