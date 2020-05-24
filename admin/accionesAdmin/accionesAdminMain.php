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


	$q = $con->query("SELECT * FROM categorias");

	$rows = array();

	while($row=mysqli_fetch_array($q)){
		$rows[] = $row;
	}

	echo json_encode($rows);

 }
	



/*=====  End of Ver categorías  ======*/

/*========================================
=            Borrar Categoría            =
========================================*/

if(isset($_POST['borrarCat'])){
	$catId = $_POST['catId'];

	$sql = $con->prepare("DELETE FROM categorias WHERE idCategoria = ? ");
	$sql->bind_param("i", $catId);
	$sql->execute();


}

/*=====  End of Borrar Categoría  ======*/

/*========================================
=            Editar Categoría            =
========================================*/

if(isset($_POST['cargarCategoria'])){
	$catId = $_POST['catId'];

	$q = $con->query("SELECT * FROM categorias WHERE idCategoria = '$catId' ");
	//$q->bind_param("s", $catId);
	//$q->execute();

	$row = mysqli_fetch_array($q);
	$nombre = $row['nombre'];

	echo "<label for='categoria'>Categoría</label>
         <input id='nuevaCat' editCatId='$catId' name='categoria' class='form-control' id='categoria' placeholder='$nombre'>";
}

if(isset($_POST['editarCat'])){

	$catId = $_POST['catId'];
	$catName = $_POST['newCatName'];

	$sql = $con->query("SELECT * FROM categorias WHERE nombre = '$catName' ");
	if(mysqli_num_rows($sql) > 0){
		echo "false";
	}else{
		$q = $con->query("UPDATE categorias SET nombre = '$catName' WHERE idCategoria = '$catId' ");
	}

	
	//$q->bind_param("ss", $catId, $catName);
	//$q->execute();
}

/*=====  End of Editar Categoría  ======*/

/*=============================================
=            Section obtener categoria           =
=============================================*/

if(isset($_POST['getCategoryProd'])){

	$q = $con->query("SELECT * FROM categorias");

	while($row = mysqli_fetch_array($q)){
		$catId = $row['idCategoria'];
		$catName = $row['nombre'];
		echo "<option value='$catId'>$catName</option>";
	}

}

/*=====  End of Section obtener categoria ======*/

if(isset($_FILES['imgProd'])){

	$imagen = $_FILES['imgProd']['name'];
	$storeImg = uniqid($imagen,true).".png";

	$nombre = $_POST['nombreProd'];
	$descripcion = $_POST['descProd'];
	$precio = $_POST['precioProd'];
	$catProd = $_POST['catAddProd'];

	$q = $con->prepare("SELECT nombre FROM productos WHERE nombre = ?" );
	$q->bind_param("s", $nombre);
	$q->execute();

	$row = $q->get_result();

	if($row->num_rows > 0){
		echo "false";
	}else{

		if(is_uploaded_file($_FILES['imgProd']['tmp_name'])){
		move_uploaded_file($_FILES['imgProd']['tmp_name'], "../../vistas/imagenes/".$storeImg);
		//echo "true";
	}

		$sql = $con->prepare("INSERT INTO productos(nombre, idCategoria, precio, descripcion, imagen) VALUES (?,?,?,?,?)");
		$sql->bind_param("sssss", $nombre, $descripcion, $precio, $catProd, $storeImg);
		$sql->execute();
	}



	


	
	
}







?>
