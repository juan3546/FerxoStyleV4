<?php
$url =  Ruta::ctrRuta();
$servidor =  Ruta::ctrRutaServidor();
$ruta = $rutas[0];
?>
 <!-- Menu Productos para hombre -->
 <section class="container-fluid" id="menufiltrado">
 <nav class="navbar navbar-expand-lg fixed-bottom">
  <div class="container-fluid" id="hombres-container">
    <a class="navbar-brand text-dark large-text-right" href="#"><i class="fas fa-male mx-3"></i>HOMBRES</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll ms-auto" style="--bs-scroll-height: 100px;">
      <li class="nav-item dropdown">
      <div class="btn-group dropup">
           <button type="button" class="btn  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
             Categorias
           </button>
           <ul class="dropdown-menu">
            <li><a class="dropdown-item text-dark" href="#">Jerseys</a></li>
            <li><a class="dropdown-item text-dark" href="#">Bufs</a></li>
           </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-dark" aria-current="page" href="#">Ofertas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Personalizados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Nuevos Modelos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
 </section>
 <section class="container-fluid" id="">
 <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
  <div class="card tarjetasss mt-3">
    <div class="product-1 align-items-center p-2 text-center"> 
      <img src="vistas/img/plantilla/Modelo2.png" class="rounded" alt="" width="100%">
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

 