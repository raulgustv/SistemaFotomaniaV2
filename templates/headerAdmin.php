<?php 

require_once '../includes/funciones.php';

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Panel Administrativo</title>
	<link rel="stylesheet" type="text/css" href="../public/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/main.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Panel Administrativo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-home">&nbsp</i> Home <span class="sr-only">(current)</span></a>
      </li>   
      <li class="nav-item">
        <a class="nav-link" href="../admin/accionesAdmin/cerrarSessionAdmin.php"><i class="fas fa-sign-out-alt">&nbsp</i>Cerrar Sesión</a>
      </li>      
    </ul>
  </div>
</nav>