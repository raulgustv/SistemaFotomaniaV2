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
	};

	
	/*=====  End of Tooltip  ======*/
	

	$('#editUser').tooltip({
			trigger: 'manual'
	});

	$("#idDirRestore").tooltip('show');

	
	$(document).on("click", "#infoIcon",function(){
		$('#editUser').tooltip('toggle');
	});



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

/*======================================
=            Perfil usuario            =
======================================*/

/*----------  UI info usuario  ----------*/

$(document).on('keyup', '#editNombre', function(){
	$("#btnGuardarNombre").fadeIn(300);
	$("#cancelGuardarNombre").fadeIn(300);
});


$(document).on("keyup", "#newPass", function(e){
	e.stopImmediatePropagation(); 
	$("#btnGuardarNuevoPass").fadeIn(300);
	$("#cancelGuardarNuevoPass").fadeIn(300);
	$("#confirmNewPass").fadeIn(300);

});

$("#cancelGuardarNombre").click(function(e){
	e.preventDefault();
	$("#btnGuardarNombre").fadeOut(300);
	$("#cancelGuardarNombre").fadeOut(300);
});

$("#cancelGuardarNuevoPass").click(function(e){
	e.preventDefault();
	$("#btnGuardarNuevoPass").fadeOut(300);
	$("#confirmNewPass").fadeOut(300);
	$("#cancelGuardarNuevoPass").fadeOut(300);
})

/*----------  Cargar datos cliente  ----------*/

cargarCliente()
function cargarCliente(){
	$.ajax({
		url: "../acciones/main.php",
		method: "POST",
		data: {cargarCliente:1},
		success: function(data){
			$("#inputNombre").html(data);
		}
	});
}

cargarUserName()
function cargarUserName(){
	$.ajax({
		url: "../acciones/main.php",
		method: "POST",
		data: {cargarUser:1},
		success: function(data){
			$("#inputUserName").html(data);
		}
	});
}


/*----------  Cargar Combos  ----------*/


cargarProvincia()
function cargarProvincia(){

	

	$.ajax({
		url: "../acciones/main.php",
		method: "POST",
		data: {cargarProvincia:1},
		success: function(data){

			$("#provincia").html(data);
		}
	});
} 


$(document).on("change", "#provincia", function(){

	var idProv = $(this).val();

	if(idProv){
			$.ajax({
				url: "../acciones/main.php",
				method: "POST",
				data: {cargarCanton:1, idProv:idProv},
				success: function(data){
					$("#canton").html(data);
			}
		});
	}
	
});


$(document).on("change", "#canton", function(){

	var idCant = $(this).val();

	if(idCant){
			$.ajax({
				url: "../acciones/main.php",
				method: "POST",
				data: {cargarDist:1, idCant:idCant},
				success: function(data){
					$("#distrito").html(data);
			}
		});
	}
	
});



/*----------  Cargar direccion principal  ----------*/


cargarDireccionMain();
function cargarDireccionMain(){
	$.ajax({
		url: "../acciones/main.php",
		method: "POST",
		data: {cargarDirMain:1},
		success: function(data){
			$("#verDireccionMain").html(data);
		}
	});
}


/*----------  Cargar Libreta Direcciones  ----------*/

cargarLibretaDireccion();
function cargarLibretaDireccion(){
	$.ajax({
		url: "../acciones/main.php",
		method: "POST",
		data: {cargarLibretaDir:1},
		success: function(data){
			$("#libretaDir").html(data);
		}
	});
}

/*----------  Cambiar Direccion Principal  ----------*/

$(document).on("change", "#dirPrincipal", function(){

	var dirId = $(this).attr('idDir');

	$("#loaderBS").show();

	//console.log(dirId);



	$.ajax({
		url: "../acciones/main.php",
		method: "POST",
		data: {nuevaPrincipal:1, dirId:dirId},
		success: function(data){
			cargarLibretaDireccion();
			$("#loaderBS").hide();
			
			//alert(data);
		}
	})
})


/*----------  Agregar Direccion  ----------*/

