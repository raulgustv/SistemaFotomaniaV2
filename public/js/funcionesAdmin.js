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


/*----------  Insertar Categoria  ----------*/

$("#frmCategoria").validate({

	rules:{
		categoria:{
			required: true,
			rangelength: [3,25]
		},
	},
	messages:{
		categoria:{
			required: "Por favor ingrese el nombre de la categoría",
			rangelength: "Categoría debe tener entre 3 y 25 caractéres"
		},
	},
	submitHandler: function(form){

		$.ajax({
			url: 'accionesAdmin/accionesAdminMain.php',
			method: 'POST',
			data: $("#frmCategoria").serialize()+"&agregarCat",
			success: function(data){
				if(data === "false"){
					message("La categoría indicada ya existe", 2000, 'error');
					$("#frmCategoria").trigger("reset");
				}else{
					message("Categoría agregada con éxito", 2000, 'success');
					$("#frmCategoria").trigger("reset");
				}
			}
		});
	}


});

/*----------  Ver Categorias  ----------*/

var dataCats;

dataCats = $("#dtTablaCats").DataTable({
	"dom": "Bfrtip",
	"buttons": "['copy', 'excel', 'pdf']",
	"processing": true,	
	"paging": false,
	"responsive": true,
	"destroy": true,	
	"ajax": {
		"url": "accionesAdmin/accionesAdminMain.php",
		"method": "POST",
		"data": {
			"getCats":1
		},
		"dataSrc": ""
	},
	"columns": [

		{"data": "idCategoria"},
		{"data": "nombre"},
		{"defaultContent": "<a href='#' id='btnDelete' class='btn btn-danger'><i class='fas fa-trash'></i></a> <a href='#' id='editarCat' data-toggle='modal' data-target='#formEditCats' class='btn btn-primary' ><i class='fas fa-edit'></i></a>"}

	]
});



var fila;

/*----------  Borrar Categoria  ----------*/


$(document).on("click", "#btnDelete", function(){
	fila = $(this).closest("tr");
	catId = parseInt(fila.find('td:eq(0)').text());

	Swal.fire({
		title: 'Deseas borrar el producto del carrito?',
		 text: "Producto será borrado",
		 icon: 'warning',
		 showCancelButton: true,
		 confirmButtonColor: '#3085d6',
		 cancelButtonColor: '#d33',
		 confirmButtonText: 'Si, borrar'
	}).then((result)=>{
		if(result.value){
			$.ajax({
			url: 'accionesAdmin/accionesAdminMain.php',
			method: 'POST',
			data: {
				borrarCat:1,
				catId:catId
			},
			success: function(data){

				/*
				$("#dtTablaCats").DataTable({
					destroy: true,
					
				});

				fila.remove();
				*/

				dataCats.ajax.reload();



			}
		});
	}
}


)

});

/*----------  Obtener categoria  ----------*/

$(document).on("click", "#editarCat", function(){
	fila = $(this).closest("tr");
	catId = parseInt(fila.find('td:eq(0)').text());
	var nuevaCat = $("#nuevaCat").val();

	$.ajax({
		url: 'accionesAdmin/accionesAdminMain.php',
		method: 'POST',
		data: {
			cargarCategoria:1,
			catId:catId,	

		},
		success: function(data){
			
			$("#newCat").html(data);
			
			//dataCats.ajax.reload();


		}
	});
});

/*----------  Editar Categoria  ----------*/


$(document).on("click", "#newCategory", function(){
	var catId = $("#nuevaCat").attr('editcatid');
	var newCatName = $("#nuevaCat").val();

	$.ajax({
		url: 'accionesAdmin/accionesAdminMain.php',
		method: 'POST',
		data:{
			editarCat:1,
			catId: catId,
			newCatName: newCatName
		},
		success: function(data){

			if(data === "false"){
				message("Esta categoria ya existe", 2000, 'error');
			}else{

			dataCats.ajax.reload();			
			message("La categoría se editó correctamente", 2000, 'success');		
			$("#formEditCats").modal('hide');

		}

			

		}
	});
});

/*----------  Llenar Categoría   ----------*/

llenarCatAddProd();
function llenarCatAddProd(){
	$.ajax({
		url: 'accionesAdmin/accionesAdminMain.php',
		method: 'POST',
		data: {getCategoryProd:1},
		success: function(data){
			$("#catAddProd").html(data);
		}
	});
}

