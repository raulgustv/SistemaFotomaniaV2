<?php include_once '../templates/headerAdmin.php'; ?> 

<div class="container mt-3">
	<div class="card mx-auto" style="width: 18rem;">
	  <img class="card-img-top imgLoginAdmin mx-auto" src="../logos/reset.jpg" alt="Card image cap">
	  <div class="card-body">
	    <form method="post" role="form" id="resetForm" name="resetForm">
		  <div class="form-group">
		    <label for="emailReset">Email</label>
		    <input type="email" name="emailReset" class="form-control" id="emailReset" aria-describedby="emailHelp" placeholder="Tu Email">	    
		  </div>
		  <button type="submit" id="forgotAdmin" name ="forgotAdmin" class="btn btn-primary">Restablecer contraseña<i class="fa fa-key"></i></button>
		</form>
	  </div>
	  <div class="card-footer">
	  	<a href="loginAdmin.php">Volver</a>
	  </div>
	</div>
</div>






<?php include_once '../templates/footerAdmin.php'; ?>
