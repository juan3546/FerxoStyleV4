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

    <p><button class="btn btn-warning text-white botonH" ><a href="<?php echo $url; ?>articulos-para-hombre/1" style="text-decoration: none;" class="text-white">Explorar Ahora</a> <i class="fas fa-arrow-right text-white mx-2"></i></button></p>
      </div>
  </div>
</div>
</section>
<!--fin seccion de la imagen del banner  -->
<!-- seccion que muestra las categorias de los productos hombre, mujer y niños -->
<section id="categorias" class="container mt-5 mb-5">
  <div class="row ">
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-5">
      <div class="card categoriass tarjetass text-white" id="cnHombre">
        <img src="<?php echo $servidor.$configInicio[0]["imgHombre"]; ?>" class="card-img categoriass" alt="...">
        <div class="card-img-overlay">
         <h3 class="card-title">Hombres</h3>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-5">
    <div class="card categoriass tarjetass text-white"  id="cnMujer">
        <img src="<?php echo $servidor.$configInicio[0]["imgMujer"]; ?>" class="card-img categoriass" alt="...">
        <div class="card-img-overlay">
         <h3 class="card-title">Niños</h3>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-5">
    <div class="card categoriass tarjetass text-white"  id="cnNinio">
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
 ?>
 <div class="row container-fluid">
 <div class="mt-5 pb-4 align-content-center justify-content-center" id="carruselProductos">
   <div class="owl-carousel owl-theme mb-4">
     <?php 
      foreach ($respuesta as $key => $value) {
          echo '<div class="item">
                    <div class="col">
                    <div class="card card2">
                    <div class="img-container">
                       <div class="d-flex justify-content-between align-items-center p-2 first"> 
                  <span class="percent">Nuevo</span> 
                  <span class="wishlist">
                  <i class="fa fa-heart"></i>
                  </span> </div> 
                  <img src="'. $servidor.$value["foto"].'" class="img-fluid">
                   </div>
                     <div class="product-detail-container">
                       <div class="d-flex justify-content-between align-items-center">
                         <h6 class="mb-0">'.$value["nombre"].'</h6> 
                  <span class="text-danger font-weight-bold">';
                    if ($value["precioOferta"] != null):
                    echo '<del>$'.$value["precio"].' </del> &nbsp;&nbsp; $'.$value["precioOferta"];
                         else: 
                           echo $value["precio"];
                          endif;
                  
                 echo '</span>
                                      </div>
                                      <div class="d-flex justify-content-between align-items-center mt-2">
                                          <div class="ratings"> <i class="fa fa-star"></i> <span>4.5</span> </div>
                                          <div class="size"> <label class="radio"> <input type="radio" name="size1" value="small"> <span>S</span> </label> <label class="radio"> <input type="radio" name="size1" value="Medium" checked> <span>M</span> </label> <label class="radio"> <input type="radio" name="size1" value="Large"> <span>L</span> </label> </div>
                                      </div>
                                      <div class="mt-3"> <button class="btn btn-block form-control botonCarrito text-white">Agregar a carrito</button> </div>
                                  </div>
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
 <div class="container-fluid">
        <div class="section-title">
            <h2>Testimonios Clientes</h2>
            <span class="section-separator"></span>
            <p>Con tu opinion nos haces crecer y mejorar dia con dia.</p>
        </div>
    </div>
    <div class="testimonials-carousel-wrap">
        <div class="listing-carousel-button listing-carousel-button-next"><i class="fa fa-caret-right" style="color: #fff"></i></div>
        <div class="listing-carousel-button listing-carousel-button-prev"><i class="fa fa-caret-left" style="color: #fff"></i></div>
        <div class="testimonials-carousel">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testi-item">
                            <div class="testi-avatar"><img src="vistas/img/plantilla/user-1.png"></div>
                            <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                            <div class="testimonials-text">
                                <div class="listing-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>Excelente servicio son muy amables y tienen unos diseños muy bonitos. Recomendados ampliamente</p>
                                <a href="#" class="text-link"></a>
                                <div class="testimonials-avatar">
                                    <h3>Juan Jose Guzman</h3>
                                    <h4>Cliente</h4>
                                </div>
                            </div>
                            <div class="testimonials-text-after"><i class="fa fa-quote-left"></i></div> 
                        </div>
                    </div>

                    <!--second--->
                    <div class="swiper-slide">
                        <div class="testi-item">
                            <div class="testi-avatar"><img src="vistas/img/plantilla/user-2.png"></div>
                            <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                            <div class="testimonials-text">
                                <div class="listing-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>Muy bonitos diseños y excelente servicio.</p>
                                <a href="#" class="text-link"></a>
                                <div class="testimonials-avatar">
                                    <h3>Cristhina Guzman</h3>
                                    <h4>Cliente</h4>
                                </div>
                            </div>
                            <div class="testimonials-text-after"><i class="fa fa-quote-left"></i></div> 
                        </div>
                    </div>
                    <!--third-->

                    <div class="swiper-slide">
                        <div class="testi-item">
                            <div class="testi-avatar"><img src="vistas/img/plantilla/user-3.png"></div>
                            <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                            <div class="testimonials-text">
                                <div class="listing-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>Excelente servicio a domicilio y muy rapido hacer un pedido con ellos. Recomendados ampliamente</p>
                                <a href="#" class="text-link"></a>
                                <div class="testimonials-avatar">
                                    <h3>Tannia Angelica</h3>
                                    <h4>Cliente</h4>
                                </div>
                            </div>
                            <div class="testimonials-text-after"><i class="fa fa-quote-left"></i></div> 
                        </div>
                    </div>

                    <!--fourth-->
                    <div class="swiper-slide">
                        <div class="testi-item">
                            <div class="testi-avatar"><img src="vistas/img/plantilla/user-1.png"></div>
                            <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                            <div class="testimonials-text">
                                <div class="listing-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>Les amnde hacer varios diseños personalizos y muy bien logrados la verdad, cuidaron todos los detalles por muy pequeños que eran, volveria a hacerles un pedido.</p>
                                <a href="#" class="text-link"></a>
                                <div class="testimonials-avatar">
                                    <h3>Salvador Emmanuel</h3>
                                    <h4>Cliente</h4>
                                </div>
                            </div>
                            <div class="testimonials-text-after"><i class="fa fa-quote-left"></i></div> 
                        </div>
                    </div>
                    <!--testi end-->

                </div>
            </div>
        </div>

        <div class="tc-pagination"></div>
    </div>
</section>
<br>
<br>
<br>
