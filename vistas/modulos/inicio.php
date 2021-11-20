<?php
$servidor =  Ruta::ctrRutaServidor();
$configInicio = ControladorConfiguracion::ctrMostrarConfigInicio($item = null, $valor = null);
$tituloPrimero = substr($configInicio[0]["tituloSlogan"], 0, 22);
$tituloSegundo = substr($configInicio[0]["tituloSlogan"], 23);
$sloganPrimero = substr($configInicio[0]["slogan"], 0, 66);
$sloganSegundo = substr($configInicio[0]["slogan"], 67);
?>
<span class="ir-arriba icon-arrow-up2"><i class="fas fa-arrow-circle-up"></i></span>
<!-- seccion de la imagen del banner  -->
<section id="=ImagenYTextoBanner">
  <div class="card parallax">
    <div class="card-img-overlay mt-5 d-flex">
      <div class="container-fuid mx-5 mt-5  ms-auto">
        <h2 class="card-title titulo"><?php echo $tituloPrimero;  ?> <br> <?php echo $tituloSegundo; ?></h2>
        <p class=" titulo2"><?php echo $sloganPrimero; ?></p>
        <p class=" titulo2"><?php echo $sloganSegundo; ?></p>

        <p><button class="btn btn-warning text-white botonH"><a href="<?php echo $url; ?>articulos-para-hombre/1" style="text-decoration: none;" class="text-white">Explorar Ahora</a> <i class="fas fa-arrow-right text-white mx-2"></i></button></p>
      </div>
    </div>
  </div>
</section>
<!--fin seccion de la imagen del banner  -->
<!-- seccion que muestra las categorias de los productos hombre, mujer y niños -->
<section id="categorias" class="container mt-5 mb-5">
  <!-- card hombre -->
  <div class="row ">
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-5">
      <div class="card categoriass tarjetass text-white" id="cnHombre">
        <img src="<?php echo $servidor . $configInicio[0]["imgHombre"]; ?>" class="card-img categoriass" alt="...">
        <div class="card-img-overlay">
          <h3 class="card-title text-start">Hombres</h3>
        </div>
      </div>
    </div>
    <!-- card niño -->
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-5">
      <div class="card categoriass tarjetass text-white" id="cnNinio">
        <img src="<?php echo $servidor . $configInicio[0]["imgInfante"]; ?>" class="card-img categoriass" alt="...">
        <div class="card-img-overlay">
          <h3 class="card-title text-start">Niños</h3>
        </div>
      </div>
    </div>
    <!-- card mujer -->
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-5">
      <div class="card categoriass tarjetass text-white" id="cnMujer">
        <img src="<?php echo $servidor . $configInicio[0]["imgMujer"]; ?>" class="card-img categoriass" alt="...">
        <div class="card-img-overlay">
          <h3 class="card-title text-start">Mujeres</h3>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- inicio seccion se nuevos productos  -->
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


  $respuesta = ControladorInicio::ctrMostrarProductosLim($item, $valor, $iniciar, $articulo_por_pagina);
  if (isset($_SESSION["iniciarSesion"])) {
    $usuario = $_SESSION["iniciarSesion"];
  } else {
    $usuario = '';
  }
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
                       <div class="d-flex justify-content-between align-items-center p-2 first">';
          if ($value["estado"] == "Nuevo") :
            echo '<span class="percent">Nuevo</span>';
          elseif ($value["estado"] == "Oferta") :
            echo '<span class="ofert">Oferta</span>';
          endif;

          echo '
                  <!-- span class="wishlist">
                  <i class="fa fa-heart"></i>
                  </span --> </div> 
                  <img src="' . $servidor . $value["foto"] . '" class="img-fluid detalle" producto="' . $value["id"] . '">
                   </div>
                     <div class="product-detail-container">
                       <div class="d-flex justify-content-between align-items-center detalle" producto="' . $value["id"] . '">
                         <h6 class="mb-0">' . $value["nombre"] . '</h6> 
                  <span class="text-danger font-weight-bold">';
          if ($value["precioOferta"] != null) :
            echo '<del>$' . $value["precio"] . ' </del> &nbsp;&nbsp; $' . $value["precioOferta"];
          else :
            echo '$' . $value["precio"];
          endif;

          echo '</span>
                                      </div>
                                      <div class="d-flex justify-content-between align-items-center mt-2">
                                          <div class="ratings"> <i class="fa fa-star"></i> <span>4.5</span> </div>
                                          <div class="size">';

          $item = "idProducto";
          $valor = $value["id"];
          $tallas = ControladorTallas::ctrMostrarTallas($item, $valor);
          foreach ($tallas as $key => $values) :

            echo '<label class="radio">
                                         <input type="radio" class="talla" name="size1" id="size1" value="' . $values["talla"] . '"> 
                                         <span>' . $values["talla"] . '</span> 
                                        </label>';

          endforeach;
          echo  '</div>
                                      </div>
                                      <div class="mt-3"> <button class="btn btn-block form-control botonCarrito text-white" id="' .  $usuario . '" producto="' .  $value["id"] . '" modelo="' .  $value["nombre"] . '" precio="' .  $value["precio"] . '" oferta="' .  $value["precioOferta"] . '" imagen="' . $servidor . $value["foto"] . '">Agregar a carrito</button> </div>
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
      <img class="mx-auto my-auto" src="<?php echo $servidor . $configInicio[0]["imgPers"]; ?>" alt="" id="imagen-verde" width="50%" height="70%">
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
<section class="mt-5">
  <div class="col-12">
    <div class="row">
      <ul class="nav nav-tabs align-content-center justify-content-center" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Sudaderas</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Buffs</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Personalizados</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active col-12" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="row container-fluid">
            <div class="mt-5 pb-4 align-content-center justify-content-center" id="carruselProductos">
              <div class="owl-carousel owl-theme mb-4">
                <div class="item">
                  <div class="col">
                    <div class="row">
                      <div class="col-md-3 col-sm-6">
                        <div class="product-grid6">
                          <div class="product-image6">
                            <a href="#">
                              <img class="pic-1" src="vistas/img/plantilla/categoria1.jpg">
                            </a>
                          </div>
                          <div class="product-content">
                            <h3 class="title"><a href="#">Men's Shirt</a></h3>
                            <div class="price">$11.00
                              <span>$14.00</span>
                            </div>
                          </div>
                          <ul class="social">
                            <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-6">
                        <div class="product-grid6">
                          <div class="product-image6">
                            <a href="#">
                              <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo10/images/img-2.jpg">
                            </a>
                          </div>
                          <div class="product-content">
                            <h3 class="title"><a href="#">Women's Red Top</a></h3>
                            <div class="price">$8.00
                              <span>$12.00</span>
                            </div>
                          </div>
                          <ul class="social">
                            <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <h2>Buffs</h2>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <h2>Jerseys</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<br>
<br>
<br>