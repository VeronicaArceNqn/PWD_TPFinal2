<?php
include_once("../../configuracion.php");
$dir = "";
$mensajeError = "no se pudo concretar";
$objSesion= new Session();

$urlcompleto = $_SERVER['PHP_SELF'];
$urlMenu = (explode('/', $urlcompleto, 4));
// urlMenu[3] guarda los datos de la página

$resp = $objSesion->validar();
$permisosOk = $objSesion->tengoPermisos($urlMenu[3]);
$puedeEntrar=false;
if ($resp && $permisosOk) {
	$puedeEntrar=true;
	//echo("<script>location.href = '../home/index.php';</script>");
} else {
	$mensaje = "Error, no tiene permisos para ingresar en la página";
	echo ("<script>location.href = '../login/index.php?msg=" . $mensaje . "';</script>");
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/themes/bootstrap/easyui.css">
	<link rel="icon" href="../css/images/icon-sis.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/themes/icon.css">

	<link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/themes/color.css">
	<link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/demo/demo.css">

	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

	<script type="text/javascript" src="../js/jquery-easyui-1.10.8/jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery-easyui-1.10.8/jquery.easyui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/core.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>

</head>

<body class="easyui-layout">
	<div data-options="region:'north',border:false" style="min-height:250px;height:280px;background:#fff;padding:10px">

		<div id="logo" align="center" style="width: 100%;height: 150px;background-image: url('../css/images/logo-sis-text-2-(800p).png');
  background-repeat: no-repeat;
  background-size: contain;
   background-position: center center;
  border: 0px solid black;
  text-align: center;">
		</div>
		<div class="easyui-panel" style="padding:5px; background-color:#0d6efd;color:white; width:100%;text-decoration:none;">
		<?php 
		   
                
           $objUsuroles=$objSesion->getRol();
		      
		   foreach($objUsuroles as $objusurol){
               $idrol =  $objusurol->getobjrol()->getidrol();
                $objMenuRol = new ABMmenurol();
                $param['idrol']=$idrol;
                $arraymenusrol=$objMenuRol->buscar($param);
				//filtramos la lista de menurol segun su idrol
			//	 print_r($arraymenusrol);
				foreach($arraymenusrol as $objmenurol)
				{  
					//obtenemos un objmenu que es el padre del menu				   
					$objPadre=$objmenurol->getObjMenu()->getObjMenu();
                    
					$objMenu=$objmenurol->getObjMenu(); 
				   $idpadre=0;
				   //le pedimos su idmenu al objmenu
				   $idmenu=$objmenurol->getObjMenu()->getIdmenu();
				   //si su padre no es null
				   if($objPadre!=null)
				   {
					//obtiene el idpadre
					$idpadre=$objMenu->getIdmenu();
				
					}
				   				 
					 $objCtrlMenu = new ABMmenu();
		              $param['idpadre']=$idpadre;
				      //filtramos la lista de menus por idpadre
		              $arremenus= $objCtrlMenu->buscar($param);
					  
				      if(count($arremenus)==0)
				      {

						//convertimos los nombres de los menus a mayuscula
						$nombre=mb_strtoupper($objMenu->getMenombre(),'utf-8');

						$menuHabilitado = $objMenu->getMedeshabilitado();
                        //generamos los links de los enlaces del menu que tengan una url
                          if($objMenu->getMedescripcion()!="#" && $menuHabilitado==null)
						{
							if($objMenu->getMenombre()=="Compra")
							{
								$nombre='<i class="bi bi-cart4"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
								<path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
							</svg> </i>'.$nombre;
							}
							echo '<a href="'.$objMenu->getMedescripcion().'" class="easyui-linkbutton" style="padding:5px; background-color:#0d6efd;color:white;" data-options="plain:true">'.$nombre.'</a>'; 
						
					    }
					   }

					  }
				    
             
               
				}
				$idusuario=$objSesion->getUsuario()->getIdusuario();
				$nombre=$objSesion->getUsuario()->getUsnombre();
         ?>
		
			
			<a href="javascript:void(0)" class="easyui-linkbutton" style="padding:5px; background-color:#212529;color:white;" data-options="plain:true" onclick="cerrarSesion()"><?php echo $nombre;?> <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
					<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4m7 14l5-5l-5-5m5 5H9" />
				</svg>
				Salir
			</a>
			
		
		</div>

	</div>

	<!--<div data-options="region:'west',split:true,title:'West'" style="width:150px;padding:10px;">west content</div>-->
	<!--<div data-options="region:'east',split:false,collapsed:true,title:'Perfil'" style="width:200px;padding:10px;height: auto;"> Datos de usuario</div>-->





	<div data-options="region:'center',title:''" style="height:auto;">
	<script type="text/javascript" src="../js/headerSeguro.js">


 
 
</script>


