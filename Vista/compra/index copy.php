<?php
$titulo = ".: Carrito compras :.";
$dir = "";
include($dir . "../estructura/headerSeguro.php");



?> <section class="shopping-cart dark">
  <div class="container">
    <div class="block-heading">
      <h2>Carrito de compras</h2>
      <?php echo "idusuario:".$idusuario; ?>
    </div>
    <div class="content">
    <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="items">
                 
                  <?php 
                  if(count($items)>0)
                  {
                    $suma=0;
                    foreach($items as $item)
                    {
                  ?>
                    <div class="product">
                        <div class="row">
                            <div class="col-md-3 d-flex">
                            <img src="<?php echo $item->getObjProducto()->getUrlimagen();?>" class="img-fluid mx-auto d-flex image">
                            </div>
                            <div class="col-md-8">
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-5 product-name">
                                            <div class="product-name">
                                                <a href="#"><?php echo $item->getObjProducto()->getProdetalle();?></a>
                                                <div class="product-info">
                                                    <div>Marca: <span class="value"><?php echo $item->getObjProducto()->getPronombre();?></span></div>
                                                    
                                                    <div>Disponibles: <span class="value"><?php echo $item->getObjProducto()->getProcantstock()?></span></div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 quantity">
                                            <label for="quantity">Cantidad:</label>
                                            <input id="quantity" type="number" value ="<?php echo $item->getCicantidad();?>" class="form-control quantity-input">
                                        </div>
                                        <div class="col-md-2 price">
                                            <span><?php echo $item->getObjProducto()->getPrecio(); ?></span>
                                        </div>
                                        <div class="col-md-2 pl-2">
                                            <button class="btn btn-danger" onclick="eliminarItem(<?php echo  $item->getObjProducto()->getIdproducto(); ?>,<?php echo  $item->getIdcompraitem(); ?>)">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php 
                   $suma=$suma+ $item->getObjProducto()->getPrecio();
                    }
                  }?>
                </div>
            </div>
            <div class="summary">
              <h3>Resumen</h3>
              <!--<label>ID Compra:</label>-->
              <label>ID Compra Estado:</label> <input type="text" id="idcompraestado" name="idcompraestado"value="<?php echo $idcompraestado;?>" readonly>
              <div class="summary-item"><span class="text">Subtotal</span><h3><?php echo $suma;?></h3></div>


              <button type="button" onclick="agregarProducto()" class="btn btn-primary btn-lg btn-block">Agregar producto</button>

              <button type="button" onclick="cambiarEstado()" class="btn btn-warning btn-lg btn-block">Cambiar estado</button>
              <button type="button" onclick="enviarDatos()" class="btn btn-warning btn-lg btn-block">Enviar datos</button>
              
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<script type="text/javascript">
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
      /*
    jqxhr.always(function() {
      alert( "second finished" );
    });*/
  }

  function cambiarEstado() {
    var jqxhr = $.post("accion/agregar_estado.php", function() {
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
            msg: "Se registro correctamente-> true:" + result.respuesta
          });

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