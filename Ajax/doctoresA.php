<?php 

require_once "../Controladores/doctoresC.php";
require_once "../Modelos/doctoresM.php";

class DoctoresA{

	public $idD;
	
	public function EDoctorA()
	{
		
		$columna = "id";
		$valor = $this->idD;

		$resultado = DoctoresC::DoctorC($columna, $valor);

		echo json_encode($resultado);

	}
}

if (isset($_POST["idD"])) {
	
	$eD = new DoctoresA();
	$eD -> idD = $_POST["idD"];
	$eD -> EDoctorA();


}