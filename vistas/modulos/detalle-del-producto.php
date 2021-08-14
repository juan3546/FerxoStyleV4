<?php
$url =  Ruta::ctrRuta();
$servidor =  Ruta::ctrRutaServidor();
$ruta = $rutas[0];
?>
<section class="container-fluid detallePpp">
 <div class="row  mt-5">
  <div class="col-6 d-flex imgDetalle">
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
     orem ipsum dolor sit amet consectetur adipisicing elit. Id, delectus! Quaerat facere, itaque excepturi eligendi fuga commodi modi. Tempora autem nobis pariatur dolore consequuntur sunt, earum soluta repudiandae est voluptates.</p>
  </div>
 </div>
</section>
<!-- apartado para los comentarios, articulos relacionados -->
<section class="container-fluid mt-5">
 <div class="row coment">
 <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Comentarios (4)</button>
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
    <!-- Propuesta Ángel Álvarez Guzmán -->
    <div class="card p-3 mt-2">
      <div class="d-flex justify-content-between align-items-center">
        <div class="user d-flex flex-row align-items-center">
          <img src="<?php echo $servidor; ?>vistas/img/usuarios/default/1.jpg" width="30" class="user-img rounded-circle me-2"> 
            <span>
              <small class="fw-bolder text-primary">Ángel Álvarez</small> 
              <small class="fw-bolder">Un producto de buena calidad</small>
            </span> 
        </div> 
        <small>13/07/2021</small>
      </div>

    </div>


  <div class="card mt-2">
  <div class="card-header" style="display: inline-block;">
    <div class="container">
      <div class="row">
        <div class="col-6">
        <h5 class="text-left">Juan Jose</h5>
        </div>
        <div class="col-6 justify-content-end align-content-end text-right">
        <h5 class=""><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></h5>
        </div>
      </div>
</div>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>Excelente servicio, ampliamente recomndado su trabajo.</p>
    </blockquote>
  </div>
</div>
<div class="card mt-2">
  <div class="card-header" style="display: inline-block;">
    <div class="container">
      <div class="row">
        <div class="col-6">
        <h5 class="text-left">Juan Jose</h5>
        </div>
        <div class="col-6 justify-content-end align-content-end text-right">
        <h5 class=""><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></h5>
        </div>
      </div>
</div>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>Excelente servicio, ampliamente recomndado su trabajo.</p>
    </blockquote>
  </div>
</div>
<div class="card mt-2">
  <div class="card-header" style="display: inline-block;">
    <div class="container">
      <div class="row">
        <div class="col-6">
        <h5 class="text-left">Juan Jose</h5>
        </div>
        <div class="col-6">
        <h5><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></h5>
        </div>
      </div>
</div>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>Excelente servicio, ampliamente recomndado su trabajo.</p>
    </blockquote>
  </div>
</div>
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