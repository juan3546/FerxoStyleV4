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

	static public function mdlinsert($datos){
        $cn =  Conexion::conectar();

        try {
            $cn->beginTransaction();
            $stmt = $cn->prepare("INSERT INTO pedidos(id, codigo, idCliente, idUsuario, fechaPedido, total, metodopago, estado)VALUES
				(NULL,  NULL,  NULL)");

            $stmt -> bindParam(":nombre", $combinacion, PDO::PARAM_STR);
            
			$stmt->execute();
			$idPedido = $cn->lastInsertId();
            for ($i=0; $i < count($datos) ; $i++) { 
                $stmtColor =  $cn->prepare("INSERT INTO pedidosDesglose(id, idPedido, idProducto, nombre, foto, colores, tallas, precio, cantidad)VALUES
                (NULL, :idPedido, :idProducto, :producto, :foto, NULL, :talla, :precio )");
    
                $stmtColor -> bindParam(":idPedido", $idPedido, PDO::PARAM_STR);
				$stmtColor -> bindParam(":idProducto",$datos[$i]["idProducto"], PDO::PARAM_STR);
                $stmtColor -> bindParam(":nombre", $datos[$i]["producto"], PDO::PARAM_STR);
				$stmtColor -> bindParam(":foto", $datos[$i]["imagen"], PDO::PARAM_STR);
				$stmtColor -> bindParam(":talla", $datos[$i]["talla"], PDO::PARAM_STR);
				if($datos[$i]["oferta"] != ""){
					$stmtColor -> bindParam(":precio", $datos[$i]["oferta"], PDO::PARAM_STR);
				}else{	
					$stmtColor -> bindParam(":precio", $datos[$i]["precio"], PDO::PARAM_STR);
				}	
				
				$stmtColor -> bindParam(":cantidad", $datos[$i]["cantidad"], PDO::PARAM_STR);
                $stmtColor->execute();
            }



            if($cn->commit()){
				return "ok";
			}

        } catch (\Exception $ex) {
            $cn->rollBack();
        }
    }

}