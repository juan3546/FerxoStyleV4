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
      <div class="owl-carousel owl-theme mb-4 carruselNuevos">
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
      <div class="container-fluid">
        <div class="mt-5 pb-4 align-content-center justify-content-center" id="carruselProductosdos">
          <div class="owl-carousel owl-theme mb-4 carruselCategorias ">
            <?php
            $limite = 3;
            $servidor =  Ruta::ctrRutaServidor();
            $categorias = Controladorcategorias::ctrMostrarCategoriaAleatorio($limite);
            foreach ($categorias as $key => $value) :
            ?>
              <div class="item ">
                <div class="col d-flex">
                  <div class="card border-0 m-auto" style="width: 18rem;">
                    <div class="d-flex" style="background: #4EA5D4; height: 45px;">
                      <p class=" text-white text-uppercase m-auto" style="background: #4EA5D4; font-size: 20px;"><?php echo $value["nombre"]; ?></p>
                    </div>
                    <img src="<?php echo $servidor . $value["foto"]; ?>" class="card-img-top" alt="...">
                    <button class="btn text-white" style="background: #4EA5D4;" id="inicioCategoria" categoria="<?php echo $value["nombre"]; ?>">Ver mas</button>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</section>
<br>
<br>
<br>