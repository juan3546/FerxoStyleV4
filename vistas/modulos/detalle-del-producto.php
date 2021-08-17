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
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, delectus! Quaerat facere, itaque excepturi eligendi fuga commodi modi. Tempora autem nobis pariatur dolore consequuntur sunt, earum soluta repudiandae est voluptates.</p>

    <div class="row">
    <div class="col-6">
       <button class="btn btn-primary">Solicitar Pedido</button>
    </div>
    <div class="col-6">
        .<button class="btn btn-primary"> <i class="fas fa-cart-plus"></i> Agregar a Carrito</button>
    </div>
 </div>
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
  <div class="container mt-3 d-flex justify-content-center">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
        <div class="card p-3 mb-2">
          <div class="container">
            <div class="row col-12">
              <textarea name="" id="comentarioArea" cols="15" rows="5" placeholder="Agrega tu comentario"></textarea> 
              <button class="btn btn-primary">Agregar Comentario</button>
            </div>
          </div>
            </div>
            <div class="card p-3 mb-2">
                <div class="d-flex flex-row"> <img src="https://i.imgur.com/dwiGgJr.jpg" height="40" width="40" class="rounded-circle">
                    <div class="d-flex flex-column ms-2">
                        <h6 class="mb-1 text-primary">Emma</h6>
                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lectus nibh, efficitur in bibendum id, pellentesque quis nibh. Ut dictum facilisis dui, non faucibus dolor sit amet lorem auctor vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque risus mauris</p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="d-flex flex-row"> <span class="text-muted fw-normal fs-10">May 22,2020 12:10 PM</span> </div>
                </div>
            </div>
            <div class="card p-3 mb-2">
                <div class="d-flex flex-row"> <img src="https://i.imgur.com/hczKIze.jpg" height="40" width="40" class="rounded-circle">
                    <div class="d-flex flex-column ms-2">
                        <h6 class="mb-1 text-primary">Morne Micheal</h6>
                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lectus nibh, efficitur in bibendum id, pellentesque quis nibh. Ut dictum facilisis dui, non faucibus dolor sit amet lorem auctor vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque risus mauris</p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="d-flex flex-row"> <span class="text-muted fw-normal fs-10">May 22,2020 12:10 PM</span> </div>
                </div>
            </div>
            <div class="card p-3 mb-2">
                <div class="d-flex flex-row"> <img src="https://i.imgur.com/C4egmYM.jpg" height="40" width="40" class="rounded-circle">
                    <div class="d-flex flex-column ms-2">
                        <h6 class="mb-1 text-primary">Tommy Hifig</h6>
                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lectus nibh, efficitur in bibendum id, pellentesque quis nibh. Ut dictum facilisis dui, non faucibus dolor sit amet lorem auctor vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque risus mauris</p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="d-flex flex-row"> <span class="text-muted fw-normal fs-10">May 22,2020 12:10 PM</span> </div>
                </div>
            </div>
            <div class="card p-3 mb-2">
                <div class="d-flex flex-row"> <img src="https://i.imgur.com/dwiGgJr.jpg" height="40" width="40" class="rounded-circle">
                    <div class="d-flex flex-column ms-2">
                        <h6 class="mb-1 text-primary">Emma</h6>
                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lectus nibh, efficitur in bibendum id, pellentesque quis nibh. Ut dictum facilisis dui, non faucibus dolor sit amet lorem auctor vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque risus mauris</p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="d-flex flex-row"> <span class="text-muted fw-normal fs-10">May 22,2020 12:10 PM</span> </div>
                </div>
            </div>
        </div>
    </div>
</div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
   <!-- cards para mostrar articulos relacionados -->
   <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
            
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
      <div class="card-sl h-100">
        <div class="card-image">
          <img src="vistas/img/plantilla/modelo2.png" />
        </div>
           <a class="card-action" href="#"><i class="fas fa-cart-plus"></i></a>
        <div class="card-heading">
            <h4>Modelo prueba</h4>
        </div>
        <div class="card-text">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo alias facilis accusantium ipsum accusamus reprehenderit inventore obcaecati. Fuga facilis
        </div>
        <div class="card-text">
          $400

        </div>
          <a href="#" class="card-button"> Solicitar pedido</a>
       </div>
     </div>
     <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
      <div class="card-sl h-100">
        <div class="card-image">
          <img src="vistas/img/plantilla/modelo3.png" />
        </div>
           <a class="card-action" href="#"><i class="fas fa-cart-plus"></i></a>
        <div class="card-heading">
            <h4>Modelo prueba</h4>
        </div>
        <div class="card-text">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo alias facilis accusantium ipsum accusamus reprehenderit inventore obcaecati. Fuga facilis
        </div>
        <div class="card-text">
          $400

        </div>
          <a href="#" class="card-button"> Solicitar pedido</a>
       </div>
     </div>
     <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
      <div class="card-sl h-100">
        <div class="card-image">
          <img src="vistas/img/plantilla/modelo4.png" />
        </div>
           <a class="card-action" href="#"><i class="fas fa-cart-plus"></i></a>
        <div class="card-heading">
            <h4>Modelo prueba</h4>
        </div>
        <div class="card-text">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo alias facilis accusantium ipsum accusamus reprehenderit inventore obcaecati. Fuga facilis
        </div>
        <div class="card-text">
          $400

        </div>
          <a href="#" class="card-button"> Solicitar pedido</a>
       </div>
     </div>
        </div>
    </div>
   <!-- fin cards para mostrar articulos relacionados -->
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