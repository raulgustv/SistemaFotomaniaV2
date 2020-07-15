<?php 

include_once '../templates/headerAdmin.php';
include_once '../includes/funciones.php';

session_start();

checkAdmin();



$userId =($_SESSION['userId']);
$userName = ($_SESSION['user']);
$ultimoLogin = ($_SESSION['ultimoLogin']);
$role = ($_SESSION['userRole']);

//echo $userName;


 ?> 

 <input type="hidden" name="role" id="role" value="<?php echo $role ?>">

<div class="container mt-2">
	<div class="row">
		<div class="col-lg-4">
			<div class="card mx-auto">
			  <img class="card-img-top mx-auto imgLoginAdmin" src="../logos/user.png" alt="Card image cap">
			  <div class="card-body">
			  	<h4 class="card-title">Información Perfil</h4>
			    <p class="card-text"><i class="fas fa-user-circle">&nbsp</i><?php echo $userName; ?></p>
			    <p class="card-text"><i class="far fa-id-card">&nbsp</i><?php echo $role ?></p>
			    <p class="card-text"><i class="fas fa-user-clock">&nbsp</i>Último Inicio Sesión: <?php echo $ultimoLogin; ?></p>
			   <!--  <a href="#" class="btn btn-primary" data-toggle="modal" id="editUser" data-target="#form_editAdmin"><i class="fas fa-user-edit">&nbsp;</i>Editar Perfil</a> -->
			   <div class="d-flex justify-content-end">
			   	 <a href="registroAdmin.php" id="registrarAdmin" class="btn btn-success">Registrar Usuario</a>
			   </div>
			   

			
			    
			  </div>
			</div>
		<!--	<div class="card-footer">
				<div class="container">
					<a href="verUsuarios.php" id="verUsers" class="btn btn-primary">Ver Usuarios</a>
					<a href="verClientes.php" id="verClientes" class="btn btn-success">Ver Clientes</a>
				</div>
			</div> -->
		</div>
		<div class="col-lg-8">
			<div class="jumbotron adminJmb">
				<h3>Bienvenido <?=$userName?></h3>
				<div class="row">
					<div class="col-sm-6">
					<iframe src="http://free.timeanddate.com/clock/i7agqvqr/n225/szw110/szh110/cf100/hnce1ead6" frameborder="0" width="110" height="110"></iframe>
				</div>

				<div class="col-sm-6">
					<div class="card">					  
					  <div class="card-body">
					    <h5 class="card-title">Pedidos</h5>					   
					    <a href="verPedidos.php" id="verPedidos" class="btn btn-primary">Ir a Pedidos</a>
					  </div>
					</div>				
				</div>
				</div>
				<h6>Pedidos recientes</h6>
				<div class="row mt-2">
					<div class="col-lg-12">
						<table class="table table-bordered">
							<thead class="table-info">
								<th>Número de transación</th>							
								<th>Cliente</th>
								<th>Fecha</th>
							</thead>
							<tbody class="table-success" id="lastOrders">
								<!-- <tr>
									<td>123</td>
									<td>Cámara</td>
									<td>Antonio</td>
									<td>hoy</td>
								</tr>
								<tr>
									<td>123</td>
									<td>Cámara</td>
									<td>Antonio</td>
									<td>hoy</td>
								</tr>
								<tr>
									<td>123</td>
									<td>Cámara</td>
									<td>Antonio</td>
									<td>hoy</td>
								</tr> -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>		
	</div>
</div>

<div class="container mt-2">
	<div class="row">
		<div class="col-lg-4 mb-2">
			<div class="card">	
				<div class="card-header text-center">Administrar Productos</div>
				<img class="card-img-top mx-auto imgPanel" src="../logos/cameraLens.svg" alt="Card image cap">				  
				<div class="card-body">					
					<p class="card-text">Administra los productos mostrados en la tienda</p>
					<a href="#" data-toggle="modal" data-target="#form_productos" class="btn btn-primary">Agregar Productos</a>
					<a href="verProductos.php"class="btn btn-success">Ver Productos</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4 mb-2">
			<div class="card">	
				<div class="card-header text-center">Administrar Categorías</div>
				<img class="card-img-top mx-auto imgPanel" src="../logos/categorías.svg" alt="Card image cap">					  
				<div class="card-body">					
					<p class="card-text">Administra las categorías mostrados en la tienda</p>
					<a href="#" data-toggle="modal" data-target="#form_categorias" class="btn btn-primary">Agregar Categorías</a>
					<a href="verCategoria.php"class="btn btn-success">Ver Categorías</a>
				</div>
			</div>
		</div>
	
		<div class="col-lg-4 mb-2">
			<div class="card">	
				<div class="card-header text-center">Administrar Descuentos</div>	
				<img class="card-img-top mx-auto imgPanel" src="../logos/descuento.svg" alt="Card image cap">				  
				<div class="card-body">					
					<p class="card-text">Administra los descuentos disponibles a los productos de la tienda</p>
					<a href="#" data-toggle="modal" data-target="#form_descuentos" id="agregarDesc" class="btn btn-primary">Agregar Descuento</a>
					<a href="verDescuentos.php"class="btn btn-success" id="verDesc">Ver Descuentos</a>
				</div>
			</div>
		</div>

		<div class="col-lg-4 mb-2">
			<div class="card">	
				<div class="card-header text-center">Administrar Galería</div>	
				<img class="card-img-top mx-auto imgPanel" src="../logos/galeria.svg" alt="Card image cap">				  
				<div class="card-body">					
					<p class="card-text">Administra las imágenes que se muestran en la tienda</p>
					<a href="#" data-toggle="modal" data-target="#form_imagenes" class="btn btn-primary">Agregar Imágenes</a>
					<a href="verGaleria.php"class="btn btn-success">Ver Imágenes</a>
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			<div class="card">	
				<div class="card-header text-center">Administrar Rifas</div>	
				<img class="card-img-top mx-auto imgPanel" src="../logos/rifas.svg" alt="Card image cap">				  
				<div class="card-body">					
					<p class="card-text">Administra las rifas disponibles para los usuarios</p>
					<a href="#" data-toggle="modal" id="agregarRifa" data-target="#form_concurso" class="btn btn-primary">Agregar Rifa</a>
					<a href="verRifas.php" id="verRifas" class="btn btn-success">Ver Rifas</a>
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			<div class="card">	
				<div class="card-header text-center">Administrar Usuarios</div>	
				<img class="card-img-top mx-auto imgPanel" src="../logos/allusers.svg" alt="Card image cap">				  
				<div class="card-body">					
					<p class="card-text">Administra las rifas disponibles para los usuarios</p>
					<a href="verUsuarios.php" id="verUsers" class="btn btn-primary">Ver Usuarios</a>
					<a href="verClientes.php" id="verClientes" class="btn btn-success">Ver Clientes</a>
				</div>
			</div>
		</div>






<?php include_once 'agregarCategoria.php' ?>
<?php include_once 'agregarRifa.php' ?>
<?php include_once 'agregarProductos.php' ?>
<?php include_once 'agregarImagenes.php' ?>
<?php include_once 'agregarDescuento.php' ?>
<?php include_once 'editarAdmin.php' ?>



<?php include_once '../templates/footerAdmin.php'; ?> 
