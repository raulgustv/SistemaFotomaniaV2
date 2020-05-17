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
	})

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

	
	



});


