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

?>