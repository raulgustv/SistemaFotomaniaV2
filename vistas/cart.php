<?php include '../templates/mainHeader.php' ?>

<div class="container-fluid">
	<div class="row">		
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header bg-info text-center">
					<h5>Checkout</h5>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<table class="table table-striped">
								<thead>
									<tr class="d-flex">
										<th class="col-2">Producto</th>
										<th class="col-2">Nombre Producto</th>
										<th class="col-1">Cantidad</th>
										<th class="col-2">Precio unitario</th>
										<th class="col-1">Descuento</th>
										<th class="col-2">Precio Final</th>
										<th class="col-2">Acciones</th>
									</tr>	
								</thead>
								<tbody id="tableCart">
									<!--<tr class="d-flex">
										<td class="col-2"><img class="cartDisplay" src="imagenes/batidora.png"></td>
										<td class="col-2">Batidora</td>
										<td class="col-1"><input type="number" class="form-control" value="2"></td>
										<td class="col-2"><input type="text" class="form-control" value="$49" disabled></td>
										<td class="col-1"><input type="text" class="form-control" value="$49" disabled></td>
										<td class="col-2"><input type="text" class="form-control" value="$49" disabled></td>
										<td class="col-2">
											<a class="btn btn-danger" href="#"><i class="fas fa-trash"></i></a>
											<a class="btn btn-success" href="#"><i class="fas fa-check-circle"></i></a>
										</td>
									</tr>-->
								</tbody>
							</table>
						</div>
					</div>
						
				</div>
			</div>
		</div>
		
			
		
	</div>
</div>


<?php include '../templates/mainFooter.php' ?>