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
	
	
	$("#resetpass-frm").validate({
		rules:{
			cnewpass:{
				required: true,
				equalTo: "#newpass",
				rangelength: [6,200]
			}
		},
		messages:{
			cnewpass:{
				required: "Debe confirmar la contraseña",
				minlength: "La contraseña debe contener almenos 6 caracteres",
				equalTo: "Las contraseñas deben coincidir"
			}, 
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

		/*----------  Restablecer contra  ----------*/

		$("#restcon").click(function(e){
			if(document.getElementById('resetpass-frm').checkValidity()){
				e.preventDefault();
				$("#loader").show();
				$.ajax({
					url: '../acciones/accionLogin.php',
					method: 'post',
					data: $("#resetpass-frm").serialize()+'&action=restcon',
					success: function(data){

                        if(data === "falselocalNC"){
							message("Las contraseñas ingresadas no coinciden", 2000, 'error');
							$("#resetpass-frm").trigger("reset");
						}else if(data === "falsedbNC"){
					
						message("La contraseña que usted ingreso no coincide con su actual contraseña", 2000, 'error');	
                        $("#resetpass-frm").trigger("reset");
						}else if(data === "true"){
							message("Contraseña actualizada correctamente", 2000, 'success');
                            $("#resetpass-frm").trigger("reset");
							setTimeout(function(){
								location.reload();
						   }, 2200); 
						}else{
							message("Error al cambiar la contraseña", 2000, 'error');
							$("#resetpass-frm").trigger("reset");	
						}

						/*$("#alert").show();
						$("#result").html(data);
						$("#loader").hide();*/
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
	mostrarConcursos();
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
					sumMiniCart();
					mostrarMiniCart();
				}
			});
		}else if(cant < 0 || !cant){
			message('Debes ingresar al menos 1 producto', 2000, 'error');
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
		var descuento = $("#descuento-"+pid).val();
		var total = qty * precio - (descuento*qty);
		var totalR = Math.round(total);

		$("#total-"+pid).val(totalR);

		$(".botonPay").attr('disabled', true);



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
				getTotal();
			}
		});
	}

	/*----------  Disable pay  ----------*/

	$("body").delegate("#removeProduct", "click", function(e){
		e.preventDefault();

		var prodId = $(this).attr("removeId");

				
		Swal.fire({
		  title: 'Deseas borrar el producto del carrito?',
		  text: "Puedes volver a la tienda para agregar nuevamente",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {

		  	$.ajax({
			url: '../acciones/main.php',
			method: 'POST',
			data: {removerCarro:1, idRemover: prodId},
			success: function(data){
				message('Se borró correctamente el producto', 2000, 'success');
				cartCheckout();
				sumMiniCart();
				mostrarMiniCart();
				getTotal();

				//despues de borra el SWAL

			}
		});
		    
	}
		})

});


	$("body").delegate("#updateProduct", "click", function(e){
		e.preventDefault();

		var pid = $(this).attr("updateId");
		var qty = $("#qty-"+pid).val();
		var precio = $("#precio-"+pid).val();
		var total = $("#total-"+pid).val();

		$.ajax({
			url: '../acciones/main.php',
			method: 'POST',
			data: {updateQty:1, updateId: pid, cant: qty, precio:precio, total:total},
			success: function(data){
				message('Cantidad de productos actualizada', 2000, 'success');
				getTotal();
				//$(".botonPay").attr('disabled', true);
				$(".botonPay").removeAttr("disabled");
			}
		});
	});


	/*----------  Search Autocomplete  ----------*/

	$("#search").keyup(function(){
		var busqueda = $(this).val();

		if(busqueda != ''){
			$.ajax({
				url: '../acciones/main.php',
				method: 'POST',
				data: {query:busqueda},
				success: function(data){
					$('#listaProductos').fadeIn();
					$('#listaProductos').html(data);
				}
			});
		}else{
			$('#listaProductos').fadeOut();
		}
	});


	$(document).on('click', '.liResult', function(){
		$('#search').val($(this).text());
		$('#listaProductos').fadeOut();

	});

	/*----------  Paginacion  ----------*/
	
	page();
	function page(){
		$.ajax({
			url: '../acciones/main.php',
			method: 'POST',
			data: {page:1},
			success: function(data){
				$("#pageNo").html(data);
			}
		});
	}

	

	$("body").delegate("#page", "click", function(){

		var pn = $(this).attr("page");

		$.ajax({
			url: '../acciones/main.php',
			method: 'POST',
			data: {getProduct:1, setPage:1, pageNumber:pn},
			success: function(data){
				$("#getProduct").html(data);
			}
		});
	});

	/*----------  MiniCart display  ----------*/
	mostrarMiniCart();
	function mostrarMiniCart(){
		$.ajax({
			url: '../acciones/main.php',
			method: 'POST',
			data: {getMiniCart:1},
			success: function(data){
				$("#miniCart").html(data);

			}
		});
	}

	sumMiniCart();
	function sumMiniCart(){
		$.ajax({
			url: '../acciones/main.php',
			method: 'POST',
			data: {sumMiniCart:1},
			success: function(data){
				$("#cartSum").html(data);
			}
		});
	}



/*----------  Mostrar Concursos  ----------*/
function mostrarConcursos(){
	$.ajax({
		url:'../acciones/main.php',
		method: "POST",
		data: {getConcursos: 1},
		success: function(data){
			$("#getConcursos").html(data);
		}
	});
}


/*----------  Ingresar usuario concurso  ----------*/

	
$('body').delegate("#ingConcurso", "click", async function(e){
	e.preventDefault();				

	Swal.fire({
		title: 'Desea ingresar al concurso?',
		 text: "Ingresara como participante a dicho concurso",
		 icon: 'warning',
		 showCancelButton: true,
		 confirmButtonColor: '#3085d6',
		 cancelButtonColor: '#d33',
		 confirmButtonText: 'Si, continuar'
	}).then((result)=>{
		if(result.value){
			var cid = $(this).attr('cid');
			$.ajax({
			url: '../acciones/main.php',
			method: 'POST',
			data: {
				ingConcurso:1, concId:cid
			},
			success: function(data){

				if(data === "false"){
					message("Usted ya esta en este concurso", 2000, 'error');
				}else{
			
				message("Se ingreso exitosamente", 2000, 'success');
				setTimeout(function(){
					location.reload();
			   }, 2200); 		
	
			}
				}
			});

		}
	})

});


/*----------  Eliminar usuario concurso  ----------*/

	
$('body').delegate("#delConcurso", "click", async function(e){
	e.preventDefault();				

	Swal.fire({
		title: 'Desea salir del concurso?',
		 text: "Usted saldra del concurso y perdera su espacio. Esta seguro?",
		 icon: 'warning',
		 showCancelButton: true,
		 confirmButtonColor: '#3085d6',
		 cancelButtonColor: '#d33',
		 confirmButtonText: 'Si, salir'
	}).then((result)=>{
		if(result.value){
			var cid = $(this).attr('cid');
			$.ajax({
			url: '../acciones/main.php',
			method: 'POST',
			data: {
				salConcurso:1, concId:cid
			},
			success: function(data){

				if(data === "false"){
					message("Usted no esta ingresado en este concurso", 2000, 'error');
				}else{
			
				message("Salida de concurso exitosa", 2000, 'success');	
				setTimeout(function(){
					location.reload();
			   }, 2200); 
	
			}
				}
			});

		}
	})

});


/*----------  Contacto email  ----------*/
$(document).on("click", "#contactar", function(){
//$("body").delegate("#contactar", "click", function(){

	var email = $("#contEmail").val();
	var nombre = $("#contNombre").val();
	var mensaje = $("#contMensaje").val();

	$.ajax({
		url: '../acciones/main.php',
		method: 'POST',
		data: {sendContacto:1, correo:email, nombre:nombre, mensaje:mensaje},
		success: function(data){
			if(data === "false"){
				message("No se pudo enviar su mensaje", 2000, 'error');
			}else if(data ==="true"){
			message("Mensaje enviado con exito", 2000, 'success');	
		}else{
			message("Error desconocido", 2000, 'error');
		}
                              }
	});
});


});


