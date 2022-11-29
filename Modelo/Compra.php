<?php
class Compra extends BaseDatos{
 private $idcompra;
 private $cofecha;
 private $objUsuario;
 private $mensajeoperacion;

 public function __construct()
 {
    $this->compra="";
    $this->cofecha="";
    $this->objUsuario=new Usuario();

 }


 /**
  * Get the value of idcompra
  */
 public function getIdcompra()
 {
  return $this->idcompra;
 }

 /**
  * Set the value of idcompra
  */
 public function setIdcompra($idcompra)
 {
  $this->idcompra = $idcompra;

 }



 /**
  * Get the value of cofecha
  */
 public function getCofecha()
 {
  return $this->cofecha;
 }

 /**
  * Set the value of cofecha
  */
 public function setCofecha($cofecha)
 {
  $this->cofecha = $cofecha;

 }

 /**
  * Get the value of objUsuario
  */
 public function getObjUsuario()
 {
  return $this->objUsuario;
 }

 /**
  * Set the value of objUsuario
  */
 public function setObjUsuario($objUsuario)
 {
  $this->objUsuario = $objUsuario;

 }

 public function getmensajeoperacion(){
   return $this->mensajeoperacion;
 }
 public function setmensajeoperacion($valor){
   $this->mensajeoperacion = $valor;
 }

 public function setear($idcompra, $cofecha, $objUsuario) {
   $this->setIdcompra($idcompra);
   $this->setCofecha($cofecha);
   $this->setObjUsuario($objUsuario);
 }

 public function cargar() {
   $resp = false;
   $base = new BaseDatos();
   $sql = "SELECT * FROM compra WHERE idcompra = ".$this->getIdcompra()."";
   if ($base->Iniciar()) {
     $res = $base->Ejecutar($sql);
     if ($res > -1) {
       if ($res > 0) {
         $row = $base->Registro();

         $objUsuario = new Usuario();
         $objUsuario->setIdusuario($row['idusuario']);
         $objUsuario->cargar();

         $this->setear($row['idcompra'], $row['cofecha'], $objUsuario);
       }
     }
   } else {
     $this->setmensajeoperacion("Compra->listar: ".$base->getError());
   }
   return $resp;
 }

 public function insertar() {
   $resp = false;
   $base = new BaseDatos();
   $sql = "INSERT INTO compra (cofecha, idusuario) VALUES ('".$this->getCofecha()."', ".$this->getObjUsuario()->getIdusuario().")";

   if ($base->Iniciar()) {
     if ($elId = $base->Ejecutar($sql)) {
       $this->setIdcompra($elId);
       $resp = true;
     } else {
       $this->setmensajeoperacion("Compra->insertar: ".$base->getError()[2]);
     }
   } else {
     $this->setmensajeoperacion("Compra->insertar: ".$base->getError()[2]);
   }
   return $resp;
 }
/*
 public function modificar() {
   $resp = false;
   $base = new BaseDatos();
   $sql = "UPDATE compra SET cofecha = '".$this->getCofecha()."', idusuario = ".$this->getObjUsuario()->getIdusuario()." WHERE idcompra = ".$this->getIdcompra()."";
   if ($base->Iniciar()) {
     if ($base->Ejecutar($sql)) {
       $resp = true;
     } else {
       $this->setmensajeoperacion("Compra->modificar: ".$base->getError());
     }
   } else {
     $this->setmensajeoperacion("Compra->modificar: ".$base->getError());
   }
   return $resp;
 }
*/
 public function eliminar() {
   $resp = false;
   $base = new BaseDatos();
   $sql = "DELETE FROM compra WHERE idcompra = ".$this->getIdcompra()."";
   if ($base->Iniciar()) {
     if ($base->Ejecutar($sql)) {
       return true;
     } else {
       $this->setmensajeoperacion("Compra->eliminar: ".$base->getError());
     }
   } else {
     $this->setmensajeoperacion("Compra->eliminar: ".$base->getError());
   }
   return $resp;
 }

 public static function listar($parametro = "") {
   $arreglo = array();
   $base = new BaseDatos();
   $sql = "SELECT * FROM compra ";
   if ($parametro != "") {
     $sql .= " WHERE {$parametro}";
   }

   $res = $base->Ejecutar($sql);
   if ($res > -1) {
     if ($res > 0) {
       while ($row = $base->Registro()) {
         $obj = new Compra();

         $objusuario = new Usuario();
         $objusuario->setIdusuario($row['idusuario']);
         $objusuario->cargar();

         $obj->setear($row['idcompra'], $row['cofecha'], $objusuario);

         array_push($arreglo, $obj);
       }
     }
   }

   return $arreglo;
 }

 public function buscar($idcompra)
 {
   $base = new BaseDatos();
   $consulta = "Select * from compra where idcompra=". $idcompra."";
   $resp = false;
   if ($base->Iniciar()) {
     if ($base->Ejecutar($consulta)) {
       if ($row2 = $base->Registro()) {
        $this->setIdcompra($row2['idcompra']);
        $this->cargar();
        $resp = true;
       }
     } else {
       $this->setmensajeoperacion($base->getError());
     }
   } else {
     $this->setmensajeoperacion($base->getError());
   }
   return $resp;
 }

}



?>