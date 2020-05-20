<?php

	function datos($datos){
		echo "<pre>";
			var_dump($datos);
		echo "</pre>";
	}

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

?>