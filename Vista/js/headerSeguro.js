		
  function cerrarSesion(){
    //var row = $('#dg').datagrid('getSelected');

        $.messager.confirm('Confirm','Esta seguro de cerrar sesión?', function(r){
            if (r){
                $.post('../login/accion/cerrarSesion.php',
                   function(result){
                 //  	 alert("Volvio Serviodr");  

                    if (result.respuesta){
                           
                        location.href = '../login/index.php?msg='+result.Msg;
                        
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