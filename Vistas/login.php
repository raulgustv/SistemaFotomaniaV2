<?php include '../Templates/header.php' ?>

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-4 offset-lg-4" id="alert">
			<div class="alert alert-success">
				<strong id="Resultado"></strong>
			</div>
		</div>		
	</div>
	<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="login-box">
				<h2 class="text-center mt-2">Login</h2>
				<form action="" method="post" role="form" class="p-2" id="login-frm">
					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="Nombre Usuario" required>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Contraseña" required>
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="rem" class="custom-control-input" id="customCheck">
							<label for="customCheck" class="custom-control-label">Recuérdame</label>
							<a href="#" id="forgot-btn" class="float-right">Olvidaste tu contraseña?</a>
						</div>
					</div>
					<div class="form-group">
						<input type="submit" id="login" name="login" value="Login" class="btn btn-success btn-block">
					</div>
					<div class="form-group">
						<p class="text-center">Nuevo Usuario? <a href="#" id="register-btn">Registrate aquí</a></p>
					</div>				
				</form>
			</div>
	</div>
</div>

<?php include '../Templates/footer.php' ?>

