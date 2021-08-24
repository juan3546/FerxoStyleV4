<?php

class ControladorTallas{
    /*=============================================
	MOSTRAR TALLAS
	=============================================*/

	static public function ctrMostrarTallas($item, $valor){


		$tabla = "tallas";

		$respuesta = ModeloTallas::mdlMostrarTallas($tabla, $item, $valor);


		return $respuesta;
	}
}