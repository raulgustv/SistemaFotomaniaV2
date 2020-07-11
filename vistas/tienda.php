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

<div id="tiendaLoad">

<div class="container-fluid mt-2">
	<div class="row">
		<div class="col-lg-1">
			<div id="get_category">
				
			</div>
			<!-- <div class="nav nav-pills nav-stacked">
				<li class="nav-item"><a class="nav-link active" href="#"><h4>Categorías</h4></a></li>
				<li class="nav-item"><a class="nav-link" href="#">Categorías</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Categorías</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Categorías</a></li>
			</div> -->
		</div>

		

		<div class="col-lg-1"></div>

		<div class="col-lg-10">
			<div class="card card-info">
				<div>
					<div class="card-header bg-info">Tienda de productos
						
						<div class="search mt-1">
							<input type="text" id="search" placeholder="Buscar Productos..." aria-label="Buscar" >
							<button class="btn btn-success" id="searchBtn"><i class="fas fa-search"></i></button>
							<div id="listaProductos">
								</ul>
							</div>
						</div>
						
					</div>
					<div class="card-body">					
						<div class="row" id="getProduct">

							
							<!--<div class="col-lg-3">
								<div class="card-deck">
									<div class="card">
										<img class="card-img-top" src="imagenes/batidora.png">
										<div class="card-body">
											<div class="card-title">Batidora</div>
											
										</div>
										<div class="card-footer">
											<div class="card-text">$49 <a class="btn btn-success float-right" href="#"><i class="fas fa-cart-plus"></i></a></div>											
										</div>
									</div>
								</div>
							</div>-->
						</div>						
					</div>
				</div>
			</div>
		</div>	
		
	</div>

<nav aria-label="Page navigation paginate">
  <ul class="pagination justify-content-center" id="pageNo">
    
    <li class="page-item"><a page='$i' id='page' class="page-link" href="#">1</a></li>
    
    
  </ul>
</nav>

	

</div>

</div>


<?php include '../templates/mainFooter.php' ?>

