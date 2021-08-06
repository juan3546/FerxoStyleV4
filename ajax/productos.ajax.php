<?php
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos{
    // Mostrar todos los Productos
    public function ajaxMostarProductos(){
        $item = null;
		$valor = null;

		$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

		echo json_encode($respuesta);
    }
}

if(isset($_POST["obtenerProductos"])){
    $ajaxProduct = new AjaxProductos();
    $ajaxProduct -> ajaxMostarProductos();
}