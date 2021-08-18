<?php

class ControladorComentario
{
    /* Insertar comentarios */
    public function ctrInsertar($datos){
        //if(isset($_SESSION["iniciarSesion"]) &&  $_SESSION["iniciarSesion"] == "ok"){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. \r\n]+$/', $datos["comentario"])){
                $tabla = "comentarios";
                $respuesta = ModeloComentarios::mdlIngresarcomentarios($tabla, $datos);

                if($respuesta == "ok"){
                    $item = "idProducto";
                    $valor = $datos["producto"];
                    $comentario = ModeloComentarios::mdlMostrarComentario($tabla, $item, $valor);
                    return $comentario;
                }else{
                    return "error";
                }

            }
            /*
        }else{
            return "ErrorSesion";
        }
        */
        
    }

    /*=============================================
	MOSTRAR COMENTARIOS
	=============================================*/

	static public function ctrMostrarComentarios($item, $valor){

		$tabla = "comentarios";

		$respuesta = ModeloComentarios::mdlMostrarComentarios($tabla, $item, $valor);

		return $respuesta;
	}

    /*=============================================
	MOSTRAR ULTIMO COMENTARIOS
	=============================================*/

	static public function ctrMostrarComentario($item, $valor){

		$tabla = "comentarios";

		$respuesta = ModeloComentarios::mdlMostrarComentario($tabla, $item, $valor);

		return $respuesta;
	}
}