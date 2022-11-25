
<?php 
$dir="";
$titulo ="Ingresar al Sistema";
include_once $dir."../estructura/header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ingreso al carrito</title>
    <link rel="stylesheet" type="text/css" href="../../themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../../themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../demo.css">
    <script type="text/javascript" src="../../jquery.min.js"></script>
    <script type="text/javascript" src="../../jquery.easyui.min.js"></script>
</head>
<body>
    <div style="margin:20px 0;padding:10px;">
        <h2>Ingrese al carrito</h2>
        <p>Complete con su usuario y contraseña<p>
        <div style="margin:20px 0;"></div>
        
        <div class="easyui-panel" style="width:400px;padding:50px 60px">
            <form id="ff" method="post">
                <div style="margin-bottom:20px">
                    <input class="easyui-textbox" prompt="correo electrónico" iconWidth="28" style="width:100%;height:34px;padding:10px;" data-options="label:'email:',required:true">
                </div>
                <div style="margin-bottom:20px">
                    <input class="easyui-passwordbox" prompt="contraseña" iconWidth="28" style="width:100%;height:34px;padding:10px" data-options="label:'pass:',required:true">
                </div>
                
            </form>
            <div style="text-align:center;padding:5px 0">
            <a href="../login/accion.php" class="easyui-linkbutton" onclick="formSubmit()" style="width:80px">Submit</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()" style="width:80px">Clear</a>
        </div>

<script>

function formSubmit()
{
    var password = document.getElementById("uspass").value;
    alert(password);
    var passhash = CryptoJS.MD5(password).toString();
    alert(passhash);
    document.getElementById("uspass").value = passhash;

    setTimeout(function(){ 
        document.getElementById("formulario").submit();

	}, 500);
}
</script>
        </div>
    </div>
</body>
</html>

<?php 

include_once $dir."../estructura/footer.php";
?>