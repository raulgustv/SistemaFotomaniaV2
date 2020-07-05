<?php include '../templates/mainHeader.php';
include_once '../includes/funciones.php';
include '../includes/db.php';
checkUser();?>

<div class="container-fluid">
	<div class="row mt-2 mb-2">
		<div class="col-lg-10 offset-lg-2">
			<div class="d-flex justify-content-center">
				<h2>Galería de Imágenes</h2>
			</div>
		</div>
	</div>

	<div class="row" >
		 <div class="col-lg-12 mb-2">
		 	<div class="row" id="galeriaImagenes">
		 		<!-- <div class="col-lg-3">
		 			
		 		</div>
		 	</div>
			  <a href="../vistas/galeria/01.jpg" data-lightbox="galeria" data-title="<small>La conferencia <br> Tomada con cámara: Nikon <br>Por: Arturito </small>">
				<img class="img-fluid img-thumbnail imgGal" src="../vistas/galeria/thumbs/01.jpg">	
			</a> -->			
		</div> 

		
	</div>
</div>







<?php include '../templates/mainFooter.php'; ?>

