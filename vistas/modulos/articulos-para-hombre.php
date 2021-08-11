<?php
$url =  Ruta::ctrRuta();
$servidor =  Ruta::ctrRutaServidor();
$ruta = $rutas[0];
?>
 <!-- Menu Productos para hombre -->
 <section class="container-fluid" id="menufiltrado">
  <!-- filtrado  -->
<div class="container filtrado " id="acordeonFiltrado">
    <div class="col-sm-12 col-md-10 col-lg-10 col-xl-12">
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
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <H3 class="text-center">Categorias</H3>
        <ul class="listaCategorias text-center text-dark">
          <li><a href="" class="text-dark">Jersey</a></li>
          <li> <a href="" class="text-dark">Bufs</a> </li>
          <li> <a href="" class="text-dark">Personalizados</a></li>
        </ul>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <h3 class="text-center">Avanzado</h3>
        <ul class="listaCategorias text-center text-dark">
          <li> <a href="" class="text-dark">Nuevos Modelos</a></li>
          <li><a href="" class="text-dark">Ofertas </a></li>
          <li> <a href="" class="text-dark">Proximamente</a></li>
        </ul>
      </div>

    </div>
  </div>
</div>
<!-- fin de filtrado -->
 </section>
 <!-- apartado donde se muestran las tarjetas con los productos -->
 <section class="container-fluid" id="Productos">
 <div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
      <div class="card-sl h-100">
        <div class="card-image">
          <img src="vistas/img/plantilla/modelo2.png" />
        </div>
           <a class="card-action" href="#"><i class="fas fa-cart-plus"></i></a>
        <div class="card-heading">
            Modelo 1
        </div>
        <div class="card-text">
            Jersey disponible en colores amarillo, rojo, azul y tallas ch, M, G y Xl
        </div>
        <div class="card-text">
            $700
        </div>
          <a href="#" class="card-button"> Apartar</a>
       </div>
     </div>
  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
  <div class="card-sl h-100">
        <div class="card-image">
          <img src="vistas/img/plantilla/modelo3.png" />
        </div>
           <a class="card-action" href="#"><i class="fas fa-cart-plus"></i></a>
        <div class="card-heading">
            Modelo 1
        </div>
        <div class="card-text">
            Jersey disponible en colores amarillo, rojo, azul y tallas ch, M, G y Xl
        </div>
        <div class="card-text text-center text-danger">
            $700
        </div>
          <a href="#" class="card-button"> Apartar</a>
       </div>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
  <div class="card-sl h-100">
        <div class="card-image">
          <img src="vistas/img/plantilla/modelo4.png" />
        </div>
           <a class="card-action" href="#"><i class="fas fa-cart-plus"></i></a>
        <div class="card-heading">
            Modelo 1
        </div>
        <div class="card-text">
            Jersey disponible en colores amarillo, rojo, azul y tallas ch, M, G y Xl
        </div>
        <div class="card-text">
            $700
        </div>
          <a href="#" class="card-button"> Apartar</a>
       </div>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
  <div class="card-sl h-100">
        <div class="card-image">
          <img src="vistas/img/plantilla/modelo5.png" />
        </div>
           <a class="card-action" href="#"><i class="fas fa-cart-plus"></i></a>
        <div class="card-heading">
            Modelo 1
        </div>
        <div class="card-text">
            Jersey disponible en colores amarillo, rojo, azul y tallas ch, M, G y Xl
        </div>
        <div class="card-text">
            $700
        </div>
          <a href="#" class="card-button"> Apartar</a>
       </div>
  </div>
</div>
 </section>
 <!-- fin del apartado de productos -->
 <!-- Apartado de paginacion -->
 <section class="container-fluid d-flex mt-5" id="paginacion">
 <nav aria-label="Page navigation example" class="mx-auto">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
 </section>

 