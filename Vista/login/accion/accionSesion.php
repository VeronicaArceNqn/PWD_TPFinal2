<?php

include_once '../../../configuracion.php';

$datos = data_submitted();
/*
$datos["usnombre"]="admin";
$datos["uspass"]="e10adc3949ba59abbe56e057f20f883e";*/
$resp = false;


       if(isset($datos['usnombre'])&&$datos['uspass'])
       {
  
        $objTrans = new Session();
        $resp = $objTrans->iniciar($datos['usnombre'],$datos['uspass']);
       //     echo("<script>location.href = '../login/index.php?msg=".$mensaje."';</script>");
       }
       else{
        $mensaje ="Error, vuelva a intentarlo";
      
     }
    $retorno['respuesta'] = $resp;//true o false
    if (isset($mensaje)){
        
        $retorno['errorMsg']=$mensaje;
       
    }
         echo json_encode($retorno);
        

    
//include_once $dir.'../estructura/pie.php';   
