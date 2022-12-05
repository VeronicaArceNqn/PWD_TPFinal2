<?php 
class CompraEstado{
private $idcompraestado;
private $objCompra;
private $objCompraEstadoTipo;
private $cefechaini;
private $cefechafin;
private $objUsuario;
private $mensajeoperacion;

public function __construct()
{
    $this->idcompraestado="";
    $this->objCompra=new Compra();
    $this->objCompraEstadoTipo=new CompraEstadoTipo();
    $this->cefechaini="";
    $this->cefechafin="";
    $this->objUsuario=new Usuario();
}


/**
 * Get the value of idcompraestado
 */
public function getIdcompraestado()
{
return $this->idcompraestado;
}

/**
 * Set the value of idcompraestado
 */
public function setIdcompraestado($idcompraestado)
{
$this->idcompraestado = $idcompraestado;

}

/**
 * Get the value of objCompra
 */
public function getObjcompra()
{
return $this->objCompra;
}

/**
 * Set the value of objCompra
 */
public function setObjcompra($objCompra)
{
$this->objCompra = $objCompra;
}

/**
 * Get the value of objCompraEstadoTipo
 */
public function getObjcompraestadotipo()
{
return $this->objCompraEstadoTipo;
}

/**
 * Set the value of objCompraEstadoTipo
 */
public function setObjcompraestadotipo($objCompraEstadoTipo)
{
$this->objCompraEstadoTipo = $objCompraEstadoTipo;

}

/**
 * Get the value of cefechaini
 */
public function getCefechaini()
{
return $this->cefechaini;
}

/**
 * Set the value of cefechaini
 */
public function setCefechaini($cefechaini)
{
$this->cefechaini = $cefechaini;

//return $this;
}

/**
 * Get the value of cefechafin
 */
public function getCefechafin()
{
return $this->cefechafin;
}

/**
 * Set the value of cefechafin
 */
public function setCefechafin($cefechafin)
{
$this->cefechafin = $cefechafin;

//return $this;
}

public function getmensajeoperacion(){
  return $this->mensajeoperacion;
}
public function setmensajeoperacion($valor){
  $this->mensajeoperacion = $valor;
}

public function setear($idcompraestado, $objCompra, $objCompraEstadoTipo, $cefechaini, $cefechafin,$objusuario){
    $this->setIdcompraestado($idcompraestado);
    $this->setObjcompra($objCompra);
    $this->setObjcompraestadotipo($objCompraEstadoTipo);
    $this->setCefechaini($cefechaini);
    $this->setCefechafin($cefechafin);
    $this->setObjUsuario($objusuario);
}
public function cargar() {
    $resp = false;
    $base = new BaseDatos();
    $sql = "SELECT * FROM compraestado WHERE idcompraestado = ".$this->getIdcompraestado()."";
    
    if ($base->Iniciar()) {
      $res = $base->Ejecutar($sql);
      if ($res > -1) {
        if ($res > 0) {
          $row = $base->Registro();

          $objcompra = new Compra();
          $objcompra->setIdcompra($row['idcompra']);
          $objcompra->cargar();

          $objCompraEstadoTipo = new CompraEstadoTipo();
          $objCompraEstadoTipo->setIdcompraestadotipo($row['idcompraestadotipo']);
          $objCompraEstadoTipo->cargar();

          $objusuario=new Usuario();
          $objusuario->setidusuario($row['idusuario']);
          $objusuario->cargar();
           
          $this->setear($row['idcompraestado'], $objcompra, $objCompraEstadoTipo, $row['cefechaini'], $row['cefechafin'],$objusuario);
        }
      }
    } else {
      $this->setmensajeoperacion("CompraEstado->listar: ".$base->getError());
    }
    return $resp;
  }

  public function insertar() {
    $resp = false;
 
    $fechainicio="'{$this->getCefechaini()}'";
    $base = new BaseDatos();
    $sql = "INSERT INTO compraestado (idcompra, idcompraestadotipo, cefechaini, cefechafin,idusuario) VALUES (".$this->getObjcompra()->getIdcompra().",". $this->getObjcompraestadotipo()->getIdcompraestadotipo().",{$fechainicio},{$this->getCefechafin()},{$this->getObjUsuario()->getidusuario()})";
 
 //   echo $sql;
    if ($base->Iniciar()) {
      if ($id = $base->Ejecutar($sql)) {
        $this->setIdcompraestado($id);
        $resp = true;
      } else {
        $this->setmensajeoperacion("CompraEstado->insertar: ".$base->getError()[2]);
      }
    } else {
      $this->setmensajeoperacion("CompraEstado->insertar: ".$base->getError()[2]);
    }
    return $resp;
  }

  public function modificar() {
    $resp = false;
    $base = new BaseDatos();
    $hoy=date("Y-m-d H:i:s");
    //$fecha="'$hoy'";
    $sql = "UPDATE compraestado SET 
           cefechafin= '$hoy'  
      WHERE idcompraestado = ".$this->getIdCompraestado()."";

    //echo $sql;
    if ($base->Iniciar()) {

      if ($base->Ejecutar($sql)) {
        $resp = true;
       
      } else {
   

        $this->setmensajeoperacion("CompraEstado->modificar: ".$base->getError());
      }
    } else {

      $this->setmensajeoperacion("CompraEstado->modificar: ".$base->getError());
    }
    return $resp;
  }

  
  public static function listar($parametro = "") {
    $arreglo = array();
    $base = new BaseDatos();
    $sql = "SELECT * FROM compraestado ";
    if ($parametro != "") {
      $sql .= " WHERE {$parametro}";
    }
    // echo $sql;
    $res = $base->Ejecutar($sql);
    if ($res > -1) {
      if ($res > 0) {
        while ($row = $base->Registro()) {
          $obj = new CompraEstado();

          $objcompra = new Compra();
          $objcompra->setIdcompra($row['idcompra']);
          $objcompra->cargar();

          $objcompraesttipo = new CompraEstadoTipo();
          $objcompraesttipo->setIdcompraestadotipo($row['idcompraestadotipo']);
          $objcompraesttipo->cargar();
       
          $objusuario=new Usuario();
          $objusuario->setidusuario($row['idusuario']);
          $objusuario->cargar();
         
          if($row['cefechafin']==null)
          {
            $fechafin="null";
          }
          else{
            $fechafin=$row['cefechafin'];
          }
          $obj->setear($row['idcompraestado'], $objcompra, $objcompraesttipo, $row['cefechaini'], $fechafin,$objusuario);
     
          array_push($arreglo, $obj);
        }
      }
    }
    return $arreglo;
  }
  

public function getObjUsuario()
{
return $this->objUsuario;
}

public function setObjUsuario($objUsuario)
{
$this->objUsuario = $objUsuario;
}
}




?>