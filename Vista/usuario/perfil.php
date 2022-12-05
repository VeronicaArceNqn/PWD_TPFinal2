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

 <div class="d-flex justify-content-center align-items-center">
  <div class="container pt-4">
    <div class="row d-flex justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="card bg-white">
          <div class="card-body p-5">
            <form id="ff" class="mb-3 mt-md-4">
              <h5 class="fw-bold mb-2 text-uppercase text-center">Mis datos</h5>
              <div class="mb-3">
                <label for="usnombre" class="form-label ">Nombre</label>
                <input type="text" class="form-control" id="usnombre" name="usnombre" value="<?php echo $obj->getusnombre()?>"readonly>
              </div>
              <div class="mb-3">
                <label for="uspass" class="form-label ">Email</label>
                <input type="email" class="form-control" id="usmail" name="usmail" value="<?php echo $obj->getusmail()?>" readonly>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label ">Password</label>
                <input type="hidden" class="form-control" id="uspass" name="uspass">
                <input type="hidden" class="form-control" id="usdeshabilitado" name="usdeshabilitado" value="<?php echo $obj->getusdeshabilitado()?>">
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese nueva contraseña" value="*******" readonly>
              </div>

              <div class="d-grid">
                <button id="btnEditar"class="btn btn-dark" type="button" onclick="editar();">Presione aqui para editar</button>
                <button id="btnEnviar" class="btn btn-success" type="button" onclick="actualizar();" hidden>Enviar</button>
              </div>
            </form>
           

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="../js/usuario/perfil.js">


</script>
 <?php
include ("../../Vista/estructura/footer.php");
?>
