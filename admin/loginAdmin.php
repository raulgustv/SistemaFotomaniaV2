<?php include_once '../templates/headerAdmin.php'; ?> 

<div class="container mt-3">
	<div class="card mx-auto" style="width: 18rem;">
	  <img class="card-img-top imgLoginAdmin mx-auto" src="../logos/login.png" alt="Card image cap">
	  <div class="card-body">
	    <form>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu Email">	    
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Contraseña</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Tu contraseña">
		  </div> 
		  <button type="submit" class="btn btn-primary">Iniciar Sesión <i class="fas fa-clipboard-check"></i></button>
		  <span>
		  	<a href="registroAdmin.php">Registrar</a>
		  </span>
		</form>
	  </div>
	  <div class="card-footer">
	  	<a href="#">Olvidaste contraseña?</a>
	  </div>
	</div>
</div>






<?php include_once '../templates/footerAdmin.php'; ?>
