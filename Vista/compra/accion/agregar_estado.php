<?php
include_once "../../../configuracion.php";
$idusuario=2;
$idcompraestadotipo=1;
$hoy = date("Y-m-d H:i:s");  
//si ya tiene una compra con esta en confeccion
$datos["idcompraestado"]=5;
//sino
$datos["idcompra"]=5;
$datos["idcompraestadotipo"]=$idcompraestadotipo;
 $datos["idusuario"]=$idusuario;
 $datos["cefechaini"]=$hoy;
 $datos["cefechafin"]='null';



$respuesta=false;
$seactualizo=false;


if (isset($datos['idcompra'])){

    $objCtrlCE=new ABMcompraestado();  
    $data["idcompraestado"]=$datos["idcompraestado"];   
    //para actualizar asignamos la fecha fin del estado anterior 
    $seactualizo = $objCtrlCE->modificacion($data);     
        
        //agregamos el nuevo estado 
        $respuesta = $objCtrlCE->alta($datos);
   

}
else{ $mensaje="no se pudo concretar";
}
$retorno['respuesta'] = $respuesta;
$retorno['seactualizo'] = $seactualizo;
if (isset($mensaje)){
   
    $retorno['errorMsg']=$mensaje;

}
    echo json_encode($retorno);
