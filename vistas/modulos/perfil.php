<?php
  $url =  Ruta::ctrRuta();
  $servidor =  Ruta::ctrRutaServidor();
?>
<div class="container-fluid" id="menufiltrado">
  <div class="row">
      <div class="col-3">
       <div class="card mb-2">
        <div class="card-header text-center">
          Perfil
        </div>
        <div class="card-body d-flex">
           <div class="container">
             <form role="form" method="post" enctype="multipart/form-data">
              <?php
                $item = "id"; 
                $valor = $_SESSION["id"];
                $perfil = ControladorPerfil::ctrMostrarPerfil($item, $valor);
                $foto = "";
                if($perfil["foto"] == ""){
                  $foto = "";
                }else{
                  $foto = $perfil["foto"];
                }
              ?>
               <div class="row">
                 
                <img src="<?php echo $servidor.$perfil["foto"] ?>" id="imagen-perfil" class="mx-auto previsualizar">
                <input type="hidden" name="fotoActual" id="fotoActual" value="<?php echo $perfil["foto"] ?>">
               </div>
               <div class="row mt-3 text-center">
                 <label class="file-upload">
                    <input type="file" multiple="multiple" name="editarFoto" id="editarFoto" class="foto">
                       Elegir Foto
                 </label>
               </div>
               <div class="row mt-3 text-center">
                 <h4><?php echo $perfil["usuario"] ?></h4>
               </div>
           </div>
        </div>
      </div>
      </div>
      <div class="col-9">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="datosGenerales-tab" data-bs-toggle="tab" data-bs-target="#datosGenerales" type="button" role="tab" aria-controls="home" aria-selected="true">Datos Generales</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Pedidos</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="datosGenerales" role="tabpanel" aria-labelledby="datosGenerales-tab">
  <div class="container mt-3 ">
    <div class="row d-flex ">
      <div class="col-12">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-check"></i></span>
            <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="addon-wrapping" name="editarNombre" id="editarNombre" value="<?php echo $perfil["nombre"] ?>">
          </div>
      </div>
    </div>
    <div class="row d-flex">
      <div class="col-12">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-at"></i></span>
            <input type="text" class="form-control" placeholder="Correo" aria-label="Username" aria-describedby="addon-wrapping" name="editarCorreo" id="editarCorreo" value="<?php echo $perfil["correo"] ?>">
          </div>
      </div>
    </div>
    <div class="row d-flex ">
      <div class="col-6">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control" placeholder="Usuario" aria-label="Username" aria-describedby="addon-wrapping" name="editarUsuario" id="editarUsuario" value="<?php echo $perfil["usuario"] ?>" readonly>
          </div>
      </div>
      <div class="col-6">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-phone"></i></span>
            <input type="password" class="form-control" placeholder="Contraseña" aria-label="Username" name="editarPassword" id="editarPassword" aria-describedby="addon-wrapping" >
            <input type="hidden" id="passwordActualCliente" name="passwordActualCliente" value="<?php echo $perfil["password"] ?>">
          </div>
      </div>
    </div>
    <div class="row d-flex">
      <div class="col-12">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-phone"></i></span>
            <input type="text" class="form-control" placeholder="Telefono" aria-label="Username" aria-describedby="addon-wrapping" name="editarTelefono" id="editarTelefono" value="<?php echo $perfil["telefono"] ?>">
          </div>
      </div>
    </div>
    <div class="row d-flex">
      <div class="col-12">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-address-card"></i></span>
            <input type="text" class="form-control" placeholder="Direccion" aria-label="Username" aria-describedby="addon-wrapping" name="editarDireccion" id="editarDireccion" value="<?php echo $perfil["direccion"] ?>">
          </div>
      </div>
    </div>
    <div class="row d-flex">
      <div class="col-12">
          <button class="btn btn-warning text-white w-100 mt-auto">Guardar</button>
          <?php 
            $editarCliente = new ControladorPerfil();
            $editarCliente -> ctrEditarCliente();
          ?>
      </div>
    </div>
</div>
  </div>
  </form>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
     <!-- Main content -->
     <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-body">
      <div class="table-responsive">
        <table class="table  table-bordered table-striped   tablas " >
          <thead>
            <tr>
            <th style="width:10px">#</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Foto</th>
            <th>Perfil</th>
            <th>Estado</th>
            <th>Último login</th>
            <th>Acciones</th>

            </tr>
          </thead>
          <tbody>

  <tr>
    <td>Una</td>
    <td>dos</td>
    <td>'.$value["usuario"].'</td>';

    if($value["foto"] != ""){

      echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

    }else{

      echo '<td><img src="vistas/img/usuarios/default/1.jpg" class="img-thumbnail" width="40px"></td>';

    }

    echo '<td>'.$value["perfil"].'</td>';

    if($value["estado"] != 0){

      echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

    }else{

      echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

    }             

    echo '<td>'.$value["ultimo_login"].'</td>
    <td>

      <div class="btn-group">
          
        <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuarios"><i class="fas fa-pen"></i></button>

        <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

      </div>  

    </td>

  </tr>
}


?> 
          </tbody>
        </table>
      </div>
  </div>

</div>
<!-- /.card -->

</section>
<!-- /.content -->
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