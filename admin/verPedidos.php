<?php

include_once '../templates/headerAdmin.php';
include_once '../includes/funciones.php';
include '../includes/db.php';
session_start();
checkAdmin();
?>

<h3 class="text-center">Lista de pedidos</h3>

<div class="container-fluid mt-2">
	<table class="table table-striped" id="dtTablaPedidos">
		<thead>
			<tr>
				<th>Id Pedido</th>		
				<th>Cliente</th>
				<th>Fecha Compra</th>
				<th>Estado Pedido</th>
				<th>Monto Total</th>
				<th>Acciones</th> 
			</tr>	
		</thead>

		
		</tbody>
			

	</table>






<?php

include_once '../templates/footerAdmin.php';
include_once 'editarEstadoPedido.php';


 ?>