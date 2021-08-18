<?php

require_once "conexion.php";

class ModeloComentarios{

    /*=============================================
	REGISTRO DE COMENTARIOS
	=============================================*/
    static public function mdlIngresarcomentarios($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id, idProducto, idCliente, comentario, fecha) VALUES ( NULL, :idProducto, :idCliente, :comentario, now())");
		
		$idCliente = 1;
		$stmt->bindParam(":idProducto", $datos["producto"], PDO::PARAM_STR);
		$stmt->bindParam(":idCliente", $idCliente /* $_SESSION["id"] */, PDO::PARAM_STR);
		$stmt->bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
    }

    /*=============================================
	MOSTRAR COMENTARIOS 
	=============================================*/

	static public function mdlMostrarComentarios($tabla, $item, $valor){
	


			$stmt = Conexion::conectar()->prepare("SELECT c.comentario, c.fecha, cl.usuario, cl.foto FROM $tabla c JOIN clientes cl ON c.idCliente = cl.id WHERE $item = :$item ORDER BY c.id DESC LIMIT 5");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();



		$stmt -> close();

		$stmt = null;

	}

    /*=============================================
	MOSTRAR EL ULTIMO COMENTARIOS 
	=============================================*/

	static public function mdlMostrarComentario($tabla, $item, $valor){
	


        $stmt = Conexion::conectar()->prepare("SELECT c.comentario, c.fecha, cl.usuario, cl.foto FROM $tabla c JOIN clientes cl ON c.idCliente = cl.id WHERE $item = :$item ORDER BY c.id ");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();



    $stmt -> close();

    $stmt = null;

}
}   