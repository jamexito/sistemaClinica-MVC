<?php 


class ConsultoriosC
{
	
	//Crear consultorios
	public function CrearConsultorioC()
	{
		
		if (isset($_POST["consultoriosN"])) {
			
			$tablaDB = "consultorios";

			$consultorio = array("nombre"=>$_POST["consultoriosN"]);

			$resultado = ConsultoriosM::CrearConsultorioM($tablaDB, $consultorio);

			if ($resultado == true) {
				
				echo '<script>

					window.location = "http://localhost:8082/clinica/consultorios";
					
				</script>';

			}

		}

	}

	//ver consultorios
	static public function VerConsultoriosC($columna, $valor)
	{
		
		$tablaDB = "consultorios";

		$resultado = ConsultoriosM::VerConsultorioM($tablaDB, $columna, $valor);

		return $resultado;

	}

	//borrar consultorio
	public function BorrarConsultorioC(){

		if (substr($_GET["url"], 13)) {
			
			$tablaDB = "consultorios";

			$id = substr($_GET["url"], 13);

			$resultado = ConsultoriosM::BorrarConsultorioM($tablaDB, $id);

			if ($resultado == true) {
				
				echo '<script>

					window.location = "http://localhost:8082/clinica/consultorios";
					
				</script>';

			}

		}

	}

	//EDITAR CONSULTORIO
	public function EditarConsultoriosC(){

		$tablaDB = "consultorios";

		$id = substr($_GET["url"], 4);

		$resultado = ConsultoriosM::EditarConsultoriosM($tablaDB, $id);

		echo '<div class="form-group">
						
				<input type="hidden" class="form-control input-lg" name="idE" value="'.$resultado["id"].'">
				<h2>Nombre:</h2>
				<input type="text" class="form-control input-lg" name="consultorioE" value="'.$resultado["nombre"].'">

				<br>

				<button class="btn btn-success" type="submit">Guardar Cambio</button>

			</div>';

	}

	//ACTUALIZAR CONSULTORIO
	public function ActualizarConsultorioC(){

		if (isset($_POST["consultorioE"])) {
			
			$tablaDB = "consultorios";

			$datosC = array("id"=>$_POST["idE"],"nombre"=>$_POST["consultorioE"]);

			$resultado = ConsultoriosM::ActualizarConsultorisoM($tablaDB, $datosC);

			if ($resultado == true) {
				
				echo '<script>

					window.location = "http://localhost:8082/clinica/consultorios";
					
				</script>';

			}

		}

	}



}