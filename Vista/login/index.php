<?php
$dir="";
$titulo = "Login";

include_once $dir.'../estructura/header.php';
$datos = data_submitted();

?>	
<div class="container border border-secondary principal mt-3 pt-3">
    <h3 class="text-center">Iniciar sesi&oacute;n</h3>
<div class="row float-center">
    <div class="col-md-12 float-left">
      <?php 
      if(isset($datos) && isset($datos['msg']) && $datos['msg']!=null) {
        echo $datos['msg'];
      }
        
     ?>
    </div>
</div>

<br>

<div class="container-fluid text-align-center ">
<div class="row float-right">

    <div class="col-md-12 float-right">
    
            <form method="post" action="accion.php" name="formulario" id="formulario">
            <input id="accion" name ="accion" value="login" type="hidden">
            <div class="row mb-3">
                <div class="col-sm-3 ">
                    <div class="form-group has-feedback">
                        <label for="nombre" class="control-label">Nombre:</label>
                        <div class="input-group">
                        <input id="usnombre" name="usnombre" type="text" class="form-control" value="" required >
                        </div>
                    </div>
                </div>
            </div>

        
            <div class="row mb-3">
                <div class="col-sm-3 ">
                    <div class="form-group has-feedback">
                        <label for="uspass" class="control-label">Pass:</label>
                        <div class="input-group">
                        <input id="uspass" name="uspass" type="password" class="form-control"  required>
                    </div>
                    </div>
                </div>
            </div>
            <input type="button" class="btn btn-primary btn-block" value="Validar" onclick="formSubmit()">
        </form>

    </div>
</div>
</div>


<div>
    <p class="mb-0  text-center">Todavia no tenés tu cuenta? <a href="../usuario/registrarseB.php" class="text-primary fw-bold">Registrate</a></p>
                </div>
<a href="../home/index.php">Volver</a>

<script>

function formSubmit()
{
    var password = document.getElementById("uspass").value;
    alert(password);
    var passhash = CryptoJS.MD5(password).toString();
    alert(passhash);
    document.getElementById("uspass").value = passhash;

    setTimeout(function(){ 
        document.getElementById("formulario").submit();

	}, 500);
}
</script>
</div>
</div>

<?php
include_once '../estructura/footer.php';
?>