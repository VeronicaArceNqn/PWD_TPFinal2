<?php
$titulo =".: Login :.";
$dir="";
include ($dir."../estructura/header.php");
?>
    <div class="d-flex justify-content-center align-items-center">
      <div class="container pt-4">
        <div class="row d-flex justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="card bg-white">
              <div class="card-body p-5">
                <form class="mb-3 mt-md-4">
                  <h5 class="fw-bold mb-2 text-uppercase text-center">Login</h5>
                  <div class="mb-3">
                    <label for="usnombre" class="form-label ">Nombre</label>
                    <input type="text" class="form-control" id="usnombre">
                  </div>
                  <div class="mb-3">
                    <label for="usmail" class="form-label ">Email</label>
                    <input type="email" class="form-control" id="usmail" >
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label ">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="*******">
                  </div>
                 
                  <div class="d-grid">
                    <button class="btn btn-outline-dark" type="submit">Iniciar sesi&oacute;n</button>
                  </div>
                </form>
                <div>
                  <p class="mb-0  text-center">Todavia no tenés tu cuenta? <a href="../usuario/registrarse.php" class="text-primary fw-bold">Registrarse</a></p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php 

include ($dir."../estructura/footer.php");
?>