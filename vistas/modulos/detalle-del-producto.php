<?php
$url =  Ruta::ctrRuta();
$servidor =  Ruta::ctrRutaServidor();
$ruta = $rutas[0];
if(isset($rutas[1])){      
  $item = "id";
  $valor2 = $rutas[1];
  $respuestaProduc = ControladorProductos::ctrMostrarProductos($item, $valor2);
}else{
  /* Error */
}
$itemComent = "idProducto";
$valorComent = $valor2;
$numComentarios = ControladorComentario::ctrMostrarComentario($itemComent, $valorComent);
$num = count($numComentarios);
?>
<section class="container-fluid detallePpp">
 <div class="row  mt-5 d-flex">
  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 m-auto">
    <img src="<?php echo $servidor.$respuestaProduc[0]["foto"] ?>" alt="" width="70%" height="70%" class=""  id="imgg" name="nor">
   
  </div>
  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
  <p><a href="<?php echo $url; ?>inicio">Inicio</a> / <?php echo $respuestaProduc[0]["nombre"];  ?> </p>
   <h2><?php echo $respuestaProduc[0]["nombre"];  ?></h2>
   <?php
      if($respuestaProduc[0]["precioOferta"] == null ){
          echo '<h4 class="precioDetalle">$'.$respuestaProduc[0]["precio"].'</h4>';
      }else{
          echo '<del><h4 class="precioDetalle">$'.$respuestaProduc[0]["precio"].'</h4></del>';
          echo '<h4 class="precioDetalle">$'.$respuestaProduc[0]["precioOferta"].'</h4>';
      }
    ?>

  <!--  <select name="tallas" id="tallas" class="form-control-lg">
   <option value="">Tallas Disponibles</option>
     <?php
        $item = "idProducto";
        $valor = $valor2;
        $respuestaTallas = ControladorProductos::ctrMostrarTallas($item, $valor);
        foreach ($respuestaTallas as $key => $value):
      ?>
       
       <option value="<?php echo $value["id"]; ?>"><?php echo $value["talla"]; ?></option>
       <?php endforeach; ?> 
   </select> -->
   <label class="my-3">Tallas:</label><br>
   <?php
        $item = "idProducto";
        $valor = $valor2; 
        $respuestaTallas = ControladorProductos::ctrMostrarTallas($item, $valor);
        foreach ($respuestaTallas as $key => $value):
      ?>
       <label class="radio" id="rb">
         <input type="radio" class="talla" name="size1" value="<?php echo $value["talla"]; ?> "> 
          <span><?php echo $value["talla"] ?></span> 
       </label>
       <?php endforeach; ?> 
   
   <?php
      if($respuestaProduc[0]["descripcion"] != null){
          echo '<p class="mt-3"><h4>Descripcion del Producto <br></h4><br>';
          echo $respuestaProduc[0]["descripcion"];
      }
    ?>
  </p>

    <div class="row">
    <!-- <div class="col-6">
       <button class="btn btn-primary" id="btnPedido" name="btnPedido" producto=<?php echo $respuestaProduc[0]["id"]; ?> >Solicitar Pedido</button>
    </div> -->
    <div class="col-12">
        <button class="btn btn-primary" id="btnCarrito" name="btnCarrito" producto=<?php echo $respuestaProduc[0]["id"]; ?> modelo="<?php echo $respuestaProduc[0]["nombre"]; ?>" precio="<?php echo $respuestaProduc[0]["precio"]; ?>" oferta="<?php echo $respuestaProduc[0]["precioOferta"]; ?>" imagen="<?php echo  $servidor.$respuestaProduc[0]["foto"]; ?>" > 
          <i class="fas fa-cart-plus"></i> Agregar a Carrito
        </button>
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
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Comentarios (<?php echo $num; ?>)</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Relacionados</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Ofertas</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active col-12" id="home" role="tabpanel" aria-labelledby="home-tab">
  <!-- <div id="Layer1" class="col-12" style="height:220px; overflow: scroll;"> -->
  <div class="container-fluid d-flex justify-content-center col-12" style="width: 100% !important;">
    <div class="row d-flex justify-content-center">
        <div class="col-12 ">
          <div class="container-fluid">
            <div class="row col-12">
              <div class="row">
                <div class="col-10">
                <textarea  cols="99" placeholder="Agrega tu comentario" name="txtComentario" id="txtComentario" class="form-control"></textarea> 
                </div>
                <div class="col-2 justify-content-end align-content-end">
                <button class="btn btn-primary" id="btnComentario" cl="<?php if(isset($_SESSION["id"])): echo $_SESSION["id"]; endif; ?>" producto="<?php echo $rutas[1]; ?>"><i class="fas fa-plus"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="mostComentario col-12"></div>
          <div id="Layer1" class="col-12" style="height: 540px; overflow: scroll;">
          <?php
            $item = "idProducto";
            $valor = $valor2;
            $comentarios = ControladorComentario::ctrMostrarComentarios($item, $valor);
            $foto = "";
            foreach ($comentarios as $key => $value):
              if($value["foto"] == ""){
                  $foto = $value["foto"];
              }else{
                $foto = "vistas/img/usuarios/default/1.jpg";
              }

              $comen = htmlspecialchars( $value["comentario"]);
          ?>
          
            <div class="card p-3 mb-2 mt-3">
                <div class="d-flex flex-row"> <img src="<?php echo $servidor.$value["foto"]; ?>" height="40" width="40" class="rounded-circle">
                    <div class="d-flex flex-column ms-2">
                        <h6 class="mb-1 text-primary"><?php echo $value["usuario"]; ?></h6>
                        <p class="comment-text">
                          <?php echo nl2br(htmlentities($comen,ENT_QUOTES, 'UTF-8')); ?>
                        </p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="d-flex flex-row"> <span class="text-muted fw-normal fs-10"><?php echo $value["fecha"]; ?></span> </div>
                </div>
            </div>
          <!-- </div> -->
            <?php endforeach; ?>
        </div>
    </div>
