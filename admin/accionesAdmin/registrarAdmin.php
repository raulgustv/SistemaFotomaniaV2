<?php

include '../../includes/db.php';
include '../../includes/funciones.php';

date_default_timezone_set("America/Costa_Rica");

/*===============================================
=            Registrar Administrador            =
===============================================*/
if(isset($_POST['registrarAdmin'])){	

	$nombre = checkInput($_POST['username']);
	$email = checkInput($_POST['email']);
	$pass1 = checkInput($_POST['password1']);
	$pass2 = checkInput($_POST['password2']);
	$tipo = checkInput($_POST['tipoUsuario']);
	$date = date("Y-m-d h:i:s");
	
	$q = $con->prepare("SELECT * FROM admin WHERE email = ? OR user = ?");
	$q->bind_param("ss", $email, $nombre);
	$q->execute();
	$r = $q->get_result();

	if($r->num_rows > 0){
		echo "false";
	}else{
		$pass_hash = password_hash($pass1, PASSWORD_BCRYPT,["cost"=>8]);
		$notas = "";
		$stmt = $con->prepare("INSERT INTO admin (user,email,pass,tipoUsuario, fechaRegistro,fechaLogin,notas) VALUES (?,?,?,?,?,?,?)");

		$stmt->bind_param("sssssss", $nombre,$email,$pass_hash,$tipo,$date,$date,$notas);

		$stmt->execute() or die($con->error);
		$stmt->close();

	}
}
/*=====  End of Registrar Administrador  ======*/


/*=============================
=            Login            =
=============================*/

if(isset($_POST['loginAdmin'])){


	$q = $con->prepare("SELECT * FROM admin WHERE email = ? ");

	$email = checkInput($_POST['emailLogin']);
	$password = checkInput($_POST['adminPass']);

	$q->bind_param("s", $email);
	$q->execute();

	$result = $q->get_result();

	if($result->num_rows < 1){
		echo "false";
	}else{
		$row = $result->fetch_assoc();

		//De esta seccion salen todos los datos de login

		if(password_verify($password, $row['pass'])){
			session_start();
			$_SESSION['userId'] = $row['id'];
			$_SESSION['user'] = $row['user'];
			$_SESSION['ultimoLogin'] = $row['fechaLogin'];
			$_SESSION['userRole'] = $row['tipoUsuario'];


			$ultimo_Login = date("Y-m-d h:i:s");

			$stmt = $con->prepare("UPDATE admin SET fechaLogin = ? WHERE email = ?");
			$stmt->bind_param("ss", $ultimo_Login, $email);
			$stmt->execute();

			echo "true";



		}else{
			echo "badPassword";
		}
	}


	
}



/*=====  End of Login  ======*/









?>