<?php

require_once "../controladores/configuracion.controlador.php";
require_once "../modelos/configuracion.modelo.php";

class AjaxConfig{
    // Mostrar ConfigRedes
    public function ajaxMostarConfigRedes(){
        $item = "id";
		$valor = "1";

		$respuesta = ControladorConfiguracion::ctrMostrarConfigRedes($item, $valor);

		echo json_encode($respuesta);
    }
}

if(isset($_POST["MostrarConfigRedes"])){
    $ajaxConfig = new AjaxConfig();
    $ajaxConfig -> ajaxMostarConfigRedes();
    
    
}