<?php
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/tallas.controlador.php";
require_once "../modelos/tallas.modelo.php";


class AjaxProductos{
    public $articulo;
    // Mostrar todos los Productos Por Nombre de Hombres
    public function ajaxMostarProductosXHombre(){
        $item = "nombre";
		$valor = $this->articulo;

        
		$item2 = "genero";
		$valor2 = "Hombre";

		$respuesta = ControladorProductos::ctrMostrarProductosXNombre($item, $valor, $item2, $valor2);

		echo json_encode($respuesta);
    }

    // Mostrar todos los Productos Por Nombre de Mujer
    public function ajaxMostarProductosXMujer(){
        $item = "nombre";
		$valor = $this->articulo;

        
		$item2 = "genero";
		$valor2 = "Mujer";

		$respuesta = ControladorProductos::ctrMostrarProductosXNombre($item, $valor, $item2, $valor2);

		echo json_encode($respuesta);
    }

        // Mostrar todos los Productos Por Nombre de Niño
        public function ajaxMostarProductosXInfante(){
            $item = "nombre";
            $valor = $this->articulo;
    
            
            $item2 = "genero";
            $valor2 = "Niños";
    
            $respuesta = ControladorProductos::ctrMostrarProductosXNombre($item, $valor, $item2, $valor2);
    
            echo json_encode($respuesta);
        }

        // REVISAR SI HAN INICIADO SESION 
        public function ajaxRevisarSession(){

            

            $respuesta = ControladorProductos::ctrRevisarSession();
    
            echo json_encode($respuesta);
        }

    // Mostrar Tallas
    public function ajaxMostarTallas(){
        $item = "idProducto";
		$valor = $this->articulo;


		$respuesta = ControladorTallas::ctrMostrarTallas($item, $valor);

		echo json_encode($respuesta);
    }
    

}

if(isset($_POST["MostrarProductoHombre"])){
    $ajaxProduct = new AjaxProductos();
    $ajaxProduct -> articulo = $_POST["producto"];
    $ajaxProduct -> ajaxMostarProductosXHombre();
}

if(isset($_POST["MostrarProductoMujer"])){
    $ajaxProduct = new AjaxProductos();
    $ajaxProduct -> articulo = $_POST["producto"];
    $ajaxProduct -> ajaxMostarProductosXMujer();
}

if(isset($_POST["MostrarProductoInfante"])){
    $ajaxProduct = new AjaxProductos();
    $ajaxProduct -> articulo = $_POST["producto"];
    $ajaxProduct -> ajaxMostarProductosXInfante();
}

if(isset($_POST["revisarSession"])){
    $ajaxProduct = new AjaxProductos();
    $ajaxProduct -> ajaxRevisarSession();
}

if(isset($_POST["tallas"])){
    $ajaxProduct = new AjaxProductos();
    $ajaxProduct -> articulo = $_POST["articulo"];
    $ajaxProduct -> ajaxMostarTallas();
}