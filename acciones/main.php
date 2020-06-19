<?php
	
	include '../includes/db.php';
	include '../includes/funciones.php';
	include '../acciones/sesion.php';

	/*==========================================
	=            Obtener categorias            =
	==========================================*/
	
	if(isset($_POST['category'])){
		$catQuery = $con->query("SELECT * FROM categorias");

		echo "<div class='nav nav-pills nav-stacked'>
		 	 <li class='nav-item'><a class='nav-link active' href='#'><h4>Categorías</h4></a></li>";

		if(mysqli_num_rows($catQuery)){
			while($row = mysqli_fetch_array($catQuery)){
				$catId = $row['idCategoria'];
				$catName = $row['nombre'];

				echo "<li class='nav-item'><a class='nav-link category' cid='$catId' href='#'>$catName</a></li>";
						
			}
		}
		echo "</div>";
	}
	
	/*=====  End of Obtener categorias  ======*/

	if(isset($_POST['getProduct'])){

		$limit = 8;

		if(isset($_POST['setPage'])){
			$pageNo = $_POST['pageNumber'];
			$start = ($pageNo * $limit) - $limit;
		}else{
			$start = 0;
		}

		$prodQuery = $con->query("SELECT * FROM productos WHERE status = 1 LIMIT $start, $limit");

		if(mysqli_num_rows($prodQuery)){
			while($row = mysqli_fetch_array($prodQuery)){

				$idProducto = $row['id'];
				$nombreProducto = $row['nombre'];
				$precioProducto = $row['precio'];
				$imagenProducto = $row['imagen'];



				echo "<div class='col-lg-3'>
								<div class='card-deck mb-3'>
									<div class='card'>
										<img class='card-img-top rounded mx-auto d-block' src='imagenes/$imagenProducto'>
										<div class='card-body'>
											<div class='card-title'>$nombreProducto</div>											
										</div>
										<div class='card-footer'>
											<div class='card-text'>$$precioProducto<button pid='$idProducto' id='product' class='btn btn-success float-right'><i class='fas fa-cart-plus'></i></button></div>											
										</div>
									</div>
								</div>
						</div>";
			}
		}
	}

	/*=========================================
	=            Filtro y búsqueda            =
	=========================================*/
	
	if(isset($_POST['selectedCat']) || isset($_POST['search'])){

		if(isset($_POST['selectedCat'])){
			$id = $_POST['catId'];
			$sql = $con->query("SELECT * FROM productos WHERE idCategoria = '$id' ");
		}else if(isset($_POST['search'])){
			$keyword = $_POST['keyword'];
			$sql = $con->query("SELECT * FROM productos WHERE nombre LIKE '%$keyword%' ");
		}

		

		if(mysqli_num_rows($sql) > 0){
			while($row = mysqli_fetch_array($sql)){
				$idProducto = $row['id'];
				$nombreProducto = $row['nombre'];
				$precioProducto = $row['precio'];
				$imagenProducto = $row['imagen'];

				echo "<div class='col-lg-3'>
								<div class='card-deck mb-3'>
									<div class='card'>
										<img class='card-img-top rounded mx-auto d-block' src='imagenes/$imagenProducto'>
										<div class='card-body'>
											<div class='card-title'>$nombreProducto</div>											
										</div>
										<div class='card-footer'>
											<div class='card-text'>$$precioProducto<button pid='$idProducto' id='product' class='btn btn-success float-right'><i class='fas fa-cart-plus'></i></button></div>											
										</div>
									</div>
								</div>
						</div>";

			}
		}else{
			echo "<div class='alert alert-danger' role='alert'>
				  No se encontró ningún producto bajo esta búsqueda
				</div>";
		}

	}
	
	/*=====  End of Filtro y búsqueda  ======*/
	
	/*=========================================
	=            Agregar a carrito            =
	=========================================*/


	
	if(isset($_POST['addToCart'])){

		 $uid = $row['id']; 
		 $cant = $_POST['qty'];
		 $prodId = $_POST['prodId'];

		 $q2 = $con->query("SELECT * FROM productos WHERE id='$prodId'");
		 $row = mysqli_fetch_array($q2);
		 $precio = $row['precio'];
		 $nombreProd = $row['nombre'];
		 $total = $cant * $precio;

		 $q = $con->query("SELECT * FROM carro WHERE idCliente = '$uid' and idProducto ='$prodId'");
		 if(mysqli_num_rows($q) > 0){
		 	$con->query("UPDATE carro SET cantidad = cantidad + $cant, total = total+$total WHERE idCliente = '$uid' AND idProducto = '$prodId'");
		 	echo "Productos agregados correctamente";
		 }else{

		 	 $stmt = $con->prepare("INSERT INTO carro (idCliente,idProducto,nombreProducto,cantidad,precio,total) VALUES (?,?,?,?,?,?)");
		 	 $stmt->bind_param("iisiii", $uid,$prodId,$nombreProd,$cant,$precio,$total);

			 if($stmt->execute()){
					echo "Productos agregados correctamente";
				}else{
					echo "No se pudieron agregar productos al carrito";
				}

				$stmt->close();
				$con->close();

		 }

		
		
	}
	
	/*=====  End of Agregar a carrito  ======*/


	/*===============================================
	=            Obtener productos Carro            =
	===============================================*/

	if(isset($_POST['getCartCheckout'])){

		if(isset($_POST['getCartCheckout'])){

		$uid = $row['id'];

		$q1 = $con->query("SELECT * FROM carro WHERE idCliente ='$uid'");

		if(mysqli_num_rows($q1) > 0){

		while($r=mysqli_fetch_array($q1)){
			$q2 = $con->query("SELECT * FROM productos WHERE id = '".$r['idProducto']."'");
			$row = mysqli_fetch_array($q2);

			$idProducto = $r['idProducto'];
			$cantidad = $r['cantidad'];
			$precio = $row['precio'];
			$imagen = $row['imagen'];
			$producto = $row['nombre'];

			$precioFinal = $precio * $cantidad;

			echo "<tr class='d-flex'>
				<td class='col-2'><img class='cartDisplay' src='imagenes/$imagen'></td>
				<td class='col-2'>$producto</td>
				<td class='col-1'><input type='text' class='form-control qty' id='qty-$idProducto' pid='$idProducto' value='$cantidad'></td>
				<td class='col-2'><input type='text' class='form-control precio' id='precio-$idProducto' pid='$idProducto' value='$precio' disabled></td>
				<td class='col-1'><input type='text' class='form-control' value='$0' disabled></td>
				<td class='col-2'><input type='text' class='form-control total' id='total-$idProducto' pid='$idProducto' value='$precioFinal' disabled></td>
				<td class='col-2'>
					<a class='btn btn-danger' id='removeProduct' removeId='$idProducto' href='#'><i class='fas fa-trash'></i></a>
					<a class='btn btn-success' id='updateProduct' updateId='$idProducto' href='#'><i class='fas fa-check-circle'></i></a>
				</td>
			</tr>";
			
			}
		}else{
			echo "<div class='alert alert-danger text-center' role='alert'>
				  Carrito está vacío
				</div>";
		}
	}		
}

	
	/*=====  End of Obtener productos Carro  ======*/

	if(isset($_POST['getTotal'])){

		$uid = $row['id'];
		$montoTotal = 0;

/*
		$queryTotal = $con->query("SELECT SUM(total) AS montoTotal FROM carro WHERE idCliente ='$uid'");
		$r = mysqli_fetch_assoc($queryTotal);
		$sum = $r['montoTotal'];

		echo "<div class='col-lg-12'><b>Total: $$sum</b></div>";
*/
		$q = $con->query("SELECT * FROM carro WHERE idCliente = '$uid'");
		while ($r = mysqli_fetch_array($q)){

			$total = $r['total']; 
			$precioArray = array($total);
			$total_sum = array_sum($precioArray);
			$montoTotal = $montoTotal + $total_sum;
			setcookie('mTotal', $montoTotal, strtotime("+1day"), "/", "", "", TRUE);

		}

		

		echo "<div class='col-lg-12' id='montoPagar'><b>Total: $$montoTotal</b></div>";



	}

	/*========================================
	=            Carrito Checkout            =
	========================================*/
	
	if(isset($_POST['pagar'])){

		$uid = $row['id'];

		echo '<form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">							
				<input type="hidden" name="business" value="sb-g47dzi1245437@business.example.com">
				<input type="hidden" name="cmd" value="_cart">
				<input type="hidden" name="upload" value="1">';

			$x = 0;
			$sql = $con->query("SELECT * FROM carro WHERE idCliente = '$uid'");
			if(mysqli_num_rows($sql) > 0){
			while($r=mysqli_fetch_array($sql)){
				$x++;

				echo '<input type="hidden" name="item_name_'.$x.'" value="'.$r['nombreProducto'].'">
					  <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
					  <input type="hidden" name="amount_'.$x.'" value="'.$r['precio'].'">
					  <input type="hidden" name="quantity_'.$x.'" value="'.$r['cantidad'].'">';

			}

			echo '<input type="hidden" name="return" value="http://localhost/sistemafotomaniav2/vistas/pago.php"/>
					<input type="hidden" name="cancel_return" value="http://localhost/sistemafotomaniav2/vistas/pagoCancelado.php"/>
						<input type="hidden" name="currency_code" value="USD"/>
						<input type="hidden" name="custom" value="'.$uid.'">
						<input class="botonPay" type="image" name="submit" 
						src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png"
						alt="Paypal - The safer, easeir way to pay online">
						<img alt="" width="1" height="1"
						src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
				</form>';

	}else{
		echo "";
	}			
}


	
	
	/*=====  End of Carrito Checkout  ======*/

	/*========================================
	=            Acciones Carrito            =
	========================================*/
	
	if(isset($_POST['removerCarro'])){
		$prodId = $_POST['idRemover'];
		$uid = $row['id'];

		$sql = $con->prepare("DELETE FROM carro WHERE idCliente =? AND idProducto=?");
		$sql->bind_param("ii", $uid,$prodId);
		$sql->execute();
		$sql->close();

	}

	if(isset($_POST['updateQty'])){
		$prodId = $_POST['updateId'];
		$cant = $_POST['cant'];
		$precio = $_POST['precio'];
		$total = $_POST['total'];
		$uid = $row['id'];

		$sql = $con->prepare("UPDATE carro set cantidad =?, precio =?, total=? WHERE idProducto = '$prodId' AND idCliente='$uid'");
		$sql->bind_param("iii", $cant,$precio,$total);
		$sql->execute();
		$sql->close();
	}

	
	/*=====  End of Acciones Carrito  ======*/

	/*==================================================
	=             Autocomplete search            =
	==================================================*/
	
	if(isset($_POST['query'])){

		$producto = $_POST['query'];

		$sql = $con->query("SELECT * FROM productos WHERE nombre LIKE '%$producto%'");

		echo "<ul class='list-unstyled ulResult'>";

		if(mysqli_num_rows($sql) > 0){
			while ($r = mysqli_fetch_array($sql)){

				$res = $r['nombre'];

				echo "<li class='liResult'>$res</li>";
			}
		}else{
			echo "<div class='alert alert-danger' role='alert'>
				  No se encontró ningún producto bajo esta búsqueda
				</div>";
		}

		echo "</ul>";
		
	}
	
	/*=====  End of  Autocomplete search  ======*/

	/*==================================
	=            Paginación            =
	==================================*/
	
	if(isset($_POST['page'])){
		$sql=$con->query("SELECT * FROM productos");
		$count = mysqli_num_rows($sql);
		$pageNo = ceil($count/8);

		for($i=1; $i<=$pageNo; $i++){
			echo "<li class='page-item'><a page='$i' id='page' class='page-link' href='#'>$i</a></li>";
		}
	}


	
	/*=====  End of Paginación  ======*/


	/*========================================
	=            Llenar Mini Cart            =
	========================================*/
	
	if(isset($_POST['getMiniCart'])){
		$uid = $row['id'];

		$sql = $con->query("SELECT * FROM carro WHERE idCliente = '$uid'");

		if(mysqli_num_rows($sql) > 0){
			while($r = mysqli_fetch_array($sql)){
				$idProd = $r['idProducto'];

				$q = $con->query("SELECT * FROM productos WHERE id = '$idProd'");
				$reg = mysqli_fetch_array($q);

				$img = $reg['imagen'];
				$nombre = $reg['nombre'];
				$precio =  $reg['precio'];

				echo "<div class='col-lg-4'><img class='miniCart' src='imagenes/$img'></div> 
                     <div class='col-lg-4'>$nombre</div> 
                     <div class='col-lg-4'>$precio</div>";
				
			}
		}		
	}

	if(isset($_POST['sumMiniCart'])){
		$uid = $row['id'];
		$sql = $con->query("SELECT * FROM carro WHERE idCliente = '$uid'");
		$count = mysqli_num_rows($sql);

		echo $count;
	}
	
	/*=====  End of Llenar Mini Cart  ======*/
	


	
	
	

	

	
	
	
	

?>