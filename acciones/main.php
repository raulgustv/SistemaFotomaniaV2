<?php
	
	include '../includes/db.php';
	include '../includes/funciones.php';
	include '../acciones/sesion.php';
	include '../includes/smail.php';

	/*==========================================
	=            Obtener categorias            =
	==========================================*/
	$yatermino = 0;
	$yacomenzo = 0;

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

				$descQuery = $con->query("SELECT * FROM ofertas WHERE idProducto= '$idProducto'");
				if(mysqli_num_rows($descQuery)){
					while($rowDesc = mysqli_fetch_array($descQuery)){
						$porcentDescuento= $rowDesc['totalOferta'];
						$fechaInicio = $rowDesc['fechaInicio'];
						$fechaFinal = $rowDesc['fechaFinal'];
						date_default_timezone_set("America/Costa_Rica");
						$fechahoy = date("Y-m-d h:i:s");
						$yacomenzo = ($fechaInicio<$fechahoy);
						$yatermino = ($fechaFinal>$fechahoy);
						$totalDescuento= ($porcentDescuento/100)*$precioProducto;
					}
				}else{
					$totalDescuento=0;

				}
				if($yacomenzo==1 && $yatermino==1){
				$precioTotal = round($precioProducto - $totalDescuento);
			}else{
				$precioTotal =$precioProducto;
			}

				echo "<div class='col-lg-3'>
								<div class='card-deck mb-3'>
									<div class='card'>
										<img class='card-img-top rounded mx-auto d-block' src='imagenes/$imagenProducto'>
										<div class='card-body'>
											<div class='card-title'>$nombreProducto</div>											
										</div>
										<div class='card-footer'>
											<div class='card-text'>";
											if($precioProducto != $precioTotal){
												echo "<strike style='color:black'>
												<span style='color:red'>$$precioProducto<span>
											  </strike>";
											}
											echo "$$precioTotal<button pid='$idProducto' id='product' class='btn btn-success float-right'><i class='fas fa-cart-plus'></i></button></div>											
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
			$sql = $con->query("SELECT * FROM productos WHERE idCategoria = '$id' AND status = 1 ");
		}else if(isset($_POST['search'])){
			$keyword = $_POST['keyword'];
			$sql = $con->query("SELECT * FROM productos WHERE nombre LIKE '%$keyword%' and status = 1 ");
		}

		if(mysqli_num_rows($sql)){
			while($row = mysqli_fetch_array($sql)){

				$idProducto = $row['id'];
				$nombreProducto = $row['nombre'];
				$precioProducto = $row['precio'];
				$imagenProducto = $row['imagen'];

				$descQuery = $con->query("SELECT * FROM ofertas WHERE idProducto= '$idProducto'");
				if(mysqli_num_rows($descQuery)){
					while($rowDesc = mysqli_fetch_array($descQuery)){
						$porcentDescuento= $rowDesc['totalOferta'];
						$fechaInicio = $rowDesc['fechaInicio'];
						$fechaFinal = $rowDesc['fechaFinal'];
						date_default_timezone_set("America/Costa_Rica");
						$fechahoy = date("Y-m-d h:i:s");
						$yacomenzo = ($fechaInicio<$fechahoy);
						$yatermino = ($fechaFinal>$fechahoy);
						$totalDescuento= ($porcentDescuento/100)*$precioProducto;
					}
				}else{
					$totalDescuento=0;

				}
				if($yacomenzo==1 && $yatermino==1){
				$precioTotal = round($precioProducto - $totalDescuento);
			}else{
				$precioTotal =$precioProducto;
			}

				echo "<div class='col-lg-3'>
								<div class='card-deck mb-3'>
									<div class='card'>
										<img class='card-img-top rounded mx-auto d-block' src='imagenes/$imagenProducto'>
										<div class='card-body'>
											<div class='card-title'>$nombreProducto</div>											
										</div>
										<div class='card-footer'>
											<div class='card-text'>";
											if($precioProducto != $precioTotal){
												echo "<strike style='color:black'>
												<span style='color:red'>$$precioProducto<span>
											  </strike>";
											}
											echo "$$precioTotal<button pid='$idProducto' id='product' class='btn btn-success float-right'><i class='fas fa-cart-plus'></i></button></div>											
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
		 $descQuery = $con->query("SELECT * FROM ofertas WHERE idProducto= '$prodId'");
				if(mysqli_num_rows($descQuery)){
					while($rowDesc = mysqli_fetch_array($descQuery)){
						$porcentDescuento= $rowDesc['totalOferta'];
						$fechaInicio = $rowDesc['fechaInicio'];
						$fechaFinal = $rowDesc['fechaFinal'];
						date_default_timezone_set("America/Costa_Rica");
						$fechahoy = date("Y-m-d h:i:s");
						$yacomenzo = ($fechaInicio<$fechahoy);
						$yatermino = ($fechaFinal>$fechahoy);
						$totalDescuento= ($porcentDescuento/100)*$precio;
					}
				}else{
					$totalDescuento=0;

				}
				if($yacomenzo==1 && $yatermino==1){
				$precioTotal = round($precio - $totalDescuento);
			}else{
				$precioTotal =$precio;
				$totalDescuento=0;
			}
		 $nombreProd = $row['nombre'];
		 $total = $cant * $precioTotal;

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

			$descQuery = $con->query("SELECT * FROM ofertas WHERE idProducto= '$idProducto'");
			if(mysqli_num_rows($descQuery)){
				while($rowDesc = mysqli_fetch_array($descQuery)){
					$porcentDescuento= $rowDesc['totalOferta'];
					$fechaInicio = $rowDesc['fechaInicio'];
					$fechaFinal = $rowDesc['fechaFinal'];
					date_default_timezone_set("America/Costa_Rica");
					$fechahoy = date("Y-m-d h:i:s");
					$yacomenzo = ($fechaInicio<$fechahoy);
					$yatermino = ($fechaFinal>$fechahoy);
					$totalDescuento= (round(($porcentDescuento/100)*$precio));
					
				}
			}else{
				$totalDescuento=0;

			}
			if($yacomenzo==1 && $yatermino==1){
			$precioTotal = round($precio - $totalDescuento);
		}else{
			$precioTotal =$precio;
			$totalDescuento = 0;
		}

			$precioFinal = $precioTotal*$cantidad;

			echo "<tr class='d-flex'>
				<td class='col-2'><img class='cartDisplay' src='imagenes/$imagen'></td>
				<td class='col-2'>$producto</td>
				<td class='col-1'><input type='text' class='form-control qty' id='qty-$idProducto' pid='$idProducto' value='$cantidad'></td>
				<td class='col-2'><input type='text' class='form-control precio' id='precio-$idProducto' pid='$idProducto' value='$precio' disabled></td>
				<td class='col-1'><input type='text' class='form-control descuento' id='descuento-$idProducto' pid='$idProducto' value='$totalDescuento' disabled></td>
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

		$descQuery = $con->query("SELECT * FROM ofertas WHERE idProducto= '$prodId'");
			if(mysqli_num_rows($descQuery)){
				while($rowDesc = mysqli_fetch_array($descQuery)){
					$porcentDescuento= $rowDesc['totalOferta'];
					$fechaInicio = $rowDesc['fechaInicio'];
					$fechaFinal = $rowDesc['fechaFinal'];
					date_default_timezone_set("America/Costa_Rica");
					$fechahoy = date("Y-m-d h:i:s");
					$yacomenzo = ($fechaInicio<$fechahoy);
					$yatermino = ($fechaFinal>$fechahoy);
					$totalDescuento= (($porcentDescuento/100)*$precio);
					
				}
			}else{
				$totalDescuento=0;

			}
			if($yacomenzo==1 && $yatermino==1){
			$precioTotal = round($precio - $totalDescuento);
		}else{
			$precioTotal =$precio;
			$totalDescuento=0;
		}

			$precioFinal = $precioTotal;
			$valortotal = $precioFinal*$cant;

		$sql = $con->prepare("UPDATE carro set cantidad =?, precio =?, total=? WHERE idProducto = '$prodId' AND idCliente='$uid'");
		$sql->bind_param("iii", $cant,$precio,$valortotal);
		$sql->execute();
		$sql->close();
	}

	
	/*=====  End of Acciones Carrito  ======*/

	/*==================================================
	=             Autocomplete search            =
	==================================================*/
	
	if(isset($_POST['query'])){

		$producto = $_POST['query'];

		$sql = $con->query("SELECT * FROM productos WHERE nombre LIKE '%$producto%' AND status = 1");

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
		$sql=$con->query("SELECT * FROM productos WHERE status = 1");
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
				$precio =  $r['precio'];

				$descQuery = $con->query("SELECT * FROM ofertas WHERE idProducto= '$idProd'");
			if(mysqli_num_rows($descQuery)){
				while($rowDesc = mysqli_fetch_array($descQuery)){
					$porcentDescuento= $rowDesc['totalOferta'];
					$fechaInicio = $rowDesc['fechaInicio'];
					$fechaFinal = $rowDesc['fechaFinal'];
					date_default_timezone_set("America/Costa_Rica");
					$fechahoy = date("Y-m-d h:i:s");
					$yacomenzo = ($fechaInicio<$fechahoy);
					$yatermino = ($fechaFinal>$fechahoy);
					$totalDescuento= (($porcentDescuento/100)*$precio);
					
				}
			}else{
				$totalDescuento=0;

			}
			if($yacomenzo==1 && $yatermino==1){
			$precioTotal = round($precio - $totalDescuento);
		}else{
			$totalDescuento=0;
			$precioTotal =$precio;
		}

				echo "<div class='col-lg-4'><img class='miniCart' src='imagenes/$img'></div> 
                     <div class='col-lg-4'>$nombre</div> 
                     <div class='col-lg-4'>$precioTotal</div>";
				
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


	/*============================================
	=            LLenar datos cliente            =
	============================================*/

	if(isset($_POST['cargarCliente'])){
		$uid = $row['id'];

		$q = $con->prepare("SELECT nombre FROM clientes WHERE id = ? ");
		$q->bind_param("i", $uid);
		$q->execute();

		$r = $q->get_result();
		$row = mysqli_fetch_array($r);

		$nombre = $row['nombre'];

		echo "<input id='editNombre' type='text' class='form-control' id='editNombre' name='editNombre' value='$nombre'>";

	}

	if(isset($_POST['cargarUser'])){
		$uid = $row['id'];

		$q = $con->prepare("SELECT usuario FROM clientes WHERE id = ? ");
		$q->bind_param("i", $uid);
		$q->execute();

		$r = $q->get_result();
		$row = mysqli_fetch_array($r);

		$user = $row['usuario'];

		echo "<input data-toggle='tooltip' data-placement='right' title='No puedes editar el nombre de usuario' trigger='hover focus' type='text' class='form-control' id='editUser' name='editUser' value='$user' disabled>
											<span class='input-group-addon'>
												<i class='fas fa-info infoIcon' id='infoIcon'></i>
											</span>";
	}
	
	
	
	/*=====  End of LLenar datos cliente  ======*/

	/*=============================================
	=            Section Cargar datos direccion            =
	=============================================*/
	
	if(isset($_POST['cargarProvincia'])){
		
		$q = $con->prepare("SELECT * FROM provincia");
		//$q->bind_param();
		$q->execute();

		$row = $q->get_result();

		while($r = mysqli_fetch_array($row)){
			$provId = $r['idProv'];
			$provincia = $r['provincia'];

			echo "<option value='$provId'>$provincia</option>";
                      
		}		
	}

	if(isset($_POST['cargarCanton'])){
		$idProv = $_POST['idProv'];

		$q = $con->prepare("SELECT idCanton, canton, provincia.provincia AS provincia FROM canton INNER JOIN provincia ON canton.idProv = provincia.idProv WHERE provincia.idProv = ?");
		$q->bind_param("i", $idProv);
		$q->execute();
		
		$row = $q->get_result();

		while($r = mysqli_fetch_array($row)){
			$idCanton = $r['idCanton'];
			$canton = $r['canton'];

			echo "<option value='$idCanton'>$canton</option>";
		}



	}


	if(isset($_POST['cargarDist'])){
		$idCant = $_POST['idCant'];

		$q = $con->prepare("SELECT idDistrito, distrito.distrito as distrito FROM canton INNER JOIN distrito on canton.idCanton = distrito.idCanton WHERE canton.idCanton = ?");
		$q->bind_param("i", $idCant);
		$q->execute();
		
		$row = $q->get_result();

		while($r = mysqli_fetch_array($row)){
			$idDistrito = $r['idDistrito'];
			$distrito = $r['distrito'];

			echo "<option value='$idDistrito'>$distrito</option>";
		}



	}
	
	/*=====  End of Section Cargar datos direccion  ======*/

	/*==================================================
	=            Cargar Main address Perfil            =
	==================================================*/
	

	if(isset($_POST['cargarDirMain'])){
		
		$uid = $row['id'];

		$q = $con->prepare("SELECT direccion, direccion2, provincia.provincia as prov, canton.canton as cant, distrito.distrito as distrito, zip, clientes.nombre FROM direccion INNER JOIN provincia ON direccion.idProv = provincia.idProv INNER JOIN canton ON direccion.idCanton = canton.idCanton INNER JOIN distrito on direccion.idDistrito = distrito.idDistrito INNER JOIN clientes on direccion.idCliente = clientes.id WHERE clientes.id = ? AND main = 1 AND status =1");

		$q->bind_param("i", $uid);
		$q->execute();
		//$q->close();

		$row = $q->get_result();

		if(mysqli_num_rows($row) > 0){
			$r = mysqli_fetch_array($row);

			$dir1 = $r['direccion'];
			$dir2 = $r['direccion2'];
			$prov = $r['prov'];
			$cant = $r['cant'];
			$dist = $r['distrito'];
			$zip = $r['zip'];



			echo "<h6>Direccion de Envío:</h6>
				  <p>$dir1<br>$dir2
					$cant, $dist<br>
					$prov, $zip<br>
					Teléfono: 8811-96-58</p>";

		}else{
			echo "<div class='alert alert-danger' role='alert'>
 				 No existe una dirección registrada
 				 <a href='#' data-toggle='modal' data-target='#form_direccion'>Agrega una dirección</a>
				 </div>";
		}



	}	
	
	/*=====  End of Cargar Main address Perfil  ======*/

	if(isset($_POST['agregarDireccion'])){
		$uid = $row['id'];
		$dir1 = $_POST['addLine1'];
		$dir2 = $_POST['addLine2'];
		$prov = $_POST['provincia'];
		$cant = $_POST['canton'];
		$dist = $_POST['distrito'];
		$zip = $_POST['zip'];

		$q = $con->prepare("SELECT * FROM direccion WHERE status = 1 AND idCliente = ?");
		$q->bind_param("i", $uid);
		$q->execute();

		$row = $q->get_result();

		if(mysqli_num_rows($row) > 0){ //le mete cero
			$q2 = $con->prepare("INSERT INTO direccion (direccion,direccion2,idProv,idCanton,idDistrito,zip,idCliente, main) VALUES (?,?,?,?,?,?,?,0)");
			$q2->bind_param("ssiiisi", $dir1, $dir2,$prov,$cant,$dist,$zip,$uid);
			$q2->execute();
			$q2->close();
			echo "bien";
		}else{
			$q3 = $con->prepare("INSERT INTO direccion (direccion,direccion2,idProv,idCanton,idDistrito,zip,idCliente, main) VALUES (?,?,?,?,?,?,?,1)");
			$q3->bind_param("ssiiisi", $dir1, $dir2,$prov,$cant,$dist,$zip,$uid);
			$q3->execute();
			$q3->close();
			echo "bien";
		}

	}

	/*===========================================
	=            Libreta Direcciones            =
	===========================================*/
	if(isset($_POST['cargarLibretaDir'])){
	
	$uid = $row['id'];

	$q = $con->prepare("SELECT idDir, direccion, direccion2, provincia.provincia as prov, canton.canton as cant, distrito.distrito as distrito, zip, clientes.nombre, main FROM direccion INNER JOIN provincia ON direccion.idProv = provincia.idProv INNER JOIN canton ON direccion.idCanton = canton.idCanton INNER JOIN distrito on direccion.idDistrito = distrito.idDistrito INNER JOIN clientes on direccion.idCliente = clientes.id WHERE clientes.id = ? AND status =1");

		$q->bind_param("i", $uid);
		$q->execute();
		

		$row = $q->get_result();	

		if(mysqli_num_rows($row) > 0){
			while($r = mysqli_fetch_array($row)){


			$idDir = $r['idDir'];
			$dir1 = $r['direccion'];
			$dir2 = $r['direccion2'];
			$prov = $r['prov'];
			$cant = $r['cant'];
			$dist = $r['distrito'];
			$zip = $r['zip'];
			$main = $r['main'];

			if($main!=1){
				echo "<div class='col-lg-4 mb-2'>
					<div class='card'>
						<div class='card-body'>
							<p>$dir1 $dir2<br>
							$cant, $dist<br>
							$prov, $zip<br>
							Teléfono: 8811-96-58</p>
							<div class='form-check'>
								<input type='checkbox' class='form-check-input' name='dirPrincipal' idDir='$idDir' id='dirPrincipal'>
								<label>Direccion Principal</label>
							</div>
							<div class='d-flex flex-row-reverse'>								
									<a href='#' class='btn btn-danger' id='borrarDir' idBorrarDir='$idDir'><i class='fas fa-window-close'></i></a> 
 
								</div>
							</div>					
						</div>
					</div>";
			}
			else{
				echo "<div class='col-lg-4 mb-2'>
					<div class='card'>
						<div class='card-body'>
							<p>$dir1 $dir2<br>
							$cant, $dist<br>
							$prov, $zip<br>
							Teléfono: 8811-96-58</p>
							<div class='form-check'>
								<input type='checkbox' class='form-check-input' name='dirPrincipal' id='dirPrincipal' idDir='$idDir' checked>
								<label>Direccion Principal</label>
							</div>
							<div class='d-flex flex-row-reverse'>								
									<a href='#' class='btn btn-danger' idBorrarDir='$idDir' id='borrarDir'><i class='fas fa-window-close' ></i></a> 
									
								</div>
							</div>					
						</div>
					</div>";
			}

			}
		}else{
			echo "<div class='alert alert-danger' role='alert'>
 				 No existe una dirección registrada
 				 <a href='#' data-toggle='modal' data-target='#form_editDirecion'>Agrega una dirección</a>
				 </div>";
		}
	}
	
	/*=====  End of Libreta Direcciones  ======*/


	/*==================================================
	=            Direccion Principal Select            =
	==================================================*/
	
	if(isset($_POST['nuevaPrincipal'])){

		$uid = $row['id'];
		$idDir = $_POST['dirId']; //direccion nueva

		$q = $con->prepare("SELECT idDir FROM direccion WHERE idCliente = ? AND main = 1");
		$q->bind_param("i", $uid);
		$q->execute();

		$row = $q->get_result();
		$r = mysqli_fetch_array($row);

		$idDirOld = $r['idDir']; //direccion vieja

		$q2 = $con->prepare("UPDATE direccion SET main = 0 WHERE idCliente = ? AND idDir = ?");
		$q2->bind_param("ii", $uid, $idDirOld);
		$q2->execute();

		$q3 = $con->prepare("UPDATE direccion SET main = 1 WHERE idCliente = ? AND idDir = ?");
		$q3->bind_param("ii", $uid, $idDir);
		$q3->execute();


	}
	
	/*=====  End of Direccion Principal Select  ======*/

	/*======================================================
	=            Editar Nombre Apellido Usuario            =
	======================================================*/
	
	if(isset($_POST['updateNombre'])){

		$editNombre = $_POST['editNombre'];
		$uid = $row['id'];

		$q = $con->prepare("UPDATE clientes SET nombre = ? WHERE id = ? ");
		$q->bind_param("si", $editNombre, $uid);
		$q->execute();
		$q->close();


	}

	if(isset($_POST['updatePass'])){
		$uid = $row['id'];
		$editPass = $_POST['editPass'];
		$newPassHash = sha1($editPass);



		$q = $con->prepare("SELECT pass FROM clientes WHERE id =?");
		$q->bind_param("i", $uid);
		$q->execute();

		$row = $q->get_result();
		$r = mysqli_fetch_array($row);

		$passOld = $r['pass'];

		if($passOld == $newPassHash){
			echo "false";
		}else{
			echo "true";
			$q2 = $con->prepare("UPDATE clientes SET pass = ? WHERE id = ?");
			$q2->bind_param("si", $newPassHash, $uid);
			$q2->execute();
			$q2->close();
		}

		
	}
	
	/*=====  End of Editar Nombre Apellido Usuario  ======*/
	
	/*========================================
	=           Borrar Dirección           =
	========================================*/
	
	if(isset($_POST['borrarDir'])){

		$idDir = $_POST['idDir']; 	
		$uid = $row['id'];

		$q = $con->prepare("SELECT main FROM direccion WHERE idDir = ? AND idCliente = ?");
		$q->bind_param("ii", $idDir, $uid);
		$q->execute();

		$row = $q->get_result();
		$r = mysqli_fetch_array($row);

		$isMain = $r['main'];

	//		echo $isMain;

	
		if($isMain == 1){		
			echo "false";
		}else {
			$q2 = $con->prepare("UPDATE direccion SET status = 0 WHERE idDir = ? AND idCliente = ?");
			$q2->bind_param("ii", $idDir, $uid);
			$q2->execute();
			$q2->close();
			echo "true";
		}

		$q->close();

		
	}
	
	/*=====  End ofBorrar Dirección ======*/


	/*=============================================
	=            Direcciones Inactivas            =
	=============================================*/
	
	if(isset($_POST['dirInactiva'])){

		$uid = $row['id'];

		$q = $con->prepare("SELECT idDir, direccion, direccion2, provincia.provincia as prov, canton.canton as cant, distrito.distrito as distrito, zip, clientes.nombre, main FROM direccion INNER JOIN provincia ON direccion.idProv = provincia.idProv INNER JOIN canton ON direccion.idCanton = canton.idCanton INNER JOIN distrito on direccion.idDistrito = distrito.idDistrito INNER JOIN clientes on direccion.idCliente = clientes.id WHERE clientes.id = ? AND status = 0");

		$q->bind_param("i", $uid);
		$q->execute();
		

		$row = $q->get_result();

		if(mysqli_num_rows($row)){

			while($r = mysqli_fetch_array($row)){

				$idDir = $r['idDir'];
				$dir1 = $r['direccion'];
				$dir2 = $r['direccion2'];
				$prov = $r['prov'];
				$cant = $r['cant'];
				$dist = $r['distrito'];
				$zip = $r['zip'];
				$main = $r['main'];


				echo "<div class='col-lg-4 mb-2'>
					<div class='card'>
						<div class='card-body'>
							<p>$dir1 $dir2<br>
							$cant, $dist<br>
							$prov, $zip<br>
							Teléfono: 8811-96-58</p>							
							<div class='d-flex flex-row-reverse'>								
									<a href='#' class='btn btn-success' restore = '$idDir' id='idDirRestore' data-toggle='tooltip' data-placement='right' title='Reactiva tu dirección'><i class='far fa-check-square'></i></a> 								
								</div>
							</div>					
						</div>
					</div>";
			}
		}else{
			echo "false";
		}

		

	}
	
	/*=====  End of Direcciones Inactivas  ======*/

	if(isset($_POST['restoreDir'])){

		$idRestore = $_POST['idRestore'];
		$uid = $row['id'];


		$q = $con->prepare("UPDATE direccion SET status = 1 WHERE idCliente = ? AND idDir = ?");
		$q->bind_param("ii", $uid, $idRestore);
		$q->execute();
		$q->close();



		
	}

	/*=======================================
	=            Pedidos cliente            =
	=======================================*/
	
	if(isset($_POST['getCustomerOrder'])){

 		$uid = $row['id'];

		$q = $con->prepare("SELECT comprafinalizada.transaccionId as trans, FechaCompra, estados.nombreEstado, monto FROM comprafinalizada INNER JOIN productos ON comprafinalizada.productoId = productos.id INNER JOIN clientes ON comprafinalizada.clienteId = clientes.id INNER JOIN estados ON comprafinalizada.estado = estados.idEstado WHERE clientes.id = ?  GROUP BY transaccionId");
		$q->bind_param("i", $uid);
		$q->execute();

		$r = $q->get_result();

		$data = array();

		while($row = mysqli_fetch_array($r)){
			$data[] = $row;
		}

		echo json_encode($data);
	}
	
	/*=====  End of Pedidos cliente  ======*/


	/*==========================================
	=            Cancelar mi pedido            =
	==========================================*/
	
	if(isset($_POST['cancelaMiPedido'])){
		$idPedido = $_POST['idPedido'];

		$q = $con->prepare("UPDATE comprafinalizada SET estado = 11 WHERE transaccionId = ?");
		$q->bind_param("i", $idPedido);
		$q->execute();
		$q->close();
	}
	
	
	/*=====  End of Cancelar mi pedido  ======*/


	/*==================================================
	=            Ver tabla pedidos cliente            =
	==================================================*/
	
	if(isset($_POST['cargarPedido'])){

		$pedidoId = $_POST['pedidoId'];
		$uid = $row['id'];

		$totalFinal = 0;


		$q2 = $con->query("SELECT comprafinalizada.transaccionId as trans, productos.nombre as nombreProd, cantidad, monto FROM comprafinalizada INNER JOIN productos ON comprafinalizada.productoId = productos.id WHERE transaccionId = '$pedidoId' AND  clienteId = '$uid'");

		while($r = mysqli_fetch_array($q2)){ 
			$nombreProd = $r['nombreProd']; 
			$cant = $r['cantidad'];
			$monto = $r['monto'];

			$montoFinal = $cant * $monto;
			$totalFinal = $totalFinal + $montoFinal;

			echo "<tr>
				<td>$nombreProd</td>
				<td>$cant</td>
				<td>$monto</td>
				<td>$montoFinal</td>
				</tr>";
				
	}
}

	
	/*=====  End of Ver tabla pedidos cliente  ======*/


	/*============================================
	=            Ver Galeria Imagenes            =
	============================================*/
	
	if(isset($_POST['getImgGal'])){

		$q = $con->prepare("SELECT * FROM galeria");
		$q->execute();

		$row = $q->get_result();

		if(mysqli_num_rows($row) > 0){
			while ($r = mysqli_fetch_array($row)){
				$nombre = $r['nombre'];
				$autor = $r['autor'];
				$camara = $r['cam'];
			
				$imagen = $r['imagen'];

				echo "<div class='col-lg-2'>

						<a href='../vistas/imagenesGaleria/$imagen' data-lightbox='galeria' data-title='<small><b>$nombre</b> <br> Tomada con: $camara  <br>Por: <i>$autor</i> </small>'>
							<img class='img-fluid img-thumbnail imgGal' src='../vistas/imagenesGaleria/$imagen'>	
						</a></div>"
						;

			}
		}
		else{
			echo "<div class='col-lg-12'>
					<div class='alert alert-danger' role='alert'>
					  	<h4 class='text-center'>No hay imagenes disponibles en la galería.... Pronto subiremos nuevas imágenes</h4>			  	
					</div>
				</div>
				<div class='col-lg-12'>
					<div class='d-flex justify-content-center'>
						<img src='../logos/emptyGal.jpg' class='emptyGal'>
					</div>
				</div>";
		}
	}
	
	/*=====  End of Ver Galeria Imagenes  ======*/
	
	
	
		
	
	

	
	
	
	
	
	


	
	/*========== Llenar concurso =======*/

	if(isset($_POST['getConcursos'])){
      $srl = '..\vistas\imagenes\ ';
	  $srclink = str_replace(' ', '', $srl);
	  $cont = 1;
		$concQuery = $con->query("SELECT * FROM concurso");

		if(mysqli_num_rows($concQuery)){
			while($row = mysqli_fetch_array($concQuery)){
                $idConc = $row['idConcurso'];
				$nombre = $row['nombre'];
	            $descripcion  = $row['descripcion'];
	            $cantidadmax = $row['cantidadMaxima'];
	            $idPrem = $row['idPremio'];
	            $fechaInicio = $row['fechaInicio'];
				$fechaFinalizacion = $row['fechaFinal'];
				date_default_timezone_set("America/Costa_Rica");
				$fechahoy = date("Y-m-d h:i:s");
				$yacomenzo = ($fechaInicio<$fechahoy);
				$yatermino = ($fechaFinalizacion>$fechahoy);
	           // $fechaIFormat = date("Y-m-d h:i:s",$fechaInicio);
			   // $fechaFFormat = date("Y-m-d h:i:s",$fechaFinalizacion);
			   if($yacomenzo==1 && $yatermino==1){
				$prodQuery = $con->query("SELECT * FROM productos WHERE id= '$idPrem'");
				$cxcQuery = $con->query("SELECT * FROM clientesxconcurso WHERE idConcurso= '$idConc'");
				$cParticipantes = mysqli_num_rows($cxcQuery);
				if(mysqli_num_rows($prodQuery)){
					while($rowProd = mysqli_fetch_array($prodQuery)){
						$idProducto = $rowProd['id'];
				        $nombreProducto = $rowProd['nombre'];
				        $precioProducto = $rowProd['precio'];
				        $imagenProducto = $rowProd['imagen'];

						echo '<div class="w3-card-4 w3-grey w3-center" style="width:100%">

						<div class="w3-container w3-center">
						  <h3>Concurso '; echo $cont; echo '</h3>
						  <img src="'; echo $srclink; echo $imagenProducto; echo '"alt="Producto" style="width:20%">
						  <h5>'; echo $nombre; echo '</h5>
						  <h3>'; echo $cParticipantes; echo '/'; echo $cantidadmax; echo '</h3>
					
						  <div class="w3-section">
							<button cid="'; echo $idConc; echo '" id="ingConcurso" class="btn btn-success">Ingresar</button>
							<button cid="'; echo $idConc; echo '" id="delConcurso" class="btn btn-danger">Salir</button>
						  </div>
						</div>
					
					  </div>';
                $cont++;
			}

			}
		}
	}

}

	}
	

	

	
	/*==================================
	=            Ingresar al concurso            =
	==================================*/
	
	if(isset($_POST['ingConcurso'])){
		$idConcurso = $_POST['concId'];
		$sqlccq=$con->query("SELECT * FROM clientesxconcurso WHERE idCliente = $userId AND idConcurso = $idConcurso");
		if(mysqli_num_rows($sqlccq)>0){
			echo "false";

		}else{
		$sqlcc=$con->query("INSERT INTO clientesxconcurso VALUES ($userId,$idConcurso)");
	    }
	}


	
	/*=====  Salir del concurso  ======*/


	/*==================================
	=            Salir del concurso            =
	==================================*/
	
	if(isset($_POST['salConcurso'])){
		$idConcurso = $_POST['concId'];
		$sqlccq=$con->query("SELECT * FROM clientesxconcurso WHERE idCliente = $userId AND idConcurso = $idConcurso");
		if(mysqli_num_rows($sqlccq)<1){
			echo "false";

		}else{
		$sqlcc=$con->query("DELETE FROM clientesxconcurso WHERE idCliente = $userId AND idConcurso = $idConcurso");
	    }
	}


	
	/*=====  Salir del concurso  ======*/


	/*==================================
	=            Enviar mensaje contacto            =
	==================================*/
	
	if(isset($_POST['sendContacto'])){
		$nombreContacto = $_POST['nombre'];
		$correoContacto = $_POST['correo'];
		$mensajeContacto = $_POST['mensaje'];

		$emails = 'mintreiscool15@gmail.com';
        $titulo = 'Nuevo mensaje de un usuario desde la pagina FotomaniaCR';
        $cuerpo = '<h2>Consulta de '.$nombreContacto.' para FotomaniaCR</h2>

<table style="width:100%;border: 1px solid black;border-collapse: collapse;">
  <tr style="border: 1px solid black;border-collapse: collapse;">
    <th style="border: 1px solid black;">Nombre</th>
    <th style="border: 1px solid black;">Correo</th> 
    <th style="border: 1px solid black;">Mensaje</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;">'.$nombreContacto.'</td>
    <td style="border: 1px solid black;">'.$correoContacto.'</td>
    <td style="border: 1px solid black;">'.$mensajeContacto.'</td>
</table><br>Una respuesta debe llegar al correo adjunto en las proximas 48hrs';

$cuerposimple = 'Mensaje de'.$nombreContacto.'<br>Consulta:'.$mensajeContacto.'<br>Correo:'.$correoContacto;   
		
if((trim($correoContacto) == "") || (trim($mensajeContacto)=="")){
echo "false";
exit();
}else{
if($func = emailreset($emails,$titulo,$cuerpo,$cuerposimple)){
	echo "true";
}else{
	echo "false";
}


	}
	
}	
	

?>