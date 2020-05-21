<?php

include '../../includes/db.php';
include '../../includes/funciones.php';

/*=========================================
=            Agregar Categoría            =
=========================================*/

if(isset($_POST['agregarCat'])){
	$categoria = $_POST['categoria'];

	$sql = $con->prepare("SELECT * FROM categorias WHERE nombre = ?");
	$sql->bind_param("s", $categoria);
	$sql->execute();

	$r = $sql->get_result();

	//print_r($r);

	if($r->num_rows > 0){
		echo "false";
	}else{
		$q = $con->prepare("INSERT INTO categorias (nombre) VALUES (?)");
		$q->bind_param("s", $categoria);
		$q->execute();
		$q->close();
	}



	
}

/*=====  End of Agregar Categoría  ======*/

/*======================================
=            Ver categorías            =
======================================*/

if(isset($_POST['getCats'])){
	
	echo "<tr>
				<td>01</td>
				<td>hola</td>
				<td><a href='#' class='btn btn-danger'><i class='fas fa-trash'></i></a></td>
			</tr>
			<tr>
				<td>33</td>
				<td>buenas</td>
				<td><a href='#' class='btn btn-danger'><i class='fas fa-trash'></i></a></td>
			</tr>";
}


/*=====  End of Ver categorías  ======*/



?>
