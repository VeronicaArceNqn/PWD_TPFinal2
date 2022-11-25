<?php

$titulo = "Usuario nuevo";
include_once '../estructura/cabecera.php';
//include_once '/xampp/htdocs/Login/vista/utiles/funciones.php';
include_once '../../configuracion.php';
?>
<div class="container-fluid principal ml-2 p-4">
    <?php
    $datos = data_submitted();
    /*echo "<pre>";
    print_r($datos);
    echo "</pre>"; */
    
    $resp = false;
    $objAbmUsuario = new ABMusuario();

    $botonAuto='';

    if (isset($datos['accion'])) {
       
        if (isset($datos['accion'])){
            // abm() en ABMUsuario controla la accion nuevo y editar.
            $resp = $objAbmUsuario->abm($datos);
            if($resp){
                $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
            }else {
                $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
            }
            //echo $mensaje;
           // echo("<script>location.href = './index.php?msg=$mensaje';</script>");
        }
// se movió todo lo comentado a ABMUsuario del Control
     /*   if ($datos['accion'] == 'nuevo') {
             
            $objUsuario=null;
            if (isset($datos['usmail'])) {
                $arraymail = ['usmail' => $datos['usmail']];
                //print_r($arraymail);
                
                
                $objUsuario = $objAbmUsuario->buscar($arraymail);
                //echo "<br>objUsuario me devuelve de buscar : <br>";
                //print_r($objUsuario);
            }
            if ($objUsuario == null) {
               $mensajeResultado = $objAbmUsuario->verificarUsuarioMail($datos);
              // print_r($datos);
               print_r($mensajeResultado);


                if ($mensajeResultado['Resultado']) {
                    if (isset($datos['accion'])) {
                        echo $datos['accion'];
                        if ($objAbmUsuario->alta($datos)) {
                            $resp = true;
                        }
                    }
                } else {

                    echo $mensajeResultado['Mensaje'];
                }
            }
            else {
            echo "<H4 class='text-center bg-danger text-light'>El correo electrónico ya esta registrado</  H4>";
           }
        }*/
    }
        if ($resp) {
            $mensaje = "La accion " . $datos['accion'] . " Usuario se realizo correctamente.";
          //  header('Refresh: 5;URL=NuevaPersona.php');
         /*  $botonAuto='<div class="col-md-3 pb-3">
           <a href="NuevoAuto.php"class="btn btn-warning d-grid gap-2 pl-0 mx-auto col-6 pt-2 text-center">Cargar Auto</a>
            </div>';*/
    
        } else {
            $mensaje = "La accion " . $datos['accion'] . " Usuario no pudo concretarse.";
            //echo $objABMPersona->getmensajeoperacion();
        }

        echo "<H4 class='text-center bg-success text-light'>$mensaje</H4>";
        ?>
        <?php
   // echo $botonAuto;
    ?>
    
       <div class="col-md-3">
            <a href="listarUsuario.php"class="btn btn-secondary d-grid gap-2 pl-0 mx-auto col-6 pt-2">Volver</a>
        </div>
</div>
</div>

<?php
include_once '../estructura/pie.php';
?>