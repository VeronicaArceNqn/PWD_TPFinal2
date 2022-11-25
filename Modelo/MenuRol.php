<?php 

class MenuRol{

    private $objMenu;
    private $objRol;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->objMenu=new Menu();
        $this->objRol=new Rol();
    }

    public function getObjMenu()
    {
        return $this->objMenu;
    }

    /**
     * Set the value of objMenu
     */
    public function setObjMenu($objMenu)
    {
        $this->objMenu = $objMenu;
    }

    /**
     * Get the value of objRol
     */
    public function getObjRol()
    {
        return $this->objRol;
    }

    /**
     * Set the value of objRol
     */
    public function setObjRol($objRol)
    {
        $this->objRol = $objRol;
    }

    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
    }

    public function setear($objMenu, $objRol) {
        $this->setObjMenu($objMenu);
        $this->setObjRol($objRol);
      }

      public function cargar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM menurol WHERE objmenu = ".$this->getObjMenu()."";
        if ($base->Iniciar()) {
          $res = $base->Ejecutar($sql);
          if ($res > -1) {
            if ($res > 0) {
              $row = $base->Registro();
              $this->setear($row['idmenu'], $row['idrol']);
            }
          }
        } else {
          $this->setmensajeoperacion("MenuRol->listar: ".$base->getError());
        }
        return $resp;
      }
    
      public function insertar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO menurol (idmenu, idrol) VALUES (".$this->getObjMenu()->getIdmenu().", ".$this->getObjRol()->getIdrol().")";
    
        if ($base->Iniciar()) {
          if ($base->Ejecutar($sql)) {
    
            $resp = true;
          } else {
            $this->setmensajeoperacion("MenuRol->listar: ".$base->getError()[2]);
          }
        } else {
          $this->setmensajeoperacion("MenuRol->listar: ".$base->getError()[2]);
        }
        return $resp;
      }
    
      /**
       * Este metodo sirve para modificar el rol que puede usar esta opcion de menu
       * @return void
       */
      public function modificar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE menurol SET idrol = ".$this->getObjRol()->getIdrol()." WHERE idmenu = ".$this->getObjMenu()->getIdmenu()."";
        if ($base->Iniciar()) {
          if ($base->Ejecutar($sql)) {
            $resp = true;
          } else {
            $this->setmensajeoperacion("MenuRol->listar: ".$base->getError());
          }
        } else {
          $this->setmensajeoperacion("MenuRol->listar: ".$base->getError());
        }
        return $resp;
      }
    
      public function eliminar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM menurol WHERE idmenu= ".$this->getObjMenu()->getIdmenu()." AND idrol=".$this->getObjRol()->getIdrol()."";
        if ($base->Iniciar()) {
          if ($base->Ejecutar($sql)) {
            return true;
          } else {
            $this->setmensajeoperacion("MenuRol->listar: ".$base->getError());
          }
        } else {
          $this->setmensajeoperacion("MenuRol->listar: ".$base->getError());
        }
        return $resp;
      }
    
      public static function listar($parametro = "") {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM menurol ";
        if ($parametro != "") {
          $sql .= " WHERE {$parametro}";
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
          if ($res > 0) {
    
            while ($row = $base->Registro()) {
              $obj = new MenuRol();
    
              $objMenu = new Menu();
              $objMenu->setIdmenu($row['idmenu']);
              $objMenu->cargar();
    
              $objRol = new Rol();
              $objRol->setIdrol($row['idrol']);
              $objRol->cargar();
    
              $obj->setear($objMenu, $objRol);
    
              array_push($arreglo, $obj);
            }
          }
        }
    
        return $arreglo;
      }

}

?>