<?php


require_once "conexion.php";

class ModeloConfiguracion{
	/*=============================================
	MOSTRAR CONFIGURACION
	=============================================*/

	static public function MdlMostrarConfig($tabla, $item, $valor){
	
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			
			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

    /*=============================================
	EDITAR CONFIGREDES
	=============================================*/

	static public function mdlEditarConfigRedes($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET whatsapp = :whatsapp, email = :email, instagram = :instagram, idUsuario = :idUsuario WHERE id = :id");

		$stmt->bindParam(":whatsapp", $datos["whatsapp"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":instagram", $datos["instagram"], PDO::PARAM_STR);
        $stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
}