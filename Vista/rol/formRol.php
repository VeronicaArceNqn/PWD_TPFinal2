<?php 
$dir="../";
$titulo =" Registro Rol ";
include_once $dir."../Vista/estructura/cabecera.php";
include_once '../../configuracion.php';

?>
<link rel="stylesheet" href="../Vista/css/bootstrap/4.5.2/bootstrap.min.css">
 <div class="card mb-3">
 <div class="row g-0 d-flex align-items-center">
    <div class="col-lg-4">
    <div class="card-body py-5 px-md-5">

       
        <form class="needs-validation" id="form1" name="form1" method="post" action="accionNuevoRol.php">
            <div class="form-group mb-4">
                <h5>Ingrese los siguientes datos para crear su rol</h5>
                <label for="rodescripcion">Descripción del Rol</label>
                <input type="text" class="form-control" id="rodescripcion" name="rodescripcion" placeholder="" required>
            </div>
            
            
            <input id="accion" name="accion" value="nuevo" type="hidden">
            <button type="submit" class="btn btn-primary mb-4">Registrar</button>

            
        </form>
       
    </div>
    </div>
 </div>
 </div>
 <?php
include ("../../Vista/estructura/pie.php");
?>
</div>