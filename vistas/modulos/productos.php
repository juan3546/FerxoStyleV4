<?php
$url =  Ruta::ctrRuta();
$servidor =  Ruta::ctrRutaServidor();
$ruta = $rutas[0];
?>
<!-- filtrado  -->
<div class="container filtrado" id="acordeonFiltrado">
    <div class="col-lg-12 col-md-6 col-sm-8 col-xs-12">
        <div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <button class="btn btn-primary btnFiltro" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Categorias
                <i class="fas fa-bars"></i>
            </button>
            <input type="text"class="form-control" placeholder="Buscar">
        </div>
    </div>
</div>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
  </div>
</div>
<!-- fin de filtrado -->
<!-- cards de productos  -->
<section class="container-fluid mt-1" id="">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card tarjetasss mt-3">
                <div class="product-1 align-items-center p-2 text-center"> 
                    <div>
                    <img src="vistas/img/plantilla/Modelo2.png" class="rounded" alt="" width="100%">
                    
                    </div>
                    <h5 class="mt-2">Modelo 1</h5>
                    <div class="cost mt-3 text-dark">
                        <span>$500</span>
                   </div>
                </div>
                <!-- button -->
                 <div class="p-3 shoe text-center text-white mt-3 cursor">
                    <i class="fas fa-cart-plus" ></i>
                    <span class="text-uppercase botonCarrito">Agregar a Carrito</span>
                </div> 
            </div>
        </div>
        <div class="col">
            <div class="card tarjetass mt-3">
                <div class="product-1 align-items-center p-2 text-center"> 
                    <img src="vistas/img/plantilla/Modelo3.png" class="rounded" alt="" width="100%">
                    <h5 class="mt-2">Modelo 1</h5>
                    <div class="cost mt-3 text-dark">;
                        <span>$500</span>;
                   </div>
                </div>
                <!-- button -->
                <div class="p-3 shoe text-center text-white mt-3 cursor">
                    <span class="text-uppercase botonCarrito">Agregar a pedido</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card tarjetass mt-3">
                <div class="product-1 align-items-center p-2 text-center"> 
                    <img src="vistas/img/plantilla/Modelo4.png" class="rounded" alt="" width="100%">
                    <h5 class="mt-2">Modelo 1</h5>
                    <div class="cost mt-3 text-dark">;
                        <span>$500</span>;
                   </div>
                </div>
                <!-- button -->
                <div class="p-3 shoe text-center text-white mt-3 cursor">
                    <span class="text-uppercase botonCarrito">Agregar a pedido</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>
 </section>

 