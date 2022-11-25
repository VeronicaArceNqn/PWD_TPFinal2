
<?php 
include_once ("../../configuracion.php");
$dir="";
$mensajeError="no se pudo concretar";
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title><?php echo $titulo;?></title>
<link rel="stylesheet" type="text/css" href="../css/style.css"><link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/themes/bootstrap/easyui.css">
<link rel = "icon" href = 
    "../css/images/icon-sis.png" 
            type = "image/x-icon">
<link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/themes/icon.css">

<link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/themes/color.css">
<link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/demo/demo.css">

<script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

<script type="text/javascript" src="../js/jquery-easyui-1.10.8/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery-easyui-1.10.8/jquery.easyui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>

</head>
<?php

$objTrans = new Session();
$resp = $objTrans->validar();
if($resp) {
   $mensajeError="se creo";
	//echo("<script>location.href = '../home/index.php';</script>");
} 
echo $mensajeError;


?>
<body class="easyui-layout">
<div data-options="region:'north',border:false" style="min-height:250px;height:280px;background:#fff;padding:10px">
	
     <div id="logo" align="center"style="width: 100%;height: 150px;background-image: url('../css/images/logo-sis-text-2-(800p).png');
  background-repeat: no-repeat;
  background-size: contain;
   background-position: center center;
  border: 0px solid black;
  text-align: center;

  "> 
	</div>
	<div class="easyui-panel" style="padding:5px; background-color:#0d6efd;color:white; width:100%;text-decoration:none;">
		<a href="../home/index.php" class="easyui-linkbutton"  style="padding:5px; background-color:#0d6efd;color:white;" data-options="plain:true">Home</a>
		<a href="../home/index.php?tipo=Camaras" class="easyui-linkbutton"  style="padding:5px; background-color:#0d6efd;color:white;"data-options="plain:true">Camaras</a>
		<a href="../home/index.php?tipo=Equipos" class="easyui-linkbutton"  style="padding:5px; background-color:#0d6efd;color:white;" data-options="plain:true">Equipos</a>
		<a href="../home/index.php?tipo=Accesorios" class="easyui-linkbutton"   style="padding:5px; background-color:#0d6efd;color:white;" data-options="plain:true">Accesorios</a>
		<a href="../usuario/registrarseB.php" class="easyui-linkbutton"  style="padding:5px; background-color:#0d6efd;color:white;" data-options="plain:true">Registrarse</a>
		<a href="#" class="easyui-menubutton"   style="padding:5px; background-color:#212529;color:white;" data-options="menu:'#mm4'">Mi perfil</a>
        <a href="#" class="easyui-menubutton"   style="padding:5px; background-color:#212529;color:white;width:140px;" data-options="menu:'#mm5'">Administrar</a>
		<a href="#" class="easyui-menubutton"   style="padding:5px; background-color:#212529;color:white;width:140px;" data-options="menu:'#mm6'">Deposito</a>
		<!--<div id="cantProductos"style="float:right;font-size:27px;">0</div>-->
	</div>
	<div id="mm1" style="width:150px;">
	</div>
	<div id="mm2" style="width:100px;">
	</div>
	<div id="mm3">
     </div>
	<div id="mm4">
		<div href="../usuario/perfil.php">Mis datos</div>
		<div href="../usuario/cambiardatos.php">Cambiar Datos</div>
		<div href="../compra/miscompras.php">Mis compras</div>
		
	</div>
    <div id="mm5">
       
        <div href="../menu/listaMenu.php"> Gestion de Menu
	</div>
	<div href="../menu/permisosMenu.php"> Gestion permisos paginas
	</div>
	<div  href="../usuario/listarUsuario.php">Gestion de Usuario	</div>
	   
		
	</div>


	<div id="mm6">
	<div href="../producto/listaProducto.php">Gestion de Producto</div>
	<div href="../compra/listaCompras.php">Supervisar compras</div>
	
        
</div>
    </div>
	<!--<div data-options="region:'west',split:true,title:'West'" style="width:150px;padding:10px;">west content</div>-->
	<div data-options="region:'east',split:false,collapsed:true,title:'Perfil'" style="width:200px;padding:10px;height: auto;"> Datos de usuario</div>





  <div data-options="region:'center',title:''" style="height:auto;">
  <div>
  <a class="nav-link" href="../login/accion.php?accion=cerrar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4m7 14l5-5l-5-5m5 5H9"/></svg>
                            Salir
                        </a>
	
</div>     

