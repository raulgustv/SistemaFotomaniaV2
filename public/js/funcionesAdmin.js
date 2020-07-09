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

/*----------  Enviar email  ----------*/

$("#forgotAdmin").click(function(e){
	if(document.getElementById('resetForm').checkValidity()){
		e.preventDefault();
		$("#loader").show();
		$.ajax({
			url: 'accionesAdmin/accionesAdminMain.php',
			method: 'post',
			data: $("#resetForm").serialize()+'&action=forgot',
			success: function(data){
				if(data === "true"){
					message("Se le ha enviado un correo con los pasos a seguir para restablecer su contraseña", 9000, 'success');
				}else if (data === "false"){
					message("Error al enviar correo de restablecimiento", 9000, 'error');
			}else if (data === "falseNSE"){
              message("El correo electronico ingresado no se encuentra registrado en nuestro sistema",9000, 'error')
			}
		   }
		});
	}
	return true;
});	

/*----------  Restablecer contra  ----------*/

$("#restconAD").click(function(e){
	if(document.getElementById('resetpass-frm').checkValidity()){
		e.preventDefault();
		$("#loader").show();
		$.ajax({
			url: 'accionesAdmin/accionesAdminMain.php',
			method: 'post',
			data: $("#resetpass-frm").serialize()+'&action=adminrestcon',
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
		title: 'Deseas borrar esta categoría?',
		 text: "Borrar esta categoría borrará el producto de inventario. Se recomienda borrar productos con esta categoría primero! No podrás deshacer estra acción!!",
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


var dataProducts; 

dataProducts = $("#dtTablaProds").DataTable({
	"ajax": {
		"url": "accionesAdmin/accionesAdminMain.php",
		"method": "POST",
		"data": {
			"getProds":1
		},
		"dataSrc": ""
	},
	"columns": [

		{"data": "id"},
		{"data": "nombre"},
		{"data": "nombreCategoria"},
		{"data": "precio"},
		{"data": "Descripcion"},
		{"data": "imagen", render: getImg},
		{"defaultContent": "<a href='#' class='btn btn-danger' id='btnDeleteProd'><i class='fas fa-trash'></i></a> <a href='#' id='editarProd' data-toggle='modal' data-target='#formEditProd' class='btn btn-primary' ><i class='fas fa-edit'></i></a>"}

	]
})

function getImg(imagen){
	return '<img class="dtProductos" src="../vistas/imagenes/' + imagen + '">';
}

/*----------  Borrar Producto  ----------*/

$(document).on("click", "#btnDeleteProd", function(){
	fila = $(this).closest("tr");
	prodId = parseInt(fila.find('td:eq(0)').text());

	Swal.fire({
		title: 'Deseas borrar este producto?',
		 text: "Borrar esta categoría borrará el producto de inventario. Se recomienda borrar productos con esta categoría primero! No podrás deshacer estra acción!!",
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
				borrarProd:1, prodId: prodId
			},
			success: function(data){
				dataProducts.ajax.reload();
				}
			});

		}
	})


	
});

/*----------  Obtener productos Editar  ----------*/


$(document).on("click", "#editarProd", function(){

	fila = $(this).closest("tr");
	prodId = parseInt(fila.find('td:eq(0)').text());

	$.ajax({
		url: 'accionesAdmin/accionesAdminMain.php',
		method: 'POST',
		data: {
			cargarProducto:1,
			prodId:prodId
		},
		success: function(data){
			$("#frmEditProductos").html(data);
			//alert(data);
		}
	})


});

/*----------  Editar Producto  ----------*/

$("#frmEditProductos").on("submit", function(e){
	e.preventDefault();

	var formData = new FormData(this);

	$.ajax({
		url: 'accionesAdmin/accionesAdminMain.php',
		method: 'POST',
		data: formData,
		success: function(data){
			dataProducts.ajax.reload();
			message("Producto editado con éxito", 2000, 'success');			
			$("#formEditProd").modal('hide');
		},
		contentType: false,
		processData: false,
		cache: false
	})

})




/*----------  Llenar Lista Producto Descuento  ----------*/

llenarProdAddDesc();
function llenarProdAddDesc(){
	$.ajax({
		url: 'accionesAdmin/accionesAdminMain.php',
		method: 'POST',
		data: {getProdDesc:1},
		success: function(data){
			$("#prodAddDesc").html(data);
		}
	});
}




/*----------  Insertar Descuento  ----------*/

$("#frmDescuento").validate({

	rules:{
		nombreDesc:{
			required: true,
			rangelength: [5,50]
		},
	},
	messages:{
		nombreDesc:{
			required: "Por favor ingrese el nombre del descuento",
			rangelength: "El nombre del descuento debe tener entre 5 y 50 caractéres"
		},
	},
	submitHandler: function(form){

		$.ajax({
			url: 'accionesAdmin/accionesAdminMain.php',
			method: 'POST',
			data: $("#frmDescuento").serialize()+"&agregarDesc",
			success: function(data){
				if(data === "false"){
					message("Ya existe un descuento para el producto seleccionado", 2000, 'error');
					$("#frmDescuento").trigger("reset");
				}else{
					message("Descuento ingresado con exito", 200000, 'success');
					$("#frmDescuento").trigger("reset");
				}
			}
		});
	}


});


/*----------  Ver Descuentos  ----------*/

var dataDesc;



dataDesc = $("#dtTablaDesc").DataTable({
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
			"getDesc":1
		},
		"dataSrc": ""
	},
	"columns": [

		{"data": "idOferta"},
		{"data": "nombreProducto"},
		{"data": "titulo"},
		{"data": "descripcionDesc"},
		{"data": "totalOferta"},
		{"data": "fechaInicio"},
		{"data": "fechaInicio"},
		{"defaultContent": "<a href='#' id='btnDeleteDesc' class='btn btn-danger'><i class='fas fa-trash'></i></a> <a href='#' id='editarDesc' data-toggle='modal' data-target='#formEditDesc' class='btn btn-primary' ><i class='fas fa-edit'></i></a>"}

	]
});


