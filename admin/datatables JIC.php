<tbody>

			
			<?php 
				$q = $con->query("SELECT * FROM categorias");

				while($reg = mysqli_fetch_array($q)){
					$idCat = $reg['idCategoria'];
					$cat = $reg['nombre'];

					?>
				<tr>
				<td>$<?php echo $idCat ?></td>
				<td><?php echo $cat ?></td>
				<td><a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
				</tr>



				<?php }
			?>
	</tbody>
		