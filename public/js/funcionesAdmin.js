$(document).ready(function(){



$("#registerform").on("submit", function(){



	

	$.ajax({
		url: 'accionesAdmin/registrarAdmin.php',
		method: 'POST',
		data: $("#registerform").serialize()+'&registrarAdmin',
		success: function(data){

			alert(data);
		}
	});


	//var email;

});

});