<section class="login">
  <div class="contenedor">
      <!-- login -->
        <div class="user singinBx">
            <div class="imgBx"><img src="vistas/img/plantilla/login.jpg" class="img-login"></div>
            <div class="formBx">
                <form method="post">
                    <h2>Iniciar sesión</h2>
                    <input type="text" placeholder="Usuario" name="ingUsuario">
                    <input type="password" placeholder="Contraseña" autocomplete="on" name="ingPassword">
                    <input type="submit" value="Entrar">
                    <p class="signup">¿No tienes cuenta? <a href="#" onclick="toggleForm();" >Crear Cuenta</a></p>
                    <?php
                        $login = new ControladorClientes();
                        $login -> ctrIngresoClientes();
                    ?>
                </form>
            </div>
        </div>
        <!-- registro -->
        <div class="user singupBx">
            
            <div class="formBx">
                <form method="post">
                    <h2>Registro</h2>
                    <input type="text" placeholder="Nombre" name="nombreCliente">
                    <input type="text" placeholder="Usuario" name="usuarioCliente">
                    <input type="text" placeholder="Correo" name="correoCliente">
                    <input type="password" placeholder="Crear Contraseña" autocomplete="on" name="passwordCliente" id="passwordCliente">
                    <input type="password" placeholder="Confirmar contraseña" autocomplete="on" name="confirmarPasswor" id="confirmarPasswor" >
                    <input type="submit" id="btnEntrar" value="Crear" disabled>
                    <p class="signup">¿tienes cuenta? <a href="#" onclick="toggleForm();" >Iniciar sesión</a></p>
                    <?php
                        $login = new ControladorClientes();
                        $login -> ctrCrearClientes();
                    ?>
                </form>
            </div>
            <div class="imgBx"><img src="vistas/img/plantilla/hombres.jpg" class="img-login"></div>
        </div>

    </div>  
</section>
