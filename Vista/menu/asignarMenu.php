<?php 
$dir="../";
$titulo =" Asignar menuRol ";
include_once $dir."../Vista/estructura/headerSeguro.php";
include_once '../../configuracion.php';
$objAbmMenu = new AbmMenu();
$datos =data_submitted();
$obj = null;
//print_r ($datos);
//echo $datos['idusuario'];
$msj="";
if (isset($datos['idmenu'])){
    $listaMenu = $objAbmMenu->buscar($datos);
    //print_r($listaMenu);
    if (count($listaMenu)==1){
        $obj= $listaMenu[0];

        //print_r($obj);
    }
}else{
    $msj="No se envío ningún menu";
}


?>
<link rel="stylesheet" href="../Vista/css/bootstrap/4.5.2/bootstrap.min.css">
 <div class="card mb-3">
 <div class="row g-0 d-flex align-items-center">
    <div class="col-lg-6">
    <div class="card-body py-5 px-md-5">

       
        <form class="needs-validation" id="form1" name="form1" method="post" action="accionEditarUsuario.php">
            <div class="form-group mb-4">
                <h5>Dar Men&uacute;</h5>
                <?php echo $msj;?>
                <input type="text" class="form-control" id="idmenu" name="idmenu" placeholder="" value="<?php echo $obj->getIdmenu()?>" readonly required hidden>
                <label for="menombre">ID Men&uacute;</label>
                <input type="text" class="form-control" id="menombre" name="menombre" placeholder="" value="<?php echo $obj->getMenombre()?>" readonly required>
            </div>
            <div class="form-group mb-4">
                <label for="medescripcion">Descripci&oacute;n</label>
                <input type="text" class="form-control" id="medescripcion" name="medescripcion" aria-describedby="emailHelp" placeholder="" value="<?php echo $obj->getMedescripcion()?>" readonly required>
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
                            <a class="btn btn-success" role="button" href="javascript:void(0)" onclick="darRol(<?php echo $obj->getidrol();?>,<?php echo $datos['idmenu'];?>)">Dar Rol <?php echo $obj->getrodescripcion();?></a>
                        <?php
                        }
                    }
                    ?>
                            
                        </div>
                    </div>

            <div class="form-group mb-4">
                
                <?php
                   
                   $listaTabla = $objAbmMenu->darRoles($datos);
                   
        
                ?>
                                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                    
                    <?php
                    if( count($listaTabla)>0){
                        foreach ($listaTabla as $objTabla) {
                            echo '<tr><td>'.$objTabla->getobjrol()->getidrol().'</td>';
                            echo '<td>'.$objTabla->getobjrol()->getrodescripcion().'</td>';
                            ?>

                            <td><a class="btn btn-danger" role="button" href="javascript:void(0)" onclick="eliminarRol(<?php echo $objTabla->getobjrol()->getidrol();?>,<?php echo $objTabla->getObjMenu()->getIdMenu();?>)">Quitar Rol </a></td>
                            


                        </tr>
                        <?php

                        
                        }
                    }

                    ?>
                            </tbody>
                        </table>
                        <a class="btn btn-secondary" role="button" href="permisosMenu.php" >Volver </a>
                    </div>
            </div>
           
            <!--
            <button type="submit" class="btn btn-primary mb-4">Modificar datos</button>-->

            
        </form>
        <script>
            function darRol(idrol,idmenu) {
    var jqxhr = $.post('accion/dar_rol.php?idrol='+idrol+"&idmenu="+idmenu, function() {
        //alert( "success" );
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
          //cargarCarrito();
          window.location.href = window.location.href;
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

  function eliminarRol(idrol,idmenu) {
    var jqxhr = $.post('accion/eliminar_rol.php?idrol='+idrol+"&idmenu="+idmenu, function() {
        //alert( "success" );
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
          //cargarCarrito();
          window.location.href = window.location.href;
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