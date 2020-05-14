<?php

require_once 'conexionDB.php';

Class SecretariasM extends ConexionDB
{
	
	//Ingreso de secretaria
	static public function IngresarSecretariaM($tablaDB, $datosC)
	{
		
		$pdo = ConexionDB::conectarDB()->prepare("SELECT id, usuario, clave, nombre, apellido, foto, id, rol FROM $tablaDB WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario",$datosC["usuario"], PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}


	//ver perfil de secretarias
	static public function VerPerfilSecretariaM($tablaBD, $id)
	{
		
		$pdo = ConexionDB::conectarDB()->prepare("SELECT usuario, clave, nombre, apellido, foto, rol, id FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		
		$pdo = null;

	}


	//Acturalizar perfil secretaria
	static public function ActualizarPerfilSecretariaM($tablaBD, $datosC){

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

	//VER SECRETARIAS
	static public function VerSecretariaM($tablaBD){

		$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD ORDER BY apellido DESC");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();

		$pdo = null;		

	}

	//CREAR SECRETARIAS
	static public function CrearSecretariaM($tablaBD, $datosC)
	{
		
		$pdo = ConexionDB::conectarDB()->prepare("INSERT INTO $tablaBD(apellido, nombre, usuario, clave, rol) VALUES(:apellido, :nombre, :usuario, :clave, :rol)");

		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}else{

			return false;

		}

		$pdo -> close();
		
		$pdo = null;

	}

	//BORRAR SECRETARIA
	static public function BorrarSecretariaM($tablaBD, $id){

		$pdo = ConexionDB::conectarDB()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id",$id, PDO::PARAM_INT);

		if($pdo -> execute()){

			return true;

		}else{

			return false;

		}

		$pdo -> close();
		
		$pdo = null;


	}

}