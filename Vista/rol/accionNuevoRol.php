<?php

$titulo = "Rol nuevo";
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
    $objAbmRol= new ABMrol();

   

    if (isset($datos['accion'])) {
       
        if (isset($datos['accion'])){
            // abm() en ABMUsuario controla la accion nuevo y editar.
            $resp = $objAbmRol->abm($datos);
            if($resp){
                $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
            }else {
                $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
            }
            //echo $mensaje;
           // echo("<script>location.href = './index.php?msg=$mensaje';</script>");
        }

    }
        if ($resp) {
            $mensaje = "La accion " . $datos['accion'] . " Rol se realizo correctamente.";
          //  header('Refresh: 5;URL=NuevaPersona.php');
        
    
        } else {
            $mensaje = "La accion " . $datos['accion'] . " Rol no pudo concretarse.";
            //echo $objABMPersona->getmensajeoperacion();
        }

        echo "<H4 class='text-center bg-success text-light'>$mensaje</H4>";
        ?>
        <?php
   
    ?>
    
       <div class="col-md-3">
            <a href="listarRol.php"class="btn btn-secondary d-grid gap-2 pl-0 mx-auto col-6 pt-2">Volver</a>
        </div>
</div>
</div>

<?php
include_once '../estructura/pie.php';
?>