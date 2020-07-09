<?php include_once '../templates/headerAdmin.php'; 

session_start();

checkAdmin();

?> 

<div class="container mt-3">
	<div class="card mx-auto">
		<div class="header bg-success text-center"><h3>Registro</h3></div>
		<div class="card-body">
			<form action="" method="post" role="form" class="p-2" id="registerform">
				<div class="form-group">
					<label for="username">Nombre Completo</label>
					<input type="text" name="username" class="form-control" id="username" placeholder="Ingresa el Nombre Completo">
				</div>
				<div class="form-group">
					<label for="email">Correo Electrónico</label>
					<input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingresa el correo electrónico" required>
				</div>
				<div class="form-group">
					<label for="password1">Contraseña</label>
					<input type="password" name="password1" class="form-control" id="password1" placeholder="Contraseña">
				</div>
				<div class="form-group">
					<label for="password2">Confirmar Contraseña</label>
					<input type="password" name="password2" class="form-control" id="password2" placeholder="Confirma tu contraseña">
				</div>
				<div class="form-group">
					<label for="tipoUsuario">Tipo de Usuario</label>
					<select class="form-control" name="tipoUsuario" id="tipoUsuario">
						<option value="Admin">Administrador</option>
						<option value="Servicio">Servicio al Cliente</option>
					</select>
					<button type="submit" name="registroAdminUsuario" class="btn btn-primary mt-3"><span class="fas fa-user"></span>&nbsp; Registrar</button>
				</div>
			</form>
		</div>
		<div class="card-footer text-muted">
			<a href="adminDash.php">Ir a Inicio</a>
		</div>
	</div>
</div>


<?php include_once '../templates/footerAdmin.php'; ?>

