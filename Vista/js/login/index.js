function iniciarSesion() {
    var password = document.getElementById("password").value;
    ;
    var passhash = CryptoJS.MD5(password).toString();
   
    document.getElementById("uspass").value = passhash;
    document.getElementById("password").value = "";
    //document.getElementById("usmail").value ="";  

    $('#ff').form('submit', {
     
      url: 'accion/accionSesion.php',
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
          location.href = '../login/index.php?msg='+result.errorMsg;
        } else {
          $.messager.show({
            title: '......Iniciando sesión......',
            msg: "Logueado correctamente"
          });
          location.href = '../home/paginaSegura.php';

          $('#ff').form('clear');
        
        }
      }
    });
  }

  function clearForm() {
    $('#ff').form('clear');
  }