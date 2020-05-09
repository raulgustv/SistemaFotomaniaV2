<?php
	session_start();
	include '../includes/db.php';
	include '../includes/funciones.php';

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

				echo "<li class='nav-item'><a class='nav-link' href='#'>$catName</a></li>";
						
			}
		}
		echo "</div>";
	}
	
	/*=====  End of Obtener categorias  ======*/

	if(isset($_POST['getProduct'])){
		$prodQuery = $con->query("SELECT * FROM productos");

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
											<div class='card-text'>$$precioProducto <a class='btn btn-success float-right' href='#'><i class='fas fa-cart-plus'></i></a></div>											
										</div>
									</div>
								</div>
						</div>";
			}
		}
	}
	

?>