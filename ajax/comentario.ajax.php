<?php

require_once "../controladores/comentario.controlador.php";
require_once "../modelos/comentario.modelo.php";

class AjaxComentario{
    public $comentario;
    public $producto;
    public $cliente;
    // insertar comentarios
    public function ajaxinsert(){

        $datos = array(
            "producto" => $this -> producto,
            "comentario" => $this -> comentario,
            "cliente" => $this -> cliente
        );
		$respuesta = ControladorComentario::ctrInsertar($datos);

		echo json_encode($respuesta);
    }

}

if(isset($_POST["insertarComentario"])){
        $ajaxComentario = new AjaxComentario();
        $ajaxComentario -> comentario = $_POST["comentario"];
        $ajaxComentario -> producto = $_POST["producto"];
        $ajaxComentario -> cliente = $_POST["cliente"];
        $ajaxComentario -> ajaxinsert();
}