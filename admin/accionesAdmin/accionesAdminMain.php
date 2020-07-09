<?php

include '../../includes/db.php';
include '../../includes/funciones.php';
include 'smail.php';


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

/*=======================================
=            Borrar Producto            =
=======================================*/

if(isset($_POST['borrarProd'])){

	$prodId = $_POST['prodId'];

	$q = $con->prepare("DELETE FROM productos WHERE id = ?");
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

	//echo $prodId;

	$q = $con->prepare("SELECT productos.nombre AS nombre, categorias.nombre AS nombreCategoria, precio, Descripcion,  imagen FROM productos INNER JOIN categorias ON productos.idCategoria = categorias.idCategoria WHERE id = ?");
	$q->bind_param("i", $prodId);
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
					echo "<option value='$catId'";
					if($catName == $cat){
						echo " selected";
					}
					echo ">$catName</option>";
						

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



/*=============================================
=            Section obtener producto           =
=============================================*/

if(isset($_POST['getProdDesc'])){

	$q = $con->query("SELECT * FROM productos");

	while($row = mysqli_fetch_array($q)){
		$prodId = $row['id'];
		$prodName = $row['nombre'];
		echo "<option value='$prodId'>$prodName</option>";
	}

}

/*======End of obtener producto========== */


/*=========================================
=            Agregar Descuento            =
=========================================*/

if(isset($_POST['agregarDesc'])){
	$nombre = $_POST['nombreDesc'];
	$descripcion  = $_POST['descripciondesc'];
	$descuento = $_POST['porcentDesc'];
	$idProd = $_POST['prodAddDesc'];
	$fechaInicio = strtotime($_POST['fechaInicio']);
	$fechaFinalizacion = strtotime($_POST['fechaFinal']);
	$fechaIFormat = date("Y-m-d h:i:s",$fechaInicio);
	$fechaFFormat = date("Y-m-d h:i:s",$fechaFinalizacion);

	$sql = $con->prepare("SELECT * FROM ofertas WHERE idProducto = ?");
	$sql->bind_param("i", $idProd);
	$sql->execute();

	$r = $sql->get_result();

	//print_r($r);

	if($r->num_rows > 0){
		echo "false";
		
	}else{
		//echo $fechaIFormat;
		$q = $con->prepare("INSERT INTO ofertas (idProducto,titulo,descripcion,totalOferta,fechaInicio,fechaFinal) VALUES (?,?,?,?,?,?)");
		$q->bind_param("ississ", $idProd,$nombre,$descripcion,$descuento,$fechaIFormat,$fechaFFormat);
		$q->execute();
		$q->close();
	}



	
}

/*=====  End of Agregar Descuento  ======*/

/*========================================
=            Obtener Descuento            =
========================================*/


if(isset($_POST['getDesc'])){
	$q = $con->query("SELECT idOferta, productos.nombre AS nombreProducto, titulo, ofertas.descripcion AS descripcionDesc,  totalOferta, fechaInicio, fechaFinal FROM ofertas INNER JOIN productos ON ofertas.idProducto = productos.id");

	$data = array();

	while ($row = mysqli_fetch_array($q)){
		$data[] = $row;
	}

	echo json_encode($data);
}

/*=====  End of Obtener Descuento  ======*/



/*========================================
=            Borrar Descuento            =
========================================*/

if(isset($_POST['borrarDesc'])){
	$descId = $_POST['descId'];

	$sql = $con->prepare("DELETE FROM ofertas WHERE idOferta = ? ");
	$sql->bind_param("i", $descId);
	$sql->execute();


}

/*=====  End of Borrar Descuento  ======*/



/*===============================================
=            Obtener descuento Editar            =
===============================================*/

if(isset($_POST['cargarDescuento'])){

	$descId = $_POST['descId'];

	//echo $descId;

	$qed = $con->prepare("SELECT idOferta, productos.nombre AS nombreProducto, productos.id AS idProducto, titulo, ofertas.descripcion AS descripcionDesc, totalOferta, fechaInicio, fechaFinal FROM ofertas INNER JOIN productos ON ofertas.idProducto = productos.id WHERE idOferta = ? ");
	$qed->bind_param("i", $descId);
	$qed->execute();
	$red = $qed->get_result();

	$rowed = mysqli_fetch_array($red);

	
	$titulo = $rowed['titulo'];
	$nombreProducto = $rowed['nombreProducto'];
	$idProducto = $rowed['idProducto'];
	$descripcion = $rowed['descripcionDesc'];
	$totalOferta = $rowed['totalOferta'];
	$fechaInicio = $rowed['fechaInicio'];
	$fechaFinaliz = $rowed['fechaFinal'];

	
	echo "
			<div class='form-group'>              
              <input type='hidden' name='descId' id='descId' value='$descId'> 
          	</div>

			<div class='form-group'>
              <label for='editNombre'>Titulo</label>
              <input type='text'  class='form-control' name='editNombre' id='editNombre' placeholder='$titulo'> 
          </div>
	
			 <div class='form-group'>
              <label for='descripcion'>Descripción</label>
              <textarea  type='text' rows='3' class='form-control' name='descripcion' id='descripcion'>$descripcion</textarea> 
          </div>
		  
		  <div class='input-group mb-3'>
		  <div class='input-group-prepend'>
			  <label class='input-group-text' for='totalDescu'>Porcentaje Descuento</label>
			  <select class='custom-select' name='totalDescu' id='totalDescu'>";
			  $comienza = 5;
				while($comienza<=100){
				echo "<option value='$comienza'";
				if($comienza == $totalOferta){
					echo " selected";
				}
				echo ">Descuento de $comienza%</option>";
				$comienza = $comienza+5;	

			}                   		
			echo "</select> 
		  </div>
	  </div>
	  ";


		echo "<div class='form-group'>
		<label for='fechaInicio'>Fecha de Inicio</label>
	<div class='input-group date' id='datetimepicker1' data-target-input='nearest'>
	  <input type='text' id='fechaInicio' name='fechaInicio' class='form-control datetimepicker-input' value='$fechaInicio' data-target='#datetimepicker1' />
	  <div class='input-group-append' data-target='#datetimepicker1' data-toggle='datetimepicker'>
		<div class='input-group-text'><i class='fa fa-calendar'></i></div>
	  </div>
	</div>
  </div> ";

	  echo"  <div class='form-group'>
	  <label for='fechaFinal'>Fecha de Finalizacion</label>
  <div class='input-group date' id='datetimepicker2' data-target-input='nearest'>
	<input type='text' id='fechaFinal' name='fechaFinal' class='form-control datetimepicker-input' value='$fechaFinaliz' data-target='#datetimepicker2' />
	<div class='input-group-append' data-target='#datetimepicker2' data-toggle='datetimepicker'>
	  <div class='input-group-text'><i class='fa fa-calendar'></i></div>
	</div>
  </div>
</div>

            <div class='input-group mb-3'>
              <div class='input-group-prepend'>
                  <label class='input-group-text' for='prodDesc'>Producto</label>
                  <select class='custom-select' name='prodAddDesc' id='prodAddDesc'>";

                  $sql = $con->query("SELECT * FROM productos");
					while($row = mysqli_fetch_array($sql)){
					$prodId = $row['id'];
					$prodName = $row['nombre'];
					echo "<option value='$prodId'";
					if($prodId == $idProducto){
						echo " selected";
					}
					echo ">$prodName</option>";
						

				}                   		
               echo "</select> 
              </div>
          </div>

          ";

          //echo "<input type='submit' name='editNewDesc' id='editNewDesc' class='btn btn-primary' value='Guardar'>";


}

/*=====  End of Obtener descuento Editar  ======*/

/*=======================================
=            Editar Descuento            =
=======================================*/

if(isset($_POST['editarDesc'])){
	$id = $_POST['idDesc'];
	$idProd = $_POST['idProd'];
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];	
	$porcentOferta = $_POST['totalOferta'];
	$fechaInicio = strtotime($_POST['fechaInicio']);
	$fechaFinal = strtotime($_POST['fechaFinal']);
	$fechaIFormat = date("Y-m-d h:i:s",$fechaInicio);
	$fechaFFormat = date("Y-m-d h:i:s",$fechaFinal);

	
	$sql = $con->query("SELECT * FROM ofertas WHERE idProducto = $idProd ");
	if(mysqli_num_rows($sql) > 1){
		echo "false";
	}else{
		
		$q = $con->query("UPDATE ofertas SET idProducto = $idProd, titulo = '$titulo', descripcion = '$descripcion', totalOferta = $porcentOferta, fechaInicio = '$fechaIFormat', fechaFinal = '$fechaFFormat' WHERE idOferta = '$id' ");
		echo "true";
	}


}

