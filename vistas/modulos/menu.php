<?php

$servidor =  Ruta::ctrRutaServidor();

?>
<header class="scrol fixed-top">
  <a href="#" class="logo" ><img src="<?php echo $url ?>vistas/img/plantilla/logo.png" width="100px"></a>
  <div class="toggle" onClick="toggleMune();"></div>
    <ul class="menu-items">
      <li><a href="<?php echo $url; ?>inicio">Inicio</a></li>
      <li><a href="<?php echo $url; ?>productos/1">Productos</a></li>
      <li><a href="<?php echo $url; ?>personalizados">Pedidos Personalizados</a></li>
      <li><a href="<?php echo $url; ?>cotizacion">Cotización</a></li>
      <!-- li><a href="<?php /* echo $url; */ ?>login">Iniciar sesión</a></li -->
      <!-- li><a href="<?php echo $url; ?>carrito"><img src="<?php /* echo $url */ ?>vistas/img/plantilla/cart.png" width="20px" height="20px"></a></li -->
    </ul>
    
</header>
