$(document).ready(function(){

	/*----------  Mensaje sweet alert  ----------*/
	

function message(titulo, tiempo, icono){
		let timerInterval
		Swal.fire({
			html: titulo,
			timer: tiempo,
			icon: icono,
			timerProgressBar: false
		});
}

	/*----------  Registrar Usuario  ----------*/	

$("#registerform").validate({

	rules:{
		username:{
			required: true,
			minlength: 3
		},
		email: {
			required: true,
			email: true,

		},
		password1:{
			required: true,
			rangelength: [6,25]
		},
		password2:{
			required: true,
			equalTo: "#password1"
		},
		

	},
	messages:{
		username:{
			required: "Ingrese su nombre de usuario",
			minlength: "Nombre de usuario debe contener al menos 3 caracteres"
		}, 
		email:{
			required: "Ingrese un correo electrónico",
			email: "Ingrese un correo válido. Ejemplo: ejemplo@ejemplo.com",			
			},
		password1:{
			required: "Contraseña es requerida",
			rangelength: "La contraseña debe tener entre 6 y 25 caracteres"
		},
		password2:{
			required: "Contraseña es requerida",
			equalTo: "Las contraseñas deben coincidir",
		},
	},
	submitHandler: function(form){		

		$.ajax({
		url: 'accionesAdmin/registrarAdmin.php',
		method: 'POST',
		data: $("#registerform").serialize()+'&registrarAdmin',
		success: function(data){

			if(data === "false"){
				message("El correo o el usuario ya están en uso", "", 'error');
			}else{
				message("Registro completado correctamente", 2000, 'success');
				$("#registerform").trigger("reset");
			}
			
		}
	});	
}
	

});	

/*----------  Login  ----------*/

$("#loginForm").validate({
	rules:{
		emailLogin:{
			required: true,
			email: true
		},
		adminPass:{
			required: true
		}
	},
	messages:{
		emailLogin:{
			required: "Por favor ingresa tu email",
			email: "Ingresa un correo electrónico válido"
		},
		adminPass:{
			required: "Ingresa tu contraseña"
		}
	},
	submitHandler: function(form){
		$.ajax({
			url: 'accionesAdmin/registrarAdmin.php',
			method: 'POST',
			data: $("#loginForm").serialize()+'&loginAdmin',
			success: function(data){
				if(data === "false"){
					message("Este correo no está registrado", 2000, 'error')
				}else if (data === "badPassword"){
					message("Contraseña Incorrecta", 2000, 'error')
				}else if (data === "true"){
					
					window.location.href = 'adminDash.php';

				}
			}			

		});
	}
});



});