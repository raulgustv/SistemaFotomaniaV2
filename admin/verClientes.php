<?php

include_once '../templates/headerAdmin.php';
include_once '../includes/funciones.php';
include '../includes/db.php';
session_start();
checkAdmin();
?>



<div class="container-fluid mt-2">
	<table class="table table-striped" id="dtTablaClientes">
		<thead>
			<tr>
				<th>Id Cliente</th>
				<th>Nombre Usuario</th>
				<th>Username</th>
				<th>Email</th>
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
//include_once 'editarDescuentos.php';

 ?>