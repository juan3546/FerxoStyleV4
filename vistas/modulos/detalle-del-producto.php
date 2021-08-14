<?php
$url =  Ruta::ctrRuta();
$servidor =  Ruta::ctrRutaServidor();
$ruta = $rutas[0];
?>
<section class="container-fluid detallePpp">
 <div class="row  mt-5">
  <div class="col-6 d-flex ">
    <img src="vistas/img/plantilla/modelo2.png" alt="" width="55%" height="80%" class="m-auto my-auto">
  </div>
  <div class="col-6">
  <p><a href="https://ferxostyle.com.mx/inicio">Inicio</a> / Modelo 1</p>
   <h2>Modelo 1</h2>
   <h4 class="precioDetalle">$400</h4>
   <select name="tallas" id="tallas" class="form-control-lg">
       <option value="0">Tallas Disponibles</option>
       <option value="1">M</option>
       <option value="2">G</option>
       <option value="3">XL</option>
   </select>
   <p class="mt-3"><h4>Despricion del Producto <br></h4><br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus repudiandae nesciunt odio, magni deleniti, minima saepe maxime beatae quidem ipsum nobis laborum aut nulla alias commodi hic. Inventore, rem dolor.
     Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, delectus! Quaerat facere, itaque excepturi eligendi fuga commodi modi. Tempora autem nobis pariatur dolore consequuntur sunt, earum soluta repudiandae est voluptates.</p>
  </div>
 </div>
</section>
<!-- apartado para los comentarios, articulos relacionados -->
<section class="container-fluid mt-5">
 <div class="row">
 <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Comentarios</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Relacionados</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Ofertas</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <h2>Comnetarios</h2>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <h2>Relacionados</h2>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <h2>Ofertas</h2>
  </div>
</div>
 </div>
</section>
<!-- fin apartado para los comentarios, articulos relacionados -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>