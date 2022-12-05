<?php 
$dir="../";
$titulo ="Mis datos";
include_once $dir."../Vista/estructura/headerSeguro.php";
include_once '../../configuracion.php';
$objAbmUsuario = new ABMusuario();
$datos =data_submitted();
$obj = null;

$idusuario=$objSesion->getUsuario()->getIdusuario();
$datos["idusuario"]=$idusuario;

    $listaUsuario = $objAbmUsuario->buscar($datos);
    //print_r($listaUsuario);
    if (count($listaUsuario)==1){
        $obj= $listaUsuario[0];

        //print_r($obj);
    }



?>
<link rel="stylesheet" href="../Vista/css/bootstrap/4.5.2/bootstrap.min.css">
 <div class="card mb-3">
 <div class="row g-0 d-flex align-items-center">
    <div class="col-lg-4">
    <div class="card-body py-5 px-md-5">

       
        <form class="needs-validation" id="form1" name="form1" method="post" action="accionEditarUsuario.php">
            <div class="form-group mb-4">
                <h5>Mis datos</h5>
                <input type="text" class="form-control" id="idusuario" name="idusuario" placeholder="" value="<?php echo $obj->getIdusuario()?>" readonly required hidden>
                <label for="nombreyApellio">Nombre usuario</label>
                <input type="text" class="form-control" id="usnombre" name="usnombre" placeholder="" value="<?php echo $obj->getUsnombre()?>" readonly required>
            </div>
            <div class="form-group mb-4">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="usmail" name="usmail" aria-describedby="emailHelp" placeholder="" value="<?php echo $obj->getUsmail()?>" readonly required>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
            </div>
        

            
        </form>
   
       
    </div>
    </div>
 </div>

 </div>
 <?php
include ("../../Vista/estructura/footer.php");
?>
