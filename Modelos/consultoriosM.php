<?php 

/**
 * ConsultoriosM
 *CrearConsultorioM($tablaDB, $consultorio)
 */
require_once "conexionDB.php";

class ConsultoriosM extends ConexionDB
{
	
	//CREAR CONSULTORIOS
	static public function CrearConsultorioM($tablaDB, $consultorio)
	{
		
		$pdo = ConexionDB::conectarDB()->prepare("INSERT INTO $tablaDB(nombre) VALUES(:nombre)");

		$pdo -> bindParam(":nombre",$consultorio["nombre"], PDO::PARAM_STR);

		if ($pdo -> execute()) {
			
			return true;

		}else {

			return false;

		}

		$pdo -> close();

		$pdo = null;

	}

	//VER CONSULTORIOS
	static public function VerConsultorioM($tablaDB, $columna, $valor){

		if ($columna == null) {
			
			$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaDB");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaDB WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}

	}

	//BORRAR CONSULTORIO
	static public function BorrarConsultorioM($tablaDB, $id){

		$pdo = ConexionDB::conectarDB()->prepare("DELETE FROM $tablaDB WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if ($pdo -> execute()) {
			
			return true;

		}else {

			return false;

		}

		$pdo -> close();

		$pdo = null;

	}

	//EDITAR CONSULTORIO 
	static public function EditarConsultoriosM($tablaDB, $id){

		$pdo = conexionDB::conectarDB()->prepare("SELECT id, nombre FROM $tablaDB WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		$pdo -> execute();

		return  $pdo -> fetch();

		$pdo ->close();

		$pdo = null;

	}

	//ACTUALIZAR CONSULTORIO
	static public function ActualizarConsultorisoM($tablaDB, $datosC){

		$pdo = conexionDB::conectarDB()->prepare("UPDATE $tablaDB SET nombre = :nombre WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);

		if ($pdo -> execute()) {
			
			return true;

		}else {

			return false;

		}

		$pdo -> close();

		$pdo = null;

	}


}