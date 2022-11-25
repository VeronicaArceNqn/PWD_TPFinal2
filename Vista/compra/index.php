<?php
$titulo =".: Carrito compras :.";
$dir="";
include ($dir."../estructura/header.php");


?> 	<section class="shopping-cart dark">
<div class="container">
   <div class="block-heading">
     <h2>Carrito de compras</h2>
  
   </div>
   <div class="content">
        <div class="row">
            <div class="col-md-12 col-lg-8">
               
            <div class="col-md-12 col-lg-4">
              <!--  <input type="text" id="idcompra" name="idcompra"value="-1" readonly>
--> <div class="summary">
                    <h3>Resumen</h3>
                    <div class="summary-item"><span class="text">Subtotal</span><span class="price">$360</span></div>
                  
                    
                    <button type="button" onclick="crearPedido()"class="btn btn-primary btn-lg btn-block">Crear Compra</button>
                    
                    <button type="button" onclick="cambiarEstado()"class="btn btn-warning btn-lg btn-block">Cambiar estado</button>
                </div>
            </div>
        </div> 
    </div>
</div>
</section>
<script type="text/javascript">

function crearPedido()
{
  var jqxhr = $.post( "accion/crear_pedido.php", function() {
  alert( "success" );
  })
  .done(function() {
    alert( "second success" );
  })
  .fail(function() {
    alert( "error" );
  })
  .always(function() {
    alert( "finished" );
  });
 
// Perform other work here ...
 
// Set another completion function for the request above
/*
jqxhr.always(function() {
  alert( "second finished" );
});*/
}
function cambiarEstado()
{
  var jqxhr = $.post( "accion/agregar_estado.php", function() {
  alert( "success" );
  })
  .done(function() {
    alert( "second success" );
  })
  .fail(function() {
    alert( "error" );
  })
  .always(function() {
    alert( "finished" );
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
include ($dir."../estructura/footer.php");?>