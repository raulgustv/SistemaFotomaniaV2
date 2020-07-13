<?php

include '../includes/db.php';
require '../acciones/sesion.php';



?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Fotomanía Costa Rica</title>
	<link rel="stylesheet" type="text/css" href="../public/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap/css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="../public/lightbox2-dev/dist/css/lightbox.min.css">

  <link rel="stylesheet" type="text/css" href="../public/css/main.css">


 
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-warning shadow-lg p-3 mb-4 rounded">
  <a class="navbar-brand" href="../vistas/principal.php">
    <img src="../logos/logoFotomania.PNG" alt="Logo Fotomanía" style="width: 40%">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="principal.php">Principal <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tienda.php">Tienda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="galeria.php">Galería de Imágenes</a>
      </li>
       <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Carrito <span id="cartSum" class="badge-warning"></span><i class="fas fa-cart-plus"></i></a>
       <div class="dropdown-menu dropMenuSize">
          <div class="card">
              <div class="card-header bg-info">
                  <div class="row">
                      <div class="col-lg-4">Imagen</div>
                      <div class="col-lg-4">Producto</div>
                      <div class="col-lg-4">Precio</div>                     
                  </div>
              </div>
              <div class="card-body">
                  <div class="row" id="miniCart">
                    <!-- <div class="col-lg-4"><img class="miniCart" src="imagenes/batidora.png"></div> 
                     <div class="col-lg-4">Batidora</div> 
                     <div class="col-lg-4">$45</div> -->


                  </div>  
                  <div>
                      <a href="cart.php" class="btn btn-warning float-right">Ir a Carrito</a>
                  </div>                
              </div>
          </div>
       </div> 
      </li>
          
    </ul>

    <ul class="navbar-nav ml-auto">
      
       <li class="nav-item">
         <a class="nav-link" href="perfil.php">Hola <?php echo $username ?></a> 
      </li>
      <li class="nav-item">
         <a class="nav-link" href="../acciones/logout.php">Cerrar Sesión</a> 
      </li>
    </ul>
   
  </div>
</nav>


<body>

  




