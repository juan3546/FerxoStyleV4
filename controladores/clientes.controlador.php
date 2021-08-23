<?php

class ControladorClientes{
	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/
	static public function ctrMostrarClientes($item, $valor){

		$tabla = "clientes";

		$respuesta =  ModeloClientes::MdlMostrarClientes($tabla, $item, $valor);
	
		return $respuesta;
	}
    /*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoClientes(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

			   	$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "clientes";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloClientes::MdlMostrarClientes($tabla, $item, $valor);
			
				if( (isset($respuesta["usuario"]) && isset($respuesta["password"])) && ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar)){



						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["usuario"] = $respuesta["usuario"];
						$_SESSION["foto"] = $respuesta["foto"];
					

							echo '<script>

								window.location = "inicio";

							</script>';
                            
                            

								
								

				}else{

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

				}

			}	

		}

	}

        /*=============================================
	REGISTRO DE CLIENTES
	=============================================*/

	static public function ctrCrearClientes(){

		if(isset($_POST["usuarioCliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["nombreCliente"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ*.]+$/', $_POST["usuarioCliente"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordCliente"]) && 
               preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})+$/', $_POST["correoCliente"])){

			   	/*=============================================
				VALIDAR IMAGEN
				=============================================*/
                $telefono = "";
                $direccion = "";
                if(isset($_POST["TelefonoCliente"]) && isset($_POST["DireccionCliente"])){
                    $telefono = $_POST["TelefonoCliente"];
                    $direccion = $_POST["DireccionCliente"];
                }

				$ruta = "";

				if(isset($_FILES["nuevaFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/clientes/".$_POST["nuevoUsuario"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/clientes/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/clientes/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "clientes";

				$encriptar = crypt($_POST["passwordCliente"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array("nombre" => $_POST["nombreCliente"],
                               "correo" => $_POST["correoCliente"],
                               "telefono" => $telefono,
                               "direccion" => $direccion,
					           "usuario" => $_POST["usuarioCliente"],
					           "password" => $encriptar,
					           "foto"=>$ruta);
				
				$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

				
			
				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						icon: "success",
						title: "¡Se ha registrado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "login";

						}

					});
				

					</script>';


				}	


			}else{
                echo '<script>
                $(".contenedor ").addClass("activar");
                </script>';
                echo '<br><div class="alert alert-danger">Los datos solicitados no pueden ir vacíos o llevar caracteres especiales.</div>';

			}


		}


	}

}