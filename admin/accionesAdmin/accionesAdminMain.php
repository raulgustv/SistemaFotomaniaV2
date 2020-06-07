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

/*=========================================
=            Agregar Productos            =
=========================================*/

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
		$sql->bind_param("sssss", $nombre, $catProd, $precio, $descripcion, $storeImg);
		$sql->execute();
	}
	
	
}

/*=====  End of Agregar Productos  ======*/

/*===========================================
=            Ver Tabla productos            =
===========================================*/

if(isset($_POST['borrarProd'])){
	$prodId = $_POST['productoId'];

	$qImg = $con->prepare("SELECT * FROM productos WHERE id = ? ");
	$qImg->bind_param("i", $prodId);
	$qImg->execute();

	$r = $qImg->get_result();

	while ($row = mysqli_fetch_array($r)){
		$imagen = $row['imagen'];
		unlink('../../vistas/imagenes/'.$imagen);
	}

	$stmt = $con->prepare("DELETE FROM productos WHERE id = ? ");
	$stmt->bind_param("i", $prodId);
	$stmt->execute();
	//$stmt->close();

	


}

/*=====  End of Ver Tabla productos  ======*/

if(isset($_POST['getEditProd'])){

	$prodId = $_POST['prodId'];

	$stmt = $con->prepare("SELECT * FROM productos WHERE id = ? ");
	$stmt->bind_param("i", $prodId);
	$stmt->execute();

	$r = $stmt->get_result();
	$row = mysqli_fetch_array($r);
	$idProducto = $row['id'];
	$nombre = $row['nombre'];
	$des = $row['Descripcion'];
	$precio = $row['precio'];
	$img = $row['imagen'];

	echo "<form method='post' id='frmEditProductos' enctype='multipart/form-data'>

			<div class='form-group'>
              
              <input type='hidden' class='form-control' name='idProducto' id='idProducto' value='$idProducto'> 
          </div>
			<div class='form-group'>
              <label for='editNombre'>Nombre</label>
              <input type='text' class='form-control' name='editNombre' id='editNombre' value='$nombre'> 
          </div>
          <div class='form-group'>
              <label for='editDesc'>Descripción</label>
              <textarea  type='text' rows='3' class='form-control' name='editDesc' id='editDesc'>$des</textarea> 
          </div>
          <div class='form-group'>
              <label for='editPrecio'>Precio</label>
              <input type='text' class='form-control' name='editPrecio' id='editPrecio' value='$precio'> 
          </div>                    
            <div class='input-group mb-3'>
                <div class='input-group-prepend'>
                   <div class='custom-file'>
                     <input type='file' name='editImgProd' class='custom-file-input' value='$img' id='editImgProd'>
                     <label class='custom-file-label' for='editImgProd'>Seleccionar Archivo</label>
                   </div> 
                </div> 
                            
            </div>  

            <div class='row'>
				<div class='col-sm-6'>
					<div class='mb-3' id='prevContainer'>
		               <img class='imgPrev' id='imgPrev' src='../vistas/imagenes/$img'>
		            </div>
				</div>
				<div class='col-sm-6'>
					<div class='mb-3' id='prevContainer'>
		               <img class='imgPrev' id='editImgPrev' src='#'>
		            </div>
				</div>
			</div>

			 <input type='submit' id='editProdInfo' idProducto='$prodId' name='editProdInfo' class='btn btn-primary' value='Guardar'>

			 </form>";



}

if(isset($_FILES['editImgProd'])){
	
	$eId = $_POST['idProducto'];
	$eNombre = $_POST['editNombre'];
	$eDescripcion = $_POST['editDesc'];
	$ePrecio = $_POST['editPrecio'];
	$eImg = $_FILES['editImgProd']['name'];
	//$oldImg = $_POST['editImgProd'];

	$storeImg = uniqid($eImg,true).".png";

	$q = $con->query("SELECT * FROM productos WHERE id = '$eId'");

	//$r = $q->get_result();
	$row = mysqli_fetch_array($q);

	$oldImg = $row['imagen'];

	print_r($oldImg);

	//echo $eNombre." - ".$eDescripcion." - ". $ePrecio." - ".$storeImg." - ".$oldImg;

	if(is_uploaded_file($_FILES['editImgProd']['tmp_name'])){
		move_uploaded_file($_FILES['editImgProd']['tmp_name'], "../../vistas/imagenes/".$storeImg);
		unlink('../../vistas/imagenes/'.$oldImg);

		$stmt = $con->prepare("UPDATE productos SET nombre = ?, precio = ?, Descripcion = ?, imagen = ?  WHERE id = ? ");
		$stmt->bind_param("sissi", $eNombre, $ePrecio, $eDescripcion, $storeImg, $eId);
		$stmt->execute();
		$stmt->close(); 
	}else{
		$sql = $con->prepare("UPDATE productos SET nombre = ?, precio = ?, Descripcion = ? WHERE id = ? ");
		$sql->bind_param("sisi", $eNombre, $ePrecio, $eDescripcion, $eId);
		$sql->execute();
		$sql->close(); 
	}

	




}

/*========================================
=            Obtener Producto            =
========================================*/


if(isset($_POST['getProds'])){
	$q = $con->query("SELECT id, productos.nombre AS nombre, categorias.nombre AS nombreCategoria, precio, Descripcion,  imagen FROM productos INNER JOIN categorias ON productos.idCategoria = categorias.idCategoria");

	$data = array();

	while ($row = mysqli_fetch_array($q)){
		$data[] = $row;
	}

	echo json_encode($data);
}

/*=====  End of Obtener Producto  ======*/







?>
