<?php
$url =  Ruta::ctrRuta();
$servidor =  Ruta::ctrRutaServidor();
$ruta = $rutas[0];
?>
 <!-- PRODUCTS -->

  <section class="section products sectionProducto">
    <div class="products-layout container">
      <div class="col-1-of-4">
        <div>
          <div class="block-title">
            <h3>Categorías</h3>
          </div>

          <ul class="block-content">
              <?php
                $item = null;
                $valor = null;
                $filtro = null;
                if(isset($rutas[2]) && preg_match('/^[a-zA-Z0-9]+$/', $rutas[2])){
                  if(isset($rutas[1])){
                      $filtro = $rutas[2];
                  }
                }


                $categorias = Controladorcategorias::ctrMostrarCategorias($item, $valor);
                foreach ($categorias as $key => $value) {
                    echo '<li>
                            <a href="'.$url.$rutas[0].'/1/'.$value["nombre"].'">
                            <label for="">
                                <span>'.$value["nombre"].'</span>
                                <!-- small>(10)</small -->
                            </label>
                            </a>
                        </li>';
                }
              ?>
            
              



          </ul>
        </div>

        <div>
          <div class="block-title">
            <h3>Genero</h3>
          </div>

          <ul class="block-content">
            <li>
              <a href="<?php echo $url?>/articulos-para-mujeres/1">
              <label for="">
                <span>Mujer</span>
              </label>
              </a>
            </li>

            <li>
            <a href="<?php echo $url ?>/articulos-para-hombre/1">
              <label for="">
                <span>Hombre</span>
              </label>
              </a>
            </li>

            <li>
            <a href="<?php echo $url?>/articulos-para-ninios/1">
              <label for="">
                <span>Niños</span>
              </label>
            </a>
            </li>



          </ul>
        </div>

        <div>
          <div class="block-title">
            <h3>Avanzado</h3>
          </div>

          <ul class="block-content">
            <li>
              <a href="<?php echo $url?>/articulos-nuevos/1">
              <label for="">
                <span>Nuevo</span>
              </label>
              </a>
            </li>

            <li>
              <a href="<?php echo $url?>articulos-en-oferta/1">
              <label for="">
                <span>Oferta</span>
              </label>
              </a>
            </li>


          </ul>
        </div>

      </div>
      <div class="col-3-of-4">


        <div class="product-layout">
        <?php
          /*=============================================
			      LLAMADO DE PAGINACIÓN
			    =============================================*/

          if(isset($rutas[1]) && preg_match('/^[0-9]+$/', $rutas[1])){
            $base = ($rutas[1] - 1)*12;
				    $tope = 12;
          }else{
            $rutas[1] = 1;
            $base = 0;
            $tope = 12;
          }

          if(isset($rutas[2]) && isset($rutas[3])){
            $item1 = 'nombre';
            $valor1 = $rutas[2];

            $item2 = 'estado';
            $valor2 = $rutas[3];

            $respuestaProduc = ControladorProductos::ctrMostrarProductosLim($item, $valor, $base, $tope);
            $respuestaProducPagi = ControladorProductos::ctrMostrarProductos($item, $valor);

          }elseif(isset($rutas[2])){
            if($rutas[2] == "Nuevo" || $rutas[2] == "Oferta" ){
              $item = 'estado';
              $valor = $rutas[2];

              $respuestaProduc = ControladorProductos::ctrMostrarProductosLim($item, $valor, $base, $tope);
              $respuestaProducPagi = ControladorProductos::ctrMostrarProductos($item, $valor);

            }else{
              $item = 'nombre';
              $valor = $rutas[2];

              $respuestaProduc = ControladorProductos::ctrMostrarProductosCategoriaLim($item, $valor, $base, $tope);
              $respuestaProducPagi = ControladorProductos::ctrMostrarProductosCategorias($item, $valor);
            }
            
            
          }else{
            $item = null;
            $valor = null;
            $respuestaProduc = ControladorProductos::ctrMostrarProductosLim($item, $valor, $base, $tope);
            $respuestaProducPagi = ControladorProductos::ctrMostrarProductos($item, $valor);
          }
            
            


            foreach ($respuestaProduc as $key => $value) {
                echo '<div class="product">
                      
                        <div class="img-container">
                        <a href="'.$url.'detalle-del-producto/'.$value["id"].'">
                            <img src="'.$servidor.$value["foto"].'" alt="" />
                            </a>
                                <!-- div class="addCart">
                                    <i class="fas fa-shopping-cart"></i>
                                </div -->
                        </div>
                        <div class="bottom">
                        <a href="'.$url.'detalle-del-producto/'.$value["id"].'">'.$value["nombre"].'
                            
                            <div class="price">';
                            if($value["precioOferta"] != null){
                                echo '<span>$'.$value["precioOferta"].'</span>';
                            }else{
                                echo '<span>$'.$value["precio"].'</span>';
                            }
                        echo '</div>
                        </a>
                        </div>
                        
                        </div>';
            }
        ?>
          
            

        </div>


      </div>
    </div>

    	<!--=====================================
			PAGINACIÓN
			======================================-->
      <br>
      <br>
