<div class="container-fluid" id="menufiltrado">
  <div class="row">
      <div class="col-3">
       <div class="card mb-2">
        <div class="card-header text-center">
          Perfil
        </div>
        <div class="card-body d-flex">
           <div class="container">
               <div class="row">
                <img src="vistas/img/plantilla/user-1.png" id="imagen-perfil" class="mx-auto">
               </div>
               <div class="row mt-3 text-center">
                 <label class="file-upload">
                    <input type="file" multiple="multiple" name="fileToUpload" id="fileToUpload">
                       Elegir Foto
                 </label>
               </div>
               <div class="row mt-3 text-center">
                 <h4>Laura</h4>
               </div>
           </div>
        </div>
      </div>
      </div>
      <div class="col-9">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Datos Generales</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Pedidos</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="container mt-3 ">
    <div class="row d-flex ">
      <div class="col-6">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-check"></i></span>
            <input type="text" class="form-control" placeholder="Nombre(s)" aria-label="Username" aria-describedby="addon-wrapping">
          </div>
      </div>
      <div class="col-6">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-check"></i></span>
            <input type="text" class="form-control" placeholder="Apellido(s)" aria-label="Username" aria-describedby="addon-wrapping">
          </div>
      </div>
    </div>
    <div class="row d-flex">
      <div class="col-12">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-at"></i></span>
            <input type="text" class="form-control" placeholder="Correo" aria-label="Username" aria-describedby="addon-wrapping">
          </div>
      </div>
    </div>
    <div class="row d-flex ">
      <div class="col-6">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control" placeholder="Usuario" aria-label="Username" aria-describedby="addon-wrapping">
          </div>
      </div>
      <div class="col-6">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-phone"></i></span>
            <input type="text" class="form-control" placeholder="Telefono" aria-label="Username" aria-describedby="addon-wrapping">
          </div>
      </div>
    </div>
    <div class="row d-flex">
      <div class="col-12">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-address-card"></i></span>
            <input type="text" class="form-control" placeholder="Direccion" aria-label="Username" aria-describedby="addon-wrapping">
          </div>
      </div>
    </div>
    <div class="row d-flex">
      <div class="col-12">
          <button class="btn btn-primary">Guardar</button>
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
      <div class="card-sl h-100">
        <div class="card-image">
          <img src="<?php echo $servidor.$value["foto"]; ?>" />
        </div>
           <a class="card-action" href="#"><i class="fas fa-cart-plus"></i></a>
        <div class="card-heading">
            <h4><?php echo $value["nombre"]; ?></h4>
        </div>
        <div class="card-text">
         <?php echo $descrip; ?> 
        </div>
        <div class="card-text">
        <?php if ($value["precioOferta"] != null): ?>
            <del>$<?php echo $value["precio"]; ?> </del> &nbsp;&nbsp; $<?php echo $value["precioOferta"]; ?>
          <?php else:  ?>
            $<?php echo $value["precio"]; ?>
          <?php endif  ?>  

        </div>
          <a href="#" class="card-button"> Solicitar pedido</a>
       </div>
     </div>
     <?php endforeach; ?>


        </div>
    </div>
   <!-- fin cards para mostrar articulos relacionados -->
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  
    </div>
  </div>
</div>
      </div> 
  </div>
</div>
<br>
<br>
<br>