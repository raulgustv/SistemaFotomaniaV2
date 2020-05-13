$(document).ready(function(){

	/*----------  Funcion SWAL Alerta  ----------*/

	function message(titulo, tiempo, icono){
		let timerInterval
		Swal.fire({
			html: titulo,
			timer: tiempo,
			icon: icono,
			timerProgressBar: false
		});
	}
	

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
			$("#loader").show;
			$.ajax({
				url: 'acciones/accionLogin.php',
				method: 'post',
				data: $("#register-frm").serialize()+'&action=register',
				success: function(data){
					$("#alert").show();
					$("#result").html(data);
					$("#loader").hide();
					
				}
			});
		}
		return true;
	});	

	/*----------  Enviar Datos Login  ----------*/

	$("#login").click(function(e){
		if(document.getElementById('login-frm').checkValidity()){
			e.preventDefault();
			$("#loader").show();
			$.ajax({
				url: 'acciones/accionLogin.php',
				method: 'post',
				data: $("#login-frm").serialize()+'&action=login',
				success: function(data){
					if(data==="true"){
						window.location = 'vistas/principal.php';
						
					}else{
						Swal.fire(
								'Error iniciando sesión',
								'Verifica que tu usuario y contraseña sean correctos',
								'error'
							);
						$("#loader").hide();
					}
					
				}
			});
		}
		return true;
	});	

	/*----------  Enviar email  ----------*/

	$("#forgot").click(function(e){
		if(document.getElementById('forgot-frm').checkValidity()){
			e.preventDefault();
			$("#loader").show();
			$.ajax({
				url: 'acciones/accionLogin.php',
				method: 'post',
				data: $("#forgot-frm").serialize()+'&action=forgot',
				success: function(data){
					$("#alert").show();
					$("#result").html(data);
					$("#loader").hide();
				}
			});
		}
		return true;
	});	

	/*----------  Convertir links en activos  ----------*/	

	$(".nav-link").on("click", function(){
		$('a').removeClass('active');
		$(this).addClass('active');

	});

	/*----------  Mostrar categorías  ----------*/
	mostrarCat();
	mostrarProductos();
	function mostrarCat(){
		$.ajax({
			url: '../acciones/main.php',
			method: "POST",
			data: {category:1},
			success: function(data){
				$("#get_category").html(data);
			}
		});
	}

	/*----------  Mostrar categorías  ----------*/
	function mostrarProductos(){
		$.ajax({
			url:'../acciones/main.php',
			method: "POST",
			data: {getProduct: 1},
			success: function(data){
				$("#getProduct").html(data);
			}
		});
	}

	/*----------  Filtros y busqueda ----------*/

	$("body").delegate(".category", "click", function(e){
		e.preventDefault();
		var categoryId = $(this).attr('cid'); // atributo que pertenece a clase categoria de referencia a main.php

		//console.log(catId);

		$.ajax({
			url: '../acciones/main.php',
			method: "POST",
			data: {selectedCat:1, catId:categoryId},
			success: function(data){
				$("#getProduct").html(data); 
				
			}
		});
	});

	$("#searchBtn").click(function(e){
		e.preventDefault();

		var keyword = $("#search").val();


		$.ajax({
			url: '../acciones/main.php',
			method: "POST",
			data: {search:1, keyword:keyword},
			success: function(data){
				$("#getProduct").html(data); 
			}
		});
	});

	/*----------  Agregar a carrito  ----------*/

	
	$('body').delegate("#product", "click", async function(e){
		e.preventDefault();				

		const {value:cant} = await Swal.fire({
			  title: 'Cantidad de productos',	
			  input: 'number',
			  showCancelButton: true,
			  inputPlaceholder: 1,

		});	

		if(cant > 0){
			var pid = $(this).attr('pid');

		
			$.ajax({
				url: '../acciones/main.php',
				method: "POST",
				data: {addToCart:1, prodId: pid, qty:cant},
				success: function(data){
					message(data, 2000, 'success');
				}
			});
		}else if(cant < 0){
			message('Debes ingresar más de 0 productos', 2000, 'error');
		}	
	});

	/*----------  Mostrar productos carrito  ----------*/
	

	cartCheckout();
	getTotal();
	
	function cartCheckout(){
		$.ajax({
			url:'../acciones/main.php',
			method: "POST",
			data: {getCartCheckout: 1},
			success: function(data){
				$("#tableCart").html(data);
				//alert(data);
			}
		});
	}

	function getTotal(){
		$.ajax({
			url:'../acciones/main.php',
			method: "POST",
			data: {getTotal: 1},
			success: function(data){
				$("#montoTotal").html(data);
				//alert(data);
			}
		});
	}


	/*----------  Update quanties  ----------*/

	$("body").delegate(".qty", "keyup", function(){
		var pid= $(this).attr('pid');
		var qty= $("#qty-"+pid).val();
		var precio = $("#precio-"+pid).val();
		var total = qty * precio;

		$("#total-"+pid).val(total);		



	});

	/*----------  Calcular subtotal  ----------*/
	
		pagar();
		function pagar(){
		$.ajax({
			url:'../acciones/main.php',
			method: "POST",
			data: {pagar: 1},
			success: function(data){
				$("#cartCheckout").html(data);
			}
		});
	}

	/*----------  Disable pay  ----------*/

	//function disablePay()


	
	




	
	

	


});


