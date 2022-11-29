<?php
$titulo = ".: Carrito compras :.";
$dir = "";
include($dir . "../estructura/header.php");

$idusuario=3;
$param["idusuario"]=$idusuario;
$param["idcompraestadotipo"] = 0;
$param["cefechafin"]="null";
$objCntrlCE= new ABMcompraestado();
$arreCE=$objCntrlCE->buscar($param);
//print_r($arreCE);
$idcompra=-1;
$idcompraestado="";
if(count($arreCE)==1)
{
  $idcompra=$arreCE[0]->getObjCompra()->getIdcompra();
  $idcompraestado=$arreCE[0]->getIdcompraestado();
  $objCntrlCI= new ABMcompraitem(); 
  $datositem["idcompra"]=$idcompra;
  $items=$objCntrlCI->buscar($datositem);
 // print_r($items);

}

?> <section class="shopping-cart dark">
  <div class="container">
    <div class="block-heading">
      <h2>Carrito de compras</h2>
      
    </div>
    <div class="content">
    <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="items">
                 
                  
                    <div class="product">
                        <div class="row">
                            <div class="col-md-3 d-flex">
                            <img class="img-fluid mx-auto d-flex image" src="https://i.ibb.co/V2TFP2R/C6.webp" >
                            </div>
                            <div class="col-md-8">
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-5 product-name">
                                            <div class="product-name">
                                                <a href="#">Camara dahua 5mpx</a>
                                                <div class="product-info">
                                                    <div>Marca: <span class="value">Dahua</span></div>
                                                    <div>Disponibles: <span class="value">9</span></div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 quantity">
                                            <label for="quantity">Cantidad:</label>
                                            <input id="quantity" type="number" value ="1" class="form-control quantity-input">
                                        </div>
                                        <div class="col-md-2 price">
                                            <span>$32000</span>
                                        </div>
                                        <div class="col-md-2 pl-2">
                                            <button class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="summary">
              <h3>Resumen</h3>
              <label>ID Compra:</label> <input type="text" id="idcompra" name="idcompra"value="<?php echo $idcompra;?>" readonly>
              <label>ID Compra Estado:</label> <input type="text" id="idcompraestado" name="idcompraestado"value="<?php echo $idcompraestado;?>" readonly>
              <div class="summary-item"><span class="text">Subtotal</span><span class="price">$360</span></div>


              <button type="button" onclick="agregarProducto()" class="btn btn-primary btn-lg btn-block">Agregar producto</button>

              <button type="button" onclick="cambiarEstado()" class="btn btn-warning btn-lg btn-block">Cambiar estado</button>
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

    // Perform other work here ...

    // Set another completion function for the request above
    /*
    jqxhr.always(function() {
      alert( "second finished" );
    });*/
  }
</script>
<?php
include($dir . "../estructura/footer.php"); ?>