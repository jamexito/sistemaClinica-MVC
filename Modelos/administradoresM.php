<?php 


require_once 'conexionDB.php';


class AdministradoresM extends ConexionDB
{
	
	//Ingreso de administradores
	static public function IngresarAdministradorM($tablaDB, $datosC)
	{
		
		$pdo = ConexionDB::conectarDB()->prepare("SELECT id, usuario, clave, nombre, apellido, foto, id, rol FROM $tablaDB WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario",$datosC["usuario"], PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}

	//VER PERFIL ADMINISTRADOR
	static public function VerPerfilAdministradorM($tablaDB, $idA){

		$pdo = ConexionDB::conectarDB()->prepare("SELECT id, usuario, clave, nombre, apellido, foto, id FROM $tablaDB WHERE id = :id");

		$pdo -> bindParam(":id",$idA, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}

	//Acturalizar perfil administrador
	static public function ActualizarPerfilAdministradorM($tablaBD, $datosC){

		$pdo = ConexionDB::conectarDB()->prepare("UPDATE $tablaBD SET usuario = :usuario, clave = :clave, nombre = :nombre, apellido = :apellido, foto = :foto WHERE id = :id");

		$pdo -> bindParam(":id",$datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":usuario",$datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave",$datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre",$datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido",$datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto",$datosC["foto"], PDO::PARAM_STR);

		if ($pdo -> execute()) {
			
			return true;

		}else {

			return false;

		}

		$pdo -> close();

		$pdo = null;

	}
}