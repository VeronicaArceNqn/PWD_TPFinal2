<?php
$dir="";
$titulo = ".: Iniciar sesión :.";

include_once $dir.'../estructura/header.php';
$datos = data_submitted();

    
        
     ?>
  <br>

<div class="d-flex justify-content-center align-items-center">
      <div class="container pt-4">
        <div class="row d-flex justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="card bg-white">
              <div class="card-body p-5">
                <form id="ff" class="mb-3 mt-md-4">
                
                  <h5 class="fw-bold mb-2 text-uppercase text-center">Iniciar sesi&oacute;n</h5>
                 
                  <div class="mb-3">
                    <label for="usnombre" class="form-label ">Nombre</label>
                    <input type="text" class="form-control" id="usnombre"name="usnombre">
                  </div>
                   <!--
                  <div class="mb-3">
                    <label for="uspass" class="form-label ">Email</label>
                    <input type="email" class="form-control" id="usmail"name="usmail" >
                  </div>-->
                  <div class="mb-3">
                    <label for="password" class="form-label ">Password</label>
                    <input type="hidden" class="form-control" id="uspass" name="uspass">
                    <input type="hidden" class="form-control" id="usdeshabilitado" name="usdeshabilitado" value="null">
                    <input type="password" class="form-control" id="password" name="password" placeholder="*******">
                  </div>
                  <div class="d-grid">
                <button class="btn btn-outline-dark" type="button" onclick="iniciarSesion()">Enviar</button>
              </div>
                  
                </form>
                <div>
                  <p class="mb-0  text-center"><a href="../usuario/registrarseB.php" class="text-primary fw-bold">Registrate</a></p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<a href="../home/index.php">Volver</a>

<script type="text/javascript">
  function iniciarSesion() {
    var password = document.getElementById("password").value;
    ;
    var passhash = CryptoJS.MD5(password).toString();
   
    document.getElementById("uspass").value = passhash;
    document.getElementById("password").value = "";
    //document.getElementById("usmail").value ="";  

    $('#ff').form('submit', {
      //url:'accion/alta_usuario.php',
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
            title: 'Mensaje',
            msg: "se registro correctamente"
          });
          location.href = '../home/paginaSegura.php';

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
 
</script>
</div>
</div>

<?php
include_once '../estructura/footer.php';
?>