/*----------  Borrar Descuento  ----------*/

$(document).on("click", "#btnDeleteDesc", function(){
	fila = $(this).closest("tr");
	descId = parseInt(fila.find('td:eq(0)').text());

	Swal.fire({
		title: 'Deseas borrar este descuento?',
		 text: "Borrar este descuento hara que el descuento no se refleje instantaneamente en la tienda. Esta seguro que desea realizar esto?! No podrás deshacer estra acción!!",
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
				borrarDesc:1, descId:descId
			},
			success: function(data){
				dataDesc.ajax.reload();
				}
			});

		}
	})


	
});



/*----------  Obtener descuentos Editar  ----------*/


$(document).on("click", "#editarDesc", function(){

	fila = $(this).closest("tr");
	descId = parseInt(fila.find('td:eq(0)').text());

	$.ajax({
		url: 'accionesAdmin/accionesAdminMain.php',
		method: 'POST',
		data: {
			cargarDescuento:1,
			descId:descId
		},
		success: function(data){
			$("#frmEditDescuentos").html(data);
			//alert(data);
		}
	})


});

/*----------  Editar Descuento  ----------*/

/*$("#frmEditDescuentos").on("submit", function(e){
	e.preventDefault();

	var formData = new FormData(this);

	$.ajax({
		url: 'accionesAdmin/accionesAdminMain.php',
		method: 'POST',
		data: formData,
		success: function(data){
			dataDesc.ajax.reload();
			message("Descuento editado con éxito", 2000, 'success');			
			$("#formEditDesc").modal('hide');
		},
		contentType: false,
		processData: false,
		cache: false
	})

});*/


/*----------  Editar Descuento  ----------*/


$(document).on("click", "#editNewDesc", function(){
	var idDesc = $("#descId").val();
	var idProd = $("#prodAddDesc").val();
	var titulo = $("#editNombre").val();
	var descripcion = $("#descripcion").val();
	var totalOferta = $("#totalDescu").val();
	var fechaInicio = $("#fechaInicio").val();
	var fechaFinal = $("#fechaFinal").val();

	$.ajax({
		url: 'accionesAdmin/accionesAdminMain.php',
		method: 'POST',
		data:{
			editarDesc:1,
			idDesc: idDesc,
			idProd: idProd,
			titulo: titulo,
			descripcion: descripcion,
			totalOferta: totalOferta,
			fechaInicio: fechaInicio,
			fechaFinal: fechaFinal
		},
		success: function(data){

			if(data === "false"){
				message("Este descuento ya existe", 2000, 'error');
			}else{

			dataDesc.ajax.reload();			
			message("El descuento se editó correctamente", 2000, 'success');		
			$("#formEditDesc").modal('hide');

		}

			

		}
	});
});


/*----------  Ver Concursos  ----------*/

var dataConc;



dataConc = $("#dtTablaConc").DataTable({
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
			"getConc":1
		},
		"dataSrc": ""
	},
	"columns": [

		{"data": "idConcurso"},
		{"data": "nombreConcurso"},
		{"data": "descripcionConc"},
		{"data": "nombrePremio"},
		{"data": "fechaInicio"},
		{"data": "fechaFinal"},
		{"data": "cantidadMaxima"},
		{"data": "ganador"},
		{"defaultContent": "<a href='#' id='btnDeleteConc' class='btn btn-danger'><i class='fas fa-trash'></i></a> <a href='#' id='editarConc' data-toggle='modal' data-target='#formEditConc' class='btn btn-primary' ><i class='fas fa-edit'></i></a> <a href='#' id='PartConc' data-toggle='modal' data-target='#formPartConc' class='btn btn-primary' ><i class='fa fa-users'></i></a> <a href='#' id='btnSelectGanador' class='btn btn-danger'><i class='fa fa-trophy'></i></a>"}

	]
});

