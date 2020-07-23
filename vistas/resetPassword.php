<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sistema Fotomanía</title>
	<link rel="stylesheet" type="text/css" href="../public/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/main.css">
</head>
<?php
include_once '../includes/funciones.php';
include '../includes/db.php';
if (isset($_GET['token'])) {
    $tokenenviado = $_GET['token'];
} else {
    echo 'no existe';
    echo "<br>";
}
/*
$tokendb = $con->prepare("SELECT * FROM contrareset");
$tokendb->execute();
$ftoken = $tokendb->get_result();
if($ftoken->num_rows>0){
  while($arraytoken = mysqli_fetch_array($ftoken)){
        echo $arraytoken['token'];
        if($arraytoken['token'] == $tokenenviado){
        $existe = 1;
        }else{
            $existe = 0;
        }

    echo "<br>";
}
  }  

  if($existe == 1){
    echo 'Aqui nos quedamos';
 }else{
     echo 'Adios';
 }*/

 $existecr;
if(!isset($tokenenviado)){
   
    redir("./"); 

    }else{
        $qcr = $con->query("SELECT * FROM contrareset WHERE token = '$tokenenviado'");
        if(mysqli_num_rows($qcr)<=0){
            redir("http://localhost/SISTEMAFOTOMANIAv2/");
        }else{
            $datos = mysqli_fetch_array($qcr);
            date_default_timezone_set('America/Costa_Rica');
            $ucorreo = $datos['email'];
            $now = new \DateTime();
            $target = new \DateTime($datos['tokenExpira']);
            $minutes = ($target->getTimestamp() - $now->getTimestamp())/60;
            if($minutes <= 0){
                redir("http://localhost/SISTEMAFOTOMANIAv2/");  
            }else{
              ?>
   <!--=========================================
	=            Formulario resetear pass            =
	==========================================-->
	
	<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="resetpass-box">
				<h2 class="text-center mt-2">Restablecimiento de contraseña</h2>
				<form action="" method="post" role="form" class="p-2" id="resetpass-frm">
					<!--- <div class="form-group">
						<input type="password" name="currentpassword" id="currentpassword" class="form-control" placeholder="Contraseña actual" required>
					</div> --->
					<div class="form-group">
						<input type="password" name="newpass" id="newpass" class="form-control" placeholder="Nueva contraseña" required>
					</div>
					<div class="form-group">
						<input type="password" name="cnewpass" id="cnewpass" class="form-control" placeholder="Confirmar nueva contraseña" required>
					</div>
					<div class="form-group">
						<input type="submit" id="restcon" name="restcon" value="Restablecer" class="btn btn-success btn-block">
                    </div>
                    <div class="form-group">
						<input type="hidden" id="uemail" name="uemail" value="<?=$ucorreo?>" class="btn btn-success btn-block">
					</div>
					<div class="form-group">
						<p class="text-center"><a href="#" id="login-btn">Volver</a></p>
					</div>				
				</form>
			</div>
	</div>
	
	<!--====  End of Formulario resetear pass  ====-->
              <?php  
            }
        }
    }
    ?>
    <footer>
	<script type="text/javascript" src="../public/js/jquery-3.5.0.min.js"></script>
	<script type="text/javascript" src="../public/css/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../public/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../public/sweetAlert/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="../public/js/funciones.js"></script>
</footer>