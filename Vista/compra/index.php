<?php
$titulo = ".: Carrito compras :.";
$dir = "";
include($dir . "../estructura/headerSeguro.php");

$suma=0;

?> <section class="shopping-cart dark">
  <div class="container">
    <div class="block-heading">
      <h2>Carrito de compras</h2>
     </div>
    <div id="contenido"class="content">
    
    </div>
</section>
<script type="text/javascript">
  cargarCarrito();
  
  function  cargarCarrito()
  {
  		$("#contenido").load('accion/cargar_carrito.php?idcompra='+$("#idcompra").val()+'&idcompraestado='+$("#idcompraestado").val()+'&idusuario='+<?php echo $idusuario;?>);
  }/*
      function agregarProducto() {
    var idcompra=$("#idcompra").val();
    alert(idcompra);
    var urldatos= "";
    if(parseInt($("#idcompra").val())==-1)
    {
      //alert("entro crear pedido")
      urldatos= "accion/agregar_primerproducto.php";
    }
    else{
    //  alert("entro agregar producto al carrito")
      urldatos= "accion/agregar_producto.php";
    }
    alert(urldatos);
    var jqxhr = $.post(urldatos, function() {
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
          var res;
          if(result.seagrego)
          {
            res=",Se agrego el producto";
          }
          else 
             res="No se pudo agregar el producto";
          $.messager.alert({
            title: 'Mensaje',
            msg: "Se registro correctamente-> true:" + result.respuesta+""+res 
          });
          cargarCarrito();
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
      alert( "second finished" );
    //});
  //}
 */
  function cambiarEstado(mensaje,idcompraestadotipo,idusuario) {
    var jqxhr = $.post('accion/agregar_estado.php?idcompra='+$("#idcompra").val()+"&idcompraestado="+$("#idcompraestado").val()+"&idcompraestadotipo="+idcompraestadotipo+"&idusuario="+idusuario, function() {
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
            msg: mensaje + result.respuesta+" se cambio estado true:"+result.seactualizo
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
  function enviarDatos(){
                //var row = $('#dg').datagrid('getSelected');
           
                    $.messager.confirm('Confirm','Seguro que desea eliminar el menu?', function(r){
                        if (r){
                            $.post('accion/envio_datos.php?idproducto='+3,
                               function(result){
                               	 alert("Volvio Serviodr");  

                                if (result.respuesta){
                                   	 alert("se pudo enviar, idproducto"+result.idproducto);
                                    //$('#dg').datagrid('reload');    // reload the  data
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
            function eliminarItem(idproducto,idcompraitem){
                //var row = $('#dg').datagrid('getSelected');
           
                    $.messager.confirm('Confirm','Seguro que desea eliminar el menu?', function(r){
                        if (r){
                            $.post('accion/envio_datos.php?idproducto='+idproducto+'&idcompraitem='+idcompraitem,
                               function(result){
                               	 alert("Volvio Serviodr");  

                                if (result.respuesta){
                                   	 alert("se pudo enviar, idproducto:"+result.idproducto +" y su idcompraitem es"+result.idcompraitem);
                                    //$('#dg').datagrid('reload');    // reload the  data
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
</script>
<?php
include($dir . "../estructura/footer.php"); ?>