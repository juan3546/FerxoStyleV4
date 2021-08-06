<section class="bg-ligth margintop">
    <div class="row g-0 d-flex margintop">
        <div class="col-lg-7  margintop"> <!-- d-none d-lg-block -->
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-12" id="add-photo-container">
                        <div class="add-new-photo first" id="add-photo">
                            <span><i class="icon-camera"></i></span>
                        </div>
                        <input type="file" multiple id="add-new-photo" name="images[]">
                    </div>
                </div>
        </div>
        <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100 mt-0 m-auto  margen">
            <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 mb-auto">
                <!-- img src="vistas/img/plantilla/logo.png" class="img-fluid" -->
            </div>
            <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
                <h1 class="font-weight-blod mb-4">Envia tus comentarios</h1>
                
                    <div class="mb-4">
                        <label for="nombrePersonalizados" class="form-label font-weight-blod">Nombre*</label>
                        <input type="text" class="form-control bg-ligth-x  " name="nombrePersonalizados" id="nombrePersonalizados" aria-describedby="emailHelp" placeholder="Nombre">
                    </div>
                    <div class="mb-4">
                        <label for="correoPersonalizados" class="form-label font-weight-blod">Correo*</label>
                        <input type="email" class="form-control bg-ligth-x  " id="correoPersonalizados" name="correoPersonalizados" placeholder="Correo">
                    </div>
                    <div class="mb-4">
                        <label for="telefonoPersonalizados" class="form-label font-weight-blod">Telefono</label>
                        <input type="text" class="form-control bg-ligth-x  " id="telefonoPersonalizados" name="telefonoPersonalizados" placeholder="Telefono">
                    </div>

                    <div class="mb-4">
                        <label for="cantidadPersonalizados" class="form-label font-weight-blod">Cantidad*</label>
                        <input type="number" class="form-control bg-ligth-x  " id="cantidadPersonalizados" name="cantidadPersonalizados" placeholder="Cantidad">
                    </div>
                    <div class="mb-4">
                        <label for="detallePersonalizados" class="form-label font-weight-blod">Detalla jersey*</label>
                        <textarea class="form-control bg-ligth-x  " id="detallePersonalizados" name="detallePersonalizados" placeholder="Detalla jersey"></textarea>
                    </div>

                    <button type="submit" class="btn btn-warning text-white w-100 mt-auto">Enviar</button>
                    <?php
                        $enviarCorreo = new ControladorCorreo();
                        $enviarCorreo -> ctrEnviarCotización();
                    ?>
                </form>

                <p class="font-weight-blod text-center text-muted mt-4">O envía un texto por nuestras redes sociales</p>
                <div class="d-flex justify-content-around w-100">
                    <button type="submit" class="btn btn-outline-primary flex-grow-1 ms-2 btnWhatsApp"><i class="fab fa-whatsapp lead me-1"></i>WhatsApp</button>
                    <button type="submit" class="btn btn-outline-primary flex-grow-1 ms-2 btnInstagram"><i class="fab fa-instagram lead me-1"></i>Instagram</button>
                </div>
            </div>
        </div>
    </div>
</section>

<br>
<br>
<br>