/*=====  End of Editar Descuento  ======*/


/*========================================
=            Obtener Concurso            =
========================================*/


if(isset($_POST['getConc'])){
	$q = $con->query("SELECT idConcurso, productos.nombre AS nombrePremio, concurso.nombre AS nombreConcurso, concurso.descripcion AS descripcionConc,  fechaInicio, fechaFinal, cantidadMaxima, ganador FROM concurso INNER JOIN productos ON concurso.idPremio = productos.id");

	$data = array();
  
	

	while ($row = mysqli_fetch_array($q)){
		$data[] = $row;
	}

	echo json_encode($data);
}


/*=============================================
=            Section obtener producto rifa          =
=============================================*/

if(isset($_POST['getProdConc'])){

	$q = $con->query("SELECT * FROM productos");

	while($row = mysqli_fetch_array($q)){
		$prodId = $row['id'];
		$prodName = $row['nombre'];
		echo "<option value='$prodId'>$prodName</option>";
	}

}

/*=========================================
=            Agregar Concurso            =
=========================================*/

if(isset($_POST['agregarConc'])){
	$nombre = $_POST['nombreConc'];
	$descripcion  = $_POST['descripcionConc'];
	$cantidadmax = $_POST['cantidadMax'];
	$idPrem = $_POST['prodAddConc'];
	$fechaInicio = strtotime($_POST['fechaInicio']);
	$fechaFinalizacion = strtotime($_POST['fechaFinal']);
	$fechaIFormat = date("Y-m-d h:i:s",$fechaInicio);
	$fechaFFormat = date("Y-m-d h:i:s",$fechaFinalizacion);

	$sql = $con->prepare("SELECT * FROM concurso WHERE idPremio = ?");
	$sql->bind_param("i", $idPrem);
	$sql->execute();

	$r = $sql->get_result();

	//print_r($r);

	if($r->num_rows > 0){
		echo "false";
		
	}else{
		//echo $fechaIFormat;
		$q = $con->prepare("INSERT INTO concurso (idPremio,nombre,descripcion,cantidadMaxima,fechaInicio,fechaFinal) VALUES (?,?,?,?,?,?)");
		$q->bind_param("ississ", $idPrem,$nombre,$descripcion,$cantidadmax,$fechaIFormat,$fechaFFormat);
		$q->execute();
		$q->close();
	}



	
}

