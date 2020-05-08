<?php

include '../includes/funciones.php';
include '../includes/db.php';

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

	$user = $stmt->fetch();

	if($user!=null){
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


	$stmt = $con->prepare("SELECT id FROM clientes WHERE email=?");
	$stmt->bind_param("s", $femail);
	$stmt->execute();

	$res = $stmt->get_result();

	if($res->num_rows>0){
		$token = "pdtay345trbn1y4y7p1wqwcedrgfhppqads432"; //token aleatorio
		$token = str_shuffle($token);
		$token = substr($token, 0,10);

		$sql = $con->prepare("UPDATE clientes SET token=?, tokenExpira=DATE_ADD(NOW(),INTERVAL 5 MINUTE) WHERE email=?");
		$sql->bind_param("ss", $token, $femail);
		$sql->execute();

		include '../PHP-Mailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;

		$mail->Host='smtp.gmail.com';
		$mail->Port=587;
		$mail->SMTPAuth=true;
		$mail->SMTPSecure='tls';

		$mail->Username='raulgust@gmail.com';
		$mail->Password='Pareo-32451';

		$mail->addAddress($femail);
		$mail->setFrom('raulgust@gmail.com', 'Fotomania');

		$mail->isHTML(true);
		$mail->Subject="Prueba";
		$mail->Body="<h3>Haz clic en el enlace para reestablecer tu contraseña</h3><br>
					<a href='http://localhost/sistemafotomaniav2/vistas/resetPassword.php?email=$femail&token=$token'>http://localhost/sistemafotomaniav2/vistas/resetPassword.php?email=$femail&token=$token</a><br><h3>Saludos,<br>Fotomania CR</h3>";

		if($mail->send()){
			echo "Reestablecimiento de contraseña enviado con éxito";
		}else{
			echo "Error al enviar mensaje, intente de nuevo";
		}




		
	}	
}

/*=====  End of Contraseña Olvidada  ======*/
	
	








?>