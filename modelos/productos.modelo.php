<?php
require_once "conexion.php";

class ModeloProducto{
        /*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarProductos($tabla, $item, $valor){
	
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        //    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '$valor'");
 
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
	MOSTRAR PRODUCTOS POR CATEGORIAS
	=============================================*/

	static public function mdlMostrarProductosCategorias($tabla, $tabla2, $item, $valor){
	

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla c JOIN $tabla2 p ON  c.id=p.idCategoria  WHERE c.$item = :$item");
        //    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '$valor'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();


		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR PRODUCTOS POR CATEGORIAS Y GENERO
	=============================================*/

	static public function mdlMostrarProductosCategoriasGenero($tabla, $tabla2, $item, $valor, $item2, $valor2){
	

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla c JOIN $tabla2 p ON  c.id=p.idCategoria  WHERE c.$item = :$item AND p.$item2 = :$item2");
	//    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '$valor'");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();


	$stmt -> close();

	$stmt = null;

}


    /*=============================================
	MOSTRAR TOTAL DE PRODUCTOS
	=============================================*/

	static public function mdlObtenerTotalProductos($tabla, $item, $valor, $item2, $valor2){
	
        if($item != null){

		    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2");

 
	    	$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		    $stmt -> execute();

		    $totalProductos = $stmt -> rowCount();


		    return $totalProductos;
        }else{
		    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

 
	    	$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		    $stmt -> execute();

		    $totalProductos = $stmt -> rowCount();



		    return $totalProductos;         
        }

		
    }

    /*=============================================
	MOSTRAR TOTAL DE PRODUCTOS
	=============================================*/

	static public function mdlObtenerTotalArticulos($tabla, $item, $valor){
	


		    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

 
	    	$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		    $stmt -> execute();

		    $totalProductos = $stmt -> rowCount();


		    return $totalProductos;


		
    }

    /*=============================================
	MOSTRAR PRODUCTOS POR NUEVOS Y OFERTAS CON LIMIT
	=============================================*/

	static public function mdlMostrarProductosLim($tabla, $item, $valor, $inicio, $fin, $item2, $valor2){
	

        if($item != null){
		    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2 LIMIT :inicio, :fin");

		
		    $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		    $stmt -> bindParam(":inicio", $inicio, PDO::PARAM_INT);
		    $stmt -> bindParam(":fin", $fin, PDO::PARAM_INT);

		    $stmt -> execute();

		    return $stmt -> fetchAll();

		

		    $stmt -> close();

		    $stmt = null;
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla LIMIT :inicio, :fin");

            $stmt -> bindParam(":inicio", $inicio, PDO::PARAM_INT);
		    $stmt -> bindParam(":fin", $fin, PDO::PARAM_INT);

		    $stmt -> execute();

		    return $stmt -> fetchAll();

		

		    $stmt -> close();

		    $stmt = null;
        }

	}

	    /*=============================================
	MOSTRAR PRODUCTOS POR NUEVOS Y OFERTAS CON LIMIT
	=============================================*/

	static public function mdlMostrarArticulosLim($tabla, $item, $valor, $inicio, $fin){
	


		    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item LIMIT :inicio, :fin");

		
		    $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		    $stmt -> bindParam(":inicio", $inicio, PDO::PARAM_INT);
		    $stmt -> bindParam(":fin", $fin, PDO::PARAM_INT);

		    $stmt -> execute();

		    return $stmt -> fetchAll();

		

		    $stmt -> close();

		    $stmt = null;


	}

	/*=============================================
	MOSTRAR PRODUCTOS POR CATEGORIAS CON LIMIT
	=============================================*/

	static public function mdlMostrarProductosCategoriasLim($tabla, $tabla2, $item, $valor, $inicio, $fin, $item2, $valor2){
	

		    $stmt = Conexion::conectar()->prepare("SELECT p.* FROM $tabla p JOIN $tabla2 c ON p.idCategoria = c.id  WHERE c.$item = :$item AND p.$item2 = :$item2 LIMIT :inicio, :fin");

			
		    $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		    $stmt -> bindParam(":inicio", $inicio, PDO::PARAM_INT);
		    $stmt -> bindParam(":fin", $fin, PDO::PARAM_INT);

		    $stmt -> execute();

		    return $stmt -> fetchAll();

		

		    $stmt -> close();

		    $stmt = null;


	}

	/*=============================================
	MOSTRAR total PRODUCTOS POR CATEGORIAS 
	=============================================*/

	static public function mdlMostrarProductosCategoria($tabla, $tabla2, $item, $valor, $item2, $valor2){
	

		$stmt = Conexion::conectar()->prepare("SELECT p.* FROM $tabla p JOIN $tabla2 c ON p.idCategoria = c.id  WHERE c.$item = :$item AND p.$item2 = :$item2");

		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);


		$stmt -> execute();



		$totalProductos = $stmt -> rowCount();

		return $totalProductos;

	

		$stmt -> close();

		$stmt = null;


}

	/*=============================================
	MOSTRAR PRODUCTOS POR CATEGORIAS Y GENERO CON LIMIT
	=============================================*/

	static public function mdlMostrarProductosCategoriasGeneroLim($tabla1, $tabla2, $item, $valor, $item2, $valor2, $inicio, $fin){
	

		$stmt = Conexion::conectar()->prepare("SELECT p.* FROM $tabla1 p JOIN $tabla2 c ON p.idCategoria = c.id  WHERE (p.$item = :$item AND c.$item2 = :$item2) LIMIT :inicio, :fin");

		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":inicio", $inicio, PDO::PARAM_INT);
		$stmt -> bindParam(":fin", $fin, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

	

		$stmt -> close();

		$stmt = null;


}

}
