<?php
 class CompraItem extends BaseDatos{
    private $idcompraitem;
    private $objProducto;
    private $objCompra;
    private $cicantidad;
    private $mensajeoperacion;
    
    public function __construct()
    {
    $this->idcompraitem="";
    $this->objProducto=new Producto();
    $this->objCompra=new Compra();
    $this->cicantidad="";
    }

    /**
     * Get the value of idcompraitem
     */
    public function getIdcompraitem()
    {
        return $this->idcompraitem;
    }

    /**
     * Set the value of idcompraitem
     */
    public function setIdcompraitem($idcompraitem)
    {
        $this->idcompraitem = $idcompraitem;
    }

    /**
     * Get the value of objProducto
     */
    public function getObjProducto()
    {
        return $this->objProducto;
    }

    /**
     * Set the value of objProducto
     */
    public function setObjProducto($objProducto)
    {
        $this->objProducto = $objProducto;
    }

    /**
     * Get the value of objCompra
     */
    public function getObjCompra()
    {
        return $this->objCompra;
    }

    /**
     * Set the value of objCompra
     */
    public function setObjCompra($objCompra)
    {
        $this->objCompra = $objCompra;
    }

    /**
     * Get the value of cicantidad
     */
    public function getCicantidad()
    {
        return $this->cicantidad;
    }

    /**
     * Set the value of cicantidad
     */
    public function setCicantidad($cicantidad)
    {
        $this->cicantidad = $cicantidad;

    }

    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
      }
      public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
      }

    public function setear($idcompraitem, $objProducto, $objCompra, $cicantidad) {
        $this->setIdcompraitem($idcompraitem);
        $this->setObjProducto($objProducto);
        $this->setObjCompra($objCompra);
        $this->setCiCantidad($cicantidad);
    }

    public function cargar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM compraitem WHERE idcompraitem = ".$this->getIdcompraitem()."";
        if ($base->Iniciar()) {
          $res = $base->Ejecutar($sql);
          if ($res > -1) {
            if ($res > 0) {
              $row = $base->Registro();
    
              $objProducto = new Producto();
              $objProducto->setIdproducto($row['idproducto']);
              $objProducto->cargar();
    
              $objCompra = new Compra;
              $objCompra->setIdcompra($row['idcompra']);
              $objCompra->cargar();
    
              $this->setear($row['idcompraitem'], $objProducto, $objCompra, $row['cicantidad']);
            }
          }
        } else {
          $this->setmensajeoperacion("CompraItem->listar: ".$base->getError());
        }
        return $resp;
      }
    
      public function insertar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO compraitem (idproducto, idcompra, cicantidad) VALUES (".$this->getObjProducto()->getIdproducto().", ".$this->getObjCompra()->getIdcompra().",". $this->getCicantidad().")";
    
        if ($base->Iniciar()) {
          if ($elId = $base->Ejecutar($sql)) {
            $this->setIdcompraitem($elId);
    
            $resp = true;
          } else {
            $this->setmensajeoperacion("CompraItem->listar: ".$base->getError()[2]);
          }
        } else {
          $this->setmensajeoperacion("CompraItem->listar: ".$base->getError()[2]);
        }
        return $resp;
      }
    
      public function modificar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE compraitem SET idproducto = ".$this->getObjProducto()->getIdproducto().", idcompra = ".$this->getObjCompra()->getIdcompra().", cicantidad = ".$this->getCicantidad()." WHERE idcompraitem = ".$this->getIdcompraitem()."";
        if ($base->Iniciar()) {
          if ($base->Ejecutar($sql)) {
            $resp = true;
          } else {
            $this->setmensajeoperacion("CompraItem->listar: ".$base->getError());
          }
        } else {
          $this->setmensajeoperacion("CompraItem->listar: ".$base->getError());
        }
        return $resp;
      }
    
      public function eliminar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM compraitem WHERE idcompraitem= ".$this->getIdcompraitem()."";
        if ($base->Iniciar()) {
          if ($base->Ejecutar($sql)) {
            return true;
          } else {
            $this->setmensajeoperacion("CompraItem->listar: ".$base->getError());
          }
        } else {
          $this->setmensajeoperacion("CompraItem->listar: ".$base->getError());
        }
        return $resp;
      }
    
      public static function listar($parametro = "") {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM compraitem ";
        if ($parametro != "") {
          $sql .= " WHERE {$parametro}";
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
          if ($res > 0) {
    
            while ($row = $base->Registro()) {
              $obj = new CompraItem();
    
              $objCompra = new Compra();
              $objCompra->setIdcompra($row['idcompra']);
              $objCompra->cargar();
    
              $objProducto = new Producto();
              $objProducto->setIdproducto($row['idproducto']);
              $objProducto->cargar();
    
              $obj->setear($row['idcompraitem'], $objProducto, $objCompra, $row['cicantidad']);
    
              array_push($arreglo, $obj);
            }
          }
        }
    
        return $arreglo;
      }
    

}

?>