</div>
  </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
   <!-- cards para mostrar articulos relacionados -->
   <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
      <?php 
        $ProducAleatorios = ControladorProductos::ctrMostrarProductosRelacionados();
        $descrip = "";
        foreach ($ProducAleatorios as $key => $value):

          if($value["descripcion"] != null){
            $descrip = $value["descripcion"];
          }
      ?>
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
      <div class="card card2">
                    <div class="img-container">
                       <div class="d-flex justify-content-between align-items-center p-2 first"> 
                  <span class="percent">Nuevo</span> 
                  <!-- <span class="wishlist">
                  <i class="fa fa-heart"></i>
                  </span>  -->
                </div> 
                  <img src="<?php echo $servidor.$value["foto"]?>" class="img-fluid detalle" producto="<?php echo $value["id"]?>">
                   </div>
                     <div class="product-detail-container">
                       <div class="d-flex justify-content-between align-items-center detalle" producto="<?php echo $value["id"]?>">
                         <h6 class="mb-0"><?php echo $value["nombre"]?></h6> 
                  <span class="text-danger font-weight-bold">
                  <?php
                    if ($value["precioOferta"] != null):
                    echo '<del>$'.$value["precio"].' </del> &nbsp;&nbsp; $'.$value["precioOferta"];
                         else: 
                           echo $value["precio"];
                          endif;
                          ?>
                   
                 </span>
                                      </div>
                                      <div class="d-flex justify-content-between align-items-center mt-2">
                                          <div class="ratings"> <i class="fa fa-star"></i> <span>4.5</span> </div>
                                          <!-- <div class="size"> <label class="radio"> <input type="radio" name="size1" value="small"> <span>S</span> </label> <label class="radio"> <input type="radio" name="size1" value="Medium" checked> <span>M</span> </label> <label class="radio"> <input type="radio" name="size1" value="Large"> <span>L</span> </label> </div> -->
                                          <div class="size">
                                          <?php
                                              $item = "idProducto";
                                              $valor = $value["id"];
                                              $usuario = "error";
                                              if(isset($_SESSION["iniciarSesion"])){
                                                $usuario = $_SESSION["iniciarSesion"];
                                              }
                                              
                                              $tallas = ControladorTallas::ctrMostrarTallas($item, $valor);
                                              foreach ($tallas as $key => $values):
                                            ?>
                                            <label class="radio">
                                             <input type="radio" class="talla" name="size1" id="size1" value="<?php echo $values["talla"]; ?>"> 
                                             <span><?php echo $values["talla"]; ?></span> 
                                            </label> 
                                            
                                            <?php endforeach; ?>
                                            </div>
                                      </div>
                                      <div class="mt-3"> <button class="btn btn-block form-control botonCarrito text-white" id="<?php echo $usuario; ?>" producto="<?php echo $value["id"]; ?>" modelo="<?php echo $value["nombre"]; ?>" precio="<?php echo $value["precio"]; ?>" oferta="<?php echo $value["precioOferta"]; ?>" imagen="<?php echo $servidor.$value["foto"]; ?>">Agregar a carrito</button> </div>
                                  </div>
                              </div>
     </div>
     <?php endforeach; ?>


        </div>
    </div>
   <!-- fin cards para mostrar articulos relacionados -->
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <!-- cards de Ofertas -->
    <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        <?php 
          $ProducAleatorios = ControladorProductos::ctrMostrarProductosConOferta();
          $descrip = "";
          foreach ($ProducAleatorios as $key => $value):

            if($value["descripcion"] != null){
              $descrip = $value["descripcion"];
            }
        ?>
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
      <div class="card card2">
                    <div class="img-container">
                       <div class="d-flex justify-content-between align-items-center p-2 first"> 
                  <span class="percent">Nuevo</span> 
                  <!-- <span class="wishlist">
                  <i class="fa fa-heart"></i>
                  </span>  -->
                </div> 
                  <img src="<?php echo $servidor.$value["foto"]?>" class="img-fluid detalle" producto="<?php echo $value["id"]?>">
                   </div> 
                     <div class="product-detail-container">
                       <div class="d-flex justify-content-between align-items-center detalle" producto="<?php echo $value["id"]?>">
                         <h6 class="mb-0"><?php echo $value["nombre"]?></h6> 
                  <span class="text-danger font-weight-bold">
                  <?php
                    if ($value["precioOferta"] != null):
                    echo '<del>$'.$value["precio"].' </del> &nbsp;&nbsp; $'.$value["precioOferta"];
                         else: 
                           echo $value["precio"];
                          endif;
                          ?>
                  
                 </span>
                                      </div>
                                      <div class="d-flex justify-content-between align-items-center mt-2">
                                          <div class="ratings"> <i class="fa fa-star"></i> <span>4.5</span> </div>
                                          <!-- <div class="size"> <label class="radio"> <input type="radio" name="size1" value="small"> <span>S</span> </label> <label class="radio"> <input type="radio" name="size1" value="Medium" checked> <span>M</span> </label> <label class="radio"> <input type="radio" name="size1" value="Large"> <span>L</span> </label> </div> -->
                                          <div class="size">
                                          <?php
                                              $item = "idProducto";
                                              $valor = $value["id"];
                                              $usuario = "error";
                                              if(isset($_SESSION["iniciarSesion"])){
                                                $usuario = $_SESSION["iniciarSesion"];
                                              }
                                              
                                              $tallas = ControladorTallas::ctrMostrarTallas($item, $valor);
                                              foreach ($tallas as $key => $values):
                                            ?>
                                            <label class="radio">
                                             <input type="radio" class="talla" name="size1" id="size1" value="<?php echo $values["talla"]; ?>"> 
                                             <span><?php echo $values["talla"]; ?></span> 
                                            </label> 
                                            
                                            <?php endforeach; ?>
                                            </div>
                                      </div>
                                      <div class="mt-3"> <button class="btn btn-block form-control botonCarrito text-white" id="<?php echo $usuario; ?>" producto="<?php echo $value["id"]; ?>" modelo="<?php echo $value["nombre"]; ?>" precio="<?php echo $value["precio"]; ?>" oferta="<?php echo $value["precioOferta"]; ?>" imagen="<?php echo $servidor.$value["foto"]; ?>">Agregar a carrito</button> </div>
                                  </div>
                              </div>
     </div>
     <?php endforeach; ?>
            <!-- fin de cards de Ofertas -->
        </div>
    </div>


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