$("#email").change(function(){
	let email = $(this).val();

	let datos = new FormData();
	datos.append("validarEmail", email);

	$.ajax({
		url: "ajax/formularios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			console.log("respuesta", respuesta);
		}
	})
})

