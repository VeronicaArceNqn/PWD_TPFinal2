<?php 
$dir="../";
$titulo =" Registro Usuario ";
include_once '../estructura/cabecera.php';
//include_once '../../configuration.php';

?>
<link rel="stylesheet" href="../Vista/css/bootstrap/4.5.2/bootstrap.min.css">
 <div class="card mb-3">
 <div class="row g-0 d-flex align-items-center">
    <div class="col-lg-4">
    <div class="card-body py-5 px-md-5">

       
        <form class="needs-validation" id="form1" name="form1" method="post" action="accionNuevoUsuario.php">
            <div class="form-group mb-4">
                <h5>Ingrese los siguientes datos para crear su usuario</h5>
                <label for="nombreyApellio">Nombre y Apellido</label>
                <input type="text" class="form-control" id="usnombre" name="usnombre" placeholder="" required>
            </div>
            <div class="form-group mb-4">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="usmail" name="usmail" aria-describedby="emailHelp" placeholder="" required>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
            </div>
            <div class="form-group mb-4">
                <label for="uspass">Contraseña</label>
                <input type="password" class="form-control" id="uspass" name="uspass" placeholder="" required>
            </div>
            <input id="accion" name="accion" value="nuevo" type="hidden">


            <input type="button" class="btn btn-primary mb-4" value="Registrarse" onclick="encriptar()">
            <!--<button type="submit" class="btn btn-primary mb-4" onclick="validar()">Registrar</button>
-->
            
        </form>

        <script>
            function encriptar(){
                var password =  document.getElementById("uspass").value;
                alert(password);
                var passhash = CryptoJS.MD5(password).toString();
                alert("passhash");
                document.getElementById("uspass").value = passhash;

    setTimeout(function(){ 
        document.getElementById("form1").submit();

	}, 500);

            }

        </script>
       
    </div>
    </div>
 </div>
 </div>
 <?php
include_once '../estructura/pie.php';
?>
</div>