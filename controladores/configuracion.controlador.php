<?php
class ControladorConfiguracion{

    /*=============================================
	MOSTRAR CONFIGURACIÓN DE REDES SOCIALES
	=============================================*/

	static public function ctrMostrarConfigRedes($item, $valor){

		$tabla = "configRedes";

		$respuesta = ModeloConfiguracion::MdlMostrarConfig($tabla, $item, $valor);
	
		return $respuesta;
	}

	/*=============================================
	MOSTRAR CONFIGURACIÓN DE PÁGINA DE INICIO 
	=============================================*/

	static public function ctrMostrarConfigInicio($item, $valor){

		$tabla = "configInicio";

		$respuesta = ModeloConfiguracion::MdlMostrarConfig($tabla, $item, $valor);
	
		return $respuesta;
	}

	/*=============================================
	ACTUALIZAR CONFIGURACIÓN DE REDES SOCIALES
	=============================================*/

	static public function ctrEditarConfigRedes(){

		if(isset($_POST["nuevoConfigWhatsapp"])){

			if(preg_match('/^[a-zA-Z0-9@.]+$/', $_POST["nuevoConfigEmail"])){



				$tabla = "configRedes";


				$datos = array("whatsapp" => $_POST["nuevoConfigWhatsapp"],
                               "email" => $_POST["nuevoConfigEmail"],
                               "instagram" => $_POST["nuevoConfigInstagram"],
					           "idUsuario" => $_SESSION["id"],
							   "id" => $_POST["nuevoConfigId"]);
				
				$respuesta = ModeloConfiguracion::mdlEditarConfigRedes($tabla, $datos);

				
			
				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						icon: "success",
						title: "¡El Cliente ha sido editado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "configRedes";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

				Swal.fire({

						icon: "error",
						title: "¡la Configuración no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "configRedes";

						}

					});
				

				</script>';

			}


		}


	}
}