<?php

require_once "../controladores/pedidos.controlador.php";
require_once "../modelos/pedidos.modelo.php";

class AjaxPedido{

 

    public function generarPedido($datos){

        $respuesta = ControladorPedidos::ctrInsertarPedido($datos);

        echo json_encode($respuesta);
    
    }

}

if(isset($_POST["jsonProductos"])){
    $pedido = new AjaxPedido();
    $datos = json_decode($_POST["jsonProductos"], true);
    $pedido -> generarPedido($datos);

}