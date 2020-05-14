<?php 


class AdministradoresC
{
	
	//Ingreso Administrador
	public function IngresarAdministradorC()
	{
		
		if (isset($_POST["usuario-Ing"])) {
			
			if (preg_match('/^[a-zA-Z0-9]+$/',$_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/',$_POST["clave-Ing"])) {
				
				$tablaDB = "administradores";

				$datosC = array("usuario"=>$_POST["usuario-Ing"],"clave"=>$_POST["clave-Ing"]);

				$resultado = AdministradoresM::IngresarAdministradorM($tablaDB, $datosC);

				if ($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]) {
					
					$_SESSION["Ingresar"] = true;

					$_SESSION["id"] = $resultado["id"];
					$_SESSION["usuario"] = $resultado["usuario"];
					$_SESSION["clave"] = $resultado["clave"];
					$_SESSION["nombre"] = $resultado["nombre"];
					$_SESSION["apellido"] = $resultado["apellido"];
					$_SESSION["foto"] = $resultado["foto"];
					$_SESSION["rol"] = $resultado["rol"];

					echo '<script>

					     window.location = "inicio";

					</script>';

				}else{

					echo '<br><div class="alert alert-danger">Error al Ingresar</div>';

				}

			}

		}

	}

	//VER PERFIL ADMINISTRADOR
	public function VerPerfilAdministradorC(){

		$tablaDB = "administradores";

		$idA = $_SESSION["id"];

		$resultado = AdministradoresM::VerPerfilAdministradorM($tablaDB, $idA);
				
		echo '<tr>
							
				<td>'.$resultado["usuario"].'</td>

				<td>'.$resultado["clave"].'</td>

				<td>'.$resultado["nombre"].'</td>

				<td>'.$resultado["apellido"].'</td>';

					if ($resultado["foto"] != "") {
						
						echo '<td><img src="http://localhost:8082/clinica/'.$resultado["foto"].'" class="img-responsive" width="40px"></td>';

					}else {

						echo '<td><img src="http://localhost:8082/clinica/Vistas/img/defecto.png" class="img-responsive" width="40px"></td>';

					}			

			echo'<td>
					
					<a href="http://localhost:8082/clinica/perfil-A/'.$resultado["id"].'">
						
						<button class="btn btn-success"><i class="fa fa-pencil"></i></button>

					</a>

				</td>

			</tr>';
		
	}

	//editar perfil administrador
	public function EditarPerfilAdministradorC(){

		$tablaBD = "administradores";

		$id = $_SESSION["id"];

		$resultado = AdministradoresM::VerPerfilAdministradorM($tablaBD, $id);

		echo '<form method="post" enctype="multipart/form-data">
				
				<div class="row">
					
					<div class="col-md-6 col-xs-12">

						<input type="hidden" class="input-lg" name="idA" value="'.$resultado["id"].'">
						
						<h2>Nombre:</h2>
						<input type="text" class="input-lg" name="nombreA" value="'.$resultado["nombre"].'">

						<h2>Apellido:</h2>
						<input type="text" class="input-lg" name="apellidoA" value="'.$resultado["apellido"].'">

						<h2>Usuario:</h2>
						<input type="text" class="input-lg" name="usuarioA" value="'.$resultado["usuario"].'">

						<h2>Contraseña:</h2>
						<input type="password" class="input-lg" name="claveA">

					</div>

					<div class="col-md-6 col-xs-12">

						<br><br>

						<input type="file" name="imgA">
						<br>';

						if ($resultado["foto"] == "") {
							
							echo '<img src="http://localhost:8082/clinica/Vistas/img/defecto.png" width="200px;">';

						}else {

							echo '<img src="http://localhost:8082/clinica/'.$resultado["foto"].'" width="200px;">';
							
						}

						
						echo'<input type="hidden" name="imgActual" value="'.$resultado["foto"].'">

						<br><br>

						<button type="submit" class="btn btn-success">Guardar Cambios</button>

					</div>

				</div>
			
			</form>';

	}

	//Actualizar Perfil Administrador
		public function ActualizarPerfilAdministradorC(){

			if (isset($_POST["idA"])) {
				
				$rutaImg = $_POST["imgActual"];

				if (isset($_FILES["imgA"]["tmp_name"]) && !empty($_FILES["imgA"]["tmp_name"])) {
					
					if (!empty($_POST["imgActual"])) {
						
						unlink($_POST["imgActual"]);

					}

					if ($_FILES["imgA"]["type"] == "image/jpeg") {
						
						$nombre = mt_rand(10,99);

						$rutaImg = "Vistas/img/Administradores/Admin-".$nombre.".jpg";

						$foto = imagecreatefromjpeg($_FILES["imgA"]["tmp_name"]);

						imagejpeg($foto, $rutaImg);

					}

					if ($_FILES["imgA"]["type"] == "image/png") {
						
						$nombre = mt_rand(10,99);

						$rutaImg = "Vistas/img/Administradores/Admin-".$nombre.".png";

						$foto = imagecreatefrompng($_FILES["imgA"]["tmp_name"]);

						imagepng($foto, $rutaImg);

					}

				}

				$tablaBD = "administradores";

				$datosC = array("id"=>$_POST["idA"], "usuario"=>$_POST["usuarioA"], "nombre"=>$_POST["nombreA"], "apellido"=>$_POST["apellidoA"], "clave"=>$_POST["claveA"], "foto"=>$rutaImg);

				$resultado = AdministradoresM::ActualizarPerfilAdministradorM($tablaBD, $datosC);

				if ($resultado == true) {
					
					echo '<script>
						
						window.location = "http://localhost:8082/clinica/perfil-Administrador";

					</script>';

				}

			}

		}
}