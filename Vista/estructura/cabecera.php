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
    <link rel="stylesheet" href="../css/bootstrap/4.5.2/bootstrap.min.css">
    <script src="../js/bootstrap/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/bootstrap/bootstrap.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>
    <title><?php echo $titulo?></title>
</head>
<body>
   
<div class="container">
<header class="container-fluid">

  <!-- LOGO DEL HEADER-->

<div class="pt-4 text-center">
      <img  class="img-fluid"src="<?php echo $dir?>../css/images/logo-sis-text-2-(800p).png" alt="Descripción de la imagen" style="max-width: 35%; width=200px; height=300px;"/>
    </div>
 <div class="pt-4">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="<?php echo $dir?>../home/index.php">Inicio</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Productos</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo $dir?>../producto/formProducto.php">Registrar producto</a></li>
            <li><a class="dropdown-item" href="<?php echo $dir?>../producto/listarProducto.php">Listado de productos</a></li>
            
        </ul>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Usuario</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo $dir?>../usuario/formUsuario.php">Registrar Usuario</a></li>
            <li><a class="dropdown-item" href="<?php echo $dir?>../login/index.php">Loguear</a></li>
            <li><a class="dropdown-item" href="#">Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">LogOut</a></li>
            <li><a class="dropdown-item" href="../usuario/listarUsuario.php">Listado de Usuarios</a></li>
        </ul>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Rol</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo $dir?>../rol/formRol.php">Registrar Rol</a></li>
            <li><a class="dropdown-item" href="../rol/listarRol.php">Listado de Roles</a></li>
        </ul>
  </li>
  <!--<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Listados</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href=../listarUsuario.php">Listado de Usuarios</a></li>
        </ul>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="../usuario/listarUsuario.php">Listado de Usuarios</a>
  </li>-->
</ul>




  <!-- Navbar --><!--
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbar"
        aria-controls="navbar"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item dropdown-menu">
                  <li><h6 class="dropdown-header">Dropdown header</h6></li>
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">Usuario</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="../registroUsuario.php">Registrarse</a>
            </li>
            </ul>
          </li>--><!--
          <li class="nav-item">
            <a class="nav-link" href="#">Rol</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../listarUsuario.php">Listado</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>-->
  <!-- Navbar -->
 </div>
</header>
</div>
