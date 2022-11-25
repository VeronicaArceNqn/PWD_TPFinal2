<?php 
include_once("../../configuracion.php");
$dir="";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
  <!--<script src="../js/bootstrap.min.js"></script>-->
    <script src="../js/bootstrap.min.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>-->
    <title><?php echo $titulo?></title>
</head>
<?php
$objTrans = new Session();
$resp = $objTrans->validar();
if($resp) {
  echo "ya entro";
  echo("<script>location.href = '../home/paginaSegura.php';</script>");
} else {
    $mensaje ="Error, vuelva a intentarlo";
   echo $mensaje;
    echo("<script>location.href = '../login/index.php?msg=".$mensaje."';</script>");
}


?>
<body>
   
<div class="container">
<header class="container-fluid">

  <!-- LOGO DEL HEADER-->

<div class="pt-5 text-center">
      <img  class="img-fluid"src="<?php echo $dir?>../css/images/logo-sis-text-2-(800p).png" alt="Descripción de la imagen" style="max-width: 50%; width=200px; height=300px;"/>
    </div>
 <div class="pt-5">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="<?php echo $dir?>../home/index.php">Inicio</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Usuario</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo $dir?>../usuario/formUsuario.php">Registrar Usuario</a></li>
            <li><a class="dropdown-item" href="<?php echo $dir?>../login/index.php">Loguear</a></li>
            <li><a class="dropdown-item" href="#">Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="nav-link" href="<?php echo $dir?>../login/accion.php?accion=cerrar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4m7 14l5-5l-5-5m5 5H9"/></svg>
                            Salir
                        </a></li>
        </ul>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Rol</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo $dir?>../rol/formRol.php">Registrar Rol</a></li>
        </ul>
  </li>
  <!--<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="index.php" role="button" aria-expanded="false">Listados</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href=../listarUsuario.php">Listado de Usuarios</a></li>
        </ul>
  </li>-->
  
  <li class="nav-item">
    <a class="nav-link" href="../usuario/listarUsuario.php">Listado de Usuarios</a>
  </li>
</ul>

 </div>
</header>

</div>
