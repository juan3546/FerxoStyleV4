<!--buscador -->
<div class="container margen-top">
    <div class="row justify-content-center">
        <div class="col md-4">
            <div class="form-group ">
                <div class="input-group">
                    <div class="col-10"><p id="titulo" >Productos Nuevos</p></div>
                    <?php
                        $item = "estado";
                        $valor = "Nuevo";
                        $total_jersey = ControladorInicio::ctrObtenerProductos($item, $valor);

                        $articulo_por_pagina = 6;
                        $paginas = $total_jersey / $articulo_por_pagina;
                        // redondear el numero de paginas
                        $paginas = ceil($paginas);

                        

                        if(!isset($_GET["pagina"])){
                            echo '<script> window.location = "index.php?ruta=jersey-nuevos&pagina=1";</script>';

                        }


                        if($_GET["pagina"] > $paginas || $_GET["pagina"] <= 0 ){
                            echo '<script> window.location = "index.php?ruta=jersey-nuevos&pagina=1";</script>';
                        }

                    ?>    
                    <div class="col-2">
                        <p id="totProductos"> <?php echo $total_jersey; ?> PRODUCTOS</p>
                    </div>
                    
                    

                    <br>
                    <hr id="lineaNuevosP">
                </div>
            </div>
        </div>
    </div>
</div>





    <!-- cards -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group">
                        <?php
                            $item = "estado";
                            $valor = "Nuevo";

                            //CALCULAR EL INICIO DEL LIMIT
                            $iniciar = ($_GET["pagina"]-1)*$articulo_por_pagina;
                           
                            $respuestaProduc = ControladorInicio::ctrMostrarProductosLim($item, $valor, $iniciar,$articulo_por_pagina);


                            $ruta = "https://admin.ferxostyle.com.mx/";
                         

                            foreach ($respuestaProduc as $key => $value) {
                                echo '<div class="profile-card-4 text-center">
                                        <img src="'.$ruta.$value["foto"].'" class="img img-responsive">
                                        <div class="profile-content">
                                            <div class="profile-description"> <b>'.$value["nombre"].'</b>
                                                <p>$'.$value["precio"].'</p>
                                            </div>
                                        </div>
                                    </div> &nbsp;&nbsp;&nbsp;';
                            }
                        
                        ?>  
                
                            
                            
                        </div>
                    </div>
                    
                </div>     
            </div>
            
        </div>
<br>
<br>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item <?php echo $_GET["pagina"] <= 1 ? 'disabled' : '' ?>">
      <a class="page-link" href="index.php?ruta=jersey-nuevos&pagina=<?php echo $_GET["pagina"]-1; ?>" tabindex="-1">Anterior</a>
    </li>
    <?php
        for ($i=0; $i < $paginas; $i++):
    ?>
    <li class="page-item  <?php echo $_GET["pagina"]==$i+1 ? 'active' : '' ?>">
        <a class="page-link" href="index.php?ruta=jersey-nuevos&pagina=<?php echo $i+1; ?>"><?php echo $i+1; ?></a>
    </li>
    <?php endfor ?>
    <li class="page-item <?php echo $_GET["pagina"] >= $paginas ? 'disabled' : '' ?>">
      <a class="page-link" href="index.php?ruta=jersey-nuevos&pagina=<?php echo $_GET["pagina"]+1; ?>">Siguiente</a>
    </li>
  </ul>
</nav>


