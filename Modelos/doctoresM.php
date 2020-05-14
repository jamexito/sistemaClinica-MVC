<?php 

/**
 * DoctoresM
 *CrearDoctorM($tablaDB, $datosC)
 */

require_once 'conexionDB.php';

class DoctoresM extends ConexionDB
{
	
	//CREAR DOCTORES
	static public function CrearDoctorM($tablaDB, $datosC)
	{
		
		$pdo = ConexionDB::conectarDB()->prepare("INSERT INTO $tablaDB(apellido, nombre, sexo, id_consultorio, usuario, clave, rol) VALUES(:apellido, :nombre, :sexo, :id_consultorio, :usuario, :clave, :rol)");

		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_consultorio", $datosC["id_consultorio"], PDO::PARAM_INT);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}

		$pdo -> close();

		$pdo = null;

	}

	//VER DOCTORES
	static public function VerDoctorM($tablaBD, $columna, $valor){

		if ($columna != null) {
			
			$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}

		$pdo -> close();

		$pdo = null;

		

	}

	//EDITAR DOCTORES
	static public function DoctorM($tablaBD, $columna, $valor){

		if ($columna != null) {
			
			$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}

		$pdo -> close();

		$pdo = null;	

	}


	//ACTUALIZAR DOCTORES
	static public function ActualizarDoctorM($tablaData, $datosC){	
			
		$pdo = ConexionDB::conectarDB()->prepare("UPDATE $tablaData SET apellido = :apellido, nombre =:nombre, sexo = :sexo, usuario = :usuario, clave = :clave WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}

		$pdo -> close();

		$pdo = null;	

	}

	//ELIMINAR DOCTOR
	static public function BorrarDoctorM($tablaBD, $id){

		$pdo = ConexionDB::conectarDB()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id",$id,PDO::PARAM_INT);

		if($pdo -> execute()){

			return true;

		}

		$pdo -> close();

		$pdo = null;

	}


	//INGRESO DOCTORES
	static  public function IngresarDoctorM($tablaDB, $datosC){

		$pdo = ConexionDB::conectarDB()->prepare("SELECT usuario, clave, apellido, nombre, sexo, foto, rol, id FROM $tablaDB WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

		$pdo ->execute();

		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}

	//VER PERFIL DOCTORES
	static public function VerPerfilDoctorM($tablaBD, $id){

		$pdo = ConexionDB::conectarDB()->prepare("SELECT usuario, clave, apellido, nombre, sexo, foto, rol, id, horarioE, horarioS, id_consultorio FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		$pdo ->execute();

		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}


	//ACTUALIZAR PERFIL DEL DOCTOR
	static public function ActualizarPerfilDoctorM($tablaBD, $datosC){

		$pdo = ConexionDB::conectarDB()->prepare("UPDATE $tablaBD SET id_consultorio = :id_consultorio, nombre = :nombre, apellido = :apellido, horarioE = :horarioE, horarioS = :horarioS, usuario = :usuario, clave = :clave, foto = :foto WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"],PDO::PARAM_INT);
		$pdo -> bindParam(":id_consultorio", $datosC["consultorio"],PDO::PARAM_INT);
		$pdo -> bindParam(":apellido", $datosC["apellido"],PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"],PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"],PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"],PDO::PARAM_STR);
		$pdo -> bindParam(":horarioE", $datosC["horarioE"],PDO::PARAM_STR);
		$pdo -> bindParam(":horarioS", $datosC["horarioS"],PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"],PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}

		$pdo -> close();

		$pdo = null;

	}
}