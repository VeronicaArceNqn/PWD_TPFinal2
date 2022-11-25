<?php 
include_once $dir."../estructura/header.php";

?>
      <?php 

$objControl = new AbmMenu();
$List_Menu = $objControl->buscar(null);
$combo = '<select class="easyui-combobox"  id="idmenu"  name="idmenu" label="Submenu de?:" labelPosition="top" style="width:90%;">
<option></option>';
foreach ($List_Menu as $objMenu){
    $combo .='<option value="'.$objMenu->getIdmenu().'">'.$objMenu->getMenombre().':'.$objMenu->getMedescripcion().'</option>';
}

$combo .='</select>';
?>
        <form class="needs-validation" id="form1" name="form1" method="post" action="accion/edit_menu.php">
            
        <div class="">
               
                <label for="idusuario">Idmenu</label>
               <?php 
               echo $combo;
               ?>
            </div>
        
        <div class="">
               
                <label for="menombre">Nombre</label>
                <input type="text" class="form-control" id="menombre" name="menombre" placeholder="" required>
            </div>
            <div class="form-group mb-4">
                <label for="medescripcion">Descripcion</label>
                <input type="text" class="form-control" id="medescripcion" name="medescripcion"  placeholder="" required>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
            </div>
            <div class="">
                <label for="idpadre">Contraseña</label>
                <input type="text" class="form-control" id="idpadre" name="idpadre" placeholder="" value="null" required>
            </div>
            <input id="medeshabilitado" name="medeshabilitado" value="null" type="text">


            <input type="submit" class="btn btn-primary mb-4" value="Registrarse" onclick="">
            <!--<button type="submit" class="btn btn-primary mb-4" onclick="validar()">Registrar</button>
-->
            
        </form>