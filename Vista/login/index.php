<?php
$dir="";
$titulo = ".: Iniciar sesión :.";

include_once $dir.'../estructura/header.php';
$datos = data_submitted();

      if(isset($datos) && isset($datos['msg']) && $datos['msg']!=null) {
        //echo $datos['msg'];
      }
        
     ?>
  <br>

<div class="d-flex justify-content-center align-items-center">
      <div class="container pt-4">
        <div class="row d-flex justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="card bg-white">
              <div class="card-body p-5">
                <form class="mb-3 mt-md-4" method="post" action="accion.php" name="formulario" id="formulario">
                <input id="accion" name ="accion" value="login" type="hidden">
                  <h5 class="fw-bold mb-2 text-uppercase text-center">Iniciar sesi&oacute;n</h5>
                 
                  <div class="mb-3">
                    <label for="usnombre" class="form-label ">Nombre</label>
                    <input type="text" class="form-control" id="usnombre"name="usnombre">
                  </div>
                   <!--
                  <div class="mb-3">
                    <label for="uspass" class="form-label ">Email</label>
                    <input type="email" class="form-control" id="usmail"name="usmail" >
                  </div>-->
                  <div class="mb-3">
                    <label for="password" class="form-label ">Password</label>
                    <input type="hidden" class="form-control" id="uspass" name="uspass">
                    <input type="hidden" class="form-control" id="usdeshabilitado" name="usdeshabilitado" value="null">
                    <input type="password" class="form-control" id="password" name="password" placeholder="*******">
                  </div>
                 
                  <div class="d-grid">
                  <input type="button" class="btn btn-primary btn-block" value="Validar" onclick="formSubmit()">
                  </div>
                  
                </form>
                <div>
                  <p class="mb-0  text-center"><a href="../usuario/registrarseB.php" class="text-primary fw-bold">Registrate</a></p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<a href="../home/index.php">Volver</a>

<script>

function formSubmit()
{
    var password = document.getElementById("password").value;
    //alert(password);
    var passhash = CryptoJS.MD5(password).toString();
    //alert(passhash);
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