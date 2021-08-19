<?php
session_start();

// mantener la ruta fija de la ecommerce
$url =  Ruta::ctrRuta();
$servidor =  Ruta::ctrRutaServidor();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="icon" href="<?php echo $url; ?>vistas/img/plantilla/invo.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FERXO STYLE</title>

    <!-- PLUGINS DE CSS -->
    <!-- Fuentes de google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/libs/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/libs/fontawesome/css/brands.css">
    <link rel="stylesheet" href="vistas/libs/fontawesome/css/solid.css">
    <!-- Estilos de toda la aplicación web -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/dist/css/plantilla.css">
    <!-- Estilos menu -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/dist/css/menu.css">
    <!-- Estilos de pedidos Personalizados -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/dist/css/cotizacion.css">
    <!-- Estilos de inicio -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/dist/css/inicio.css">
    <!-- Estilos de login -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/dist/css/login.css">
    <!-- Estilos productos -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/dist/css/productos.css">
    <!-- Estilos de pie -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/dist/css/pie.css">
    <!-- Estilos detalle producto -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/dist/css/detalle-productos.css">
    <!-- Estilos articulos para hombre -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/dist/css/articulos-para-hombre.css">
    <!-- Estilos de iconos -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/dist/css/icons.css">
    <!-- Estilos de grid -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/dist/css/grid.css">
    <!-- Estilos de comentarios -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/dist/css/comentarios.css">
    <!-- Estilos bootstrap -->
    <!-- link rel="stylesheet" href="vistas/libs/bootstrap/css/bootstrap.min.css" -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/libs/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/libs/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/libs/OwlCarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/libs/OwlCarousel/css/owl.theme.default.css">
      

    <!-- PLUGINS DE JS -->
    <script src="<?php echo $url; ?>vistas/libs/jquery/jquery.min.js"></script>
    <!-- script src="<?php echo $url; ?>vistas/libs/bootstrap/js/popper.min.js"></script -->
    <script src="<?php echo $url; ?>vistas/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $url; ?>vistas/libs/bootstrap/js/bootstrap.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" ></script>
    <script src="<?php echo $url; ?>vistas/libs/fontawesome/js/fontawesome.js"></script>
    <script src="<?php echo $url; ?>vistas/libs/fontawesome/js/brands.js"></script>
    <script src="<?php echo $url; ?>vistas/libs/fontawesome/js/solid.js"></script>
    <script src="<?php echo $url; ?>vistas/libs/sweetalert2/sweetalert2.all.js"></script>
    <script src="<?php echo $url; ?>vistas/libs/OwlCarousel/js/owl.carousel.js"></script>
</head>
<body>

    <?php
    /*=============================================
        CONTENIDO DINÁMICO
    =============================================*/

    $rutas = array();
    $ruta = null;
    
    if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
             
    ?>

    <?php
    
            if(isset($_GET["ruta"])){
                
                $rutas = explode("/", $_GET["ruta"]);
                $ruta = $rutas[0];
                
                if($rutas[0] == "productos" || $rutas[0] == "Perzonalizados"){
                    include "modulos/menuIni.php"; 
                    include "modulos/productos.php";
                    include "modulos/pie.php"; 
                }else if($rutas[0] == "inicio" || $rutas[0] == "salir" || $rutas[0] == "detalle-del-producto" || $rutas[0] == "carrito"  || $rutas[0] == "articulos-para-hombre" || $rutas[0] == "articulos-para-mujeres" || $rutas[0] == "articulos-para-ninios" || $rutas[0] == "articulos-personalizados" || $rutas[0] == "articulos-en-oferta" || $rutas[0] == "articulos-nuevos" || $rutas[0] == "cotizacion" || $rutas[0] == "personalizados"){
                    
                    include "modulos/menu.php"; 
                    include "modulos/".$rutas[0].".php";
                    include "modulos/pie.php"; 
                }else if($rutas[0] == "login" ){
                    include "modulos/login.php"; 
                }
            }else{
                include "modulos/menuIni.php"; 
                include "modulos/inicio.php";
                include "modulos/pie.php"; 
            }
    }else{
        
            if(isset($_GET["ruta"])){
                
                $rutas = explode("/", $_GET["ruta"]);
                $ruta = $rutas[0];
                
                if($rutas[0] == "productos" || $rutas[0] == "Perzonalizados"){
                    include "modulos/menu.php"; 
                    include "modulos/productos.php";
                    include "modulos/pie.php"; 
                }else if($rutas[0] == "inicio" || $rutas[0] == "salir" || $rutas[0] == "detalle-del-producto" || $rutas[0] == "carrito"  || $rutas[0] == "articulos-para-hombre" || $rutas[0] == "articulos-para-mujeres" || $rutas[0] == "articulos-para-ninios" || $rutas[0] == "articulos-personalizados" || $rutas[0] == "articulos-en-oferta" || $rutas[0] == "articulos-nuevos" || $rutas[0] == "cotizacion" || $rutas[0] == "personalizados"){
                    
                    include "modulos/menu.php"; 
                    
                    include "modulos/".$rutas[0].".php";
                    include "modulos/pie.php"; 
                }else if($rutas[0] == "login" ){
                    include "modulos/login.php"; 
                }
            }else{
                include "modulos/menu.php"; 
                include "modulos/inicio.php";
                include "modulos/pie.php"; 
            }    
    }
 ?>
    <input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">
    <input type="hidden" value="<?php echo $servidor; ?>" id="rutaOcultaServidor">
    <script src="<?php echo $url; ?>vistas/dist/js/inicio.js"></script>
    <script src="<?php echo $url; ?>vistas/dist/js/login.js"></script>
    <script src="<?php echo $url; ?>vistas/dist/js/menu.js"></script>
    <script src="<?php echo $url; ?>vistas/dist/js/plantilla.js"></script>
    <script src="<?php echo $url; ?>vistas/js/productos.js"></script>
    <script src="<?php echo $url; ?>vistas/js/correo.js"></script>
    <script src="<?php echo $url; ?>vistas/js/comentarios.js"></script>
    
</body>
</html>