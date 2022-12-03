<?php 
$dir="";
$titulo ="Gestión de Usuarios";
include_once $dir."../estructura/headerSeguro.php";
?>

<?php 

$objControl = new ABMusuario();
$List_Usuario = $objControl->buscar(null);
$combo = '<select class="easyui-combobox"  id="idpadre"  name="idpadre" label="Submenu de?:" labelPosition="top" style="width:90%;">
<option value="null"></option>';
foreach ($List_Usuario as $objUsuario){
    $combo .='<option value="'.$objUsuario->getIdusuario().'">'.$objUsuario->getUsnombre().':'.$objUsuario->getUsmail().':'.$objUsuario->getusdeshabilitado().'</option>';
}

$combo .='</select>';
?>

<div style="padding-left:20px;padding-right:25px;padding-top:40px">
    <table id="dg" title="Administrador de Usuarios" class="easyui-datagrid" style="width:100%;height:auto;" url="accion/listar_usuario.php" toolbar="#toolbar" pagination="true"rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="idusuario" width="8">ID</th>
                <th field="usnombre" width="50">Nombre</th>
                <th field="usmail" width="50">Correo</th>
                <th field="usdeshabilitado" width="25">Deshabilitado</th>
            </tr>
        </thead>
    </table>
        <div id="toolbar">
           <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUsuario()">Nuevo Usuario </a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUsuario()">Editar Usuario</a>-->
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="deshabilitarUsuario()">Deshabilitar Usuario</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editRol()">Cambiar Rol</a>
        </div>
            
        <div id="dlg" class="easyui-dialog" style="width:600px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
            <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
                <h3>Informacion del Usuario</h3>
                <div style="margin-bottom:10px">     
                    <input name="idusuario" id="idusuario"  class="easyui-textbox" hidden="true" label="ID menu:" style="width:100%;" readonly>
                </div>
                <div style="margin-bottom:10px">
                     <input name="usnombre" id="usnombre"  class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input  name="usmail" id="usmail"  class="easyui-textbox" required="true" label="Correo:" style="width:100%">
                </div>
                <!--div style="margin-bottom:10px">

                    //<?php 
                        echo $combo;
                    //?>
                
                </div>
                <div style="margin-bottom:10px">
                     <input class="easyui-checkbox" name="medeshabilitado" value="null" label="Des-Habilitar:">
                </div>-->
            </form>
        </div>
            <div id="dlg-buttons">
                <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUsuario()" style="width:90px">Aceptar</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
            </div>
</div>

    <script type="text/javascript">
            var url;
          /*  function newUsuario(){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nuevo Usuario');
                $('#fm').form('clear');
                url = 'accion/alta_usuario.php';
            }
            function editUsuario(){
                var row = $('#dg').datagrid('getSelected');
                if (row){
                    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Usuario');
                    //carga los datos de la fila seleccionada del datag
                    $('#fm').form('load',row);
                    url = 'accion/edit_usuario.php';
                }
            }*/
            function saveUsuario(){
            	alert("Accion");
                $('#fm').form('submit',{
                    
                    url: url,
                    onSubmit: function(){
                        return $(this).form('validate');
                    },
                    success: function(result){
                        var result = eval('('+result+')');

                        //alert("Volvio Servidor"); 
                        //recorremos el array resultante
                       /* $.each(result, function(key, value){
            alert(key + ": " + value);
        });  */
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
            function deshabilitarUsuario(){
                var row = $('#dg').datagrid('getSelected');
                if (row){
                    $.messager.confirm('Confirm','Seguro que desea deshabilitar el usuario?', function(r){
                        if (r){
                            $.post('accion/eliminar_usuario.php?idusuario='+row.idusuario,{idusuario:row.id},
                               function(result){
                               	 //alert("Volvio Serviodr");   
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

            function editRol(){
                var row = $('#dg').datagrid('getSelected');
                if (row){
                    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Asignar rol');
                    //carga los datos de la fila seleccionada del datag
                    $('#fm').form('load',row);
                    url = 'accion/asignar_rol.php'
                }
            }
            </script>
	<!-- Cuerpo del formulario-->

	<!-- -->
<?php 
include_once $dir."../estructura/footer.php";
?>