$("#frmDireccion").validate({	
	rules:{
		canton:{
			required: true
			
		},
		distrito:{
			required: true
		},
		addLine1:{
			required: true,
			rangelength: [5, 100]
		},
		zip:{
			required: true,
			rangelength: [5, 5]
			
		}
	},
	messages:{
		canton:{
			required: "Selecciona un cantón y una provincia"
		},
		distrito:{
			required: "Selecciona un cantón y una provincia"
		},
		addLine1:{
			required: "Este campo es requerido",
			rangelength: "Dirección debe tener entre 5 y 100 caracteres"
		},
		zip: {
			required: "Ingresa un código postal",
			rangelength: "Código Postal debe tener 5 caractéres"
		}
	},	
	submitHandler: function(form){
		$.ajax({
		url: "../acciones/main.php",
		method: "POST",
		data: $("#frmDireccion").serialize()+"&agregarDireccion",
		success: function(data){
			message("Dirección guardada con éxito", 2000, 'success');		
			cargarLibretaDireccion();
			cargarDireccionMain();

		}
	});
	}

});


/*----------  Editar Nombre  ----------*/

$(document).on("click", "#btnGuardarNombre", function(e){
	e.preventDefault();

	var editNombre = $("#editNombre").val();

	if(editNombre === ""){
			$("#errorName").fadeIn(300);
	}else{
		$.ajax({
			url: "../acciones/main.php",
			method: "POST",
			data: {updateNombre:1, editNombre:editNombre},
			success: function(data){
				cargarUserName();
				$("#errorName").fadeOut(300);
				$("#btnGuardarNombre").fadeOut(300);
				$("#cancelGuardarNombre").fadeOut(300);	
				message("Nombre se actualizó correctamente", 2000, 'success');
					

			}
		});
	}

});

/*----------  Editar Password  ----------*/



$(document).on("click", "#btnGuardarNuevoPass", function(e){
	e.preventDefault();

	var editPass = $("#newPass").val();
	var confirmEdit = $("#newPassConfirm").val();

	console.log(editPass.length);

	if(editPass === ""){
		$("#errorPass").fadeIn(300);
		$("#errorPassMatch").hide();
		$("#errorPassSize").hide();
	}else if(editPass !== confirmEdit){
		$("#errorPassMatch").fadeIn(300);
		$("#errorPass").hide();
		$("#errorPassSize").hide();
	}else if (editPass.length < 6 || editPass.length > 25){
		$("#errorPassSize").fadeIn();
		$("#errorPass").hide();
		$("#errorPassMatch").hide();
	}else{
		$.ajax({
			url: "../acciones/main.php",
			method: "POST",
			data: {updatePass:1, editPass:editPass},
			success: function(data){

				if(data === "false"){
					message("Contraseña debe ser diferente de la última contraseña utilizada" , 2000, 'error');
					$("#errorPass").fadeOut(300);
					$("#errorPassMatch").fadeOut(300);
					$("#errorPassSize").fadeOut(300);

				}else if(data === "true"){
					message("Se guardó la nueva contraseña", 2000, 'success');
					$("#errorPass").fadeOut(300);
					$("#errorPassMatch").fadeOut(300);
					$("#errorPassSize").fadeOut(300);
				}	
			}
		});
	}
});


$(document).on("click", "#borrarDir", function(e){

	var idDir = $(this).attr("idBorrarDir");

	Swal.fire({
		  title: 'Deseas borrar esta dirección',
		  text: "Se recomienda agregar una nueva dirección actualizada",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, bórrala'
		}).then((result) => {
			if(result.value){
				$.ajax({
					url: "../acciones/main.php",
					method: "POST",
					data: {
						borrarDir:1, 
						idDir: idDir
					},
					success: function(data){							
						if(data === "true"){
							message("Dirección borrada", 2000, 'success');
							cargarLibretaDireccion();
						}else{
							message("No puedes borrar tu dirección principal", 2000, 'error');
						}
					}
				});
			}
		});

});

/*----------  Cargar Direcciones Viejas  ----------*/

cargarDireccionInactiva();
function cargarDireccionInactiva(){
	$.ajax({
		url: "../acciones/main.php",
		method: "POST",
		data: {dirInactiva:1},
		success: function(data){
			
		}
	});
}












/*=====  End of Perfil usuario  ======*/






});


