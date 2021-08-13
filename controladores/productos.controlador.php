<?php

class ControladorProductos{
    /*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductos($item, $valor){


		$tabla = "productos";

		$respuesta = ModeloProducto::mdlMostrarProductos($tabla, $item, $valor);


		return $respuesta;
	}

	/*=============================================
	MOSTRAR PRODUCTOS POR NOMBRE
	=============================================*/

	static public function ctrMostrarProductosXNombre($item, $valor, $item2, $valor2){


		$tabla = "productos";


		$respuesta = ModeloProducto::mdlMostrarProductosXNombre($tabla, $item, $valor, $item2, $valor2);


		return $respuesta;
	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarProductosCategorias($item, $valor){


		$tabla = "categorias";
		$tabla2 = "productos";

		$respuesta = ModeloProducto::mdlMostrarProductosCategorias($tabla, $tabla2, $item, $valor);
		return $respuesta;
	}

	/*=============================================
	MOSTRAR PRODUCTOS POR GENERO Y CATEGORIAS 
	=============================================*/

	static public function ctrMostrarProductosCategoriasProductos($item, $valor, $item2, $valor2){


		$tabla = "categorias";
		$tabla2 = "productos";

		$respuesta = ModeloProducto::mdlMostrarProductosCategoriasGenero($tabla, $tabla2, $item, $valor, $item2, $valor2);
		return $respuesta;
	}


    /*=============================================
	MOSTRAR TOTAL DE PRODUCTOS
	=============================================*/

	static public function ctrObtenerTotalProductos($item, $valor, $item2, $valor2){

		$tabla = "productos";

		$respuesta = ModeloProducto::mdlObtenerTotalProductos($tabla, $item, $valor, $item2, $valor2);


		return $respuesta;
	}

	/*=============================================
	MOSTRAR TOTAL DE PRODUCTOS
	=============================================*/

	static public function ctrObtenerTotalArticulos($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloProducto::mdlObtenerTotalArticulos($tabla, $item, $valor);


		return $respuesta;
	}

	/*=============================================
	MOSTRAR TOTAL DE PRODUCTOS por categoria
	=============================================*/

	static public function ctrObtenerTotalProductosConCategorias($item, $valor, $item2, $valor2){

		$tabla1 = "productos";
		$tabla2 = "categorias";

		$respuesta = ModeloProducto::mdlMostrarProductosCategoria($tabla1, $tabla2, $item, $valor, $item2, $valor2);
		
		return $respuesta;
	}


    /*=============================================
	MOSTRAR PRODUCTOS POR NUEVOS Y OFERTAS CON LIMIT
	=============================================*/

	static public function ctrMostrarProductosLim($item, $valor, $inicio, $fin, $item2, $valor2){

		$tabla = "productos";

		$respuesta = ModeloProducto::mdlMostrarProductosLim($tabla, $item, $valor, $inicio, $fin, $item2, $valor2);
		
		return $respuesta;
	}

	/*=============================================
	MOSTRAR PRODUCTOS POR NUEVOS Y OFERTAS CON LIMIT
	=============================================*/

	static public function ctrMostrarArticulosLim($item, $valor, $inicio, $fin){

		$tabla = "productos";

		$respuesta = ModeloProducto::mdlMostrarArticulosLim($tabla, $item, $valor, $inicio, $fin);
		
		return $respuesta;
	}

	/*=============================================
	MOSTRAR PRODUCTOS POR Categoria CON LIMIT
	=============================================*/

	static public function ctrMostrarProductosCategoriaLim($item, $valor, $inicio, $fin, $item2, $valor2){

		$tabla1 = "productos";
		$tabla2 = "categorias";

		$respuesta = ModeloProducto::mdlMostrarProductosCategoriasLim($tabla1, $tabla2, $item, $valor, $inicio, $fin, $item2, $valor2);
		
		return $respuesta;
	}

	/*=============================================
	MOSTRAR PRODUCTOS POR CATEGORIA Y GENERO CON LIMIT
	=============================================*/


	static public function ctrMostrarProductosCategoriaGeneroLim($item, $valor, $item2, $valor2, $inicio, $fin){

		$tabla1 = "productos";
		$tabla2 = "categorias";

		$respuesta = ModeloProducto::mdlMostrarProductosCategoriasGeneroLim($tabla1, $tabla2, $item, $valor, $item2, $valor2, $inicio, $fin);
		
		return $respuesta;
	}

}