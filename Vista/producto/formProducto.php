<?php 
$dir="../";
$titulo =" Registro Producto ";
include_once $dir."../Vista/estructura/cabecera.php";
include_once '../../configuracion.php';

?>
<link rel="stylesheet" href="../Vista/css/bootstrap/4.5.2/bootstrap.min.css">
 <div class="card mb-3">
 <div class="row g-0 d-flex align-items-center">
    <div class="col-lg-4">
    <div class="card-body py-5 px-md-5">

       
        <form class="needs-validation" id="form1" name="form1" method="post" action="accion/alta_producto.php">
            <div class="form-group mb-4">
                <h5>Ingrese los siguientes datos del Producto</h5>
                <label for="pronombre">Nombre del producto</label>
                <input type="text" class="form-control" id="pronombre" name="pronombre" placeholder="" required>
            </div>
            <div class="form-group mb-4">
                <label for="prodetalle">Detalle del producto</label>
                <input type="text" class="form-control" id="prodetalle" name="prodetalle" placeholder="" required>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
            </div>
            <div class="form-group mb-4">
                <label for="procantstock">Cantidad de Stock</label>
                <input type="number" class="form-control" id="procantstock" name="procantstock" placeholder="" required>
            </div>
            <div class="form-group mb-4">
                <label for="tipo">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" placeholder="" required>
            </div>
            <div class="form-group mb-4">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" placeholder="0.00" required>
            </div>
            <div class="form-group mb-4">
                <label for="urlimagen">url imagen</label>
                <input type="text" class="form-control" id="urlimagen" name="urlimagen" value="https://ibb.co/Nm6x6Wz" required>
            </div>
            <input id="accion" name="accion" value="nuevo" type="hidden">
            
            <button type="submit" class="btn btn-primary mb-4">Registrar producto</button>

            
        </form>
     
    </div>
    </div>
 </div>
 </div>
 <?php
include ("../../Vista/estructura/pie.php");
?>
</div>