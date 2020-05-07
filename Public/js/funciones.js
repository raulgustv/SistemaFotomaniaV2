$(document).ready(function(){

	/*----------  Forms login mostrar/ocultar  ----------*/
	

	/* Mostrar contraseña olvidada */	
	$("#forgot-btn").click(function(){
		$("#login-box").hide();
		$("#forgot-box").show();
	});

	/* Mostrar registro */
	$("#register-btn").click(function(){
		$("#login-box").hide();
		$("#register-box").show();
	});

	/* Mostrar login desde forgot */
	$("#back-btn").click(function(){
		$("#forgot-box").hide();
		$("#login-box").show();
	});

	/* Mostrar login desde registro */
	$("#login-btn").click(function(){
		$("#register-box").hide();
		$("#login-box").show();
	});

	/* Validaciones login forms */	

	$("#login-frm").validate();

	$("#register-frm").validate({
		rules:{
			cpass:{
				equalTo: "#pass"
			}
		}
	});

	$("#forgot-frm").validate();

	/*----------  Enviar Registro  ----------*/

	$("#register").click(function(e){
		if(document.getElementById('register-frm').checkValidity()){
			e.preventDefault();

			$.ajax({
				url: '../acciones/accionLogin.php',
				method: 'post',
				data: $("#register-frm").serialize()+'&action=register',
				success: function(data){
					$("#alert").show();
					$("#result").html(data);

				}
			});
		}
		return true;
	});	

	/*----------  Enviar Datos Login  ----------*/

	$("#login").click(function(e){
		if(document.getElementById('login-frm').checkValidity()){
			e.preventDefault();

			$.ajax({
				url: '../acciones/accionLogin.php',
				method: 'post',
				data: $("#login-frm").serialize()+'&action=login',
				success: function(data){
					$("#alert").show();
					$("#result").html(data);
				}
			});
		}
		return true;
	});	

	/*----------  Enviar email  ----------*/

	$("#forgot").click(function(e){
		if(document.getElementById('forgot-frm').checkValidity()){
			e.preventDefault();

			$.ajax({
				url: '../acciones/accionLogin.php',
				method: 'post',
				data: $("#forgot-frm").serialize()+'&action=forgot',
				success: function(data){
					$("#alert").show();
					$("#result").html(data);
				}
			});
		}
		return true;
	});	



});


