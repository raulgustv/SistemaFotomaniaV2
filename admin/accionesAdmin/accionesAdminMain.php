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

	/*

	$q = $con->prepare("SELECT nombre FROM productos WHERE nombre = ?" );
	$q->bind_param("s", $nombre);
	$q->execute();

	$row = $q->get_result();

	if($row->num_rows > 0){
		echo "false";
	}else{ */

		if(is_uploaded_file($_FILES['imgProd']['tmp_name'])){
		move_uploaded_file($_FILES['imgProd']['tmp_name'], "../../vistas/imagenes/".$storeImg);
		//echo "true";
	}

		$sql = $con->prepare("INSERT INTO productos(nombre, idCategoria, precio, descripcion, imagen) VALUES (?,?,?,?,?)");
		$sql->bind_param("sssss", $nombre, $catProd, $precio, $descripcion, $storeImg);
		$sql->execute();
	//}
	
	
}

/*=====  End of Agregar Productos  ======*/


/*========================================
=            Obtener Producto            =
========================================*/


if(isset($_POST['getProds'])){
	$q = $con->query("SELECT id, productos.nombre AS nombre, categorias.nombre AS nombreCategoria, precio, Descripcion,  imagen FROM productos INNER JOIN categorias ON productos.idCategoria = categorias.idCategoria WHERE status = 1");

	$data = array();

	while ($row = mysqli_fetch_array($q)){
		$data[] = $row;
	}

	echo json_encode($data);
}

/*=====  End of Obtener Producto  ======*/

/*=======================================
=            Borrar Producto            =
=======================================*/

if(isset($_POST['borrarProd'])){

	$prodId = $_POST['prodId'];

	$q = $con->prepare("UPDATE productos SET status = 0 WHERE id = ?");
	$q->bind_param("i", $prodId);
	$q->execute();
	$q->close();
}

/*=====  End of Borrar Producto  ======*/


/*===============================================
=            Obtener producto Editar            =
===============================================*/

if(isset($_POST['cargarProducto'])){

	$prodId = $_POST['prodId'];
	$stat = 1;

	//echo $prodId;

	$q = $con->prepare("SELECT productos.nombre AS nombre, categorias.nombre AS nombreCategoria, precio, Descripcion,  imagen FROM productos INNER JOIN categorias ON productos.idCategoria = categorias.idCategoria WHERE id = ? AND status = ?");
	$q->bind_param("ii", $prodId, $stat);
	$q->execute();

	$r = $q->get_result();

	$row = mysqli_fetch_array($r);

	
	$nombre = $row['nombre'];
	$cat = $row['nombreCategoria'];
	$descripcion = $row['Descripcion'];
	$precio = $row['precio'];
	$imagen = $row['imagen'];

	
	echo "
			<div class='form-group'>              
              <input type='hidden' name='prodId' value='$prodId'> 
          	</div>

			<div class='form-group'>
              <label for='editNombre'>Nombre</label>
              <input type='text'  class='form-control' name='editNombre' id='editNombre' placeholder='$nombre'> 
          </div>
	
			 <div class='form-group'>
              <label for='editDesc'>Descripción</label>
              <textarea  type='text' rows='3' class='form-control' name='editDesc' id='editDesc'>$descripcion</textarea> 
          </div>

          <div class='form-group'>
              <label for='editPrecio'>Precio</label>
              <input type='text' class='form-control' name='editPrecio' id='editPrecio' placeholder='$precio'> 
          </div> 


            <div class='input-group mb-3'>
                <div class='input-group-prepend'>
                   <div class='custom-file'>
                     <input type='file' name='editImgProd' class='custom-file-input' id='editImgProd'>
                     <label class='custom-file-label' for='editImgProd'>Seleccionar Archivo</label>
                   </div> 
                </div>                             
            </div> 

            <div class='row'>
				<div class='col-sm-6'>
					<div class='mb-3' id='prevContainer'>
                		<img class='imgPrev' id='imgPrev' src='../vistas/imagenes/$imagen'>
            		</div>  
				</div>
				<div class='col-sm-6'>
					<div class='mb-3' id='prevContainer'>
                		<img class='imgPrev' id='editImgPrev' src='#'>
            		</div>  
				</div>
            </div>

            <div class='input-group mb-3'>
              <div class='input-group-prepend'>
                  <label class='input-group-text' for='catProd'>Categoría</label>
                  <select class='custom-select' name='catAddProd' id='catAddProd'>";

                  $sql = $con->query("SELECT * FROM categorias");
					while($row = mysqli_fetch_array($sql)){
					$catId = $row['idCategoria'];
					$catName = $row['nombre'];
					echo "<option value='$catId'>$catName</option>";
						

				}                   		
                  "</select> 
              </div>
          </div>

          ";

          echo "<div class='form-control mt-5'>
              <input type='submit' name='editNewProd' id='editNewProd' class='btn btn-primary' value='Guardar'>
            </div>";


}

