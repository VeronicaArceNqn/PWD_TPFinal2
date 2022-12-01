<?php
$dir="../";
$titulo = "Lista Usuarios";
include_once $dir."../Vista/estructura/headerSeguro.php";
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
                       
                        <th scope="col"></th>
                          <!--<th scope="col"></th>
                        -->                
                    </tr>
                </thead>
                <tbody>
                <?php
                    
                    foreach ($listacompra as $objCompra) {                         
                        echo '<tr>
                        <th scope="row">'.$objCompra->getIdcompra().'</th>';
                        echo '
                        <td>'.$objCompra->getCofecha().'</td>';
                       /* echo '
                        <td>'.$objUsuario->getuspass().'</td>';*/
                      
                        echo '<td><a href="" class="btn btn-success">Ver compra</a></td>';
                      
                      
                           echo'</tr>';
                  
                     }
                    //fin foreach
                    echo '    </tbody>
                    </table>';
                }
                else{

                    echo "<h3>No hay personas registradas </h3>";
                }
                
                ?>
            
        
</div>

</div>
<div>
<?php
include ("../../Vista/estructura/footer.php");
?>
</div>