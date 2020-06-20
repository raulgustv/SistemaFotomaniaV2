<?php include '../templates/mainHeader.php' ?>

<div class="container-fluid mt-3">
	

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<img src="">
				<h4 class="text-center">Perfil de: Art</h4>
			</div>
			<div class="card-body">	
				<div class="d-flex justify-content-end">
					<p>Cliente desde: 12/12/2020</p>
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
										<input type="password" id="newPass" class="form-control" name="editPass" value="9999999">
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
							
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6">
										<h6>Direccion de Envío:</h6>
										<p>Del parque de sabanilla 250m sur<br>
										Sabanilla, Montes de Oca<br>
										11502<br>
										Teléfono: 8811-96-58</p>
									</div>
									<div class="col-lg-6">
										<img src="../logos/location.svg" class="iconosPedido">
									</div>
								</div>
								<div class="d-flex flex-row-reverse">
									<div class="p-2">
										<a href="#" class="btn btn-success">Editar Dirección</a> 
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


</div>



<?php include '../templates/mainFooter.php' ?>


