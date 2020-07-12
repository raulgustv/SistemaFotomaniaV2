<?php

include_once '../templates/headerAdmin.php';
include_once '../includes/funciones.php';
include '../includes/db.php';
session_start();
checkAdmin();
?>



<div class="container-fluid mt-2">
	<table class="table table-striped" id="dtTablaConc">
		<thead>
			<tr>
				<th>Id Concurso</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Premio</th>
				<th>Fecha Inicio</th>
				<th>Fecha Finalizacion</th>
				<th>Cantidad Maxima</th>
                <th>Ganador</th>
				<th>Acciones</th>										
				
			</tr>	
		</thead>

		
		</tbody>
			

	</table>
<!-- Button trigger modal -->


<!-- Modal -->











<?php

include_once '../templates/footerAdmin.php';
include_once 'editarRifas.php';
include_once 'partRifa.php';

 ?>