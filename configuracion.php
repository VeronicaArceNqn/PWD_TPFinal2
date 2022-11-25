<?php
// header('Content-Type: text/html; charset=utf-8');
//header ("Cache-Control: no-cache, must-revalidate ");

/////////////////////////////
// CONFIGURACION APP//
/////////////////////////////
//$PROYECTO ='PWD_TPFinal';

//variable que almacena el directorio del proyecto
/*$ROOT =$_SERVER['DOCUMENT_ROOT']."/$PROYECTO/";

include_once($ROOT.'util/funciones.php');*/
$GLOBALS['ROOT'] =$_SERVER['DOCUMENT_ROOT'] ."/PWD_TPFinal2/";
include_once("util/funciones.php");
//include_once($ROOT.'modelo/');
//include_once($ROOT.'utiles/vendor/autoload.php');




// Variable que define la pagina de autenticacion del proyecto
//$INICIO = "Location:http://".$_SERVER['HTTP_HOST']."/$PROYECTO/Vista/login/index.php";

// variable que define la pagina principal del proyecto (menu principal)
//$PRINCIPAL = "Location:http://".$_SERVER['HTTP_HOST']."/$PROYECTO/Vista/home/paginaSeguras.php";


//$_SESSION['ROOT']=$ROOT;

?>