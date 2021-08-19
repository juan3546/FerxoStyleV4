<?php
  $servidor =  Ruta::ctrRutaServidor();
  $configInicio = ControladorConfiguracion::ctrMostrarConfigInicio($item = null, $valor = null);
  $tituloPrimero = substr($configInicio[0]["tituloSlogan"], 0, 22);
  $tituloSegundo = substr($configInicio[0]["tituloSlogan"], 23);
  $sloganPrimero = substr($configInicio[0]["slogan"], 0, 66);
  $sloganSegundo = substr($configInicio[0]["slogan"], 67);
?>  
 <!-- seccion de la imagen del banner  -->
<section id="=ImagenYTextoBanner" >
  <div class="card parallax" >
  <div class="card-img-overlay mt-5 d-flex">
      <div class="container-fuid mx-5 mt-5  ms-auto">
      <h2 class="card-title titulo"><?php echo $tituloPrimero;  ?> <br> <?php echo $tituloSegundo; ?></h2>
    <p class=" titulo2"><?php echo $sloganPrimero; ?></p>
    <p class=" titulo2"><?php echo $sloganSegundo; ?></p>

    <p><button class="btn btn-warning text-white botonH">Explorar Ahora<i class="fas fa-arrow-right text-white mx-2"></i></button></p>
      </div>
  </div>
</div>

</section>
<!--fin seccion de la imagen del banner  -->
<!-- seccion que muestra las categorias de los productos hombre, mujer y niños -->
<section id="categorias" class="container mt-5 mb-5">
  <div class="row ">
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-5">
      <div class="card categoriass tarjetass text-white">
        <img src="<?php echo $servidor.$configInicio[0]["imgHombre"]; ?>" class="card-img categoriass" alt="...">
        <div class="card-img-overlay">
         <h3 class="card-title">Hombres</h3>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-5">
    <div class="card categoriass tarjetass text-white">
        <img src="<?php echo $servidor.$configInicio[0]["imgMujer"]; ?>" class="card-img categoriass" alt="...">
        <div class="card-img-overlay">
         <h3 class="card-title">Niños</h3>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-5">
    <div class="card categoriass tarjetass text-white">
        <img src="<?php echo $servidor.$configInicio[0]["imgInfante"]; ?>" class="card-img categoriass" alt="...">
        <div class="card-img-overlay">
         <h3 class="card-title">Mujeres</h3>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="NuevosProductos" class="container-fluid mt-5">
 <div class="row d-flex">
  <h2 class="text-center nuevos">Nuevos Productos</h2>
  <div class="linea text-center align-content-center justify-content-center m-auto mt-2"></div>
 </div>
 <?php
  $item = "estado";
  $valor = "Nuevo";

  $iniciar = 0;
  $articulo_por_pagina = 4;
      

  $respuesta = ControladorInicio::ctrMostrarProductosLim($item, $valor, $iniciar,$articulo_por_pagina);
  var_dump($respuesta);
 ?>
 <div class="row container-fluid">
 <div class="mt-5 pb-4 align-content-center justify-content-center" id="carruselProductos">
   <div class="owl-carousel owl-theme mb-4">
     <?php 
      foreach ($respuesta as $key => $value) {
          echo '<div class="item">
                    <div class="col">
                      <div class="card-sl h-100">
                        <div class="card-image">
                           <img src="'. $servidor.$value["foto"].'" />
                        </div>
                          <a class="card-action" href="#"><i class="fas fa-cart-plus"></i></a>
                       <div class="card-heading">
                          '.$value["nombre"].'
                      </div>
                    <div class="card-text">
                    '.$value["descripcion"].'
                    </div>
                    <div class="card-text">';
                      if ($value["precioOferta"] != null):
                       echo '<del>$'.$value["precio"].' </del> &nbsp;&nbsp; $'.$value["precioOferta"];
                       else: 
                        echo $value["precio"];
                       endif;
                 echo  ' </div>
                      <a href="#" class="card-button"> Solicitar pedido</a>
                   </div>
              </div>
            </div>';
      }
     ?>
   </div>
   
 </div>
 </div>
</section>
<section id="verde" class="mt-5 px-4 ">
 <div class="row container-fluid mb-2 ">
   <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 d-flex " id="imagen-verde">
      <img class="mx-auto my-auto" src="<?php echo $servidor.$configInicio[0]["imgPers"]; ?>" alt="" id="imagen-verde" width="50%" height="70%"> 
   </div>
   <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-5">
    <p class="text-center mt-4"><?php echo $configInicio[0]["tituloPers"]; ?></p>
     <h4 class="text-left mt-3" id="ModeloPersonalizado"><?php echo $configInicio[0]["subTituloPers"]; ?></h4> 
    <p class="pl-5 p-4 mt-3">
      <?php echo $configInicio[0]["textoPers"]; ?>
    </p>
    <button class="btn btn-warning botonH px-3 mb-5">Explorar <i class="fas fa-arrow-circle-right mx-2"></i></button>
   </div>
 </div>
</section>
<!-- Seccion de carrusel de comentarios -->
<section id="comentarios" class="mt-5">
 <div class="container">
   <h2 class=" pb-3 text-center section-header">Nuestros Clientes</h2>
   <div class="linea text-center align-content-center justify-content-center m-auto mt-0"></div>
   <div class="testimonial-view">
     <div class="carousel carousel-dark slide" id="testimonialCarousel" data-ride="carousel">
     <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
       <div class="carousel-inner">
         <div class="carousel-item active">
           <div class="block">
             <div class="row">
               <div class="col-md-5">
                 <div class="user">
                   <div class="image">
                     <img src="vistas/img/plantilla/user-1.png" alt="">
                   </div>
                   <div class="info">
                     <h2 class="user-name">Alan</h2>
                     <h4>Cliente</h4>
                   </div>
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="content">
                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro incidunt maiores ipsam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio recusandae blanditiis nisi. Incidunt, rem alias corporis aspernatur recusandae eos corrupti fugiat aut sit non, porro necessitatibus fuga autem. Eius.</p>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="carousel-item">
           <div class="block">
             <div class="row">
               <div class="col-md-5">
                 <div class="user">
                   <div class="image">
                     <img src="vistas/img/plantilla/user-2.png" alt="">
                   </div>
                   <div class="info">
                     <h2 class="user-name">Cristina</h2>
                     <h4>Cliente</h4>
                   </div>
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="content">
                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro incidunt maiores ipsam.</p>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="carousel-item">
           <div class="block">
             <div class="row">
               <div class="col-md-5">
                 <div class="user">
                   <div class="image">
                     <img src="vistas/img/plantilla/user-2.png" alt="">
                   </div>
                   <div class="info">
                     <h2 class="user-name">Cristina</h2>
                     <h4>Cliente</h4>
                   </div>
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="content">
                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro incidunt maiores ipsam.</p>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
     </div>
   </div>
 </div>
</section>
