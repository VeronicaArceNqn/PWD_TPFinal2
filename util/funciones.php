<?php 
function data_submitted()
{   //creamos un array vacio
    $_AAux = array();
    //verificamos que $_POST no este vacio
    if (!empty($_POST))
    {
        //les asignamos a _AAux los valores de $_POST
        $_AAux = $_POST;
    }
    else{
    //Sino verificamos que $_GET no este vacio
       if (!empty($_GET))
      {
        //les asignamos a _AAux los valores de $_GET
        $_AAux = $_GET;
      }
    }
    //comprobamos si el array $_AAux no este vacio
    if (count($_AAux)>0) {
        foreach ($_AAux as $indice => $valor) {
            //si el valor del campo esta vacio
            if ($valor == "")
            { //al campo le asignamos null
                 $_AAux[$indice] = 'null';
            }
        }
    }
    return $_AAux;
}
// para la version de PHP 7 usar este autoload
/* 
function __autoload($class_name){
    //echo "class ".$class_name ;
    $directorys = array(
        $_SESSION['ROOT'].'Modelo/',
        $_SESSION['ROOT'].'Modelo/conector/',
        $_SESSION['ROOT'].'Control/',
      //  $GLOBALS['ROOT'].'util/class/',
    );
    //print_object($directorys) ;
    foreach($directorys as $directory){
        if(file_exists($directory.$class_name . '.php')){
            // echo "se incluyo".$directory.$class_name . '.php';
            require_once($directory.$class_name . '.php');
            return;
        }
    }
}*/
// para la version de PHP 8 usar este autoload

spl_autoload_register(function ($clase) {
    // echo "Cargamos la clase  ".$clase."<br>" ;
     $directorys = array(
         $GLOBALS['ROOT'].'Modelo/',
         $GLOBALS['ROOT'].'Control/',
         $GLOBALS['ROOT'].'Modelo/conector/',
         $GLOBALS['ROOT'].'Modelo/otrasclases/',
         $GLOBALS['ROOT'].'Vista/',
     );
     // print_r($directorys) ;
     foreach($directorys as $directory){
         if(file_exists($directory.$clase . '.php')){
             // echo "se incluyo".$directory.$class_name . '.php';
             require_once($directory.$clase . '.php');
             return;
         }
     }
 
 
 });
