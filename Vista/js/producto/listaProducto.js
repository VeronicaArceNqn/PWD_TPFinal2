var urlDatos;
function newProducto(){
    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nuevo Producto');
    $('#fm').form('clear');
    urlDatos = 'accion/alta_producto.php';
}

function editProducto(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Producto');
        $('#fm').form('load',row);
        urlDatos = 'accion/edit_producto.php'
        
    }
}
function saveProduct(){
    //alert(urlDatos);
    $('#fm').form('submit',{
        url: urlDatos,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');

            alert("Volvio Serviodr:"+result.respuesta); 
           
            if (!result.respuesta){
                $.messager.show({
                    title: 'Error',
                    msg: "no se pudo concretar"
                });
            } else {
                
            alert("cerramos ventana"); 
           
               //cerramos el dialog
                $('#dlg').dialog('close');
                //actualizamos los productos en el datagrid
                $('#dg').datagrid('reload');    // reload 
            }
        }
    });
    
}

function destroyProducto(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Seguro que desea eliminar el producto?', function(r){
            if (r){
                $.post('accion/eliminar_producto.php?idproducto='+row.idproducto,{idproducto:row.id},
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