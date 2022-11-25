
<?php 
include_once "../../configuracion.php";
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Basic CRUD Application - jQuery EasyUI CRUD Demo</title>
<link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/themes/bootstrap/easyui.css">
<link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/themes/icon.css">
<link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/themes/color.css">
<link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/demo/demo.css">
<script type="text/javascript" src="../js/jquery-easyui-1.10.8/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery-easyui-1.10.8/jquery.easyui.min.js"></script>
</head>
<body class="easyui-layout">
<div data-options="region:'north',border:false" style="height:200px;background:#fff;padding:10px">
	
     <div id="logo" align="center"style="width: 100%;height: 180px;background-image: url('../images/logo-sis-text-2-(800p).png');
  background-repeat: no-repeat;
  background-size: contain;
   background-position: center center;
  border: 0px solid black;
  text-align: center;
  "> 
	</div>
    </div>
	<!--<div data-options="region:'west',split:true,title:'West'" style="width:150px;padding:10px;">west content</div>-->
	<div data-options="region:'east',split:false,collapsed:true,title:'LOGIN'" style="width:200px;padding:10px;"> Datos de sesion</div>
	<div data-options="region:'south',border:false" style="height:50px;background:#212529;color:white;padding:10px;text-align:center;">© 2022 Copyright: PWD - Grupo Nº7</div>
	<div data-options="region:'center',title:''">
	
	
	<div class="easyui-panel" style="padding:5px; background-color:#0d6efd;color:white;">
		<a href="#" class="easyui-linkbutton"  style="padding:5px; background-color:#0d6efd;color:white;" data-options="plain:true">Home</a>
		<a href="#" class="easyui-menubutton"  style="padding:5px; background-color:#0d6efd;color:white;"data-options="menu:'#mm1'">Camaras</a>
		<a href="#" class="easyui-menubutton"  style="padding:5px; background-color:#0d6efd;color:white;" data-options="menu:'#mm2'">Equipos</a>
		<a href="#" class="easyui-menubutton"   style="padding:5px; background-color:#0d6efd;color:white;" data-options="menu:'#mm3'">Accesorios</a>
		<!--<div id="cantProductos"style="float:right;font-size:27px;">0</div>-->
	</div>
	<div id="mm1" style="width:150px;">
		
		<div class="menu-sep"></div>
	
		<div>Dahua</div>
		<div>Hikvision</div>
		<!--<div class="menu-sep"></div>
		<div>
			<span>Toolbar</span>
			<div>
				<div>Address</div>
				<div>Link</div>
			
			</div>
		</div>
			<div data-options="iconCls:'icon-remove'">Delete</div>
		<div>Select All</div>
		-->
	
	</div>
	<div id="mm2" style="width:100px;">
		<div>DVR</div>
		<div>NVR</div>
		<div></div>
	</div>
	<div id="mm3">
		<div>Discos duros</div>
		<div>Cables</div>
		<div>Conectores</div>
	</div>
    

<table id="dg" title="Administrador de item menu" class="easyui-datagrid" style="width:100%;height:550px"
    url="accion/listar_menu.php" toolbar="#toolbar" pagination="true"rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
            <tr>
            <th field="idmenu" width="50">ID</th>
            <th field="menombre" width="50">Nombre</th>
            <th field="medescripcion" width="50">Descripci&oacute;n</th>
            <th field="idpadre" width="50">Submenu De:</th>
             <th field="medeshabilitado" width="50">Deshabilitado</th>
            </tr>
            </thead>
            </table>
            <div id="toolbar">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newMenu()">Nuevo Menu </a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editMenu()">Editar Menu</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyMenu()">Baja Menu</a>
            </div>
            
            <div id="dlg" class="easyui-dialog" style="width:600px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
            <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Menu Informacion</h3>
            <div style="margin-bottom:10px">
            
                      
            <input name="menombre" id="menombre"  class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
            <input  name="medescripcion" id="medescripcion"  class="easyui-textbox" required="true" label="Descripcion:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
            <?php 

$objControl = new AbmMenu();
$List_Menu = $objControl->buscar(null);
$combo = '<select class="easyui-combobox"  id="idpadre"  name="idpadre" label="Submenu de?:" labelPosition="top" style="width:90%;">
<option></option>';
foreach ($List_Menu as $objMenu){
    $combo .='<option value="'.$objMenu->getIdmenu().'">'.$objMenu->getMenombre().':'.$objMenu->getMedescripcion().'</option>';
}

$combo .='</select>';
?>
            <?php 
                echo $combo;
            ?>
             
            </div>
              <div style="margin-bottom:10px">
            <input class="easyui-checkbox" name="medeshabilitado" value="medeshabilitado" label="Des-Habilitar:">
        </div>
            </form>
            </div>
            <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveMenu()" style="width:90px">Aceptar</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
            </div>
            <script type="text/javascript">
            var url;
            function newMenu(){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nuevo Menu');
                $('#fm').form('clear');
                url = 'accion/alta_menu.php';
            }
            function editMenu(){
                var row = $('#dg').datagrid('getSelected');
                if (row){
                    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Menu');
                    $('#fm').form('load',row);
                    url = 'accion/edit_menu.php?accion=mod&idmenu='+row.idmenu;
                }
            }
            function saveMenu(){
            	//alert(" Accion");
                $('#fm').form('submit',{
                    url: url,
                    onSubmit: function(){
                        return $(this).form('validate');
                    },
                    success: function(result){
                        var result = eval('('+result+')');

                        alert("Volvio Serviodr");   
                        if (!result.respuesta){
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                           
                            $('#dlg').dialog('close');        // close the dialog
                            $('#dg').datagrid('reload');    // reload 
                        }
                    }
                });
            }
            function destroyMenu(){
                var row = $('#dg').datagrid('getSelected');
                if (row){
                    $.messager.confirm('Confirm','Seguro que desea eliminar el menu?', function(r){
                        if (r){
                            $.post('accion/eliminar_menu.php?accion=borradoLogico&idmenu='+row.idmenu,{idmenu:row.id},
                               function(result){
                               	 alert("Volvio Serviodr");   
                                 if (result.respuesta){
                                   	 
                                    $('#dg').datagrid('reload');    // reload the  data
                                } else {
                                    $.messager.show({    // show error message
                                        title: 'Error',
                                        msg: result.errorMsg
                                  });
                                }
                            },'json');
                        }
                    });
                }
            }
            </script>
          
	
	<!-- Cuerpo del formulario-->

	<!-- -->
	</div>
		<script>
		function setalign(align){
			$('a.easyui-menubutton').menubutton({
				menuAlign: left
			})
		}
	</script>
         </div>    
        </body>
            </html>