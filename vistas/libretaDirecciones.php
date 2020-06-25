<?php include '../templates/mainHeader.php' ?>


<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h3 class="text-center">Libreta de Direcciones</h3>
		</div>
		<div class="card-body">
			<div class="row" id="libretaDir">
			<!--	<div class="col-lg-4 mb-2">
					<div class="card">
						<div class="card-body">
							<p>Del parque de sabanilla 250m sur<br>
							Sabanilla, Montes de Oca<br>
							11502<br>
							Teléfono: 8811-96-58</p>
							<div class="form-check">
								<input type="checkbox" class="form-check-input" name="dirPrincipal" id="dirPrincipal">
								<label>Direccion Principal</label>
							</div>
							<div class="d-flex flex-row-reverse">								
									<a href="#" class="btn btn-danger"><i class="fas fa-window-close"></i></a> 

									<a href="#" data-toggle="modal" data-target="#form_direccion" class="btn btn-info"><i class="fas fa-edit"></i></a> 
								</div>
							</div>					
						</div>
					</div> -->
				</div>
			</div>			
			<div class="card-footer">
				<div class="d-flex justify-content-center">
				  <div class="spinner-border text-info" role="status" id="loaderBS">
				    <span class="sr-only">Loading...</span>
				  </div>
				</div>

				<div class="d-flex flex-row-reverse">
					<a href="perfil.php" class="btn btn-danger ml-2">Volver a mi perfil</a> 
					<a href="#" data-toggle="modal" data-target="#form_direccion" class="btn btn-info">Agregar nueva dirección</a>					
				</div>
			</div>
		</div>


<!--==============================================
=            Direcciones desactivadas            =
===============================================-->


<div id="accordion">
  <div class="card mt-3">
    <div class="card-header bg-warning" id="headingOne">
      <h5 class="mb-0 text-center">Ver direcciones eliminadas
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-angle-double-down"></i>
        </button>
      </h5>
    </div>

    <div class="container-fluid">

    <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="row mt-2" id="dirInactiva">
				<div class="col-lg-4 mb-2">
					<div class="card">
						<div class="card-body">
							<p>Del parque de sabanilla 250m sur<br>
							Sabanilla, Montes de Oca<br>
							11502<br>
							Teléfono: 8811-96-58</p>
							<div class="form-check">
								<input type="checkbox" class="form-check-input" name="dirPrincipal" id="dirPrincipal">
								<label>Direccion Principal</label>
							</div>
							<div class="d-flex flex-row-reverse">								
									<a href="#" class="btn btn-success" id="idDirRestore" data-toggle="tooltip" data-placement="right" title="Reactiva tu dirección"><i class="far fa-check-square"></i></a> 								
								</div>
							</div>					
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>




<!--====  End of Direcciones desactivadas  ====-->








<?php include '../templates/mainFooter.php' ?>
<?php include 'agregarDireccion.php' ?>
