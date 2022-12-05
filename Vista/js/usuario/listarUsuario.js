$(document).ready(function(){
    cargarUsuarios();
  });

  function cargarUsuarios()
  {
    $("#listarUsuario").load('accion/listar_usuario.php');
 
  }


    function desHabUsuario(idusuario){
        var jqxhr = $.post('accion/eliminar_usuario.php?idusuario='+idusuario, function() {
        //   alert( "success" );
        })
        .done(function(result) {
            var result = eval('(' + result + ')');
            if (!result.respuesta) {
            $.messager.alert({
                title: 'Error',
                msg: result.errorMsg
            });
            } else {
            $.messager.alert({
                title: 'Mensaje',
                msg: " se Deshabilitó el usuario true:"+result.respuesta
            });
            cargarUsuarios();
            //window.location.href = window.location.href;
            }
        })
        .fail(
            function() {

            $.messager.alert({
                title: 'Error',
                msg: "No se pudo ejecutar"
            });

            }
        )
        .always(function() {
            // alert( "finished" );
        });

        
    }