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

		<tbody >
			<?php

				$getProd = $con->query("SELECT * FROM productos ORDER BY id ASC");
				while($r = mysqli_fetch_array($getProd)){
					$catName = $r['idCategoria'];
					$cat = $con->query("SELECT * FROM categorias WHERE idCategoria = '$catName'");

					$getCat = mysqli_fetch_array($cat);

					$idProd = $r['id'];
					$nombre = $r['nombre'];
					$categoria = $getCat['nombre'];
					$descripcion = $r['Descripcion'];
					$precio = $r['precio'];
					$imagen = $r['imagen'];

					?>
				<tr>
					<td><?php echo $idProd ?></td>
					<td><?php echo $nombre ?></td>
					<td><?php echo $categoria ?></td>
					<td><?php echo $precio ?></td>
					<td><?php echo $descripcion ?></td>					
					<td><img class="dtProductos" src="../vistas/imagenes/<?php echo $imagen ?>"></td>
					<td>
						<a href="#" class="btn btn-danger" id="btnBorrarProd"><i class="fas fa-trash"></i></a>
						<a href="#" data-toggle="modal" data-target="#formEditProd" class="btn btn-primary" id="btnEditProd" ><i class="fas fa-edit"></i></a>
					</td>
				</tr>

				

			<?php	} ?>

		
		</tbody>
			

	</table>
<!-- Button trigger modal -->


<!-- Modal -->












<?php

include_once '../templates/footerAdmin.php';
include_once 'editarProductos.php';
 ?>