/*----------  Llenar Lista Producto Rifa  ----------*/

llenarProdAddConc();
function llenarProdAddConc(){
	$.ajax({
		url: 'accionesAdmin/accionesAdminMain.php',
		method: 'POST',
		data: {getProdConc:1},
		success: function(data){
			$("#prodAddConc").html(data);
		}
	});
}


/*----------  Insertar Concurso  ----------*/

$("#frmConcurso").validate({

	rules:{
		nombreConc:{
			required: true,
			rangelength: [5,50]
		},
	},
	messages:{
		nombreConc:{
			required: "Por favor ingrese un nombre para la rifa",
			rangelength: "El nombre de la rifa debe tener entre 5 y 50 caractéres"
		},
	},
	submitHandler: function(form){

		$.ajax({
			url: 'accionesAdmin/accionesAdminMain.php',
			method: 'POST',
			data: $("#frmConcurso").serialize()+"&agregarConc",
			success: function(data){
				if(data === "false"){
					message("Ya existe un concurso bajo el mismo nombre", 2000, 'error');
					$("#frmConcurso").trigger("reset");
				}else{
					message("Concurso ingresado con exito", 20000, 'success');
					$("#frmConcurso").trigger("reset");
				}
			}
		});
	}


});

/*----------  Borrar Concurso  ----------*/

$(document).on("click", "#btnDeleteConc", function(){
	fila = $(this).closest("tr");
	concId = parseInt(fila.find('td:eq(0)').text());

	Swal.fire({
		title: 'Deseas borrar este concurso?',
		 text: "Borrar este concurso eliminara los datos sobre el mismo y no sera posible completarlo, ademas desaparecera para el usuario. Esta seguro que desea realizar esto?! No podrás deshacer estra acción!!",
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
				borrarConc:1, concId:concId
			},
			success: function(data){
				dataConc.ajax.reload();
				}
			});

		}
	})


	
});

/*----------  Obtener concursos Editar  ----------*/


$(document).on("click", "#editarConc", function(){

	fila = $(this).closest("tr");
	concId = parseInt(fila.find('td:eq(0)').text());

	$.ajax({
		url: 'accionesAdmin/accionesAdminMain.php',
		method: 'POST',
		data: {
			cargarConcurso:1,
			concId:concId
		},
		success: function(data){
			$("#frmEditConcursos").html(data);
			//alert(data);
		}
	})


});


/*----------  Editar Concurso  ----------*/


$(document).on("click", "#editNewConc", function(){
	var idConc = $("#concId").val();
	var idProd = $("#prodAddConc").val();
	var nombre = $("#editNombre").val();
	var descripcion = $("#descripcion").val();
	var cantMaxima = $("#cantMaxi").val();
	var fechaInicio = $("#fechaInicio").val();
	var fechaFinal = $("#fechaFinal").val();

	$.ajax({
		url: 'accionesAdmin/accionesAdminMain.php',
		method: 'POST',
		data:{
			editarConc:1,
			idConc: idConc,
			idProd: idProd,
			nombre: nombre,
			descripcion: descripcion,
			cantMaxima: cantMaxima,
			fechaInicio: fechaInicio,
			fechaFinal: fechaFinal
		},
		success: function(data){

			if(data === "false"){
				message("Este concurso ya existe", 2000, 'error');
			}else{

			dataConc.ajax.reload();			
			message("El concurso se editó correctamente", 2000, 'success');		
			$("#formEditConc").modal('hide');

		}

			

		}
	});
});

/*----------  Obtener Participantes Concurso  ----------*/


$(document).on("click", "#PartConc", function(){

	//$('#formPartConc').modal('show');

	fila = $(this).closest("tr");
	concId = parseInt(fila.find('td:eq(0)').text());

	$.ajax({
		url: 'accionesAdmin/accionesAdminMain.php',
		method: 'POST',
		data: {
			PartConcurso:1,
			concId:concId
		},
		success: function(data){
			$("#tblBPartConc").html(data);
			//alert(data);
		}
	})


});


/*----------  Seleccionar Ganador  ----------*/

$(document).on("click", "#btnSelectGanador", function(){
	fila = $(this).closest("tr");
	concId = parseInt(fila.find('td:eq(0)').text());

	Swal.fire({
		title: 'Deseas seleccionar un ganador para este concurso?',
		 text: "Se seleccionara un cliente al azar para ganar esta rifa, si ya existe un ganador este sera reemplazado. Esta seguro que desea continuar?",
		 icon: 'warning',
		 showCancelButton: true,
		 confirmButtonColor: '#3085d6',
		 cancelButtonColor: '#d33',
		 confirmButtonText: 'Si, continuar'
	}).then((result)=>{
		if(result.value){
			$.ajax({
			url: 'accionesAdmin/accionesAdminMain.php',
			method: 'POST',
			data: {
				ganadorConc:1, concId:concId
			},
			success: function(data){
				dataConc.ajax.reload();
				}
			});

		}
	})


	
});


});