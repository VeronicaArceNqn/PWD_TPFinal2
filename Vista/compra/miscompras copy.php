<?php
$dir="";
$titulo = "Mis compras";
include_once $dir."../estructura/headerSeguro.php";
include_once '../../configuracion.php';

?>

<div class="container border border-secondary principal mt-3 pt-3">
   <h3 class="text-center">Mis compras</h3>
    <div class="row text-muted m-0">
        <?php 
        
        
        $objAbmcompra = new ABMcompra();
        $param["idusuario"]=$idusuario;
        $listacompra = $objAbmcompra->buscar($param);
        //print_r($listaUsuario);
        if(count($listacompra)>0){
            ?>
            <table class="table table-light table-striped text-center table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th scope="col">ID compra</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                          <!--<th scope="col"></th>
                        -->                
                    </tr>
                </thead>
                <tbody>
                <?php
                    
                    foreach ($listacompra as $objCompra) {                         
                        $idcompra=$objCompra->getIdcompra();
                        $param["idusuario"] =$idusuario;
                        $param["idcompra"] = $idcompra;
                        $param["cefechafin"]="null";
                        $param["idcompraet"] =0;
                       
                        $objCntrlCE= new ABMcompraestado();
                        $arreCE=$objCntrlCE->buscar($param);
                        if(count($arreCE)==1)
                        {
                           $estado=$arreCE[0]->getObjcompraestadotipo()->getCetdescripcion();
                        
                       
                           echo '<tr>
                           <th scope="row">'.$idcompra.'</th>';
                           echo '
                           <td>'.$objCompra->getCofecha().'</td>';
                          /* echo '
                           <td>'.$objUsuario->getuspass().'</td>';*/
                          
                           echo '
                           <td>'.$estado.'</td>';
                           echo '<td>'?><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="alert(<?php echo  $idcompra?>);">
                           Ver compra
                          </button><?php echo'</td>';
                         
                         
                              echo'</tr>';
                     
                        }
                        
                       
                        
                     }
                    //fin foreach
                    echo '    </tbody>
                    </table>';
                }
                else{

                    echo "<h3>No tiene compras registradas </h3>";
                }
                
                ?>
            
        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Compra </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="items">
<?php

//$datos = data_submitted();
$datos["idcompra"]=1;
$objCntrlCI = new ABMcompraitem();
$suma = 0;

$items = $objCntrlCI->buscar($datos);
if (count($items) > 0) {

    foreach ($items as $item) {
?>
    
                    <div class="product">
                        <div class="row">
                            <div class="col-md-3 d-flex">
                                <img src="<?php echo $item->getObjProducto()->getUrlimagen(); ?>" class="img-fluid mx-auto d-flex image">
                            </div>
                            <div class="col-md-8">
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-5 product-name">
                                            <div class="product-name">
                                                <a href="#"><?php echo $item->getObjProducto()->getProdetalle(); ?></a>
                                                <div class="product-info">
                                                    <div>Marca: <span class="value"><?php echo $item->getObjProducto()->getPronombre(); ?></span></div>

                                                    <div>Disponibles: <span class="value"><?php echo $item->getObjProducto()->getProcantstock() ?></span></div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 quantity">
                                            <label for="quantity">Cantidad:</label>
                                            <input id="quantity" type="number" value="<?php echo $item->getCicantidad(); ?>" class="form-control quantity-input">
                                        </div>
                                        <div class="col-md-2 price">
                                            <span><?php echo $item->getObjProducto()->getPrecio(); ?>$</span>
                                        </div>
                                        <div class="col-md-2 pl-2">
                                            <button class="btn btn-danger" onclick="eliminarItem(<?php echo  $item->getObjProducto()->getIdproducto(); ?>,<?php echo  $item->getIdcompraitem(); ?>,<?php echo $item->getCicantidad(); ?>)">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
            $suma = $suma + $item->getObjProducto()->getPrecio()*$item->getCicantidad();
        }
    } ?>
            <div class="summary">
                <h2 class="text-start fs-4" class="">Resumen</h2>
                <!--<label>ID Compra:</label>-->
              <!--  <h3 class="text-start">ID Compra:<?php echo $datos["idcompra"]; ?></h3>
                <h3 class="text-start">ID Estado compra:<?php echo $datos["idcompraestado"]; ?></h3>-->
                <div class="summary-item">
                    <p class="text-start fs-4">Total: <span class="text-start text-success fs-4"><?php echo $suma; ?>$</span></p>
                </div>


            <!--    <button type="button" onclick="cambiarEstado('La compra se realizo correctamente!',1,<?php echo $datos['idusuario']; ?>)" class="btn btn-primary btn-lg btn-block">Comprar</button>
--><!--
              <button type="button" onclick="cambiarEstado()" class="btn btn-warning btn-lg btn-block">Cambiar estado</button>
              <button type="button" onclick="enviarDatos()" class="btn btn-warning btn-lg btn-block">Enviar datos</button>
                -->
            </div>
                </div>
            </div>



            <?php ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <!-- <button type="button" class="btn btn-primary">Save changes</button>
--></div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<div>
<?php
include ("../../Vista/estructura/footer.php");
?>
</div>