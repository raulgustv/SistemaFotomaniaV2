<?php

include_once '../templates/headerAdmin.php';
include_once '../includes/funciones.php';
include '../includes/db.php';
session_start();
checkAdmin();
?>

<div class="container-fluid mt-2">

	<h4 class="text-center text-info">Galeria de Imágenes</h4>
	<table class="table table-striped" id="dtTablaGal">
		<thead>
			<tr>
				<th>Id Imágen</th>
				<th>Título Imagen</th>
				<th>Nombre Autor</th>
				<th>Tomada con</th>				
				<th>Imagen Principal</th>
				<th>Acciones</th>
				
			</tr>
		</thead>
	</table>
</div>





<?php

include_once '../templates/footerAdmin.php';
include_once 'editarImagen.php'; 


 ?>