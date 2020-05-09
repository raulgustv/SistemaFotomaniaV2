<?php

include '../includes/db.php';
require '../acciones/sesion.php';



?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sistema Fotomanía</title>
	<link rel="stylesheet" type="text/css" href="../public/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/main.css">
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Fotomanía Costa Rica</a>
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
       <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Carrito <span class="badge-dark">0</span><i class="fas fa-cart-plus"></i></a>
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
                  <div class="row">
                     <div class="col-lg-4"><img class="miniCart" src="../imagenes/batidora.png"></div> 
                     <div class="col-lg-4">Batidora</div> 
                     <div class="col-lg-4">$45</div> 
                  </div>                  
              </div>
          </div>
       </div> 
      </li>
          
    </ul>

    <ul class="navbar-nav ml-auto">
      
       <li class="nav-item">
         <a class="nav-link" href="#">Hola <?php echo $username ?></a> 
      </li>
      <li class="nav-item">
         <a class="nav-link" href="../acciones/logout.php">Cerrar Sesión</a> 
      </li>
    </ul>
   
  </div>
</nav>


<body>

  




