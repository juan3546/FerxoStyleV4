<?php

$servidor =  Ruta::ctrRutaServidor();

?>
<header class="navbar">
  <a href="#" class="logo" ><img src="<?php echo $url ?>vistas/img/plantilla/logo.png" width="100px"></a>
  <div class="toggle" onClick="toggleMune();"></div>
    <ul class="menu-items">
      <li><a href="<?php echo $url; ?>inicio">Inicio</a></li>
      <li><a href="<?php echo $url; ?>productos">Productos</a></li>
      <li><a href="#">Pedidos Personalizados</a></li>
      <li><a href="<?php echo $url; ?>cotizacion">Cotización</a></li>
      <li><a href="#">Hola, <?php echo $_SESSION["usuario"]; ?> </a></li>
      <li><a href="<?php echo $url; ?>carrito"><img src="<?php echo $url ?>vistas/img/plantilla/cart.png" width="20px" height="20px"></a></li>
      <li><a href="<?php echo $url; ?>salir" >Salir <i class="fas fa-sign-in-alt"></i></a></li>
    </ul>
    
</header>