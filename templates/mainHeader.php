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

<nav class="navbar navbar-expand-sm navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">Fotomanía Costa Rica</a>

<!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Link 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 2</a>
    </li>      
  </ul>

  <!-- Cierre sesión-->
  <ul class="nav navbar-nav ml-auto">
     <li class="nav-item">
       <a class="nav-link" href="#"><?php echo "Hola ". $username; ?> </a> 
    </li>
    <li class="nav-item">
       <a class="nav-link" href="../acciones/logout.php">Cerrar Sesión</a> 
    </li>
  </ul>
 

</nav>

<body>