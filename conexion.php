<?php 
	$hostname="localhost";
	$database="secure_data";
	$username="root";
	$password="2JcyLX5y/*";

	$conn = new mysqli($hostname, $username, $password, $database);


	if ($conn->connect_error) {
		die("conection failed".$conn->connect_error);
		session_start();
		$_SESSION['error'] = "Error de Conexión, intenta más tarde";
		header("Location: error.php");
	}
 ?>