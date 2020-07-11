<?php include '../templates/mainHeader.php' ?>


<div class="backgroundOverlayLoad" id="load">
	<div class="d-flex justify-content-md-center align-items-center vh-100">
		<div class="card bg-primary bg-light">
			<div class="card-body">
				<img class="loaderGif" src="../vistas/../logos/preloader.gif">
			</div>
		</div>
	</div>
</div>

<div class="container-fluid" id="cartLoad">
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
					<div id="montoTotal">
						<div class="row">
						<!--<div class="col-lg-4"><b>Total: $4000</b></div>-->					
				
						</div>
					</div>

					<div id="cartCheckout">


						<!-- <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">

							
							  <input type="hidden" name="business" value="kin@kinskards.com">

							  
							  <input type="hidden" name="cmd" value="_cart">
							  <input type="hidden" name="add" value="1">

							  <input type="hidden" name="item_name" value="Birthday - Cake and Candle">
							  <input type="hidden" name="amount" value="3.95">
							  <input type="hidden" name="currency_code" value="USD">

							  
							  <input type="image" name="submit"
							    src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png"
							    alt="Paypal - The safer, easeir way to pay online">
							  <img alt="" width="1" height="1"
							    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
							</form> -->
					</div>

				

					
							
					
						
				</div>
			</div>
		</div>
		
			
		
	</div>
</div>


<?php include '../templates/mainFooter.php' ?>