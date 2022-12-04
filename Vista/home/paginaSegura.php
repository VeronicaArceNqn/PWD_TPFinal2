<link rel="stylesheet" type="text/css" href="../css/estiloproductos.css">
<?php
$titulo = ".: Productos :.";
$dir = "";
include($dir . "../estructura/headerSeguro.php");
if (isset($_GET["tipo"])) {
  $param["tipo"] = $_GET["tipo"];
} else {
  $param["tipo"] = "null";
}
//$idusuario=$objTrans->getUsuario()->getidusuario();

?>
<input type="hidden" id=tipo value="<?php echo $param["tipo"];?>">




<div id="productos" class="container pt-2 pb-2">

  
  

</div>



</div>
</div>
<script type="text/javascript">
  $(document).ready(function () {
 cargarProductos(<?php echo $idusuario;?>,$("#tipo").val());
  });
  function cargarProductos(idusuario,tipo)
  {
   
   $("#productos").load('accion/cargar_productos.php?tipo='+tipo+'&idusuario='+idusuario);
  }
       
  function agregarProducto(idproducto,idusuario) {
    var idcompra=$("#idcompra").val();
    alert(idcompra);
    var urldatos= "";
    if(parseInt($("#idcompra").val())==-1)
    {
      alert("entro crear pedido")
      urldatos= "../compra/accion/agregar_primerproducto.php?idproducto="+idproducto+"&idusuario="+idusuario+"&cicantidad=1";
    }
    else{
      alert("entro agregar producto al carrito")
      urldatos= "../compra/accion/agregar_producto.php?idproducto="+idproducto+"&cicantidad=1&idcompra="+$("#idcompra").val();
    }
    //alert(urldatos);
    var jqxhr = $.post(urldatos, function() {
        //alert( "success" );
      })
      .done(function(result) {
        var result = eval('(' + result + ')');
        alert(result.respuesta);
        if (!result.respuesta) {
          alert(result.errorMsg);
          /*
         $.messager.alert({
            title: 'Error',
            msg: result.errorMsg
          });*/
          $("#idcompra").val(result.idcompra);
        } else {
          var res;
          if(result.seagrego)
          {
            res=",Se agrego el producto";
            $("#productos").load('accion/cargar_productos.php?idusuario='+idusuario+'&tipo=null');
          }
          else {
             res="No se pudo agregar el producto";
            }
            alert("Se registro correctamente-> true:" + result.respuesta+""+res);
          /*$.messager.alert({
            title: 'Mensaje',
            msg: "Se registro correctamente-> true:" + result.respuesta+""+res 
          });*/
          //cargarProductos($idusuario,$("tipo").val());
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