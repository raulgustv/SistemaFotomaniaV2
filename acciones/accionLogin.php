<?php

include '../includes/funciones.php';
include '../includes/db.php';
include '../includes/smail.php';

/*================================
=            Registro            =
================================*/

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
			$stmt = $con->prepare("INSERT INTO clientes (nombre,usuario,email,pass) VALUES (?,?,?,?) ");
			$stmt->bind_param("ssss", $name,$uname,$email,$passHash);

			if($stmt->execute()){
				echo "Registro Completado";
			}else{
				echo "No se pudo registrar el usuario";
			}
		}
	}
}

/*=====  End of Registro  ======*/

/*=============================
=            Login            =
=============================*/

if(isset($_POST['action']) && $_POST['action'] == 'login'){

	session_start();

	$username = checkInput($_POST['username']);
	$password = sha1($_POST['password']);

	$stmt = $con->prepare("SELECT * FROM clientes WHERE usuario =? AND pass=?");
	$stmt->bind_param("ss", $username, $password);
	$stmt->execute();

	
	$r = $stmt->get_result();
	$row = mysqli_fetch_array($r);

	$count = mysqli_num_rows($r);
	

	$status = $row['estado'];

	//$user = $stmt->fetch();




	if($count == 0){
		echo "false";
	}	

	else if($status == 0){
		echo "block";
	}

	else if($status == 1){
		$_SESSION['username'] = $username;
		
		echo "true";



		if(!empty($_POST['rem'])){
			setcookie("username", $_POST['username'], time()+(10*365*24*60*60));
			setcookie("password", $_POST['password'], time()+(10*365*24*60*60));
		}else{
			if(isset($_COOKIE['username'])){
				setcookie("username","");
			}if(isset($_COOKIE['password'])){
				setcookie("password","");
			}
		}
	}else{
		echo "Error de inicio de sesión, verifique sus datos";
	}

}

/*=====  End of Login  ======*/

/*===========================================
=            Contraseña Olvidada            =
===========================================*/

if(isset($_POST['action']) && $_POST['action'] == 'forgot'){
	$femail = $_POST['femail'];


	$stmt = $con->prepare("SELECT * FROM clientes WHERE email=?");
	$stmt->bind_param("s", $femail);
	$stmt->execute();

	$res = $stmt->get_result();

	if($res->num_rows>0){
		$stmt1 = $con->prepare("SELECT * FROM contrareset WHERE email=?");
	    $stmt1->bind_param("s", $femail);
		$stmt1->execute();
		$resec = $stmt1->get_result();
        if($resec->num_rows>0){
		$stmt3 = $con->prepare("DELETE FROM contrareset WHERE email=?");
	    $stmt3->bind_param("s", $femail);
		$stmt3->execute(); 
        }
		$token = generarRandomString(40);
		$stmt2 = $con->prepare("INSERT INTO contrareset(email, token) VALUES (?,?)");
	    $stmt2->bind_param("ss", $femail,$token);
		$stmt2->execute();
		$stmt3 = $con->query("UPDATE contrareset SET tokenExpira=DATE_ADD(NOW(),INTERVAL 10 MINUTE)");
		
        $titulo = 'Restablecimiento de contraseña para sistema FotomaniaCR';
        $cuerpo = 'Usted solicito restablecer su contraseña para <b>FotomaniaCR</b><br>Ingrese al siguiente link para realizar el restablecimiento:http://localhost/SISTEMAFOTOMANIAv2/vistas/resetPassword.php?token='.$token;
        $cuerposimple = 'Usted solicito restablecer su contraseña para FotomaniaCR. Ingrese al siguiente link para realizar el restablecimiento:http://localhost/SISTEMAFOTOMANIAv2/vistas/resetPassword.php?token='.$token;
        if($func = emailreset($femail,$titulo,$cuerpo,$cuerposimple)){
			echo "Reestablecimiento de contraseña enviado con éxito";
		}else{
			echo "Error al enviar mensaje, intente de nuevo";
		}
		




		
	
}else{
	echo "El correo electronico ingresado no se encuentra registrado en nuestro sistema";	
}


	
}

/*=====  End of Contraseña Olvidada  ======*/
	
	
/*================================
=    Restableciemiento de contra       =
================================*/

if(isset($_POST['action']) && $_POST['action'] == 'restcon'){
	/*$currentpass = checkInput($_POST['currentpassword']);*/
	$newpass = checkInput($_POST['newpass']);
	$cnewpass = checkInput($_POST['cnewpass']);
	$uemail = checkInput($_POST['uemail']);
	
	/*$currentpassHash = sha1($currentpass);*/
	$newpassHash = sha1($newpass);
	$cnewpassHash = sha1($cnewpass);
	$sql = $con->prepare("SELECT usuario,email,pass FROM clientes WHERE email =?");
	$sql->bind_param("s", $uemail);
	$sql->execute();
	$result = $sql->get_result();
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$currentpassDB = $row['pass'];
	if($newpassHash != $cnewpassHash){
		echo 'falselocalNC';
		exit();
	}/*elseif($currentpassDB != $currentpassHash){
		echo 'Error!!! La contraseña actual ingresada no coincide con nuestro sistema';
		exit();
	}*/else{
		$con->query("UPDATE clientes SET pass = '$newpassHash' WHERE email = '$uemail'");
		$con->query("DELETE FROM contrareset WHERE email = '$uemail'");
		echo "true";
	}
}

/*=====  End of Restablecimiento de contra  ======*/







?>