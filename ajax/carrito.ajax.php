<?php

require_once "../controladores/pedidos.controlador.php";
require_once "../modelos/pedidos.modelo.php";

class AjaxPedido{

 
    public $usu;
    public function generarPedido($datos){

        $respuesta = ControladorPedidos::ctrInsertarPedido($datos, $this->usu);

        echo json_encode($respuesta);
    
    }

}

if(isset($_POST["jsonProductos"])){
    $pedido = new AjaxPedido();
    $datos = json_decode($_POST["jsonProductos"], true);
    $pedido -> usu = $_POST["usuario"];
    $pedido -> generarPedido($datos);

}