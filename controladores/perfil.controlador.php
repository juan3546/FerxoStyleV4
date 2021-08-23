<?php

class ControladorPerfil{
    /*=============================================
	MOSTRAR PERFIL 
	=============================================*/

	static public function ctrMostrarPerfil($item, $valor){


		$tabla = "clientes";

		$respuesta = ModeloPerfil::mdlMostrarPerfil($tabla, $item, $valor);


		return $respuesta;
	}

    	/*=============================================
	ACTUALIZAR DE CLIENTES
	=============================================*/

	static public function ctrEditarCliente(){
        $servidor =  Ruta::ctrRutaServidor();
		$proyecto =  Ruta::ctrRutaProyecto();
		if(isset($_POST["editarUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarUsuario"])){

			   	/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL CLIENTE
					=============================================*/

					$directorio = $servidor."vistas/img/clientes/".$_POST["editarUsuario"];

				    /*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/
                    $abspath = $_SERVER['DOCUMENT_ROOT'];
                    $fotoActual = $abspath.$proyecto.$_POST["fotoActual"];
                    
					if(!empty($_POST["fotoActual"])){

						unlink($fotoActual);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFoto"]["type"] == "image/jpg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/clientes/".$_POST["editarUsuario"]."/".$aleatorio.".png";
                        $rutaServidor =  $abspath.$proyecto."vistas/img/clientes/".$_POST["editarUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaServidor);

					}

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/clientes/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";
                        $rutaServidor =  $abspath.$proyecto."vistas/img/clientes/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                      

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaServidor);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/clientes/".$_POST["editarUsuario"]."/".$aleatorio.".png";
                        $rutaServidor =  $abspath.$proyecto."vistas/img/clientes/".$_POST["editarUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaServidor);

					}



				}

				$tabla = "clientes";

				if($_POST["editarPassword"] != ""){
					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){
						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					}else{
                        
						echo'<script>

						Swal.fire({
								  icon: "error",
								  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
									if (result.value) {
	
									window.location = "perfil";
	
									}
								})
	
						  </script>';
                          
					}
					
				}else{
					$encriptar = $_POST["passwordActualCliente"];
				}

		

				$datos = array("nombre" => $_POST["editarNombre"],
                               "correo" => $_POST["editarCorreo"],
                               "telefono" => $_POST["editarTelefono"],
                               "direccion" => $_POST["editarDireccion"],
					           "usuario" => $_POST["editarUsuario"],
					           "password" => $encriptar,
					           "foto"=>$ruta);
				
				$respuesta = ModeloPerfil::mdlEditarCliente($tabla, $datos);

				
			
				if($respuesta == "ok"){
                    
					echo '<script>

					Swal.fire({

						icon: "success",
						title: "¡El Cliente ha sido editado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "perfil";

						}

					});
				

					</script>';
                    
                    

				}	


			}else{
                /*
				echo '<script>

				Swal.fire({

						icon: "error",
						title: "¡El Cliente no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "perfil";

						}

					});
				

				</script>';
                */

			}


		}


	}
}