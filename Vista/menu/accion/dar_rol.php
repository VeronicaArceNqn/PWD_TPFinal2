<?php 
include_once "../../../configuracion.php";
$data = data_submitted();
//$data['idusuario']=1;
//$data['idrol']=2;
$respuesta = false;
if (isset($data['idmenu'])){
        $objC = new AbmMenu();

        //le asignamos rol de cliente
       // $datos["idrol"]=2; 
        $objMenu = $objC->alta_rol($data);
        if ($objMenu==null){
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


