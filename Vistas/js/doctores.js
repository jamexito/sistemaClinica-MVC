$(".DT").on("click", ".EditarDoctor", function(){

	var idD = $(this).attr("idD");
	var datos = new FormData();

	datos.append("idD", idD);

	$.ajax({
		url: "Ajax/doctoresA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		contentType: false,
		cache: false,
		processData: false,

		success: function(resultado){

			$("#idD").val(resultado["id"]);
			$("#apellidoE").val(resultado["apellido"]);
			$("#nombreE").val(resultado["nombre"]);
			$("#usuarioE").val(resultado["usuario"]);
			$("#claveE").val(resultado["clave"]);

			$("#sexoE").html(resultado["sexo"]);
			$("#sexoE").val(resultado["sexo"]);

		}
	})	

})

$(".DT").on("click", ".EliminarDoctor", function(){

	var idD = $(this).attr("idD");
	var imgD = $(this).attr("imgD");

	window.location = "index.php?url=doctores&idD="+idD+"&imgD="+imgD;

})

//Personalizar el plugging de datatable
$(".DT").DataTable({

	"language":{

		"sSearch":"Buscar:",
		"sEmptyTable": "No hay datos en la tabla",
		"sZeroRecords": "No se encontraron resultados",
		"sInfo": "Mostrando registros del _START_ al _END_  de un total _TOTAL_",
		"sInfoEmpty": "Mostrando registros  del 0 al 0  de un total de 0",
		"sInfoFiltered": "(Filtrando de un total de _MAX_ registros)",
		"oPaginate": {

			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"

		},
		"sLoadingRecords": "Cargando...",
		"sLengthMenu": "Mostrar _MENU_ registros"

	}

})