<div class="center">
  <?php
  $filtroPagi = null;
  if(isset($rutas[2]) && isset($rutas[3])){
    $filtroPagi = '/'.$rutas[2].'/'.$rutas[3];
  }elseif(isset($rutas[2])){
    if($rutas[2] == "Nuevo" || $rutas[2] == "Oferta" ){
        $filtroPagi = '/'.$rutas[2];
    }else{
      $filtroPagi = '/'.$rutas[2];
    }
      
  }

  if(count($respuestaProducPagi) != 0){
    $pagProductos = ceil(count($respuestaProducPagi)/12);
  
    if($pagProductos > 4){
      
        /*=============================================
					LOS BOTONES DE LAS PRIMERAS 4 PÁGINAS Y LA ÚLTIMA PÁG
				=============================================*/
        if($rutas[1] == 1){
          echo '<ul class="pagination">';
          for ($i=1; $i <= 4; $i++) {
            if($i == $rutas[1]){
              echo '<li id="item'.$i.'"><a class="active" href="'.$url.$rutas[0].'/'.$i.$filtroPagi.'">'.$i.'</a></li>';
            }else{
              echo '<li id="item'.$i.'"><a  href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
            }
            
          }
          echo '<li disabled><a>...</a></li>';
          if($pagProductos == $rutas[1]){
            echo '<li id="item'.$pagProductos.'"><a class="active" href="'.$url.$rutas[0].'/'.$pagProductos.$filtroPagi.'">'.$pagProductos.'</a></li>';
          }else{
            echo '<li id="item'.$pagProductos.'"><a  href="'.$url.$rutas[0].'/'.$pagProductos.$filtroPagi.'">'.$pagProductos.'</a></li>';
          }
          echo '<li><a href="'.$url.$rutas[0].'/2'.$filtroPagi.'">Siguiente</a></li>
          </ul>';
        }else if($rutas[1] != $pagProductos && 
                  $rutas[1] != 1 &&
                  $rutas[1] <  ($pagProductos/2) &&
                  $rutas[1] < ($pagProductos-3)){
                    $numPagActual = $rutas[1];
                    /*=============================================
						        LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO
						        =============================================*/
                    echo '<ul class="pagination">
                          <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).$filtroPagi.'" hidden>Anterior</a></li>';
                          for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){
                            if($i == $rutas[1]){
                              echo '<li id="item'.$i.'"><a class="active" href="'.$url.$rutas[0].'/'.$i.$filtroPagi.'">'.$i.'</a></li>';
                            }else{
                              echo '<li id="item'.$i.'"><a  href="'.$url.$rutas[0].'/'.$i.$filtroPagi.'">'.$i.'</a></li>';
                            }
                          }
                          echo '<li disabled><a>...</a></li>';
                          if($pagProductos == $rutas[1]){
                            echo '<li id="item'.$pagProductos.'"><a class="active" href="'.$url.$rutas[0].'/'.$pagProductos.$filtroPagi.'">'.$pagProductos.'</a></li>';
                          }else{
                            echo '<li id="item'.$pagProductos.'"><a  href="'.$url.$rutas[0].'/'.$pagProductos.$filtroPagi.'">'.$pagProductos.'</a></li>';
                          }
                          echo '<li><a href="'.$url.$rutas[0].'/'.($numPagActual+1).$filtroPagi.'">Siguiente</a></li>
                          </ul>';

        }   /*=============================================
						LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA
						=============================================*/

						else if($rutas[1] != $pagProductos && 
            $rutas[1] != 1 &&
            $rutas[1] >=  ($pagProductos/2) &&
            $rutas[1] < ($pagProductos-3)
            ){
              $numPagActual = $rutas[1];
              echo '<ul class="pagination">
                      <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).$filtroPagi.'" hidden>Anterior</a></li>';
                      if($pagProductos == $rutas[1]){
                        echo '<li id="item1"><a class="active" href="'.$url.$rutas[0].'/1'.$filtroPagi.'">1</a></li>';
                      }else{
                        echo '<li id="item1"><a  href="'.$url.$rutas[0].'/1'.$filtroPagi.'">1</a></li>';
                      }
                      echo '<li disabled><a>...</a></li>';
                      for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){
                        if($i == $rutas[1]){
                          echo '<li id="item'.$i.'"><a class="active" href="'.$url.$rutas[0].'/'.$i.$filtroPagi.'">'.$i.'</a></li>';
                        }else{
                          echo '<li id="item'.$i.'"><a  href="'.$url.$rutas[0].'/'.$i.$filtroPagi.'">'.$i.'</a></li>';
                        }
                      }
                      echo '<li><a href="'.$url.$rutas[0].'/'.($numPagActual+1).$filtroPagi.'">Siguiente</a></li>
                          </ul>';
            }else{
              /*=============================================
						  LOS BOTONES DE LAS ÚLTIMAS 4 PÁGINAS Y LA PRIMERA PÁG
						  =============================================*/
              $numPagActual = $rutas[1];
              echo '<ul class="pagination">
                      <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).$filtroPagi.'" hidden>Anterior</a></li>';
                      if($pagProductos == $rutas[1]){
                        echo '<li id="item1"><a class="active" href="'.$url.$rutas[0].'/1'.$filtroPagi.'">1</a></li>';
                      }else{
                        echo '<li id="item1"><a  href="'.$url.$rutas[0].'/1'.$filtroPagi.'">1</a></li>';
                      }
                      echo '<li disabled><a>...</a></li>';
                      for($i = ($pagProductos-3); $i <= $pagProductos; $i ++){
                        if($i == $rutas[1]){
                          echo '<li id="item'.$i.'"><a class="active" href="'.$url.$rutas[0].'/'.$i.$filtroPagi.'">'.$i.'</a></li>';
                        }else{
                          echo '<li id="item'.$i.'"><a  href="'.$url.$rutas[0].'/'.$i.$filtroPagi.'">'.$i.'</a></li>';
                        }
                      }
                      echo '</ul>';
            }
    }else{

      echo '<ul class="pagination">';
      for($i = 1; $i <= $pagProductos; $i ++){
        if($i == $rutas[1]){
          echo '<li id="item'.($i).'"><a class="active" href="'.$url.$rutas[0].'/'.($i).$filtroPagi.'">'.($i).'</a></li>';
        }else{
          echo '<li id="item'.($i).'"><a  href="'.$url.$rutas[0].'/'.($i).$filtroPagi.'">'.($i).'</a></li>';
        }
      }
      echo '</ul>';
    }
  }

  ?>
  <!-- ul class="pagination">
    <li><a href="#" hidden>Anterior</a></li>
    <li><a class="active">1</a></li>
    <li><a href="#">Siguiente</a></li>
  </ul-->
</div>
  </section>