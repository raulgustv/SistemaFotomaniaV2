<?php

session_start();
include '../includes/db.php';

$user=$_SESSION['username'];


$stmt = $con->prepare("SELECT * FROM clientes WHERE usuario=?");
$stmt->bind_param("s", $user);
$stmt->execute();
$r = $stmt->get_result();

$row = $r->fetch_array(MYSQLI_ASSOC);

$username = $row['usuario']; 
$userId = $row['id'];
$status = $row['estado'];





if(!isset($user)){
	header("location:../index.php");
}


?>