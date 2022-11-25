<?php 
$dir="";
$titulo ="Gestión de menu";
include_once $dir."../estructura/header.php";
?>

    <div style="padding-left:20px;padding-right:25px;padding-top:40px">
<table id="dg" title="Administrador de usuarios" class="easyui-datagrid" style="width:100%;height:550px"
    url="accion/listar_usuario.php" toolbar="#toolbar" pagination="true"rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
            <tr>
            <th field="idusuario" width="50">ID</th>
            <th field="usnombre" width="50">Usuario</th>
            <th field="usmail" width="50">Correo</th>
            <th field="uspass" width="50">Password</th>
            <th field="usdeshabilitado" width="50">Deshabilitado</th>
            </tr>
            </thead>
            </table>
            <div id="toolbar">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUsuario()">Nuevo Usuario </a>
           <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUsuario()">Editar Usuario</a>-->
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUsuario()">Baja Usuario</a>
            </div>
            
            <div id="dlg" class="easyui-dialog" style="width:600px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
            <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Informacion usuario</h3>
            <div style="margin-bottom:10px">
            
                      
            <input name="usnombre" id="usnombre"  class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
            <input  name="usmail" id="usmail"  class="easyui-textbox" required="true" label="Correo:" style="width:100%">
            
            </div>
            <div style="margin-bottom:10px">
            <input  name="uspass" id="uspass"  class="easyui-passwordbox" required="true" label="Password:" style="width:100%">
            <!--<input  name="uspassencriptado" id="uspassencriptado"  class="easyui-textbox" required="true" label="Correo:" style="width:100%">-->    
        </div>
            <div style="margin-bottom:10px">
            <input class="easyui-checkbox" name="usdeshabilitado" value="usdeshabilitado" label="Des-Habilitar:">
        </div>
            </form>
            </div>
            </div>
            <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUsuario();" style="width:90px">Aceptar</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
            </div>
            <script>
            function encriptar(){
                var password =  $('#uspass').val();
               // alert(password);
                var passhash = CryptoJS.MD5(password).toString();
               // alert("passhash:"+passhash);
                $('#uspass').val(passhash);
               // document.getElementById("uspass").value = passhash;

    /*setTimeout(function(){ 
        document.getElementById("fm").submit();

	}, 500);
*/
            }

        </script>
            <script type="text/javascript">
            var url;
            function newUsuario(){
          
                            
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nuevo Usuario');
                $('#fm').form('clear');
                url = 'accion/alta_usuario.php';
            }
            /*
            function editUsuario(){
                var row = $('#dg').datagrid('getSelected');
                if (row){
                    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Usuario');
                    $('#fm').form('load',row);
                    url = 'accion/edit_usuario.php?idusuario='+row.idusuario;
                }
            }*/
            function saveUsuario(){
                var password =  $('#uspass').val();
               //alert(password);
               //var passhash = CryptoJS.MD5(password).toString();
               //alert("passhash:"+passhash);
              //  $('#uspass').val(passhash);
                $('#fm').form('submit',{
                    //atributo: variable url
                    url: url,
                    onSubmit: function(){
                        return $(this).form('validate');
                    },
                    success: function(result){
                      var result = eval('('+result+')');

                        alert("Volvio Serviodr");   
                        if (!result.respuesta){
                            $.messager.show({
                                title: 'Error'+result.errorMsg,
                                msg: result.errorMsg
                            });
                        } else {
                           
                            $('#dlg').dialog('close');        // close the dialog
                            $('#dg').datagrid('reload');    // reload 
                        }
                    }
                });
            }
            function destroyUsuario(){
                var row = $('#dg').datagrid('getSelected');
                if (row){
                    $.messager.confirm('Confirm','Seguro que desea eliminar el usuario?', function(r){
                        if (r){
                            $.post('accion/eliminar_usuario.php?accion=eliminar&idusuario='+row.idusuario,{idusuario:row.id},
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
    <?php 
include_once $dir."../estructura/footer.php";
?>