/*=====  End of Agregar Concurso  ======*/


/*========================================
=            Borrar concurso            =
========================================*/

if(isset($_POST['borrarConc'])){
	$concId = $_POST['concId'];

	$sql = $con->prepare("DELETE FROM concurso WHERE idConcurso = ? ");
	$sql->bind_param("i", $concId);
	$sql->execute();


}

/*=====  End of Borrar Descuento  ======*/


/*===============================================
=            Obtener concurso Editar            =
===============================================*/

if(isset($_POST['cargarConcurso'])){

	$concId = $_POST['concId'];

	//echo $descId;

	$qed = $con->prepare("SELECT productos.nombre AS nombreProducto, productos.id AS idProducto, concurso.nombre AS nombreConcurso, concurso.descripcion AS descripcionConc, cantidadMaxima, fechaInicio, fechaFinal FROM concurso INNER JOIN productos ON concurso.idPremio = productos.id WHERE idConcurso = ? ");
	$qed->bind_param("i", $concId);
	$qed->execute();
	$red = $qed->get_result();

	$rowed = mysqli_fetch_array($red);

	
	$nombre = $rowed['nombreConcurso'];
	$nombreProducto = $rowed['nombreProducto'];
	$idProducto = $rowed['idProducto'];
	$descripcion = $rowed['descripcionConc'];
	$cantidadMaxima = $rowed['cantidadMaxima'];
	$fechaInicio = $rowed['fechaInicio'];
	$fechaFinaliz = $rowed['fechaFinal'];


	
	echo "
			<div class='form-group'>              
              <input type='hidden' name='concId' id='concId' value='$concId'> 
          	</div>

			<div class='form-group'>
              <label for='editNombre'>Nombre</label>
              <input type='text'  class='form-control' name='editNombre' id='editNombre' placeholder='$nombre'> 
          </div>
	
			 <div class='form-group'>
              <label for='descripcion'>Descripción</label>
              <textarea  type='text' rows='3' class='form-control' name='descripcion' id='descripcion'>$descripcion</textarea> 
          </div>
		  
		  <div class='input-group mb-3'>
		  <div class='input-group-prepend'>
			  <label class='input-group-text' for='cantMaxi'>Cantidad Maxima</label>
			  <select class='custom-select' name='cantMaxi' id='cantMaxi'>";
			  $comienza = 5;
				while($comienza<=200){
				echo "<option value='$comienza'";
				if($comienza == $cantidadMaxima){
					echo " selected";
				}
				echo ">$comienza participantes</option>";
				$comienza = $comienza+5;	

			}                   		
			echo "</select> 
		  </div>
	  </div>
	  ";


		echo "<div class='form-group'>
		<label for='fechaInicio'>Fecha de Inicio</label>
	<div class='input-group date' id='datetimepicker1' data-target-input='nearest'>
	  <input type='text' id='fechaInicio' name='fechaInicio' class='form-control datetimepicker-input' value='$fechaInicio' data-target='#datetimepicker1' />
	  <div class='input-group-append' data-target='#datetimepicker1' data-toggle='datetimepicker'>
		<div class='input-group-text'><i class='fa fa-calendar'></i></div>
	  </div>
	</div>
  </div> ";

	  echo"  <div class='form-group'>
	  <label for='fechaFinal'>Fecha de Finalizacion</label>
  <div class='input-group date' id='datetimepicker2' data-target-input='nearest'>
	<input type='text' id='fechaFinal' name='fechaFinal' class='form-control datetimepicker-input' value='$fechaFinaliz' data-target='#datetimepicker2' />
	<div class='input-group-append' data-target='#datetimepicker2' data-toggle='datetimepicker'>
	  <div class='input-group-text'><i class='fa fa-calendar'></i></div>
	</div>
  </div>
</div>

            <div class='input-group mb-3'>
              <div class='input-group-prepend'>
                  <label class='input-group-text' for='prodConc'>Producto</label>
                  <select class='custom-select' name='prodAddConc' id='prodAddConc'>";

                  $sql = $con->query("SELECT * FROM productos");
					while($row = mysqli_fetch_array($sql)){
					$prodId = $row['id'];
					$prodName = $row['nombre'];
					echo "<option value='$prodId'";
					if($prodId == $idProducto){
						echo " selected";
					}
					echo ">$prodName</option>";
						

				}                   		
               echo "</select> 
              </div>
          </div>

          ";

          //echo "<input type='submit' name='editNewConc' id='editNewConc' class='btn btn-primary' value='Guardar'>";


}

