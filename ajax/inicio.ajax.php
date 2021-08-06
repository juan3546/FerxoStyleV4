<?php

require_once "../controladores/inicio.controlador.php";
require_once "../modelos/inicio.modelo.php";

class AjaxInicio{

    // Mostrar Productos nuevos
    public function ajaxMostarProductosNuevos(){
        $item = "estado";
		$valor = "Nuevo";

		$respuesta = ControladorInicio::ctrMostrarProductos($item, $valor);

		echo json_encode($respuesta);
    }

}

if(isset($_POST["Mostrarproductos"])){
    $ajaxInicio = new AjaxInicio();
    if($_POST["tipo"] == "nuevos"){
        $ajaxInicio -> ajaxMostarProductosNuevos();
    }
    
}