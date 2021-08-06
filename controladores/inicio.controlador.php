<?php

class ControladorInicio{

    /*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductos($item, $valor){

        $ruta = array(
            "ruta" => $_SERVER['DOCUMENT_ROOT']."/ferxostyle/FerxoStyle"
        );
		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

    
       // array_push($respuesta, $ruta);
	
		return $respuesta;
	}

	/*=============================================
	MOSTRAR PRODUCTOS POR NUEVOS Y OFERTAS
	=============================================*/

	static public function ctrObtenerProductos($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlObtenerProductos($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR PRODUCTOS POR NUEVOS Y OFERTAS CON LIMIT
	=============================================*/

	static public function ctrMostrarProductosLim($item, $valor, $inicio, $fin){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductosLim($tabla, $item, $valor, $inicio, $fin);
			
		return $respuesta;
	}


}