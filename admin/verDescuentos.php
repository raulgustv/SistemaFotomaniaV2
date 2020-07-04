<?php

include_once '../templates/headerAdmin.php';
include_once '../includes/funciones.php';
include '../includes/db.php';
session_start();
checkAdmin();
?>



<div class="container-fluid mt-2">
	<table class="table table-striped" id="dtTablaDesc">
		<thead>
			<tr>
				<th>Id Descuento</th>
				<th>Producto</th>
				<th>Titulo Oferta</th>
				<th>Descripcion</th>
				<th>Porcentaje Descuento</th>
				<th>Fecha Inicio</th>
				<th>Fecha Finalizacion</th>
				<th>Acciones</th>										
				
			</tr>	
		</thead>

		
		</tbody>
			

	</table>
<!-- Button trigger modal -->


<!-- Modal -->











<?php

include_once '../templates/footerAdmin.php';
//include_once 'editarDescuentos.php';

 ?>