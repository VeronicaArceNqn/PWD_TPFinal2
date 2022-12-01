<?php
$titulo = ".: Inicio :.";
$dir = "";
include_once $dir . '../estructura/headerSeguro.php';
$idusuario=$objTrans->getUsuario()->getidusuario();
if (isset($_GET["tipo"])) {
    $param["tipo"] = $_GET["tipo"];
} else {
    $param = null;
}
?>

<style type="text/css">

</style>


<div id="productos"class="container pt-2 pb-2">
<?php

$objCtrlProducto = new ABMproducto();
$lista = $objCtrlProducto->buscar($param);
?>
    <?php
    foreach ($lista as $objProducto) {
    ?>
        <div class="card pt-2" style="width:300px">
            <h5 class="card-title text-center"><?php echo $objProducto->getPronombre(); ?></h5>
            <div class="contenedorimagen">
                <img class="card-img-top" src="<?php echo $objProducto->getUrlimagen(); ?>" alt="Card image">
            </div>
            <div class="card-body text-center">

                <h6 class="card-text txt-secondary"><?php echo $objProducto->getProdetalle(); ?></h6>
                <h4 class="card-text text-primary font-weight-bold"><?php echo $objProducto->getPrecio(); ?>$</h4>
                <h6 class="text-success font-weight-bold"><?php echo $objProducto->getProcantstock(); ?> disponibles</h6>
                <a href="javascript:void(0)" class="btn btn-warning font-weight-bold" onclick="agregarProducto(<?php echo  $objProducto->getIdproducto(); ?>,<?php echo  $idusuario ?>)">Agregar</a>
                
            </div>
        </div>
    <?php } ?>

</div>



</div>
</div>
<script type="text/javascript">
  /*cargarProductos();
  
  function cargarProductos()
  {
    alert("entro a cargar productos");
  		$("#productos").load('accion/cargar_productos.php?tipo=null');
  }*/
         function agregarProducto(idproducto,idusuario) {
    var idcompra=$("#idcompra").val();
    //alert(idcompra);
    var urldatos= "";
    if(parseInt($("#idcompra").val())==-1)
    {
      //alert("entro crear pedido")
      urldatos= "../compra/accion/agregar_primerproducto.php?idproducto="+idproducto+"&idusuario="+idusuario+"&cicantidad=1";
    }
    else{
    //  alert("entro agregar producto al carrito")
      urldatos= "../compra/accion/agregar_producto.php?idproducto="+idproducto+"&cicantidad=1&idcompra="+$("#idcompra").val();
    }
    //alert(urldatos);
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
          $("#idcompra").val(result.idcompra);
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
          $("#productos").load();
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

 function enviarDatos() {
    var jqx = $.post("../compra/accion/envio_datos.php?idproducto=7&cicantidad=6", function() {
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
            msg: "true:" + result.respuesta+" idproducto="+result.idproducto+" cantidad"+result.cicantidad
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

</script>
<?php

include($dir . "../estructura/footer.php");
?>
