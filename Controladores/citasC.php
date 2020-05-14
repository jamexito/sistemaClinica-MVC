<?php 

class CitasC
{
	
	//PEDIR CITA PACIENTE
	public function EnviarCitaC(){

		if (isset($_POST["idD"])) {
			
			$tablaDB = "citas";

			$idD = substr($_GET["url"],7);

			$datosC = array("idD"=>$_POST["idD"], "idP"=>$_POST["idP"], "idC"=>$_POST["idC"], "nyaC"=>$_POST["nyaC"], "documentoC"=>$_POST["documentoC"], "fyhIC"=>$_POST["fyhIC"], "fyhFC"=>$_POST["fyhFC"]);

			$resultado = CitasM::EnviarCitaM($tablaDB, $datosC);

			if ($resultado == true) {
				
				echo '<script>

						window.location = "Doctor/"'.$idD.';

					</script>';

			}

		}

	}

	//VER CITAS
	public function VerCitasC(){

		$tablaDB = "citas";

		$resultado = CitasM::VerCitasM($tablaDB);

		return $resultado;

	}

	//PEDIR CITAS DOCTOR
	public function PedirCitaDoctorC(){

		if (isset($_POST["idD"])) {
			
			$tablaDB = "citas";

			$idD = $_POST["idD"];

			$datosC = array("idD"=>$_POST["idD"], "idC"=>$_POST["idC"], "nombreP"=>$_POST["nombreP"], "documentoP"=>$_POST["documentoP"], "fyhIC"=>$_POST["fyhIC"], "fyhFC"=>$_POST["fyhFC"]);

			$resultado = CitasM::PedirCitaDoctorM($tablaDB, $datosC);

			if ($resultado == true) {
				
				echo '<script>

				window.location = "Citas/"'.$idD.';

				</script>';

			}

		}

	}



}