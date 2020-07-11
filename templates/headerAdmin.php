<?php 

require_once '../includes/funciones.php';
require_once '../includes/smail.php';

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Panel Administrativo</title>
	<link rel="stylesheet" type="text/css" href="../public/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../public/DataTables/DataTables-1.10.20/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="../public/DataTables/Buttons-1.6.1/css/buttons.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="../public/css/main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
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
        <a class="nav-link" href="adminDash.php"><i class="fas fa-home">&nbsp</i> Home <span class="sr-only">(current)</span></a>
      </li>   
      <li class="nav-item">
        <a class="nav-link" href="../admin/accionesAdmin/cerrarSessionAdmin.php"><i class="fas fa-sign-out-alt">&nbsp</i>Cerrar Sesión</a>
      </li>      
    </ul>
  </div>
</nav>