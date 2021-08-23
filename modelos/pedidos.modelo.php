<?php
require_once "conexion.php";
class ModeloPedidos{
    /*=============================================
	MOSTRAR PEDIDOS
	=============================================*/

	static public function MdlMostrarPedidos($item, $valor){
	

		$stmt = Conexion::conectar()->prepare("SELECT p.id, p.idCliente, p.fechaPedido, p.estado, p.total, c.usuario, c.nombre FROM pedidos p JOIN clientes c ON p.idCliente = c.id WHERE p.$item = :$item ORDER BY p.id DESC");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> execute();

		return $stmt -> fetchAll();


		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR PEDIDOS
	=============================================*/

	static public function MdlMostrarPedido($tabla, $item, $valor){
	
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			
			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

}