/*=====  End of Obtener producto Editar  ======*/

/*=======================================
=            Editar Producto            =
=======================================*/

if(isset($_FILES['editImgProd'])){
	$img = $_FILES['editImgProd']['name'];
	$newStoreImg = uniqid($img, true).".png";
	$nuevaImg = $_FILES['editImgProd']['tmp_name'];

	$id = $_POST['prodId'];
	$nombre = $_POST['editNombre'];
	$descripcion = $_POST['editDesc'];	
	$precio = $_POST['editPrecio'];
	$categoria = $_POST['catAddProd'];

	
	

	if(is_uploaded_file($nuevaImg)){
		move_uploaded_file($nuevaImg, "../../vistas/imagenes/".$newStoreImg);

		$qImg = $con->prepare("SELECT * FROM productos WHERE id = ?");
		$qImg->bind_param("i", $id);
		$qImg->execute();
		//$qImg->close();

		$r = $qImg->get_result(); 
		$row = mysqli_fetch_array($r);
		$oldImg = $row['imagen'];
		unlink('../../vistas/imagenes/'.$oldImg);

		$q = $con->prepare("UPDATE productos SET nombre = ?, idCategoria = ?, precio = ?, Descripcion = ?, imagen = ? WHERE id = ? ");
		$q->bind_param("siissi", $nombre, $categoria, $precio, $descripcion, $newStoreImg, $id);
		$q->execute();
		$q->close();
	}else{
		$q = $con->prepare("UPDATE productos SET nombre = ?, idCategoria = ?, precio = ?, Descripcion = ? WHERE id = ? ");
		$q->bind_param("siisi", $nombre, $categoria, $precio, $descripcion, $id);
		$q->execute();
		$q->close();
	}

}

/*=====  End of Editar Producto  ======*/


/*=========================================
=            Pedidos recientes            =
=========================================*/

if(isset($_POST['getLastOrders'])){
	$q = $con->query("SELECT comprafinalizada.transaccionId AS trans, clientes.nombre AS clienteNombre , comprafinalizada.FechaCompra AS fechaCompra FROM productos JOIN comprafinalizada ON productos.id = comprafinalizada.productoId JOIN clientes ON clientes.id = comprafinalizada.clienteId GROUP BY transaccionId ORDER BY comprafinalizada.FechaCompra DESC LIMIT 3");

	if(mysqli_num_rows($q) > 0){
		while($r = mysqli_fetch_array($q)){
			$idTrans = $r['trans'];			
			$cliente = $r['clienteNombre'];
			$fecha = $r['fechaCompra'];

			echo "<tr>
					<td>$idTrans</td>				
					<td>$cliente</td>
					<td>$fecha</td>
				  </tr>";


		}
	}

}

/*=====  End of Pedidos recientes  ======*/


/*=============================================
=            Ver todos los pedidos            =
=============================================*/

if(isset($_POST['getOrders'])){
	$q = $con->query("SELECT comprafinalizada.transaccionId as trans, clientes.nombre, FechaCompra, estados.nombreEstado, monto FROM comprafinalizada INNER JOIN productos ON comprafinalizada.productoId = productos.id INNER JOIN clientes ON comprafinalizada.clienteId = clientes.id INNER JOIN estados ON comprafinalizada.estado = estados.idEstado GROUP BY transaccionId ORDER BY FechaCompra DESC");

	$data = array();

	while($row = mysqli_fetch_array($q)){
		$data[] = $row;
	}

	echo json_encode($data);
}


/*=====  End of Ver todos los pedidos  ======*/


/*============================================
=            LLenar Status Pedido            =
============================================*/

if(isset($_POST['llenarEstado'])){
	$idPedido = $_POST['idPedido'];	

	

	echo "<input type='hidden' name='idPedido' value='$idPedido'>
        	<label for='statusPedido' class='input-group-text'>Cambiar Estado Pedido</label>
		 <select class='custom-select' name='statusPedido' id='statusPedido'>";

		 	$q = $con->prepare("SELECT * FROM estados");
			$q->execute();
			$r = $q->get_result();



		while($row = mysqli_fetch_array($r)){
		$statusId = $row['idEstado'];
		$estado = $row['nombreEstado'];

		echo "<option value='$statusId'>$estado</option>";
	}
	"<select>";

	echo "<div class='modal-footer'>
	        	 <input type='submit' name='editStatus' id='editStatus' class='btn btn-primary' value='Guardar'>   	
	       </div> ";
}


