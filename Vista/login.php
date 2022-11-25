<?php 
$titulo =" Login ";
?>
 <div class="card mb-3">
 <div class="row g-0 d-flex align-items-center">
    <div class="col-lg-4">
    <div class="card-body py-5 px-md-5">

       
        <form class="needs-validation" id="form1" name="form1" method="post" action="../accion/verificarLogin.php">
            
            <div class="form-group mb-4">
                <label for="email1">Correo electrónico</label>
                <input type="email" class="form-control" id="usmail" name="usmail" aria-describedby="emailHelp" placeholder="" required>
                
            </div>
            <div class="form-group mb-4">
                <label for="pass">Contraseña</label>
                <input type="password" class="form-control" id="uspass" name="uspass" placeholder="" required>
            </div>
            
            <button type="submit" class="btn btn-primary mb-4">Ingresar</button>
            <input id="accion" name="accion" value="validar" type="hidden">
            <div>
            Crear nuevo usuario <a href="../usuario/formUsuario.php"> Registrate</a>

            </div>
        </form>
       
    </div>
    </div>
 </div>
 </div>


