<?php
$titulo =".: Inicio :.";
$dir="";
include ($dir."../estructura/header.php");

if(isset($_GET["tipo"]))
{
   $param["tipo"]=$_GET["tipo"];
}
else{
  $param=null;
}
?>
<style>
.card {
  padding-top: 20px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 23%;
  min-width: 300px;
  margin: 15px;
  text-align: center;
  font-family: arial;
   float:left;
   border:#353A40 solid 1px;  
   margin-bottom: 20px;
}
.card .contenedorImg{
        display: flex;
        background-color: transparent;
        width: 100%;
        height: 100px;
        justify-content:center;
    } 
    .imagen{
        object-fit: contain;
        width: 85%;
        height: 85%;
        text-align: center;
        padding: -25px;
        background-color: transparent;
    }

.producto p{
     
     color:#353A40 ;
     text-align: center;
     cursor: pointer;
 
 }
  .titulo{  
     color:#353A40 ;
     text-align: center;
     font-weight: bold;
 }
  .titulo:hover{  
     color:#5bc0de ;
     text-align: center;
     cursor:pointer;
 }
 .precioProducto {
     font-weight:bold;
     font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
     font-size: large;
     color: #0d6efd;
 }
 .stockProducto {
     font-weight:bold;
     font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
     font-size: 14px;
     color: #198754;
 }
.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #ffc107;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
 
}

.card button:hover {
  opacity: 0.7;
}
</style>
<?php 
$objCtrlProducto=new ABMproducto();
$lista=$objCtrlProducto->buscar($param);
//print_r($lista);
foreach($lista as $objProducto)
{
?>
<div class="card">
<h2><?php echo $objProducto->getPronombre();?></h2>
<div class="contenedorImg">
  <img src="<?php echo $objProducto->getUrlimagen();?>" alt="imagen" class="imagen-producto">
</div>
<p class="precioProducto"><?php echo $objProducto->getPrecio(); ?>$</p>

        <a class="titulo" href="#" onclick=""><?php echo $objProducto->getProdetalle();?></a>
        <p class="stockProducto"> <?php echo $objProducto->getProcantstock(); ?> diponibles</p>
  <p><button>Agregar</button></p>
</div>

<?php
}
?>


</div>
</div>
    <?php 

include ($dir."../estructura/footer.php");
?>