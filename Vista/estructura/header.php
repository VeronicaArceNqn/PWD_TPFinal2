
<?php 
include_once "../../configuracion.php";
$dir="";
?>


<!DOCTYPE html>
<html>
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
		
		<a href="../usuario/registrarseB.php" class="easyui-linkbutton"  style="padding:5px; background-color:#0d6efd;color:white;" data-options="plain:true">Registrarse</a>
		<a href="../login/index.php" class="easyui-linkbutton"  style="padding:5px; background-color:#0d6efd;color:white;" data-options="plain:true">Iniciar sesi&oacute;n</a>
		
		<!--<div id="cantProductos"style="float:right;font-size:27px;">0</div>-->
	</div>
	<div id="mm1" style="width:150px;">
	</div>
	<div id="mm2" style="width:100px;">
	</div>
	<div id="mm3">
     </div>
	       
</div>
    </div>
	<!--<div data-options="region:'west',split:true,title:'West'" style="width:150px;padding:10px;">west content</div>-->
	<!--<div data-options="region:'east',split:false,collapsed:true,title:'Perfil'" style="width:200px;padding:10px;height: auto;"> Datos de usuario</div>-->





  <div data-options="region:'center',title:''" style="height:auto;">
  <div>
	
	
</div>     
	