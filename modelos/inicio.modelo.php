<?php
require_once "conexion.php";

class ModeloProductos{

    /*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarProductos($tabla, $item, $valor){
	
		if($item != null){

		//	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '$valor'");
 
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


    /*=============================================
	MOSTRAR PRODUCTOS POR NUEVOS Y OFERTAS
	=============================================*/

	static public function mdlObtenerProductos($tabla, $item, $valor){
	
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
 
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			$totalProductos = $stmt -> rowCount();



			return $totalProductos;

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			
			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

    /*=============================================
	MOSTRAR PRODUCTOS POR NUEVOS Y OFERTAS CON LIMIT
	=============================================*/

	static public function mdlMostrarProductosLim($tabla, $item, $valor, $inicio, $fin){
	


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item LIMIT :inicio, :fin");

 
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":inicio", $inicio, PDO::PARAM_INT);
		$stmt -> bindParam(":fin", $fin, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		

		$stmt -> close();

		$stmt = null;

	}

}