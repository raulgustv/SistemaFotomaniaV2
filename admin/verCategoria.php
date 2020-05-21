<?php

include_once '../templates/headerAdmin.php';
include_once '../includes/funciones.php';
include '../includes/db.php';
?>

<div class="container-fluid mt-2">
	<table class="table table-striped" id="dtTabla">
		<thead>
			<tr>
				<th >Producto</th>
				<th >Nombre Producto</th>										
				<th >Acciones</th>
			</tr>	
		</thead>
		<tbody id="tableCats">
			<?php 
			$q = $con->query("SELECT * FROM categorias");
			while($reg = mysqli_fetch_array($q)){
				$idCat = $reg['idCategoria'];
				$categoria = $reg['nombre'];

				?>

				<tr>
					<td><?php echo $idCat; ?></td>
					<td><?php echo $categoria; ?></td>
					<td><a catId='<?php echo $idCat ?>' href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
				</tr>
			<?php } ?>
			

		</tbody>
	</table>
</div>











<?php

include_once '../templates/footerAdmin.php'; ?>