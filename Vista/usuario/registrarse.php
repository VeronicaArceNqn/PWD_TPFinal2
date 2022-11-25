<?php
$titulo =".:Registro de usuario :.";
$dir="";
include ($dir."../estructura/header.php");
?>
<div  style="text-align:center;">

</div>
<div style="margin:20px 0; padding-left:30px;">
	<div class="easyui-panel" title="Registrarse" style="width:100%;max-width:440px;padding:30px 60px; background-size: contain;
   background-position: center center;">
		<form id="ff" class="easyui-form" method="post" action="accion/alta_usuario.php" data-options="novalidate:true">
			<div style="margin-bottom:20px">
				<input class="easyui-textbox"id="usnombre" name="usnombre" style="width:100%" data-options="label:'Nombre:',required:true">
			</div>
			
			<div style="margin-bottom:20px">
				<input class="easyui-passwordbox"id="uspass" name="uspass" style="width:100%" data-options="label:'Password:',required:true">
                <input type="hidden"id="passcifrado" name="passcifrado" style="width:300px">
                <input type="hidden"id="usdeshabilitado" name="usdeshabilitado" style="width:300px" value="null">
			</div>
            
			<div style="margin-bottom:20px">
				<input class="easyui-textbox" id="usmail"name="usmail" style="width:100%" data-options="label:'Email:',required:true,validType:'email'">
			</div>
			
		</form>
		<div style="text-align:center;padding:5px 0">
			<a href="javascript:void(0)" class="easyui-linkbutton" onclick="registrar()" style="width:80px">Enviar</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()" style="width:80px">Reset</a>
		</div>
	</div>
    
	<script type="text/javascript">
   
          function registrar()
          {  
         

            $('#ff').form('submit',{
                    //url:'accion/alta_usuario.php',
                    url: 'accion/alta_usuario.php',
                    onSubmit: function(){
                        return $(this).form('validate');
                    },
                    success: function(result){
                        var result = eval('('+result+')');

                        alert("Volvio Serviodr"); 
                        //recorremos el array resultante
                        $.each(result, function(key, value){
            alert(key + ": " + value);
        });  
                        if (!result.respuesta){
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                           alert("se registro correctamente")
                           $('#ff').form('clear');
                            //$('#dlg').dialog('close');        // close the dialog
                            //$('#dg').datagrid('reload');    // reload 
                        }
                    }
                });
            }
            function clearForm(){
			$('#ff').form('clear');
		}
     /*
     function registrar()
     {
     var password = document.getElementById("password").value;
    //alert(password);
    var passhash = CryptoJS.MD5(password).toString();
   // alert(passhash);
    document.getElementById("uspass").value = passhash;
    document.getElementById("password").value ="";    
    submitForm(); 
}
		function submitForm(){
			$('#ff').form('submit',{
				onSubmit:function(){
					return $(this).form('enableValidation').form('validate');
				}
			});
		}
		*/
	</script>
	
	</div>
<?php 
include ($dir."../estructura/footer.php");


?>