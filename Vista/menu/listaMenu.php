<?php 
$dir="";
$titulo ="Gestión de menu";
include_once $dir."../estructura/headerSeguro.php";
?>

             <?php 

$objControl = new AbmMenu();
$List_Menu = $objControl->buscar(null);
$combo = '<select class="easyui-combobox"  id="idpadre"  name="idpadre" label="Submenu de?:" labelPosition="top" style="width:90%;">
<option value="null"></option>';
foreach ($List_Menu as $objMenu){
    $combo .='<option value="'.$objMenu->getIdmenu().'">'.$objMenu->getMenombre().':'.$objMenu->getMedescripcion().'</option>';
}

$combo .='</select>';
?>

<div style="padding-left:20px;padding-right:25px;padding-top:40px">
<table id="dg" title="Administrador de item menu" class="easyui-datagrid" style="width:100%;height:auto;"
    url="accion/listar_menu.php" toolbar="#toolbar" pagination="true"rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
            <tr>
            <th field="idmenu" width="20">ID</th>
            <th field="menombre" width="50">Nombre</th>
            <th field="medescripcion" width="50">Descripci&oacute;n</th>
            <th field="idpadre" width="50">Submenu De:</th>
             <th field="medeshabilitado" width="50">Deshabilitado</th>
            </tr>
            </thead>
            </table>
            <div id="toolbar">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newMenu()">Nuevo Menu </a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editMenu()">Editar Menu</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyMenu()">Deshabilitar Menu</a>
            </div>
            
            <div id="dlg" class="easyui-dialog" style="width:600px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
            <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Menu Informacion</h3>
            <div style="margin-bottom:10px">
            
                      
            <input name="idmenu" id="idmenu"  class="easyui-textbox" hidden="true" label="ID menu:" style="width:100%;" readonly>
            </div>
            <div style="margin-bottom:10px">
            
                      
            <input name="menombre" id="menombre"  class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
            <input  name="medescripcion" id="medescripcion"  class="easyui-textbox" required="true" label="Descripcion:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
            <?php 
                echo $combo;
            ?>
             
            </div>
              <div style="margin-bottom:10px">
            <input class="easyui-checkbox" name="medeshabilitado" value="null" label="Des-Habilitar:">
        </div>
            </form>
            </div>
            <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveMenu()" style="width:90px">Aceptar</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
            </div>
</div>
<script type="text/javascript" src="../js/menu/listaMenu.js"></script>
            
<?php 
include_once $dir."../estructura/footer.php";
?>