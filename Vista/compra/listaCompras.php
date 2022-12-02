<?php
$dir="";
$titulo = "Supervisar compras";
include_once $dir."../estructura/headerSeguro.php";
//include_once '../../configuracion.php';

?>

<div class="container border border-secondary principal mt-3 pt-3">
   <h3 class="text-center">Supervisar compras</h3>
    <div id="compras"class="row text-muted m-0">
 
   <div>
<script type="text/javascript">
   $(document).ready(function(){
    listarCompras();
   }); 
  function listarCompras(){
    $("#compras").load('accion/listar_compras.php');
  }
  function  cargarCompra(idcompra,idcompraestado,idusuario)
  {
  		$("#contenido").load('accion/cargar_compra_admin.php?idcompra='+idcompra+'&idcompraestado='+idcompraestado+"&idusuario="+idusuario);
  }
  function cambiarEstado(mensaje,idcompraestadotipo,idcompra,idcompraestado,idusuario) {
    //alert("mensaje:"+mensaje+" idcompra:"+idcompra+ " idcompraestado:"+idcompraestado+" idcompraestadotipo:"+idcompraestadotipo+" idusuario:"+idusuario);
   //Creación de la instancia 

//Ocultar modal
var genericModalEl = document.getElementById('exampleModal')
        var modal = bootstrap.Modal.getInstance(genericModalEl)
      
    var jqxhr = $.post('accion/agregar_estado.php?idcompra='+idcompra+"&idcompraestado="+idcompraestado+"&idcompraestadotipo="+idcompraestadotipo+"&idusuario="+idusuario, function() {
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
          $.messager.show({
            title: 'Mensaje',
            msg: mensaje + result.respuesta+" se cambio estado true:"+result.seactualizo
          });
          modal.hide()
        //  $("#exampleModal").modal("dismiss");
           listarCompras();
           
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
include ("../../Vista/estructura/footer.php");
?>
</div>