function editar()
{
    $('#btnEditar').hide();
    $('#usmail').removeAttr('readonly'); 
    $('#password').removeAttr('readonly');
    $('#password').val('');
   // $('#btnEditar').addAttr('hidden');
    $('#btnEnviar').removeAttr('hidden');
}
function actualizar() {
    var password = document.getElementById("password").value;
    ;
    var passhash = CryptoJS.MD5(password).toString();
   
    document.getElementById("uspass").value = passhash;
    document.getElementById("password").value = "";
    

    $('#ff').form('submit', {
     
      url: 'accion/edit_usuario.php',
      onSubmit: function() {
        return $(this).form('validate');
      },
      success: function(result) {
        var result = eval('(' + result + ')');

        if (!result.respuesta) {
          $.messager.show({
            title: 'Error',
            msg: result.errorMsg
          });

        } else {
          //alert("se registro correctamente")
          $.messager.alert({
            title: 'Bienvenido',
            msg: "se actualizo correctamente"
          });
          window.location.href = window.location.href;
        //  document.getElementById("usmail").value ="";  
         
        }
      }
    });
  }