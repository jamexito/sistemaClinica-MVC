<?php 

require_once "conexionDB.php";

class CitasM extends ConexionDB{

	//PEDIR CITA PACIENTE
	static public function EnviarCitaM($tablaDB, $datosC){

		$pdo = ConexionDB::conectarDB()->prepare("INSERT INTO $tablaDB(id_doctor,id_consultorio,id_paciente,nom_apellido,documento,inicio,fin) VALUES (:id_doctor,:id_consultorio,:id_paciente,:nom_apellido,:documento,:inicio,:fin)");

		$pdo -> bindParam(":id_doctor",$datosC["idD"],PDO::PARAM_INT);
		$pdo -> bindParam(":id_consultorio",$datosC["idC"],PDO::PARAM_INT);
		$pdo -> bindParam(":id_paciente",$datosC["idP"],PDO::PARAM_INT);
		$pdo -> bindParam(":nom_apellido",$datosC["nyaC"],PDO::PARAM_STR);
		$pdo -> bindParam(":documento",$datosC["documentoC"],PDO::PARAM_STR);
		$pdo -> bindParam(":inicio",$datosC["fyhIC"],PDO::PARAM_STR);
		$pdo -> bindParam(":fin",$datosC["fyhFC"],PDO::PARAM_STR);

		if ($pdo -> execute()) {
			
			return true;

		}

		$pdo -> close();

		$pdo = null;


	}

	//VER CITAS
	static public function VerCitasM($tablaDB){

		$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaDB");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();

		$pdo = null;

	}

	//PEDIR CITA DOCTOR
	static public function PedirCitaDoctorM($tablaDB, $datosC){

		$pdo = ConexionDB::conectarDB()->prepare("INSERT INTO $tablaDB (id_doctor,id_consultorio,nom_apellido,documento,inicio,fin) VALUES (:id_doctor,:id_consultorio,:nom_apellido,:documento,:inicio,:fin)");

		$pdo -> bindParam(":id_doctor",$datosC["idD"],PDO::PARAM_INT);
		$pdo -> bindParam(":id_consultorio",$datosC["idC"],PDO::PARAM_INT);
		$pdo -> bindParam(":nom_apellido",$datosC["nombreP"],PDO::PARAM_STR);
		$pdo -> bindParam(":documento",$datosC["documentoP"],PDO::PARAM_STR);
		$pdo -> bindParam(":inicio",$datosC["fyhIC"],PDO::PARAM_STR);
		$pdo -> bindParam(":fin",$datosC["fyhFC"],PDO::PARAM_STR);

		if ($pdo -> execute()) {
			
			return true;

		}

		$pdo -> close();

		$pdo = null;

	}

}



