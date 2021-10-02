<?php
class ControladorPedidos{

    /* mostrar los pedidos */

    public static function ctrMostrarPedidos($item, $valor){

        $respuesta = ModeloPedidos::MdlMostrarPedidos($item, $valor);
	
		return $respuesta;
    }

    /*=============================================
	MOSTRAR PEDIDOS
	=============================================*/
	static public function ctrMostrarPedido($item, $valor){

		$tabla = "pedidosDesglose";

		$respuesta =  ModeloPedidos::MdlMostrarPedido($tabla, $item, $valor);
	
		return $respuesta;
	}


	static public function ctrInsertarPedido($datos, $usuario){

		$respuesta =  ModeloPedidos::mdlinsert($datos, $usuario);
	
		return $respuesta;
		
	}
}