<?php include '../templates/mainHeader.php';
include_once '../includes/funciones.php';
include '../includes/db.php';
checkUser();?>



<?php


$uid = $row['id'];

$q = $con->prepare("SELECT nombre, DATE(creado) as fecha FROM clientes WHERE id = ? ");
		$q->bind_param("i", $uid);
		$q->execute();

		$r = $q->get_result();
		$row = mysqli_fetch_array($r);

		$nombre = $row['nombre'];
		$fecha = $row['fecha'];

		$fechaC = date('d/m/Y', strtotime($fecha));		


 ?>


<div class="container-fluid mt-3">
	

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<img src="">
				<h4 class="text-center">Perfil de: <?php echo $nombre; ?></h4>
			</div>
			<div class="card-body">	
				<div class="d-flex justify-content-end">
					<p>Cliente desde: <?php echo $fechaC; ?></p>
				</div>			
				<div class="row">
					<div class="col-lg-6">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="input-group">									
									
									<div class="col-lg-4" >
										<label><b>Tu Nombre:</b></label>
									</div>
									<div class="col-lg-4" id="inputNombre">
										<!-- <input id="editNombre" type="text" class="form-control" id="editNombre" name="editNombre" value="Raul Rodriguez"> -->
									</div>


									

									<div class="col-lg-4">
									<span class="input-group-addon">										
										<button id="btnGuardarNombre" class="btn btn-success"><i class="fas fa-check"></i></button>
										<button id="cancelGuardarNombre" class="btn btn-danger"><i class="fas fa-window-close"></i></button>
									</span>
									</div>
									</div>
								</div>

									<div class="row">
										<div class="col-lg-offset 6 col-lg-6">
											<div id="errorName" class="errorGeneral">
												<small>Este campo es obligatorio <i class="fas fa-info"></i></small>
											</div>
										</div>
									</div>

								<div class="row mt-3">
									<div class="col-lg-4">
										<label><b>Nombre de usuario:</b></label>
									</div>
									<div class="col-lg-6 col-lg-offset-2">
										<div class="input-group" id="inputUserName">

											<!-- <input data-toggle='tooltip' data-placement="right" title="No puedes editar el nombre de usuario" trigger='hover focus' type="text" class="form-control" id="editUser" name="editUser" value="rgustv" disabled>
											<span class="input-group-addon">
												<i class="fas fa-info infoIcon" id="infoIcon"></i>
											</span>	-->

										</div>


									</div>
								</div>																	
								
								<div class="row mt-3">
									<div class="col-lg-4">
										<label><b>Contraseña:</b></label>
									</div>
									<div class="col-lg-4">
										<input type="password" id="newPass" class="form-control" name="newPass" value="9999999">
									</div>
									<div>
									<span class="input-group-addon">
										<button id="btnGuardarNuevoPass" class="btn btn-success"><i class="fas fa-check"></i></button>
										<button id="cancelGuardarNuevoPass" class="btn btn-danger"><i class="fas fa-window-close"></i></button>
									</span>
								</div>
								</div>
								
								<div class="row mt-3" id="confirmNewPass">
									<div class="input-group">
									<div class="col-lg-4">
										<label for="newPassConfirm"><b>Confirmar Contraseña:</b></label>
									</div>
									<div class="col-lg-4 col-lg-offset-4">
										<span class="input-group-addon">
											<input type="password" id="newPassConfirm" class="form-control" name="newPassConfirm" value="">
										</span>
									</div>
									</div>									
								</div>

								<div class="row">
										<div class="col-lg-offset 6 col-lg-6">
											<div id="errorPass" class="errorGeneral">
												<small>Este campo es obligatorio <i class="fas fa-info"></i></small>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-offset 6 col-lg-6">
											<div id="errorPassMatch" class="errorGeneral">
												<small>Contraseñas no coinciden <i class="fas fa-info"></i></small>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-offset 6 col-lg-6">
											<div id="errorPassSize" class="errorGeneral">
												<small>Contraseña debe tener entre 6 y 25 caracteres <i class="fas fa-info"></i></small>
											</div>
										</div>
									</div>
							
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6">
										<div id="verDireccionMain">
											<!-- <h6>Direccion de Envío:</h6>
											<p>Del parque de sabanilla 250m sur<br>
											Sabanilla, Montes de Oca<br>
											11502<br>
											Teléfono: 8811-96-58</p> -->

										</div>
										
									</div>
									<div class="col-lg-6">
										<img src="../logos/location.svg" class="iconosPedido">
									</div>
								</div>
								<div class="d-flex flex-row-reverse">
										<a href="libretaDirecciones.php" class="btn btn-warning">Ver Libreta de direcciones</a>	
								</div>
							</div>
						</div>
					</div>
			

				</div>
			</div>
			</div>
		</div>				
	</div>
</div>

<!--=============================
=            Pedidos            =
==============================-->

<div class="container-fluid">
	<div class="row mt-3">
		<div class="col-lg-12">
			<div class="card bg-warning">
				<div class="card-header">
					<h4 class="text-center">Mis pedidos <i class="fas fa-truck"></i></h4>	
				</div>
			</div>
			<table class="table table-striped" id="dtPedidoCliente">
				<thead>
					<tr>
						<th>Id Pedido</th>					
						<th>Fecha Compra</th>
						<th>Estado Pedido</th>
						<th>Monto Total</th>
						<th>Acciones</th> 
					</tr>	
				</thead>
			</table>
		</div>
	</div>
</div>


<!--====  End of Pedidos  ====-->




<?php include '../templates/mainFooter.php'; ?>
<?php  include 'agregarDireccion.php'; ?>


