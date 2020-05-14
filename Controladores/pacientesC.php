<?php 

/**
 *PacienteC()
 *CrearPacienteC()
 */
class PacientesC
{
	
	//CREAR PACIENTES
	public function CrearPacienteC(){

		if(isset($_POST["rolP"])){

			$tablaBD = "pacientes";

			$datosC = array("apellido"=>$_POST["apellido"], "nombre"=>$_POST["nombre"], "documento"=>$_POST["documento"], "usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"], "rol"=>$_POST["rolP"]);

			$resultado = PacientesM::CrearPacienteM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "pacientes";

				</script>';

			}

		}

	}

	//VER PACIENTES
	static public function VerPacientesC($columna, $valor){

		$tablaBD = "pacientes";

		$resultado = PacientesM::VerPacientesM($tablaBD, $columna, $valor);

		return $resultado;

	}

	//BORRAR PACIENTE
	public function BorrarPacienteC(){

		if (isset($_GET["idP"])) {
			
			$tablaDB = "pacientes";

			$id = $_GET["idP"];

			if ($_GET["imgP"] != "") {
				
				unlink($_GET["imgP"]);

			}

			$resultado = PacientesM::BorrarPacienteM($tablaDB, $id);

			if($resultado == true){

				echo '<script>

					window.location = "pacientes";

				</script>';

			}

		}

	}

	//ACTUALIZAR PACIENTE
	public function ActualizarPacienteC(){

		if (isset($_POST["idP"])) {
			
				$tablaDB = "pacientes";

				$datosC = array("id"=>$_POST["idP"], "apellido"=>$_POST["apellidoE"], "nombre"=>$_POST["nombreE"], "documento"=>$_POST["documentoE"], "usuario"=>$_POST["usuarioE"], "clave"=>$_POST["claveE"]);

				$resultado = PacientesM::ActualizarPacienteM($tablaDB, $datosC);

				if($resultado == true){

				echo '<script>

					window.location = "pacientes";

				</script>';

			}

		}

	}


	//INGRESAR PACIENTE
	public  function IngresarPacienteC(){

		if (isset($_POST["usuario-Ing"])) {
			
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])) {
				
				$tablaDB = "pacientes";

				$datosC = array("usuario"=>$_POST["usuario-Ing"],"clave"=>$_POST["clave-Ing"]);

				$resultado = PacientesM::IngresarPacienteM($tablaDB, $datosC);

				if ($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]) {
					
					$_SESSION["Ingresar"] = true;

					$_SESSION["id"] = $resultado["id"];
					$_SESSION["apellido"] = $resultado["apellido"];
					$_SESSION["nombre"] = $resultado["nombre"];
					$_SESSION["documento"] = $resultado["documento"];
					$_SESSION["foto"] = $resultado["foto"];
					$_SESSION["usuario"] = $resultado["usuario"];
					$_SESSION["clave"] = $resultado["clave"];
					$_SESSION["rol"] = $resultado["rol"];

					echo '<script>
						
						window.location = "inicio";
					
					</script>';

				}

			}

		}

	}

	//VER PERFIL DE ÑPS PACIENTES
	public function VerPerfilPacienteC(){

		$tablaDB = "pacientes";

		$id = $_SESSION["id"];

		$resultado = PacientesM::VerPerfilPacienteM($tablaDB, $id);

		echo '<tr>
				
				<td>'.$resultado["usuario"].'</td>
				<td>'.$resultado["clave"].'</td>
				<td>'.$resultado["nombre"].'</td>
				<td>'.$resultado["apellido"].'</td>
				<td>'.$resultado["documento"].'</td>';

					if ($resultado["foto"] != "") {
						
						echo '<td><img src="http://localhost:8082/clinica/'.$resultado["foto"].'" class="img-responsive" width="40px"></td>';

					}else {

						echo '<td><img src="http://localhost:8082/clinica/Vistas/img/defecto.png" class="img-responsive" width="40px"></td>';

					}			

					echo'<td>
					
						<a href="http://localhost:8082/clinica/perfil-P/'.$resultado["id"].'">

							<button class="btn btn-success"><i class="fa fa-pencil"></i></button>

						</a>

					</td>

			</tr>';

	}

	//EDITAR PERFIL PACIENTE
	public function EditarPerfilPacienteC(){

		$tablaDB = "pacientes";

		$id = $_SESSION["id"];

		$resultado = PacientesM::VerPerfilPacienteM($tablaDB, $id);

		echo '<form method="post" enctype="multipart/form-data">
					
					<div class="row">
						
						<div class="col-md-6 col-xs-12">

							<input type="hidden" class="input-lg" name="idPerfil" value="'.$resultado["id"].'">
							
							<h2>Nombre:</h2>
							<input type="text" class="input-lg" name="nombrePerfil" value="'.$resultado["nombre"].'">

							<h2>Apellido:</h2>
							<input type="text" class="input-lg" name="apellidoPerfil" value="'.$resultado["apellido"].'">

							<h2>Usuario:</h2>
							<input type="text" class="input-lg" name="usuarioPerfil" value="'.$resultado["usuario"].'">

							<h2>Documento:</h2>
							<input type="text" class="input-lg" name="documentoPerfil" value="'.$resultado["documento"].'">

							<h2>Contraseña:</h2>
							<input type="password" class="input-lg" name="clavePerfil">

						</div>

						<div class="col-md-6 col-xs-12">

							<br><br>

							<input type="file" name="imgPerfil">

							<br>';

							if ($resultado["foto"] != "") {
								
								echo '<img src="http://localhost:8082/clinica/'.$resultado["foto"].'" width="200px" class="img-responsive">';

							}else{

								echo '<img src="http://localhost:8082/clinica/Vistas/img/defecto.png" width="200px" class="img-responsive">';

							}							

							echo '<input type="hidden" name="imgActual" value="'.$resultado["foto"].'">

							<br><br>

							<button type="submit" class="btn btn-success">Guardar Cambios</button>

						</div>

					</div>
				
				</form>';

	}

	//ACTUALIZAR PERFIL DE LOS PACIENTES
	public function ActualizarPerfilPacienteC(){

		if (isset($_POST["idPerfil"])) {
			
			$rutaImg = $_POST["imgActual"];

				if (isset($_FILES["imgPerfil"]["tmp_name"]) && !empty($_FILES["imgPerfil"]["tmp_name"])) {
					
					if (!empty($_POST["imgActual"])) {
						
						unlink($_POST["imgActual"]);

					}

					if ($_FILES["imgPerfil"]["type"] == "image/jpeg") {
						
						$nombre = mt_rand(10,99);

						$rutaImg = "Vistas/img/Pacientes/Paciente".$nombre.".jpg";

						$foto = imagecreatefromjpeg($_FILES["imgPerfil"]["tmp_name"]);

						imagejpeg($foto, $rutaImg);

					}

					if ($_FILES["imgPerfil"]["type"] == "image/png") {
						
						$nombre = mt_rand(10,99);

						$rutaImg = "Vistas/img/Pacientes/Paciente".$nombre.".png";

						$foto = imagecreatefrompng($_FILES["imgPerfil"]["tmp_name"]);

						imagepng($foto, $rutaImg);

					}

				}

				$tablaDB = "pacientes";

				$datosC = array("id"=>$_POST["idPerfil"],"nombre"=>$_POST["nombrePerfil"],"apellido"=>$_POST["apellidoPerfil"],"documento"=>$_POST["documentoPerfil"],"usuario"=>$_POST["usuarioPerfil"],"clave"=>$_POST["clavePerfil"],"foto"=>$rutaImg);

				$resultado = PacientesM::ActualizarPerfilPacienteM($tablaDB, $datosC);

				if ($resultado == true) {
					
					echo '<script>
						
						window.location = "http://localhost:8082/clinica/perfil-P/'.$_SESSION["id"].'";
					
					</script>';

				}

		}

	}
}