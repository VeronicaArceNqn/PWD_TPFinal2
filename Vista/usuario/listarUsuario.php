<?php
$dir="../";
$titulo = "Lista Usuarios";
include_once $dir."../Vista/estructura/headerSeguro.php";
include_once '../../configuracion.php';

?>

<div class="container border border-secondary principal mt-3 pt-3">
   <h3 class="text-center">Listado de Usuarios</h3>
    <div id="listarUsuario" class="row text-muted m-0">
   
     </div>    
 </div>
 <!--<div id="listarUsuario"class="form-group mb-4">
                
 </div>--> 
       
        </div>
    <div>
    <script type="text/javascript">
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

            </script>
<?php
include ("../../Vista/estructura/footer.php");
?>
