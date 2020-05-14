<?php 

if ($_SESSION["rol"] != "Secretaria" && $_SESSION["rol"] != "Doctor" && $_SESSION["rol"] != "Administrador") {
	
	echo '<script>

         window.location = "inicio";

	</script>';

	return;

}

?>

<div class="content-wrapper">
	
	<section class="content-header">
		
		<h1>Gestor de Pacientes</h1>

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-header">

				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearPaciente">Crear Paciente</button>

			</div>

			<div class="box-body">
				
				<table class="table table-bordered table-hover table-striped dt-responsive DT">
					
					<thead>
						
						<tr>
							
							<th>Nº</th>
							<th>Apellidos</th>
							<th>Nombres</th>
							<th>Documento</th>
							<th>Foto</th>
							<th>Usuario</th>
							<th>Contraseña</th>
							<th>Editar / Borrar</th>

						</tr>

					</thead>

					<tbody>

						<?php 

							$columna = null;
							$valor = null;

							$resultado = PacientesC::VerPacientesC($columna, $valor);

							foreach ($resultado as $key => $value) {
								
								echo '<tr>

										<td>'.($key+1).'</td>
										<td>'.$value["apellido"].'</td>
										<td>'.$value["nombre"].'</td>
										<td>'.$value["documento"].'</td>';

											if ($value["foto"] == "") {
												
												echo '<td><img src="Vistas/img/defecto.png" width="40px"></td>';

											}else{

												echo '<td><img src="'.$value["foto"].'" width="40px"></td>';

											}

										echo '<td>'.$value["usuario"].'</td>
										<td>'.$value["clave"].'</td>
										<td>
											
											<div class="btn-group">											
													
												<button class="btn btn-success EditarPaciente" idP="'.$value["id"].'" data-toggle="modal" data-target="#EditarPaciente"><i class="fa fa-pencil"></i> Editar</button>
													
												<button class="btn btn-danger EliminarPaciente" idP="'.$value["id"].'" imgP="'.$value["foto"].'"><i class="fa fa-times"></i> Borrar</button>

											</div>

										</td>							

									</tr>';

							}

						?>											

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>

<!-- CREAR PACEINTE -->
<div class="modal fade" rol="dialog" id="CrearPaciente">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="POST" role="form">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<input type="hidden" name="rolP" value="Paciente">

							<h2>Apellido:</h2>

							<input type="text" class="form-control input-lg" name="apellido" required>				

						</div>

						<div class="form-group">

							<h2>Nombre:</h2>

							<input type="text" class="form-control input-lg" name="nombre" required>				

						</div>

						<div class="form-group">

							<h2>Documento:</h2>

							<input type="text" class="form-control input-lg" name="documento" required>				

						</div>

						<div class="form-group">

							<h2>Usuario:</h2>

							<input type="text" class="form-control input-lg" id="usuario" name="usuario" required>				

						</div>

						<div class="form-group">

							<h2>Contraseña:</h2>

							<input type="text" class="form-control input-lg" name="clave" required>				

						</div>

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary btn-lg">Crear</button>

					<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>

				</div>

				<?php 

				$crear = new PacientesC();
				$crear -> CrearPacienteC();

				?>

			</form>

		</div>

	</div>

</div>

<!-- EDITAR PACEINTE -->
<div class="modal fade" rol="dialog" id="EditarPaciente">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="POST" role="form">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<input type="hidden" id="idP" name="idP">

							<h2>Apellido:</h2>

							<input type="text" class="form-control input-lg" id="apellidoE" name="apellidoE" required>				

						</div>

						<div class="form-group">

							<h2>Nombre:</h2>

							<input type="text" class="form-control input-lg" id="nombreE" name="nombreE" required>				

						</div>
						<div class="form-group">

							<h2>Documento:</h2>

							<input type="text" class="form-control input-lg" id="documentoE" name="documentoE" required>				

						</div>

						<div class="form-group">

							<h2>Usuario:</h2>

							<input type="text" class="form-control input-lg" id="usuarioE" name="usuarioE" required>				

						</div>

						<div class="form-group">

							<h2>Contraseña:</h2>

							<input type="text" class="form-control input-lg" id="claveE" name="claveE" required>				

						</div>

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-success btn-lg">Guardar Cambios</button>

					<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>

				</div>

				<?php 

				$actualizarP = new PacientesC();
				$actualizarP -> ActualizarPacienteC();

				?>

			</form>

		</div>

	</div>

</div>

<?php 

$borrarP = new PacientesC();
$borrarP -> BorrarPacienteC();

?>