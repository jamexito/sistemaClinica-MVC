<?php 

/**
 * DoctoresC()
 *CrearDoctorC()
 */
class DoctoresC
{
	
	//Crear Doctores
	public function CrearDoctorC(){

		if(isset($_POST["rolD"])){

			$tablaBD = "doctores";

			$datosC = array("rol"=>$_POST["rolD"], "apellido"=>$_POST["apellido"], "nombre"=>$_POST["nombre"], "sexo"=>$_POST["sexo"],  "id_consultorio"=>$_POST["consultorio"], "usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"]);

			$resultado = DoctoresM::CrearDoctorM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "doctores";
				</script>';

			}

		}

	}

	//VER DOCTORES
	static public function VerDoctoresC($columna, $valor){

		$tablaBD = "doctores";

		$resultado = DoctoresM::VerDoctorM($tablaBD, $columna, $valor);

		return $resultado;

	}

	//EDITAR DOCTORES
	static public function DoctorC($columna, $valor){

		$tablaBD = "doctores";

		$resultado = DoctoresM::DoctorM($tablaBD, $columna, $valor);

		return $resultado;

	}

	//ACTUALIZAR DOCTORES
	static public function ActualizarDoctorC(){

		if (isset($_POST["idD"])) {
			
			$tablaData = "doctores";

			$datosC = array("id"=>$_POST["idD"], "apellido"=>$_POST["apellidoE"], "nombre"=>$_POST["nombreE"], "sexo"=>$_POST["sexoE"], "usuario"=>$_POST["usuarioE"], "clave"=>$_POST["claveE"]);

			$resultadoo = DoctoresM::ActualizarDoctorM($tablaData, $datosC);

			if($resultadoo == true){

				echo '<script>

				window.location = "doctores";

				</script>';

			}

		}

	}

	//BORRAR DOCTORES
	public function BorrarDoctorC(){

		if (isset($_GET["idD"])) {
			
			$tablaBD = "doctores";

			$id = $_GET["idD"];

			if($_GET["imgD"] != "") {
				
				unlink($_GET["imgD"]);

			}

			$resultado = DoctoresM::BorrarDoctorM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

				window.location = "doctores";

				</script>';

			}

		}

	}

	//INGRESAR DOCTORES
	public function IngresarDoctorC(){

		if (isset($_POST["usuario-Ing"])) {
			
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])) {
				
				$tablaDB = "doctores";

				$datosC = array("usuario"=>$_POST["usuario-Ing"],"clave"=>$_POST["clave-Ing"]);

				$resultado = DoctoresM::IngresarDoctorM($tablaDB, $datosC);

				if ($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]) {
					
					$_SESSION["Ingresar"] = true;

					$_SESSION["id"] = $resultado["id"];
					$_SESSION["apellido"] = $resultado["apellido"];
					$_SESSION["nombre"] = $resultado["nombre"];
					$_SESSION["sexo"] = $resultado["sexo"];
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

	//VER PERFIL DOCTORES
	public function VerPerfilDoctorC(){

		$tablaBD = "doctores";

		$id = $_SESSION["id"];

		$resultado = DoctoresM::VerPerfilDoctorM($tablaBD, $id);

		echo '<tr>
				
				<td>'.$resultado["usuario"].'</td>
				<td>'.$resultado["clave"].'</td>
				<td>'.$resultado["nombre"].'</td>
				<td>'.$resultado["apellido"].'</td>';

					if ($resultado["foto"] != "") {
						
						echo '<td><img src="'.$resultado["foto"].'" width="40px"></td>';

					}else {

						echo '<td><img src="Vistas/img/defecto.png" width="40px"></td>';

					}	

			$columna = "id";
			$valor = $resultado["id_consultorio"];

			$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

			echo '<td>'.$consultorio["nombre"].'</td>';					

			echo'<td>
	
					Desde: '.$resultado["horarioE"].'
					<br>
					Hasta: '.$resultado["horarioS"].'

				</td>

				<td>
				
					<a href="http://localhost:8082/clinica/perfil-D/'.$resultado["id"].'">

						<button class="btn btn-success"><i class="fa fa-pencil"></i></button>

					</a>

				</td>

			</tr>';

	}

	//EDITAR PERFIL DEL DOCTOR
	public function EditarPerfilDoctorC(){

		$tablaBD = "doctores";

		$id = $_SESSION["id"];

		$resultado = DoctoresM::VerPerfilDoctorM($tablaBD, $id);

		echo '<form method="post" enctype="multipart/form-data">
					
				<div class="row">
					
					<div class="col-md-6 col-xs-12">

						<input type="hidden" class="input-lg" name="idD" value="'.$resultado["id"].'">
						
						<h2>Nombre:</h2>
						<input type="text" class="input-lg" name="nombrePerfil" value="'.$resultado["nombre"].'">

						<h2>Apellido:</h2>
						<input type="text" class="input-lg" name="apellidoPerfil" value="'.$resultado["apellido"].'">

						<h2>Usuario:</h2>
						<input type="text" class="input-lg" name="usuarioPerfil" value="'.$resultado["usuario"].'">

						<h2>Contraseña:</h2>
						<input type="password" class="input-lg" name="clavePerfil">';

						$columna = "id";
						$valor = $resultado["id_consultorio"];

						$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

					echo '<h2>Consultorio Actual: '.$consultorio["nombre"].'</h2>
						<h3>Cambiar Consultorio</h3>
						<select name="consultorioPerfil" class="input-lg">';									

						$columna = null;
						$valor = null;

						$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

						foreach ($consultorio as $key => $value) {
							
							echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

						}	
					echo'</select>															

						<div class="form-group">
							
							<h2>Horario:</h2>
							Desde: <input type="time" class="input-lg" name="hEPerfil" value="'.$resultado["id"].'">
							Hasta: <input type="time" class="input-lg" name="hSPerfil" value="'.$resultado["id"].'">
						</div>

					</div>

					<div class="col-md-6 col-xs-12">

						<br><br>

						<input type="file" name="imgPerfil"><br>';

							if($resultado["foto"] == ""){

								echo '<img src="http://localhost:8082/clinica/Vistas/img/defecto.png" class="img-responsive" width="200px">';

							}else{

								echo '<img src="http://localhost:8082/clinica/'.$resultado["foto"].'" class="img-responsive" width="200px">';

								
							}
							

							echo '<input type="hidden" name="imgActual" value="'.$resultado["foto"].'">

						<br><br>

						<button type="submit" class="btn btn-success btn-lg">Guardar Cambios</button>

					</div>

				</div>
			
			</form>';

	}

	//ACTUALIZAR PERFIL DE DOCTOR
	public function ActualizarPerfilDoctorC(){

		if (isset($_POST["idD"])) {
			
			$rutaImg = $_POST["imgActual"];

			if (isset($_FILES["imgPerfil"]["tmp_name"]) && !empty($_FILES["imgPerfil"]["tmp_name"])) {
				
				if (!empty($_POST["imgActual"])) {
					
					unlink($_POST["imgActual"]);

				}

				if ($_FILES["imgPerfil"]["type"] == "image/jpeg") {
					
					$nombre = mt_rand(10,99);

					$rutaImg = "Vistas/img/Doctores/Doc-".$nombre.".jpg";

					$foto = imagecreatefromjpeg($_FILES["imgPerfil"]["tmp_name"]);

					imagejpeg($foto, $rutaImg);

				}

				if ($_FILES["imgPerfil"]["type"] == "image/png") {
					
					$nombre = mt_rand(10,99);

					$rutaImg = "Vistas/img/Doctores/Doc-".$nombre.".png";

					$foto = imagecreatefrompng($_FILES["imgPerfil"]["tmp_name"]);

					imagepng($foto, $rutaImg);

				}

			}

			$tablaBD = "doctores";

			$datosC = array("id"=>$_POST["idD"], "nombre"=>$_POST["nombrePerfil"], "apellido"=>$_POST["apellidoPerfil"], "usuario"=>$_POST["usuarioPerfil"], "clave"=>$_POST["clavePerfil"], "consultorio"=>$_POST["consultorioPerfil"], "horarioE"=>$_POST["hEPerfil"], "horarioS"=>$_POST["hSPerfil"], "foto"=>$rutaImg);

			$resultado = DoctoresM::ActualizarPerfilDoctorM($tablaBD, $datosC);

			if ($resultado == true) {
				
				echo '<script>

				window.location = "http://localhost:8082/clinica/perfil-D/'.$resultado["id"].'";

				</script>';

			}

		}

	}

}