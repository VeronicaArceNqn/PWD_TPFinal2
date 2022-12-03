<?php
$dir="../";
$titulo = "Lista Usuarios";
include_once $dir."../Vista/estructura/headerSeguro.php";
include_once '../../configuracion.php';

?>

<div class="container border border-secondary principal mt-3 pt-3">
   <h3 class="text-center">Listado de Usuarios</h3>
    <div class="row text-muted m-0">
        <?php 
        
        
        $objAbmUsuario = new ABMUsuario();

        $listaUsuario = $objAbmUsuario->buscar(null);
        //print_r($listaUsuario);
        if(count($listaUsuario)>0){
            ?>
            <table class="table table-light table-striped text-center table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th scope="col">ID Usuario</th>
                        <th scope="col">Nombre y Apellido</th>
                        <!--<th scope="col">Contraseña</th>-->
                        <th scope="col">Correo Electrónico</th>
                        <th scope="col">Hab/Deshabilitado</th>
                      
                        <th scope="col"></th>
                          <!--<th scope="col"></th>
                        -->                
                    </tr>
                </thead>
                <tbody>
            <?php
                    
                    foreach ($listaUsuario as $objUsuario) {                         
                        echo '<tr>
                            <th scope="row">'.$objUsuario->getidusuario().'</th>';
                        echo '
                             <td>'.$objUsuario->getusnombre().'</td>';
                       /* echo '
                        <td>'.$objUsuario->getuspass().'</td>';*/
                        echo '
                             <td>'.$objUsuario->getusmail().'</td>';
                    
                        echo '
                             <td id="listarUsuario">'.$objUsuario->getusdeshabilitado().'</td>';
                         if($objUsuario->getusdeshabilitado()==null){
                            echo '<td><a href="asignarRol.php?idusuario='.$objUsuario->getidusuario().'" class="btn btn-success">Dar rol</a> ';  
                            ?>
                            <a href="javascript:void(0)" class="btn btn-dark" role="button" onclick="desHabUsuario(<?php echo $objUsuario->getidusuario(); ?>)">Deshabilitar</a></td>;
                            <?php
                         }else{
                            echo '<td></td>';
                       // echo '<td><a href="accion/eliminar_usuario.php?idusuario'.$objUsuario->getidusuario().'" class="btn btn-dark">Deshabilitar</a></td>';                       
                            echo'</tr>';
                         }
                     }                     
                //fin foreach
                echo '    </tbody>
            </table>';
        }
        else{
            echo "<h3>No hay personas registradas </h3>";
        }                
        ?>    
     </div>    
 </div>
 <!--<div id="listarUsuario"class="form-group mb-4">
                
 </div>--> 
        <script type="text/javascript">
             $(document).ready(function(){
            cargarUsuarios();
          });

          function cargarUsuarios()
          {
            $("#listarUsuario").load('accion/listar_usuario.php?idusuario='+$("#idusuario").val());
         
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
        </div>
    <div>
<?php
include ("../../Vista/estructura/footer.php");
?>
