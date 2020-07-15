<?php

session_start();


if(isset($_SESSION['username'])){
	header("location:vistas/principal.php");
}



include 'templates/header.php'
?>

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-4 offset-lg-4" id="alert">
			<div class="alert alert-success text-center alert-dismissible fade show" id="alertRegister" role="alert">
				<strong id="result" ></strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>		
	</div>

	<div class="text-center">
		<img class="loaderGif m-2" src="logos/preloader.gif" alt="Cargando.." id="loader">
	</div>

	<!--======================================
	=            Formulario Login            =
	=======================================-->
	
	<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="login-box">
				<h2 class="text-center mt-2">Login</h2>
				<form action="" method="post" role="form" class="p-2" id="login-frm">
					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="Nombre Usuario" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];} ?>" required>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Contraseña" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>" required>
					</div>					
					<div class="form-group">
						<input type="submit" id="login" name="login" value="Login" class="btn btn-success btn-block">
					</div>
					<div class="form-group">
						<p class="text-center">Nuevo Usuario? <a href="#" id="register-btn">Registrate aquí</a></p>
					</div>				
				</form>
				<div class="container" id="alertBlock">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>¡Vaya!</strong> Parece que tu cuenta ha sido bloqueada, puedes contactarnos al (506) 4000-0938 o al 4000-0939. O escríbenos al número de WhatsApp (506) 7162-6776
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
				</div>
			</div>
	</div>
	
	
	<!--====  End of Formulario Login  ====-->

	<!--=========================================
	=            Formulario registro            =
	==========================================-->
	
	<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
				<h2 class="text-center mt-2">Registro</h2>
				<form action="" method="post" role="form" class="p-2" id="register-frm">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Nombre Completo" required minlength="3">
					</div>
					<div class="form-group">
						<input type="text" name="uname" class="form-control" placeholder="Nombre Usuario" required minlength="3">
					</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña" required minlength="6">
					</div>
					<div class="form-group">
						<input type="password" name="cpass" id="cpass" class="form-control" placeholder="Confirma Contraseña" required>
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="rem" class="custom-control-input" id="customCheck2">
							<label for="customCheck2" class="custom-control-label">Estoy de acuerdo con los <a href="#">Términos y condiciones</a></label>
							
						</div>
					</div>
					<div class="form-group">
						<input type="submit" id="register" name="register" value="Registrar" class="btn btn-success btn-block">
					</div>
					<div class="form-group">
						<p class="text-center">Tienes cuenta ya? <a href="#" id="login-btn">Inicia sesión</a></p>
					</div>				
				</form>
				
			</div>
	</div>
	
	<!--====  End of Formulario registro  ====-->

	<!--===========================================
	=            Formulario reset pass            =
	============================================-->
	
	<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="forgot-box">
				<h2 class="text-center mt-2">Reset Password</h2>
				<form action="" method="post" role="form" class="p-2" id="forgot-frm">
					<div class="form-group text-center">
						<small class="text-muted">
							Para reestablecer tu contraseña, ingresa tu correo electrónico y te enviaremos las instrucciones para reestablecer tu contraseña a tu correo electrónico
						</small>
					</div>
					<div class="form-group">
						<input type="email" name="femail" class="form-control" placeholder="Correo electrónico" required>
					</div>					
					<div class="form-group">
						<input type="submit" id="forgot" name="forgot" value="Enviar" class="btn btn-success btn-block">
					</div>
					<div class="form-group text-center">
						<a href="#" id="back-btn">Regresar</a>
					</div>				
				</form>
			</div>
	</div>
	
	<!--====  End of Formulario reset pass  ====-->
	
	
	

	
</div>

<?php include 'templates/footer.php'; ?>


