<?php include_once '../templates/headerAdmin.php'; ?> 

<div class="container mt-3">
	<div class="card mx-auto" style="width: 18rem;">
	  <img class="card-img-top imgLoginAdmin mx-auto" src="../logos/login.png" alt="Card image cap">
	  <div class="card-body">
	    <form method="post" role="form" id="loginForm">
		  <div class="form-group">
		    <label for="emailLogin">Email</label>
		    <input type="email" name="emailLogin" class="form-control" id="emailLogin" aria-describedby="emailHelp" placeholder="Tu Email">	    
		  </div>
		  <div class="form-group">
		    <label for="adminPass">Contraseña</label>
		    <input type="password" class="form-control" name="adminPass" id="adminPass" placeholder="Tu contraseña">
		  </div> 
		  <button type="submit" class="btn btn-primary">Iniciar Sesión <i class="fas fa-clipboard-check"></i></button>		 
		</form>
	  </div>
	  <div class="card-footer">
	  	<a href="#">Olvidaste contraseña?</a>
	  </div>
	  <div  id="alertBlockUser">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>¡Vaya!</strong> Parece que tu cuenta ha sido bloqueada, por favor contacta con el administrador para ingresar a tu cuenta.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
				</div>
	</div>
</div>






<?php include_once '../templates/footerAdmin.php'; ?>
