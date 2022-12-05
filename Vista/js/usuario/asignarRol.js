$(document).ready(function(){
    cargarRoles();
     });

     function cargarRoles()
     {
       $("#listaroles").load('accion/listar_rol.php?idusuario='+$("#idusuario").val());
    
     }
       function darRol(idrol,idusuario) {
var jqxhr = $.post('accion/dar_rol.php?idrol='+idrol+"&idusuario="+idusuario, function() {
  // alert( "success" );
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
       msg: " se asignó nuevo rol true:"+result.respuesta
     });
     cargarRoles();
    //window.location.href = window.location.href;
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

function eliminarRol(idrol,idusuario) {
var jqxhr = $.post('accion/eliminar_rol.php?idrol='+idrol+"&idusuario="+idusuario, function() {
//   alert( "success" );
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
       msg: " se eliminó el rol true:"+result.respuesta
     });
     cargarRoles();
     //window.location.href = window.location.href;
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

