<?php 

require_once "conexionDB.php";

/**
 * 
 */
class InicioM extends ConexionDB
{
	
	static public function MostrarInicioM($tablaDB, $id){

		$pdo = ConexionDB::conectarDB()->prepare("SELECT id, intro, horaE, horaS, direccion, telefono, correo, logo, favicon FROM $tablaDB WHERE id = :id");

		$pdo -> bindParam(":id",$id,PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}

	static public function ActualizarInicioM($tablaDB, $datosC){

		$pdo = ConexionDB::conectarDB()->prepare("UPDATE $tablaDB SET intro = :intro, direccion = :direccion, horaE = :horaE, horaS = :horaS, telefono = :telefono, correo = :correo, logo = :logo, favicon = :favicon WHERE id = :id");

		$pdo -> bindParam(":id",$datosC["id"],PDO::PARAM_INT);
		$pdo -> bindParam(":intro",$datosC["intro"],PDO::PARAM_INT);
		$pdo -> bindParam(":direccion",$datosC["direccion"],PDO::PARAM_INT);
		$pdo -> bindParam(":horaE",$datosC["horaE"],PDO::PARAM_INT);
		$pdo -> bindParam(":horaS",$datosC["horaS"],PDO::PARAM_INT);
		$pdo -> bindParam(":telefono",$datosC["telefono"],PDO::PARAM_INT);
		$pdo -> bindParam(":correo",$datosC["correo"],PDO::PARAM_INT);
		$pdo -> bindParam(":logo",$datosC["logo"],PDO::PARAM_INT);
		$pdo -> bindParam(":favicon",$datosC["favicon"],PDO::PARAM_INT);

		if ($pdo -> execute()) {
			
			return true;

		}

		$pdo -> close();

		$pdo = null;

	}

}