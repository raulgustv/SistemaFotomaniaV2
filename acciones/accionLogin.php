<?php

include '../includes/funciones.php';
include '../includes/db.php';

if(isset($_POST['action']) && $_POST['action'] == 'register'){
	$name = checkInput($_POST['name']);
	$uname = checkInput($_POST['uname']);
	$email = checkInput($_POST['email']);
	$pass = checkInput($_POST['pass']);
	$cpass = checkInput($_POST['cpass']);

	$passHash = sha1($pass);
	$cpassHash = sha1($cpass);
	$created=date('Y-m-d');

	if($passHash!=$cpassHash){
		echo 'Error!!! Las contraseñas no coinciden';
		exit();
	}else{
		$sql = $con->prepare("SELECT usuario,email FROM clientes WHERE usuario=? or email =?");
		$sql->bind_param("ss", $uname,$email);
		$sql->execute();
		$result = $sql->get_result();
		$row = $result->fetch_array(MYSQLI_ASSOC);

		if($row['usuario'] == $uname){
			echo "El usuario ya está en uso";
		}else if ($row['email'] == $email){
			echo "Este correo electrónico está en uso";
		}else{
			$stmt = $con->prepare("INSERT INTO clientes (nombre,usuario,email,pass,creado) VALUES (?,?,?,?,?) ");
			$stmt->bind_param("sssss", $name,$uname,$email,$passHash,$created);

			if($stmt->execute()){
				echo "Registro Completado";
			}else{
				echo "No se pudo registrar el usuario";
			}
		}

		



	}

	


}





?>