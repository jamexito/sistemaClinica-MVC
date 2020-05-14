$(".DT").on("click",".EliminarSecretaria",function(){

	var idS = $(this).attr("idS");
	var imgS = $(this).attr("imgS");

	window.location = "index.php?url=secretarias&idS="+idS+"&imgS="+imgS;

})