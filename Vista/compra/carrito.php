<?php
$titulo =".: Carrito compras :.";
$dir="";
include ($dir."../estructura/header.php");


?> 	<section class="shopping-cart dark">
<div class="container">
   <div class="block-heading">
     <h2>Carrito de compras</h2>
  
   </div>
   <div class="content">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="items">
                    <div class="product">
                        <div class="row">
                            <div class="col-md-3 d-flex">
                                <img class="img-fluid mx-auto d-flex image" src="https://i.ibb.co/wShpvTg/C3.webp">
                            </div>
                            <div class="col-md-8">
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-5 product-name">
                                            <div class="product-name">
                                                <a href="#">Camara Hikvision 5mpx</a>
                                                <div class="product-info">
                                                    <div>Marca: <span class="value">Hikvision</span></div>
                                                    <div>Disponibles: <span class="value">11</span></div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 quantity">
                                            <label for="quantity">Cantidad:</label>
                                            <input id="quantity" type="number" value ="1" class="form-control quantity-input">
                                        </div>
                                        <div class="col-md-2 price">
                                            <span>$34000</span>
                                        </div>
                                        <div class="col-md-2 pl-2">
                                            <button class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <div class="row">
                            <div class="col-md-3 d-flex">
                            <img class="img-fluid mx-auto d-flex image" src="https://i.ibb.co/SXwW8g6/E1.webp">
                            </div>
                            <div class="col-md-8">
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-5 product-name">
                                            <div class="product-name">
                                                <a href="#">DVR dahua 4108XD</a>
                                                <div class="product-info">
                                                    <div>Marca: <span class="value">Dahua</span></div>
                                                    <div>Disponibles: <span class="value">10</span></div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 quantity">
                                            <label for="quantity">Cantidad:</label>
                                            <input id="quantity" type="number" value ="1" class="form-control quantity-input">
                                        </div>
                                        <div class="col-md-2 price">
                                            <span>$25000</span>
                                        </div>
                                        <div class="col-md-2 pl-2">
                                            <button class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                  
                    <div class="product">
                        <div class="row">
                            <div class="col-md-3 d-flex">
                            <img class="img-fluid mx-auto d-flex image" src="https://i.ibb.co/V2TFP2R/C6.webp" >
                            </div>
                            <div class="col-md-8">
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-5 product-name">
                                            <div class="product-name">
                                                <a href="#">Camara dahua 5mpx</a>
                                                <div class="product-info">
                                                    <div>Marca: <span class="value">Dahua</span></div>
                                                    <div>Disponibles: <span class="value">9</span></div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 quantity">
                                            <label for="quantity">Cantidad:</label>
                                            <input id="quantity" type="number" value ="1" class="form-control quantity-input">
                                        </div>
                                        <div class="col-md-2 price">
                                            <span>$32000</span>
                                        </div>
                                        <div class="col-md-2 pl-2">
                                            <button class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="summary">
                    <h3>Resumen</h3>
                    <div class="summary-item"><span class="text">Subtotal</span><span class="price">$360</span></div>
                  
                    
                    <button type="button" class="btn btn-primary btn-lg btn-block">Comprar</button>
                </div>
            </div>
        </div> 
    </div>
</div>
</section>
<?php 
include ($dir."../estructura/footer.php");


?>