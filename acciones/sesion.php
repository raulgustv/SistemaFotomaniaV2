<?php

session_start();
include '../includes/db.php';

$user=$_SESSION['userId'];


$stmt = $con->prepare("SELECT * FROM clientes WHERE id=?");
$stmt->bind_param("s", $user);
$stmt->execute();
$r = $stmt->get_result();

$row = $r->fetch_array(MYSQLI_ASSOC);

$username = $row['usuario']; 
$userId = $row['id'];
$status = $row['estado'];

if($status == 0){
	header("location:../index.php");

}









if(!isset($user)){
	header("location:../index.php");
}


?>