/*=====  End of LLenar Status Pedido  ======*/


/*============================================
=            Editar Status pedido            =
============================================*/

if(isset($_POST['editarStatus'])){

	$idPedido = $_POST['idPedido'];
	$status = $_POST['statusPedido'];

	$q = $con->prepare("UPDATE comprafinalizada SET estado = ? WHERE transaccionId = ?");
	$q->bind_param("ss", $status, $idPedido);
	$q->execute();
	$q->close();

	

}

/*=====  End of Editar Status pedido  ======*/

/*=================================================
=            Subir Galería de imagenes            =
=================================================*/

if(isset($_FILES['imgThumb'])){

	$imgThumb = $_FILES['imgThumb']['name'];
	$uploadImgThumb = $_FILES['imgThumb']['tmp_name'];
	$storeThumb = uniqid($imgThumb, true).".png";

	$imgMain = $_FILES['imgMain']['name'];
	$uploadImgMain = $_FILES['imgMain']['tmp_name'];
	$storeMain = uniqid($imgMain, true).".png";

	$nombreImg = $_POST['tituloImg'];
	$autor = $_POST['nombreAutor'];
	$camaraNombre = $_POST['nombreCam'];

	if(is_uploaded_file($uploadImgThumb) && is_uploaded_file($uploadImgMain)){
		move_uploaded_file($uploadImgThumb, '../../vistas/imagenesGaleria/'.$storeThumb);
		move_uploaded_file($uploadImgMain, '../../vistas/imagenesGaleria/'.$storeMain);

	}

	$q = $con->prepare("INSERT INTO galeria (nombre, autor, cam, imagenThumb, imagen) VALUES (?,?,?,?,?)");
	$q->bind_param("sssss", $nombreImg, $autor, $camaraNombre, $storeThumb, $storeMain);
	$q->execute();
	$q->close();

	
}

/*=====  End of Subir Galería de imagenes  ======*/

/*===================================
=            Ver Galeria            =
===================================*/


if(isset($_POST['getGal'])){
	$q = $con->prepare("SELECT * FROM galeria");
	$q->execute();
	$row = $q->get_result();
	//$q->close();

	$data = array();

	while ($r = mysqli_fetch_array($row)){
		$data[] = $r;
	}

	echo json_encode($data);


}


/*=====  End of Ver Galeria  ======*/

/*=============================================
=            Cargar Galeria Editar            =
=============================================*/

if(isset($_POST['cargarImg'])){

	$idImagen = $_POST['galId'];

	$q = $con->prepare("SELECT * FROM galeria WHERE idGaleria = ?");
	$q->bind_param("i", $idImagen);
	$q->execute();

	$row = $q->get_result();
	$r = mysqli_fetch_array($row);

	$nombreImg = $r['nombre'];
	$autor = $r['autor'];
	$camara = $r['cam'];
	$imagenThumb = $r['imagenThumb'];
	$imagen = $r['imagen'];

	echo "<div class='form-group'>
			<input type='hidden' name='idImagen' value='$idImagen'>
				<div class='form-group'>
                <label>Título de la imagen</label>
                <input type='text' name='editTituloImg' id='editTituloImg' class='form-control' value='$nombreImg'>
            </div>

            <div class='form-group'>
                <label>Autor</label>
                <input type='text' name='editAutorNombre' id='editAutorNombre' class='form-control' value='$autor'>
            </div>

            <div class='form-group'>
                <label>Tomada con</label>
                <input type='text' name='editCam' id='editCam' class='form-control' value='$camara'>
            </div>

            <div class='input-group mb-3'>
                <div class='input-group-prepend'>
                    <div class='custom-file'>
                      <input type='file' name='imgThumbEdit' class='custom-file-input' id='imgThumbEdit'>
                      <label class='custom-file-label' for='imgThumbEdit'>Seleccionar imagen (Thumbnail)</label>
                     </div>
                </div>
            </div>

              <div class='mb-3' id='prevContainer'>
                <img src='../vistas/imagenesGaleria/$imagenThumb' class='imgPrev' id='prev2'>
              </div>

             <div class='input-group mb-3'>
                <div class='input-group-prepend'>
                    <div class='custom-file'>
                      <input type='file' name='imgMainEdit' class='custom-file-input' id='imgMainEdit'>
                      <label class='custom-file-label' for='imgMainEdit'>Seleccionar imagen Principal</label>
                     </div>
                </div>
            </div>

            <div class='mb-3' id='prevContainer'>
                <img src='../vistas/imagenesGaleria/$imagen' class='imgPrev' id='prev3'>
            </div>
        
      </div>

      <div class='modal-footer'>
        <button type='submit' class='btn btn-primary'>Guardar</button>        
      </div>";
}


