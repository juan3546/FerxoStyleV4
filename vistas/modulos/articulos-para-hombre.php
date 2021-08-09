<?php
$url =  Ruta::ctrRuta();
$servidor =  Ruta::ctrRutaServidor();
$ruta = $rutas[0];
?>
 <!-- Menu Productos para hombre -->
 <section class="container-fluid" id="menufiltrado">
 <nav class="navbar navbar-expand-lg fixed">
  <div class="container-fluid">
    <a class="navbar-brand text-dark large-text-right" href="#">HOMBRES</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll ms-auto" style="--bs-scroll-height: 100px;">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item text-dark" href="#">Jerseys</a></li>
            <li><a class="dropdown-item text-dark" href="#">Bufs</a></li>
          </ul>
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
    <div class="card">
      <img src="vistas/img/plantilla/modelo2.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="vistas/img/plantilla/modelo3.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="vistas/img/plantilla/modelo4.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
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

 