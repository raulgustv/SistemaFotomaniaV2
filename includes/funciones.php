<?php
	/*
	function datos($datos){
		echo "<pre>";
			var_dump($datos);
		echo "</pre>";
	} */

	

	function checkInput($data){
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripslashes($data);
	return $data;
}

	function checkAdmin(){
		if(!isset($_SESSION['userId'])){
			?> <script>
				window.location.href='loginAdmin.php';
			</script>
			<?php
		}
	}

	function checkRole(){
		if($_SESSION['userRole'] != "Admin"){
			?> <script>
				window.location.href='adminDash.php';
			</script>
			<?php
		}
	}

	

	function checkUser(){
		if(isset($row['id'])){
			?> <script>
				window.location.href='../index.php';
			</script>
			<?php
		}
	} 



	//esta funcion previene el acceso a las ventanas modales 
	function access($pagina){
		$page = basename($_SERVER['PHP_SELF'], '.php');

		if($page == $pagina){
  			header("Location: adminDash.php");
		}
	}


	function redir($var){
		header("Location: ".$var."");

		die();
	}

	function resetForm($nombreform) {
		document.getElementById($nombreform).reset();
	  }

	  function generarRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}


?>
