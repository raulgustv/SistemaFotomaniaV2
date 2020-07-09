<?php 

include '../templates/mainHeader.php';
include_once '../includes/funciones.php';
include '../includes/db.php';
checkUser();

?>

<?php
	
$idPedido = $_GET['id'];
$uid = $row['id'];

$q = $con->query("SELECT comprafinalizada.transaccionId as trans, clientes.nombre, FechaCompra, comprafinalizada.idDireccion AS idDireccion, estados.nombreEstado as estado, estados.idEstado as idEstado, productos.nombre as nombreProd, cantidad, productos.precio FROM comprafinalizada INNER JOIN productos ON comprafinalizada.productoId = productos.id INNER JOIN clientes ON comprafinalizada.clienteId = clientes.id INNER JOIN estados ON comprafinalizada.estado = estados.idEstado WHERE transaccionId = '$idPedido' AND  clienteId = '$uid' ");

	$count = mysqli_num_rows($q);



	if($count == 0){
		redir("../index.php");
	}

$r = mysqli_fetch_array($q);

$nombreProd = $r['nombreProd'];
$fecha = $r['FechaCompra'];
$estadoPedido = $r['estado'];
$idEstado = $r['idEstado'];
$idDireccion = $r['idDireccion'];


 ?>

 <input type="hidden" name="idPedidoCliente" id="idPedidoCliente" idPedido="<?php echo $idPedido; ?>">






<div class="container-fluid">
	<a href="../vistas/perfil.php">Volver a mi perfil <i class="fas fa-user"></i></a>
</div>



<div class="d-flex justify-content-center">
	<div class="row">
		<div class="col-lg-12">
			<lottie-player src="https://assets3.lottiefiles.com/datafiles/CT9ONq0UkBHUb0g/data.json"  background="transparent"  speed="1"  style="width: 500px; height: 250px;" loop   autoplay></lottie-player>
		</div>
	</div>
</div>

<div class="d-flex justify-content-center">
	<div class="row mt-4">
		<div class="col-lg-12">
			<h3>Tu Pedido: <?php echo $idPedido; ?></h3>
			<!--  -->		
		</div>	
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<hr class="solid">
	</div>	
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6">
			<div class="row">
				<div class="col-lg-6">
					<h6>Fecha y hora de compra:</h6>
					<p><?php echo $fecha ?></p>
					
				</div>
				<div class="col-lg-6">
					<img class="iconosPedido" src="../logos/calendario.svg">
				</div>

			</div>
			<hr class="solid">

			<div class="row">
				<div class="col-lg-6">
					<h6>Estado:</h6>
					<p><?php echo $estadoPedido ?></p>				
				</div>
				<div class="col-lg-6">
				
					<?php
						if($idEstado == 1 || $idEstado == 2){
							?> <img class="iconosPedido" src="../logos/successMail.gif">	
					<?php }else if ($idEstado >= 3 && $idEstado < 7 ) {
						?> <img class="iconosPedido" src="../logos/deliveryTruck.gif">	
					<?php	} else if ($idEstado >= 7) { ?>
							<img class="iconosPedido" src="../logos/cancel.gif">	
					<?php	} ?>
					
				</div>
			</div>			
		</div>

			<?php 

			$qd = $con->query("SELECT idDir, direccion, direccion2, provincia.provincia as prov, canton.canton as cant, distrito.distrito as distrito, zip, clientes.nombre, main FROM direccion INNER JOIN provincia ON direccion.idProv = provincia.idProv INNER JOIN canton ON direccion.idCanton = canton.idCanton INNER JOIN distrito on direccion.idDistrito = distrito.idDistrito INNER JOIN clientes on direccion.idCliente = clientes.id WHERE idDir = '$idDireccion'");

			$rd = mysqli_fetch_array($qd);

			$addLine1 = $rd['direccion'];
			$addLine2 = $rd['direccion2'];
			$canton = $rd['cant'];
			$distrito = $rd['distrito'];
			$prov = $rd['prov'];
			$zip = $rd['zip'];



		 ?>


		

		<div class="col-lg-6">
			<div class="row">
				<div class="col-lg-6">					
					<h6>Direccion de Envío:</h6>
					<p><?php echo $addLine1, $addLine2; ?><br>
					<?php echo $canton; ?>, <?php echo $distrito; ?><br>
					 <?php echo $prov; ?>,
					 <?php echo $zip; ?><br>
					Teléfono: 8811-96-58</p>
								
				</div>
				<div class="col-lg-6">
					<img src="../logos/location.svg" class="iconosPedido">
				</div>		
			</div>

	
			<hr class="solid">
	</div>
	</div>



</div>

<div class="d-flex justify-content-center">
	<div class="row mt-4">
		<div class="col-lg-12">
			<h3>Detalles del pedido</h3>			
		</div>	
	</div>
</div>


<div class="container-fluid">
	
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Cantidad</th>
				<th>Precio Unitario</th>
				<th>Precio Final</th>
			</tr>

		</thead>

		<tbody id="tablePedidoCliente">	
	
			<!-- <tr>
				<td>Pedrito</td>
				<td>5</td>
				<td>500</td>
				<td>2500</td>
			</tr> -->
	
		</tbody>
	</table>

	<?php

		$totalFinal = 0;


		$q2 = $con->query("SELECT comprafinalizada.transaccionId as trans, productos.nombre as nombreProd, cantidad, monto FROM comprafinalizada INNER JOIN productos ON comprafinalizada.productoId = productos.id WHERE transaccionId = '$idPedido' AND  clienteId = '$uid'");


			//$cnt = mysqli_num_rows($q2);



		while($r = mysqli_fetch_array($q2)){ 

			

			

			$nombreProd = $r['nombreProd']; 
			$cant = $r['cantidad'];
			$monto = $r['monto'];

			$montoFinal = $cant * $monto;
			$totalFinal = $totalFinal + $montoFinal;	


			

		}





			?>


	<div class="shadow-lg p-3 mb-5 bg-white rounded">
		<h2 class="text-primary">Total: $<?php echo $totalFinal ?></h2>
			<?php
		if($idEstado == 1 || $idEstado == 2){
		?>

	<div class="d-flex flex-row-reverse mb-2">
			<a href="#" class="btn btn-danger" id="cancelarCliente" idPedidoCancel="<?php echo $idPedido ?>">Cancelar Pedido</a>	
	</div>

	<?php }else{ ?>
		<div class="d-flex flex-row-reverse mb-2">
			<a href="#" class="btn btn-danger disabled">Cancelar Pedido</a>	<br>			
		</div>
		<div class="d-flex flex-row-reverse">
			<small>No puedes cancelar este pedido porque ya ha sido procesado para más información<a href="principal.php#contact" class="btn btn-link"> contáctanos</a></small>
		</div>
	<?php 	} ?>
	</div>


 
</div>
	




<?php include '../templates/mainFooter.php'; ?>