function registrar() {
    var password = document.getElementById("password").value;
    ;
    var passhash = CryptoJS.MD5(password).toString();
   
    document.getElementById("uspass").value = passhash;
    document.getElementById("password").value = "";
    document.getElementById("usmail").value ="";  

    $('#ff').form('submit', {
      //url:'accion/alta_usuario.php',
      url: 'accion/alta_usuario.php',
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
            msg: "se registro correctamente"
          });
          $('#ff').form('clear');
          //$('#dlg').dialog('close');        // close the dialog
          //$('#dg').datagrid('reload');    // reload 
        }
      }
    });
  }

  function clearForm() {
    $('#ff').form('clear');
  }