/*=====  End of Cargar Galeria Editar  ======*/

/*=====================================
=            Editar Imagen            =
=====================================*/

if(isset($_FILES['imgThumbEdit'])){

	$idGal = $_POST['idImagen'];

	$img = $_FILES['imgThumbEdit']['name'];
	$newStoreThumb = uniqid($img, true).".png";
	$newThumb = $_FILES['imgThumbEdit']['tmp_name'];

	$imgMain = $_FILES['imgMainEdit']['name'];
	$newStoreMainImg = uniqid($imgMain, true).".png";
	$newMain = $_FILES['imgMainEdit']['tmp_name'];

	$nuevoTitulo = $_POST['editTituloImg'];
	$nuevoAutor = $_POST['editAutorNombre'];
	$nuevaCam = $_POST['editCam'];

	if(is_uploaded_file($newThumb) && is_uploaded_file($newMain)){
		move_uploaded_file($newThumb, "../../vistas/imagenesGaleria/".$newStoreThumb);
		move_uploaded_file($newMain, "../../vistas/imagenesGaleria/".$newStoreMainImg);
		$qNewImg = $con->prepare("SELECT imagenThumb, imagen FROM galeria WHERE  idGaleria = ?");
		$qNewImg->bind_param("i", $idGal);
		$qNewImg->execute();

		$r = $qNewImg->get_result();
		$row = mysqli_fetch_array($r);
		$oldThumb = $row['imagenThumb'];
		$oldMain = $row['imagen'];

		unlink("../../vistas/imagenesGaleria/".$oldThumb);
		unlink("../../vistas/imagenesGaleria/".$oldMain);

		$q = $con->prepare("UPDATE galeria SET nombre = ?, autor = ?, cam = ?, imagenThumb = ?, imagen = ? WHERE idGaleria = ?");
		$q->bind_param("sssssi", $nuevoTitulo, $nuevoAutor, $nuevaCam, $newStoreThumb, $newStoreMainImg, $idGal);
		$q->execute();
		$q->close();
	} elseif(is_uploaded_file($newThumb)){
		move_uploaded_file($newThumb, "../../vistas/imagenesGaleria/".$newStoreThumb);

		$qNewThumb = $con->prepare("SELECT imagenThumb FROM galeria WHERE  idGaleria = ?");
		$qNewThumb->bind_param("i", $idGal);
		$qNewThumb->execute();

		$r = $qNewThumb->get_result();
		$row = mysqli_fetch_array($r);
		$oldThumb = $row['imagenThumb'];

		unlink("../../vistas/imagenesGaleria/".$oldThumb);

		$q = $con->prepare("UPDATE galeria SET nombre = ?, autor = ?, cam = ?, imagenThumb = ? WHERE idGaleria = ?");
		$q->bind_param("ssssi", $nuevoTitulo, $nuevoAutor, $nuevaCam, $newStoreThumb, $idGal);
		$q->execute();
		$q->close();

	}elseif(is_uploaded_file($newMain)){
		move_uploaded_file($newThumb, "../../vistas/imagenesGaleria/".$newStoreMainImg);

		$qNewImg = $con->prepare("SELECT imagen FROM galeria WHERE  idGaleria = ?");
		$qNewImg->bind_param("i", $idGal);
		$qNewImg->execute();

		$r = $qNewImg->get_result();
		$row = mysqli_fetch_array($r);
		$oldMain = $row['imagen'];

		unlink("../../vistas/imagenesGaleria/".$oldMain);

		$q = $con->prepare("UPDATE galeria SET nombre = ?, autor = ?, cam = ?, imagen = ? WHERE idGaleria = ?");
		$q->bind_param("ssssi", $nuevoTitulo, $nuevoAutor, $nuevaCam, $newStoreMainImg, $idGal);
		$q->execute();
		$q->close();
	}else{
		$q = $con->prepare("UPDATE galeria SET nombre = ?, autor = ?, cam = ? WHERE idGaleria = ?");
		$q->bind_param("sssi", $nuevoTitulo, $nuevoAutor, $nuevaCam, $idGal);
		$q->execute();
		$q->close();
	}



	
}


/*=====  End of Editar Imagen  ======*/















?>
