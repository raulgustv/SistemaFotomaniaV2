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
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>     
    </ul>

    <ul class="navbar-nav ml-auto">
       <li class="nav-item mr-4 dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Carrito <span class="badge-dark">0</span><i class="fas fa-cart-plus"></i></a>
         
      </li>
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

  HOLA




