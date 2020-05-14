<?php 

	if ($_SESSION["rol"] != "Secretaria") {
		
		echo '<script>
				
				windows.location = "inicio";
			
		</script>';

		return;

	}

?>

<div class="content-wrapper">
	
	<section class="content">
		
		<div class="box">
			
			<div class="box-body">

				<?php 

					$editarPerfil = new SecretariasC();
					$editarPerfil -> EditarPerfilSecretariaC();
					$editarPerfil -> ActualizarPerfilSecretariaC();

				?>
				
				

			</div>

		</div>

	</section>

</div>