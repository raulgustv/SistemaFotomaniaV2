<?php

include '../../includes/db.php';
include '../../includes/funciones.php';

if(isset($_POST['registrarAdmin'])){

	date_default_timezone_set("America/Costa_Rica");

	$nombre = checkInput($_POST['username']);
	$email = checkInput($_POST['email']);
	$pass1 = checkInput($_POST['password1']);
	$pass2 = checkInput($_POST['password2']);
	$tipo = checkInput($_POST['tipoUsuario']);
	$date = date("Y-m-d h:i:s");
	
	$q = $con->query("SELECT * FROM admin WHERE email= '$email' ");
	//$q->bind_param("s", $email);
	//$q->execute();



	if(mysqli_num_rows($q) > 0){
		echo "error";
	}else{
		echo "bien";
	}



}


?>