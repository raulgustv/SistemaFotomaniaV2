<?php


	$severname = "localhost";
	$username = "root";
	$password = "";
	$db = "fotomaniacr";

	$con = mysqli_connect($severname, $username, $password, $db);

	if(!$con){
		die("Fallo de conexión: ". mysqli_connect_error());
	}

?>