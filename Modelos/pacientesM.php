<?php 

require_once "conexionDB.php";

class PacientesM extends ConexionDB
{
	
	//CREAR PACIENTES
	static public function CrearPacienteM($tablaBD, $datosC){

		$pdo = ConexionDB::conectarDB()->prepare("INSERT INTO $tablaBD(apellido, nombre, documento, usuario, clave, rol) VALUES (:apellido, :nombre, :documento, :usuario, :clave, :rol)");

		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	//VER PACIENTES
	static public function VerPacientesM($tablaBD, $columna, $valor){

		if ($columna == null) {
			
			$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD ORDER BY apellido ASC");

			$pdo -> execute();

			return  $pdo -> fetchAll();

		}else{

			$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY apellido ASC");

			$pdo -> bindParam(":".$columna,$valor,PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}
		$pdo -> close();

		$pdo = null;

	}

	//BORRAR PACIENTES
	static public function BorrarPacienteM($tablaDB, $id){

		$pdo = ConexionDB::conectarDB()->prepare("DELETE FROM $tablaDB WHERE id = :id");

		$pdo -> bindParam(":id", $id,PDO::PARAM_INT);

		if($pdo -> execute()){

			return true;

		}

		$pdo -> close();

		$pdo = null;

	}

	//ACTUALIZAR PACIENTES
	static public  function ActualizarPacienteM($tablaDB, $datosC){

		$pdo = ConexionDB::conectarDB()->prepare("UPDATE $tablaDB SET apellido = :apellido, nombre = :nombre, documento = :documento, usuario = :usuario, clave = :clave WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"],PDO::PARAM_INT);
		$pdo -> bindParam(":apellido", $datosC["apellido"],PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"],PDO::PARAM_STR);
		$pdo -> bindParam(":documento", $datosC["documento"],PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"],PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"],PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}

		$pdo -> close();

		$pdo = null;

	}

	//INGRESO DEL USUARIO PACIENTE
	static  public function IngresarPacienteM($tablaDB, $datosC){

		$pdo = ConexionDB::conectarDB()->prepare("SELECT usuario, clave, apellido, nombre, documento, foto, rol, id FROM $tablaDB WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

		$pdo ->execute();

		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}

	//VER PERFIL PACIENTE
	static public function VerPerfilPacienteM($tablaDB, $id){

		$pdo = ConexionDB::conectarDB()->prepare("SELECT usuario, clave, apellido, nombre, documento, foto, rol, id FROM $tablaDB WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		$pdo ->execute();

		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}

	//ACTUALIZAR PERFIL PACIENTE
	static public function ActualizarPerfilPacienteM($tablaDB, $datosC){

		$pdo = ConexionDB::conectarDB()->prepare("UPDATE $tablaDB SET nombre = :nombre, apellido = :apellido, documento = :documento, usuario = :usuario, clave = :clave, foto = :foto WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"],PDO::PARAM_INT);
		$pdo -> bindParam(":nombre", $datosC["nombre"],PDO::PARAM_STR);
		$pdo -> bindParam(":apellido", $datosC["apellido"],PDO::PARAM_STR);
		$pdo -> bindParam(":documento", $datosC["documento"],PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"],PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"],PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"],PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}

		$pdo -> close();

		$pdo = null;

	}
}