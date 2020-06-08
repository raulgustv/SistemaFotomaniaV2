<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fotomanía Costa Rica</title>
	<link rel="stylesheet" type="text/css" href="../public/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/main.css">
</head>
<body>



<?php


include '../includes/db.php';
include '../acciones/sesion.php';





$cookie = $_COOKIE['mTotal'];
$uid = $row['id'];
$username = $row['usuario']; 



$transaccion = $_GET['tx'];
$resultado = $_GET['st'];
$monto = $_GET['amt'];
$clientId = $_GET['cm'];

if($cookie == $monto && $resultado = 'Completed' && $clientId = $uid){
	$sql = $con->query("SELECT * FROM carro where idCliente = '$uid'");
	if(mysqli_num_rows($sql) > 0){
		while($r = mysqli_fetch_array($sql)){
			$productId[] = $r['idProducto'];
			$cant[] = $r['cantidad'];
			$nombre = $r['nombreProducto'];
			$precio[] = $r['precio'];

			$prodArray = array($productId);
		}

		for($i=0; $i < count($productId); $i++){
			$con->query("INSERT INTO `comprafinalizada` (`compraId`, `clienteId`, `productoId`,  `cantidad`, `monto`, `transaccionId`, `FechaCompra`) VALUES (NULL, '$uid', '".$productId[$i]."', '".$cant[$i]."', '".$precio[$i]."', '$transaccion', current_timestamp())");		
		}

		$con->query("DELETE FROM carro WHERE idCliente = '$uid'");

	}


}

	

?>



<div class="d-flex justify-content-md-center align-items-center vh-100 bg-dark">
		<div class="card">
	  <div class="card-header"><h5>Gracias <?php echo $username; ?> </h5><p>Tu pago ha sido realizado con éxito</p></div>
	  <div class="card-body">
	    <h5 class="card-title">El número de transacción es: <?php echo $transaccion; ?> </h5>	    
	    <a href="principal.php" class="btn btn-primary">Volver a página princial</a>
	  </div>
	</div>
</div>


<footer>
	<script type="text/javascript" src="../public/js/jquery-3.5.0.min.js"></script>
	<script type="text/javascript" src="../public/css/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../public/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../public/sweetAlert/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="../public/js/funciones.js"></script>
</footer>	
</body>
</html>