/*=====  End of Obtener descuento Editar  ======*/


/*=======================================
=            Editar Concurso            =
=======================================*/

if(isset($_POST['editarConc'])){
	$id = $_POST['idConc'];
	$idProd = $_POST['idProd'];
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];	
	$cantidadMax = $_POST['cantMaxima'];
	$fechaInicio = strtotime($_POST['fechaInicio']);
	$fechaFinal = strtotime($_POST['fechaFinal']);
	$fechaIFormat = date("Y-m-d h:i:s",$fechaInicio);
	$fechaFFormat = date("Y-m-d h:i:s",$fechaFinal);

	
	$sql = $con->query("SELECT * FROM concurso WHERE idPremio = $idProd ");
	if(mysqli_num_rows($sql) > 1){
		echo "false";
	}else{
		$q = $con->query("UPDATE concurso SET idPremio = $idProd, nombre = '$nombre', descripcion = '$descripcion', cantidadMaxima = $cantidadMax, fechaInicio = '$fechaIFormat', fechaFinal = '$fechaFFormat' WHERE idConcurso = '$id' ");
		echo $id;
		echo "true";
	}


}

/*=====  End of Editar Concurso  ======*/


/*===============================================
=            Obtener descuento Editar            =
===============================================*/

if(isset($_POST['PartConcurso'])){

	$concId = $_POST['concId'];

	//echo $concId;

	$qed = $con->prepare("SELECT idCliente, clientesxconcurso.idConcurso AS idConcursoP, concurso.nombre AS nombreConcurso, concurso.cantidadMaxima as cantMaxima, clientes.nombre AS nombreCliente FROM clientesxconcurso INNER JOIN concurso ON clientesxconcurso.idConcurso = concurso.idConcurso INNER JOIN clientes ON clientesxconcurso.idCliente = clientes.id WHERE clientesxconcurso.idConcurso = ? ");
	$qed->bind_param("i", $concId);
	$qed->execute();
	$red = $qed->get_result();

	$cantidadParticipantes = mysqli_num_rows($red);


	

    $numParticipante = 1;
	while($rowed = mysqli_fetch_array($red)){
		$idCliente = $rowed['idCliente'];
		$idConcurso = $rowed['idConcursoP'];
		$nombreConcurso = $rowed['nombreConcurso'];
		$nombreCliente = $rowed['nombreCliente'];
		$cantMax = $rowed['cantMaxima'];
	echo "<tr><td>$nombreConcurso</td>
	<td>$idCliente</td>
	<td>$nombreCliente</td>
	<td>";
		echo $numParticipante."/".$cantMax;
	echo "</td></tr>
	 ";
	 $numParticipante++;
	}
          //echo "<input type='submit' name='editNewDesc' id='editNewDesc' class='btn btn-primary' value='Guardar'>";


}


