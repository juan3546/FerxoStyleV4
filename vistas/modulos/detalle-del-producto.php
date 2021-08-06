<?php
$url =  Ruta::ctrRuta();
$servidor =  Ruta::ctrRutaServidor();
$ruta = $rutas[0];
?>
<div class="container-peque margen-top-detalle single-product">
    <?php
        if(isset($rutas[1])){
           
            $item = "id";
            $valor = $rutas[1];
        $respuestaProduc = ControladorProductos::ctrMostrarProductos($item, $valor);
        }else{
            /* Error */
        }
        
    ?>
    <div class="row">
        <div class="col-2">
            <img src="<?php echo $servidor.$respuestaProduc[0]["foto"] ?>" width="100%">
        </div>
        <div class="col-2">
            <p><a href="<?php echo $url; ?>inicio">Inicio</a> / <?php echo $respuestaProduc[0]["nombre"] ?></p>
            <h2><?php echo $respuestaProduc[0]["nombre"] ?></h2>
            <?php
                if($respuestaProduc[0]["precioOferta"] == null ){
                    echo '<h4>$'.$respuestaProduc[0]["precio"].'</h4>';
                }else{
                    echo '<strike><h4>$'.$respuestaProduc[0]["precio"].'</h4></strike>';
                    echo '<h4>$'.$respuestaProduc[0]["precio"].'</h4>';
                }
            ?>
            <select name="" id="">
                <option value="">Tallas disponibles</option>
                <option value="">13</option>
                <option value="">14</option>
            </select>
            <!-- input type="number" name="" id="" value="1" -->
            <!-- a href="" class="btn">Agregar a carrito</a -->
            <?php
                if($respuestaProduc[0]["descripcion"] != null){
                    echo '<h3>Detalle del producto <i class="fa fa-indent icon-detail-product"></i></h3>
                        <br>
                        <p>'.$respuestaProduc[0]["descripcion"].'</p>';
                }
            ?>
            
            

            
        </div>
    </div>
</div>

<!---- Nuevos productos ----->
<div class="container-peque">
    <h2 class="titulo">Nuevos Productos</h2>
    <div class="row">
    <?php
            $item = "estado";
            $valor = "Nuevo";

            $iniciar = 0;
            $articulo_por_pagina = 4;
                

            $respuesta = ControladorInicio::ctrMostrarProductosLim($item, $valor, $iniciar,$articulo_por_pagina);


            $ruta = "https://admin.ferxostyle.com.mx/";


            foreach ($respuesta as $key => $value) {
                echo '<div class="product productoNuevoDtp"> 
                        <a href="'.$url.'detalle-del-producto/'.$value["id"].'">
                        <div class="img-container">
                            <img src="'.$servidor.$value["foto"].'" alt="" />
                            <!-- div class="addCart">
                                <-- i class="fas fa-shopping-cart"></i>
                            </div -->
                        </div>
                        <div class="bottom">
                        <a href="'.$url.'detalle-del-producto/'.$value["id"].'">'.$value["nombre"].'</a>
                        <div class="price">';
                        if($value["precioOferta"] != null){
                            echo '<span>$'.$value["precioOferta"].'</span>';
                        }else{
                            echo '<span>$'.$value["precio"].'</span>';
                        }
                        echo '</div>
                        </div>
                        </a>
                        </div>';
            }
                        
        ?>
    </div>
</div>