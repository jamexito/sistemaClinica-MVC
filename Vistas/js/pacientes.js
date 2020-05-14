$(".DT").on("click", ".EliminarPaciente", function(){

	var idP = $(this).attr("idP");
	var imgP = $(this).attr("imgP");

	window.location = "index.php?url=pacientes&idP="+idP+"&imgP="+imgP;

})

$(".DT").on("click", ".EditarPaciente", function() {
	
	var idP = $(this).attr("idP");
	var datos = new FormData();

	datos.append("idP", idP);

	$.ajax({
		url: "Ajax/pacientesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			$("#idP").val(resultado["id"]);
			$("#apellidoE").val(resultado["apellido"]);
			$("#nombreE").val(resultado["nombre"]);
			$("#documentoE").val(resultado["documento"]);
			$("#usuarioE").val(resultado["usuario"]);
			$("#claveE").val(resultado["clave"]);

		}
		
	})	

})

$("#usuario").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();
	var datos = new FormData();
	datos.append("Norepetir", usuario);

	$.ajax({

		url: "Ajax/pacientesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			if(resultado){

				$("#usuario").parent().after('<div class="alert alert-danger">El Usuario ya existe.</div>');

				$("#usuario").val("");

			}

		}

	})

})
$("#usuarioE").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();
	var datos = new FormData();
	datos.append("Norepetir", usuario);

	$.ajax({

		url: "Ajax/pacientesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			if(resultado){

				$("#usuarioE").parent().after('<div class="alert alert-danger">El Usuario ya existe.</div>');

				$("#usuarioE").val("");

			}

		}

	})

})