/*========================================
=            Seleccionar Ganador            =
========================================*/

if(isset($_POST['ganadorConc'])){
	$contarray = 0;
	$arrayclientes = array();
	$concId = $_POST['concId'];
	$qcc = $con->prepare("SELECT idCliente FROM clientesxconcurso WHERE idConcurso = ?");
	$qcc->bind_param("i", $concId);
	$qcc->execute();
	$rcc = $qcc->get_result();

	while($rowcc = mysqli_fetch_array($rcc)){
		
		array_push($arrayclientes,$rowcc['idCliente']);
	}
	$arrayganador = array_rand($arrayclientes, 1);
	$ganadorConc = $arrayclientes[$arrayganador];
	//echo $ganadorConc;
	$q = $con->query("UPDATE concurso SET ganador = $ganadorConc WHERE idConcurso = $concId ");


}

/*===========================================
=            Contraseña Olvidada            =
===========================================*/

if(isset($_POST['action']) && $_POST['action'] == 'forgot'){
	$afemail = $_POST['emailReset'];


	$stmt = $con->prepare("SELECT id FROM admin WHERE email=?");
	$stmt->bind_param("s", $afemail);
	$stmt->execute();

	$res = $stmt->get_result();

	if($res->num_rows>0){
		$stmt1 = $con->prepare("SELECT * FROM contrareset WHERE email=?");
	    $stmt1->bind_param("s", $afemail);
		$stmt1->execute();
		$resec = $stmt1->get_result();
        if($resec->num_rows>0){
		$stmt3 = $con->prepare("DELETE FROM contrareset WHERE email=?");
	    $stmt3->bind_param("s", $afemail);
		$stmt3->execute(); 
        }
		$token = generarRandomString(40);
		$stmt2 = $con->prepare("INSERT INTO contrareset(email, token) VALUES (?,?)");
	    $stmt2->bind_param("ss", $afemail,$token);
		$stmt2->execute();
		$stmt3 = $con->prepare("UPDATE contrareset SET tokenExpira=DATE_ADD(NOW(),INTERVAL 10 MINUTE)");
		$stmt3->execute();
        $titulo = 'Restablecimiento de contraseña para sistema FotomaniaCR';
        $cuerpo = 'Usted solicito restablecer su contraseña para <b>FotomaniaCR</b><br>Ingrese al siguiente link para realizar el restablecimiento:http://localhost/SISTEMAFOTOMANIAv2/admin/resetPassword.php?token='.$token;
        $cuerposimple = 'Usted solicito restablecer su contraseña para FotomaniaCR. Ingrese al siguiente link para realizar el restablecimiento:http://localhost/SISTEMAFOTOMANIAv2/admin/resetPassword.php?token='.$token;
        if($func = emailreset($afemail,$titulo,$cuerpo,$cuerposimple)){
			echo "true";
		}else{
			echo "false";
		}

	}else{
		echo "falseNSE";	
	}

}

/*================================
=    Restableciemiento de contra       =
================================*/

if(isset($_POST['action']) && $_POST['action'] == 'adminrestcon'){
	$currentpass = checkInput($_POST['currentpassword']);
	$newpass = checkInput($_POST['newpass']);
	$cnewpass = checkInput($_POST['cnewpass']);
	$uemail = checkInput($_POST['uemail']);
	$currentpassHash = password_hash($currentpass, PASSWORD_BCRYPT,["cost"=>8]);
	$newpassHash = password_hash($newpass, PASSWORD_BCRYPT,["cost"=>8]);
	$cnewpassHash = password_hash($cnewpass, PASSWORD_BCRYPT,["cost"=>8]);
	$sql = $con->prepare("SELECT user,email,pass FROM admin WHERE email =?");
	$sql->bind_param("s", $uemail);
	$sql->execute();
	$result = $sql->get_result();
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$currentpassDB = $row['pass'];
	if($newpass != $cnewpass){
		echo 'falselocalNC';
		exit();
	}elseif(password_verify($currentpass,$currentpassDB) == FALSE){
		echo $currentpassHash;
		echo " ";
		echo $currentpassDB;
		exit();
	}else{
		$con->query("UPDATE admin SET pass = '$newpassHash' WHERE email = '$uemail'");
		$con->query("DELETE FROM contrareset WHERE email = '$uemail'");
		echo "true";
			
		
	}
}

/*=====  End of Restablecimiento de contra  ======*/


?>
