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
        <?php
            $item = null;
            $valor = null;
            $categorias = Controladorcategorias::ctrMostrarCategorias($item, $valor);
        ?>
        <H3 class="text-center">Categorias</H3>
        <ul class="listaCategorias text-center text-dark">
          <?php foreach ($categorias as $key => $value):?>
          <li><a href="<?php echo $url.$rutas[0].'/1/'.$value["nombre"]; ?>" class="text-dark"><?php echo $value["nombre"]; ?></a></li>
          <?php endforeach ?>
        </ul>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <h3 class="text-center">Avanzado</h3>
        <ul class="listaCategorias text-center text-dark">
          <li> <a href="<?php echo $url.$rutas[0].'/1/Nuevo'; ?>" class="text-dark">Nuevos Modelos</a></li>
          <li><a href="<?php echo $url.$rutas[0].'/1/Oferta'; ?>" class="text-dark">Ofertas </a></li>
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
      <?php
          /*=============================================
			      LLAMADO DE PAGINACIÓN
			    =============================================*/
         
          $productoPorPagina = 12;
          if(isset($rutas[1]) && preg_match('/^[0-9]+$/', $rutas[1])){
            $base = ($rutas[1] - 1)* $productoPorPagina ;
				    $tope =  $productoPorPagina;
          }else{
            $rutas[1] = 1;
            $base = 0;
            $tope =  $productoPorPagina;
            
            
            
          }

          /* traer todos los productos */
          /*
          $item = "genero";
          $valor = "Hombre";
          */
          
          if(isset($rutas[2]) && $rutas[2] != "" ){
            
            if($rutas[2] == "Nuevo" || $rutas[2] == "Oferta"){
              $item = 'estado';
              $valor = $rutas[2];

              $item2 = 'genero';
              $valor2 = 'Hombre';
              $totalProductos = ControladorProductos::ctrObtenerTotalProductos($item, $valor, $item2, $valor2);
            }else{
              $item = 'nombre';
              $valor = $rutas[2];

              $item2 = 'genero';
              $valor2 = 'Hombre';
              $totalProductos = ControladorProductos::ctrObtenerTotalProductosConCategorias($item, $valor, $item2, $valor2);
              
            }
          }else{
            $item = 'genero';
            $valor = 'Hombre';
            
            $totalProductos = ControladorProductos::ctrObtenerTotalArticulos($item, $valor);
          }

          

          if ($totalProductos == 0){
            echo '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <br> 
                    <div class="alert alert-warning col-12" role="alert">Producto no disponible</div>
                  </div>';
          }
            


          if(isset($rutas[2]) && $rutas[2] != "" ){
            if($rutas[2] == "Nuevo" || $rutas[2] == "Oferta"){
              $item = 'estado';
              $valor = $rutas[2];
              
              $item2 = 'genero';
              $valor2 = 'Hombre';

              $productosXPagina = ControladorProductos::ctrMostrarProductosLim($item, $valor, $base, $tope, $item2, $valor2);
            }else{
              $item = 'nombre';
              $valor = $rutas[2];

              $item2 = 'genero';
              $valor2 = 'Hombre';
              $productosXPagina = ControladorProductos::ctrMostrarProductosCategoriaLim($item, $valor, $base, $tope, $item2, $valor2);
            }
          }else{
            $item = 'genero';
            $valor = 'Hombre';
            $productosXPagina = ControladorProductos::ctrMostrarArticulosLim($item, $valor, $base, $tope);;
          }

          /* calculo de paginas */
          $paginas = $totalProductos / $productoPorPagina;
          $paginas = ceil($paginas);

          foreach ($productosXPagina as $key => $value):
        
            
      ?>

   
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
      <div class="card-sl h-100">
        <div class="card-image">
          <img src="<?php echo $servidor.$value["foto"]; ?>" />
        </div>
           <a class="card-action" href="#"><i class="fas fa-cart-plus"></i></a>
        <div class="card-heading">
            <?php echo $value["nombre"]; ?>
        </div>
        <div class="card-text">
        <?php echo $value["descripcion"]; ?>
        </div>
        <div class="card-text">
          <?php if ($value["precioOferta"] != null): ?>
            <del>$<?php echo $value["precioOferta"]; ?> </del> &nbsp;&nbsp; $<?php echo $value["precio"]; ?>
          <?php else:  ?>
            $<?php echo $value["precio"]; ?>
          <?php endif  ?>  

        </div>
          <a href="#" class="card-button"> Apartar</a>
       </div>
     </div>
     <?php endforeach ?>



</div>
 </section>
 <!-- fin del apartado de productos -->
 <!-- Apartado de paginacion -->
 <?php
   $filtroPagi = null;
   $ruta2 = null;
    if(isset($rutas[2])){
      $filtroPagi = '/'.$rutas[2];  
      $ruta2 = $rutas[1];
   }elseif(isset($rutas[1])){
    $ruta2 = $rutas[1];
   }  

 ?>
 <section class="container-fluid d-flex mt-5" id="paginacion">
 <nav aria-label="Page navigation example" class="mx-auto">
  <ul class="pagination">
    <li class="page-item <?php echo $ruta2 <= 1 ? 'disabled' : '' ?>">
      <a class="page-link" href="<?php echo $url.$rutas[0].'/'.($ruta2-1).$filtroPagi; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for ($i=0; $i < $paginas; $i++): ?>
    <li class="page-item <?php echo $ruta2 == ($i+1) ? 'active' : '' ?>">
      <a class="page-link" href="<?php echo $url.$rutas[0].'/'.($i+1).$filtroPagi; ?>">
        <?php echo $i+1; ?>
      </a>
    </li>
    <?php endfor; ?>
    <li class="page-item <?php echo $ruta2 >= $paginas ? 'disabled' : '' ?>">
      <a class="page-link" href="<?php echo $url.$rutas[0].'/'.($ruta2+1).$filtroPagi; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
 </section>

 