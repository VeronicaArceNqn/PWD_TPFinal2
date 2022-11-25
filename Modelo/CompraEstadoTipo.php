<?php 
class CompraEstadoTipo extends BaseDatos{
    private $idcompraestadotipo;
    private $cetdescripcion;
    private $cetdetalle;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->idcompraestadotipo="";
        $this->cetdescripcion="";
        $this->cetdetalle="";
    }


    /**
     * Get the value of idcompraestadotipo
     */
    public function getIdcompraestadotipo()
    {
    return $this->idcompraestadotipo;
    }

    /**
     * Set the value of idcompraestadotipo
     */
    public function setIdcompraestadotipo($idcompraestadotipo)
    {
    $this->idcompraestadotipo = $idcompraestadotipo;

    }

    /**
     * Get the value of cetdescripcion
     */
    public function getCetdescripcion()
    {
    return $this->cetdescripcion;
    }

    /**
     * Set the value of cetdescripcion
     */
    public function setCetdescripcion($cetdescripcion)
    {
    $this->cetdescripcion = $cetdescripcion;

    }

    /**
     * Get the value of cetdetalle
     */
    public function getCetdetalle()
    {
    return $this->cetdetalle;
    }

    /**
     * Set the value of cetdetalle
     */
    public function setCetdetalle($cetdetalle)
    {
    $this->cetdetalle = $cetdetalle;
    }

    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
    }

    public function setear($idcompraestadotipo, $cetdescripcion, $cetdetalle) {
        $this->setIdcompraestadotipo($idcompraestadotipo);
        $this->setCetdescripcion($cetdescripcion);
        $this->setCetdetalle($cetdetalle);
      }

    public function cargar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM compraestadotipo WHERE idcompraestadotipo =".$this->getIdcompraestadotipo()."";
        if ($base->Iniciar()) {
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
            $row = $base->Registro();

            $this->setear($row['idcompraestadotipo'], $row['cetdescripcion'], $row['cetdetalle']);
            }
        }
        } else {
        $this->setmensajeoperacion("CompraEstadoTipo->listar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO compraestadotipo (idcompraestadotipo,cetdescripcion,cetdetalle ) VALUES (".$this->getIdcompraestadotipo().",'".$this->getCetdescripcion()."','".$this->getCetdetalle()."')";
        
        if ($base->Iniciar()) {
            if ($id = $base->Ejecutar($sql)) {
                $this->setIdcompraestadotipo($id);

                $resp = true;
            } else {
                $this->setmensajeoperacion("CompraEstadoTipo->insertar: ".$base->getError()[2]);
            }
        } else {
             $this->setmensajeoperacion("CompraEstadoTipo->insertar: ".$base->getError()[2]);
        }
        return $resp;
    }

    public function modificar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE compraestadotipo SET cetdescripcion = '".$this->getCetdescripcion()."', cetdetalle = '".$this->getCetdetalle()."' WHERE idcompraestadotipo = ".$this->getIdcompraestadotipo()."";
        
        if ($base->Iniciar()) {

        if ($base->Ejecutar($sql)) {

            $resp = true;
        } else {
            $this->setmensajeoperacion("CompraEstadoTipo->modificar: ". $base->getError());
        }
        } else {
        $this->setmensajeoperacion("CompraEstadoTipo->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM compraestadotipo WHERE idcompraestadotipo=".$this->getIdcompraestadotipo()."";
        if ($base->Iniciar()) {
        if ($base->Ejecutar($sql)) {
            return true;
        } else {
            $this->setmensajeoperacion("CompraEstadoTipo->eliminar: {$base->getError()}");
        }
        } else {
        $this->setmensajeoperacion("CompraEstadoTipo->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "") {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM compraestadotipo ";
        if ($parametro != "") {
        $sql .= " WHERE ".$parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
        if ($res > 0) {

            while ($row = $base->Registro()) {
            $obj = new CompraEstadoTipo();
            $obj->setear($row['idcompraestadotipo'], $row['cetdescripcion'], $row['cetdetalle']);

            array_push($arreglo, $obj);
            }
        }
        }

        return $arreglo;
    }
}


?>