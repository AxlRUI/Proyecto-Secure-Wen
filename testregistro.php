<?php 
	$hostname="localhost";
	$database="secure_data";
	$username="root";
	$password="2JcyLX5y/*";

	$conn = new mysqli($hostname, $username, $password, $database);

	if ($conn->connect_error) {
		die("conection failed".$conn->connect_error);
	}else{
		$num_tel = $_POST['num_tel'];
		$passwd = $_POST['passwd'];
		$correo = $_POST['correo'];
		$nom_usuario = $_POST['nom_usuario'];

		$sql = "INSERT INTO usuarios (num_tel, passwd, verif_ad, correo, nom_usuario) VALUES ('$num_tel', '$passwd', 1 , '$correo', '$nom_usuario')";
		if ($conn->query($sql) === TRUE) {
			header("Location: success.html");
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
 ?>