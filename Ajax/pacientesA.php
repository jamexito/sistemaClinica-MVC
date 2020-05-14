<?php 

require_once "../Controladores/pacientesC.php";
require_once "../Modelos/pacientesM.php";

class PacientesA
{
	public $idP;
	
	//VER LOS PACIENTES
	public function EPacienteA(){

		$columna = "id";
		$valor = $this->idP;

		$resultado = PacientesC::VerPacientesC($columna, $valor);

		echo json_encode($resultado);
		
	}

	//NO REPETIR LOS USUARIOS
	public $Norepetir;

	public function NoRepetirUsuarioA(){

		$columna = "usuario";
		$valor = $this->Norepetir;

		$resultado = PacientesC::VerPacientesC($columna, $valor);

		echo json_encode($resultado);

	}
}

//EDITAR LOS PACIENTES
if (isset($_POST["idP"])) {
	
	$editarP = new PacientesA();

	$editarP ->idP = $_POST["idP"];

	$editarP -> EPacienteA();

}

//NO REPETIR LOS USUARIOS DE LOS PACIENTES
if(isset($_POST["Norepetir"])){

	$noRepetirU = new PacientesA();
	$noRepetirU -> Norepetir = $_POST["Norepetir"];
	$noRepetirU -> NoRepetirUsuarioA();

}