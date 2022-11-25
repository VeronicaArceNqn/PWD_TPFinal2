estoy en verificar login

<?php

$titulo = "Usuario nuevo";
include_once '../estructura/cabecera.php';
//include_once '/xampp/htdocs/Login/vista/utiles/funciones.php';
include_once '/xampp/htdocs/Login/configuracion.php';
?>
<div class="container-fluid principal ml-2 p-4">
    <?php
    $datos = data_submitted();
    echo "<pre>";
    print_r($datos);
    echo "</pre>"; 
    
    $resp = false;
    $objAbmUsuario = new ABMusuario();

    $botonAuto='';

    if (isset($datos['accion'])) {
       

        if ($datos['accion'] == 'validar') {
             
            $objUsuario=null;
            if (isset($datos['usmail'])) {
                $arraymail = ['usmail' => $datos['usmail']];
                
                $objUsuario = $objAbmUsuario->buscar($arraymail);
                //print_r($objUsuario);
                echo " estoy mando desde buscar a ABMusuario";
            }
            if ($objUsuario == null) {
               $mensajeResultado = $objAbmUsuario->verificarUsuarioMail($datos);


                if ($mensajeResultado['Resultado']) {
                    if (isset($datos['accion'])) {
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
        }
    }
        if ($resp) {
            $mensaje = "La accion " . $datos['accion'] . " se realizo correctamente.";
          //  header('Refresh: 5;URL=NuevaPersona.php');
           $botonAuto='<div class="col-md-3 pb-3">
           <a href="NuevoAuto.php"class="btn btn-warning d-grid gap-2 pl-0 mx-auto col-6 pt-2 text-center">Cargar Auto</a>
       </div>';
    
        } else {
            $mensaje = "La accion " . $datos['accion'] . " no pudo concretarse.";
            //echo $objABMPersona->getmensajeoperacion();
        }

        echo "<H4 class='text-center bg-success text-light'>$mensaje</H4>";
        ?>
        <?php
    echo $botonAuto;
    ?>
    
       <div class="col-md-3">
            <a href="NuevaPersona.php"class="btn btn-secondary d-grid gap-2 pl-0 mx-auto col-6 pt-2">Volver</a>
        </div>
</div>
</div>

<?php
include_once '../estructura/pie.php';
?>