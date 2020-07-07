<?php

include_once '../templates/headerAdmin.php';
include_once '../includes/funciones.php';
include '../includes/db.php';
session_start();
checkAdmin();

?>





<div class="container-fluid mt-2">
	<table class="table table-striped" id="dtTablaProds">
		<thead>
			<tr>
				<th>Id Producto</th>
				<th>Producto</th>
				<th>Categoría </th>
				<th>Precio</th>
				<th>Descripcion</th>
				<th>Imagen Producto</th>
				<th>Acciones</th>
														
				
			</tr>	
		</thead>

		
		</tbody>
			

	</table>
<!-- Button trigger modal -->


<!-- Modal -->











<?php

include_once '../templates/footerAdmin.php';
include_once 'editarProductos.php';

 ?>