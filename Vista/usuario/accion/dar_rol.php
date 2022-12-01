<?php 
include_once "../../../configuracion.php";
$data = data_submitted();
//$data['idusuario']=1;
//$data['idrol']=2;
$respuesta = false;
if (isset($data['idusuario'])){
        $objC = new ABMUsuario();

        //le asignamos rol de cliente
       // $datos["idrol"]=2; 
        $objUsuario = $objC->alta_rol($data);
        if ($objUsuario==null){
            $mensaje = " La accion  DAR ROL No pudo concretarse";
            
        }
        else{
            
                $respuesta=true;
             
         
        }
}
$retorno['respuesta'] = $respuesta;
if (isset($mensaje)){
    
    $retorno['errorMsg']=$mensaje;
   
}
 echo json_encode($retorno);
?>


