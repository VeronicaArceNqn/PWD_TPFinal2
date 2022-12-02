<?php 
$dir="../";
$titulo =" Editar Usuario ";
include_once $dir."../Vista/estructura/headerSeguro.php";
include_once '../../configuracion.php';
$objAbmUsuario = new ABMusuario();
$datos =data_submitted();
$obj = null;
//print_r ($datos);
//echo $datos['idusuario'];
$msj="";
if (isset($datos['idusuario'])){
    $listaUsuario = $objAbmUsuario->buscar($datos);
    //print_r($listaUsuario);
    if (count($listaUsuario)==1){
        $obj= $listaUsuario[0];

        //print_r($obj);
    }
}else{
    $msj="No se envío ningún usuario";
}


?>
<link rel="stylesheet" href="../Vista/css/bootstrap/4.5.2/bootstrap.min.css">
 <div class="card mb-3">
 <div class="row g-0 d-flex align-items-center">
    <div class="col-lg-6">
    <div class="card-body py-5 px-md-5">

       
        <form class="needs-validation" id="form1" name="form1" method="post" action="accionEditarUsuario.php">
            <div class="form-group mb-4">
                <h5>Dar Rol</h5>
                <?php echo $msj;?>
                <input type="text" class="form-control" id="idusuario" name="idusuario" placeholder="" value="<?php echo $obj->getIdusuario()?>" readonly required hidden>
                <label for="nombreyApellio">Nombre y Apellido</label>
                <input type="text" class="form-control" id="usnombre" name="usnombre" placeholder="" value="<?php echo $obj->getUsnombre()?>" readonly required>
            </div>
            <div class="form-group mb-4">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="usmail" name="usmail" aria-describedby="emailHelp" placeholder="" value="<?php echo $obj->getUsmail()?>" readonly required>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
            </div>


            <?php
            $objr = new ABMRol();
            $listaRol = $objr->buscar(null);
            ?>
            


                    <div class="row float-right">
                        <div class="col-md-12 float-right">
                    <?php 
                    if( count($listaRol)>0){
                        foreach ($listaRol as $obj) {
                            ?>
                            <a class="btn btn-success" role="button" href="javascript:void(0)" onclick="darRol(<?php echo $obj->getidrol();?>,<?php echo $datos['idusuario'];?>)">Dar Rol <?php echo $obj->getrodescripcion();?></a>
                        <?php
                        }
                    }
                    ?>
                            
                        </div>
                    </div>

            <div id="listaroles"class="form-group mb-4">
                
            </div>
           
            <!--
            <button type="submit" class="btn btn-primary mb-4">Modificar datos</button>-->

            
        </form>
        <script type="text/javascript">
          $(document).ready(function(){
         cargarRoles();
          });

          function cargarRoles()
          {
            $("#listaroles").load('accion/listar_rol.php');
         
          }
            function darRol(idrol,idusuario) {
    var jqxhr = $.post('accion/dar_rol.php?idrol='+idrol+"&idusuario="+idusuario, function() {
       // alert( "success" );
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
            msg: " se asignó nuevo rol true:"+result.respuesta
          });
          cargarRoles();
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

  function eliminarRol(idrol,idusuario) {
    var jqxhr = $.post('accion/eliminar_rol.php?idrol='+idrol+"&idusuario="+idusuario, function() {
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
            msg: " se eliminó el rol true:"+result.respuesta
          });
          cargarRoles();
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
    </div>
 </div>
 </div>
 <?php
include ("../../Vista/estructura/footer.php");
?>
</div>