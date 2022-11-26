<?php 
include_once "../../../configuracion.php";
$data = data_submitted();
$respuesta = false;
if (isset($data['usnombre'])){
        $objC = new ABMUsuario();
        $objUsuario = $objC->alta($data);
        if ($objUsuario==null){
            $mensaje = " La accion  ALTA No pudo concretarse";
            
        }
        else{
            $datos["idusuario"]=$objUsuario->getidusuario();
            //le asignamos rol de cliente
            $datos["idrol"]=2; 
            if($objC->alta_rol($datos))
              {
                $respuesta=true;
              }
         
        }
}
$retorno['respuesta'] = $respuesta;
if (isset($mensaje)){
    
    $retorno['errorMsg']=$mensaje;
   
}
 echo json_encode($retorno);
?>