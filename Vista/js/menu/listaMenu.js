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
        //carga los datos de la fila seleccionada del datag
        $('#fm').form('load',row);
        url = 'accion/edit_menu.php'
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

          //  alert("Volvio Serviodr"); 
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
function destroyMenu(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Seguro que desea deshabilitar el menu?', function(r){
            if (r){
                $.post('accion/eliminar_menu.php?idmenu='+row.idmenu,
                   function(result){
                        //alert("Volvio Servidor");   
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