/*
$("#frmProductos").validate({

	rules:{
		nombreProd:{
			required: true,
			rangelength: [3,25]
		},
		descProd:{
			required: true,
			maxlength: 1000
		},
		precioProd:{
			required: true, 
			range: [1,99999]
		},
		imgProd:{
			required: true,			
			extension: "png|jpeg|jpg"
		},
	},
	messages:{
		nombreProd:{
			required: "Ingrese el nombre de la categoría",
			rangelength: "Categoría debe tener entre 3 y 25 caractéres"
		},
		descProd:{
			required: "Ingrese la descripción del producto",
			maxlength: "Máximo 1000 caractéres"
		},
		precioProd:{
			required: "Ingrese el precio del producto",
			range: 'Mínimo $1, Máximo $99999'
		},
		imgProd:{
			required: "Debe subir una imagen",
			extension: "Imagen debe contener extensión válida"
		},
	},submitHandler: function(form){
		$.ajax({
			url: 'accionesAdmin/accionesAdminMain.php',
			method: 'POST',
			enctype: 'multipart/form-data',
			data: $("#frmProductos").serialize()+"&agregarProducto",
			success: function(data){
				alert(data);
			}
		});
	}


	

}); */

/*----------  Carga producto nuevo   ----------*/

$("#frmProductos").on("submit", function(e){
	e.preventDefault();
	var formData = new FormData(this);	
	console.log('hola');
	//var form = $("#frmProductos").serialize()+"&agregarProducto";

	$.ajax({
			url: 'accionesAdmin/accionesAdminMain.php',
			method: 'POST',				
			data: formData,
			success: function(data){
				if(data === "false"){
					message("El producto ya existe", 2000, 'error');
				}else{
					message("Producto insertado correctamente", 2000, 'success');	
					$("#frmProductos").trigger("reset");
				}		
			},
			contentType: false,
			processData: false,
			cache: false

		})
	
}); 


/*----------  Ver imagen previo a subir  ----------*/

	function readURL(input){
		var reader = new FileReader();

		var file = input.files[0];

		if(file){
			reader.onload = function(e){
			$("#imgPrev").attr('src', e.target.result);
		}
			reader.readAsDataURL(file);

	}

}

	$("#imgProd").change(function(){
		readURL(this);
	});


	/*----------  Productos Data table  ----------



	 var dataProds

	 dataProds = $("#dtTablaProds").DataTable({
	 	"processing": true,
	 	"paging": true,
	 	"responsive": true,
	 	"destroy": true,
	 	"ajax":{
	 		"url": "accionesAdmin/accionesAdminMain.php",
	 		"method": "POST",
	 		"data": {
	 			"getProds":1
	 		},	 
	 		"dataSrc" : ""		
	 	},

	 });
	
*/

/*----------  Get Products  ----------*/

var dataProds;
dataProds = $("#dtTablaProds").DataTable({
	dom: 'Bfrtip',
	buttons: [
		'copy', 'excel', 'pdf'
	],
	aoColumnDefs:[
		{sWidth: 200, aTargets:[4]}
	],
	fixedColums:true
});


/*=======================================
=            Borrar Producto            =
=======================================*/

$(document).on("click", "#btnBorrarProd", function(){
	fila = $(this).closest("tr");
	prodId = parseInt(fila.find('td:eq(0)').text());

	Swal.fire({
		 title: 'Deseas borrar el producto?',
		 text: "Producto será borrado",
		 icon: 'warning',
		 showCancelButton: true,
		 confirmButtonColor: '#3085d6',
		 cancelButtonColor: '#d33',
		 confirmButtonText: 'Si, borrar'
	}).then((result)=>{
		if(result.value){
			$.ajax({
				url: 'accionesAdmin/accionesAdminMain.php',
				method: 'POST',
				data: {borrarProd: 1, productoId: prodId},
				success: function(data){
					message("Producto borrado con éxito", 2000, 'success');	
					//dataProds.ajax.reload();
				}
			});
		}
	});
});


/*=====  End of Borrar Producto  ======*/

/*===================================================
=            Obtener Datos Producto Edit            =
===================================================*/
$(document).on("click", "#btnEditProd", function(){

	fila = $(this).closest("tr");
	prodId = parseInt(fila.find('td:eq(0)').text());

	console.log(prodId);

	$.ajax({
		url: 'accionesAdmin/accionesAdminMain.php',
		method: 'POST',
		data: {getEditProd:1, prodId:prodId},
		success: function(data){
			$("#editProds").html(data);
		}
	});

});

/*=====  End of Obtener Datos Producto Edit  ======*/

/*=============================================
=            Section comment block            =
=============================================*/

$("body").delegate("#frmEditProductos", "submit", function(e){
	e.preventDefault();
	//var prodId = $("#editProdInfo").attr("idProducto");

	//alert(prodId);
	var formData = new FormData(this);

	
	$.ajax({
		url: 'accionesAdmin/accionesAdminMain.php',
		method: 'POST',
		data: formData,
		success: function(data){
			// alert(data);
			message("Producto editado correctamente", 2000, 'success');
		},
		contentType: false,
		processData: false,
		cache: false
	});
});

	



	
	






/*=====  End of Section comment block  ======*/














});