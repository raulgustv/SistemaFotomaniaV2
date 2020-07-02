<?php 

include '../templates/mainHeader.php';
include '../includes/db.php'
//include '../acciones/sesion.php';
?>


<div class="d-flex justify-content-center">

<div class="card">
	<div class="card-header">
		<h4 class="text-center">Productos destacados</h4>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-12">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img class="d-block text-center carImg" src="imagenes/cargadorNikon.PNG5ef77a8728d565.23772767.png" alt="First slide">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block text-center carImg" src="imagenes/leteTamron.PNG5edeb1f77ab011.47049899.png" alt="Second slide">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block text-center carImg" src="imagenes/desktopHP.PNG5ef8c636b6c875.64015622.png" alt="Third slide">
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div> 
			</div>
		</div>
	</div>	
</div>




<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 h-50" src="imagenesGaleria/auroraBorealis.jpg5efbeecc775e67.16278688.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-50" src="imagenesGaleria/17.jpg5efa85eed136d2.28363821.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-50" src="imagenesGaleria/kayaganLake.jpg5efccaa59038f6.71415052.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>  -->
 
			
</div>






<?php include '../templates/mainFooter.php' ?>