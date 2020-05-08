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
  <button class="navbar-toggler" type="button" data-toggle="colapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggler-icon"></span></button>

<!-- Links -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Tienda</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Sobre Nosotros</a>
    </li>      
  </ul>

  <!-- Menu derecha-->
  <ul class="nav navbar-nav ml-auto">
    <!--=====================================
    =            Carrito Submenu            =
    ======================================-->
    
     <li class="nav-item dropdown mr-4">
      <a id="cart_container" class="nav-link dropdown-toggle" data-toggle='dropdown' href="#">Carrito <span class="badge-dark">0 <i class="fas fa-cart-plus"></i></span></a>
      <div class="dropdown-menu">
        <div class="card cartCard">
            <div class="card-header bg-success">
                <div class="row">
                    <div class="col-lg-4">Imagen</div>
                    <div class="col-lg-4">Producto</div>
                    <div class="col-lg-4">Precio</div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4"><img class="" src="../imagenes/batidora.png"></div>
                    <div class="col-lg-4">Batidora</div>
                    <div class="col-lg-4">89</div>
                </div>
            </div>
        </div>
      </div>
    </li>
    
    <!--====  End of Carrito Submenu  ====-->
    
   


     <li class="nav-item">
       <a class="nav-link" href="#"><?php echo "Hola ". $username; ?> </a> 
    </li>
    <li class="nav-item">
       <a class="nav-link" href="../acciones/logout.php">Cerrar Sesión</a> 
    </li>
  </ul>
 
</div>

</nav>

<body>