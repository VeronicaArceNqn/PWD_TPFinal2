<?php 
$dir="";
$titulo ="Gestión de producto";
include_once $dir."../estructura/headerSeguro.php";
?>


<div style="padding-left:20px;padding-right:25px;padding-top:40px">
<table id="dg" title="Administrador de Productos" class="easyui-datagrid" style="width:100%;height:auto;"
    url="accion/listar_producto.php" toolbar="#toolbar" pagination="true"rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
            <tr>
            <th field="idproducto" width="50">ID</th>
            <th field="pronombre" width="50">Nombre</th>
            <th field="prodetalle" width="50">Detalle</th>
            <th field="procantstock" width="50">Cant stock</th>
            <th field="tipo" width="50">Tipo</th>
              
            <th field="precio" width="50">Precio</th>
             
             <th field="urlimagen" width="50">Url imagen</th>
            </tr>
            </thead>
            </table>
         
            <div id="toolbar">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newProducto()">Nuevo Producto </a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editProducto()">Editar Producto</a>
            <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyProducto()">Baja Producto</a>
--></div>
            
            <div id="dlg" class="easyui-dialog" style="width:600px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
            <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Producto Informacion</h3>
            <div style="margin-bottom:10px">
            
                      
            <input name="idproducto" id="idproducto"  class="easyui-textbox" label="ID producto:" style="width:100%;" value="" readonly>
            </div>
            <div style="margin-bottom:10px">
            
                      
            <input name="pronombre" id="pronombre"  class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
            </div>


            <div style="margin-bottom:10px">
             <select id="tipo" name="tipo" class="easyui-combobox"label="Elegir Tipo:"style="width:90%;">
    <option value="Camaras" selected>Camaras</option>
    <option value="Equipos">Equipos</option>
    <option value="Accesorios">Accesorios</option>
   </select>

            </div>
            <div style="margin-bottom:10px">
            <input name="precio" id="precio"  class="easyui-numberbox" required="true" label="Precio:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
            
                      
            <input name="procantstock" id="procantstock"  class="easyui-numberbox" required="true" label="Cant stock:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
            <input  name="prodetalle" id="prodetalle"  class="easyui-textbox" required="true" label="Marca:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
            <input  name="urlimagen" id="urlimagen"  class="easyui-textbox" required="true" label="URL Imagen:" style="width:100%">
                 
            </div>
             
            </form>
            </div>
            <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveProduct()" style="width:90px">Aceptar</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
            </div>
            </div>
            <script type="text/javascript" src="../js/producto/listaProducto.js">
  </script>
 
<?php 
include_once $dir."../estructura/footer.php";
?>