<?php
$servidor =  Ruta::ctrRutaServidor();
?>
<nav class="navbar navbar-expand-lg fixed-top efectoMenu">
  <div class="container-fluid">
    <a class="navbar-brand mx-3 mt-2 " href="<?php echo $url; ?>inicio"><img src="<?php echo $url; ?>vistas/img/plantilla/logo.png" alt="" width="100px"> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <i class="fas fa-bars menuHamburguesa"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
        <li class="nav-item">
          <a class="nav-link active text-dark mx-2" aria-current="page" href="<?php echo $url; ?>inicio">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Productos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo $url; ?>articulos-para-hombre/1">Hombres</a></li>
            <li><a class="dropdown-item" href="<?php echo $url; ?>articulos-para-mujeres/1">Mujeres</a></li>
            <li><a class="dropdown-item" href="<?php echo $url; ?>articulos-para-ninios/1">Niños</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark mx-2" href="<?php echo $url; ?>personalizados">Pedidos Personalizados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark mx-2" href="<?php echo $url; ?>cotizacion" >Cotizaciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark mx-2" href="<?php echo $url; ?>login">Iniciar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
