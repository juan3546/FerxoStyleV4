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
 <section class="container-fluid" id="Productos">
  
 </section>

 