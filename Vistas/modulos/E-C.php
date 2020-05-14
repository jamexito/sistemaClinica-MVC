<?php 


if ($_SESSION["rol"] != "Secretaria") {
	
	echo '<script>

         window.location = "inicio";

	</script>';
	return;

}

?>

<div class="content-wrapper">
	
	<section class="content-header">
		
		<h1>Editar Consultorio</h1>

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				<form method="POST">

					<?php 

					$editaC = new ConsultoriosC();
					$editaC -> EditarConsultoriosC();
					$editaC -> ActualizarConsultorioC();

					?>
					
					

				</form>

			</div>

		</div>

	</section>

</div>

