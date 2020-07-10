<?php

include_once '../templates/headerAdmin.php';
include_once '../includes/funciones.php';
include '../includes/db.php';
session_start();
checkAdmin();
checkRole();
?>



<div class="container-fluid mt-2">
	<table class="table table-striped" id="dtTablaUsers">
		<thead>
			<tr>
				<th>Id Cliente</th>
				<th>Usuario</th>
				<th>Email</th>
				<th>Tipo Usuario</th>
				<th>Último Login</th>
				<th>Fecha Registro</th>
				<th>Estado</th>
				<th>Nota</th>			
				<th>Acciones</th>  								
				
			</tr>	
		</thead>

		
		</tbody>
			

	</table>
<!-- Button trigger modal -->


<!-- Modal -->











<?php

include_once '../templates/footerAdmin.php';
include_once 'editarPermiso.php';

 ?>