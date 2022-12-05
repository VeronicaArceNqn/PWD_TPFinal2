
$(document).ready(function () {
    cargarProductos();
     });
     function cargarProductos()
     {
      
      $("#productos").load('accion/cargar_productos.php?tipo='+$("#tipo").val());
     }
     function agregarItem(idproducto,cant)
     { 
      //  alert("idproducto="+idproducto+" cantidad="+cant);
      
       var urldatos="../compra/accion/agregar_item.php?idproducto="+idproducto+"&cicantidad="+cant;
        var jqxhr = $.post(urldatos, function() {
            //alert( "success" );
          })
          .done(function(result) {
            var result = eval('(' + result + ')');
            if (!result.seactualizo||!result.seagrego) {
              $.messager.show({
               title: 'Error',
               msg: "No se pudo agregar correctamente"
             });
            } else {
          
              $.messager.show({
                title: 'Se agregó al carrito!',
                msg: "Se registro correctamente"
              });
              cargarProductos();
              //cargarProductos($("tipo").val());
            }
          })
          .fail(function() {
    
            $.messager.alert({
              title: 'Error',
              msg: "No se pudo ejecutar"
            });
    
          })
          .always(function() {
            // alert( "finished" );
          });
          
        jqxhr.always(function() {
        //  alert( "second finished" );
        });
      }

   