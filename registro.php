<?php 
	include 'conexion.php';
	$num_tel = $_POST['num_tel'];
	$passwd = $_POST['passwd'];
	$correo = $_POST['correo'];
	$nom_usuario = $_POST['nom_usuario'];

	$sql = "SELECT correo FROM usuarios WHERE correo = '$correo'";
	$result = $conn->query($sql);
	if ($result->num_rows >0) {
		session_start();
		$_SESSION['error'] = "Este correo ya ha sido utilizado";
		header('Location: error.php');
	}else{
		$sql = "INSERT INTO usuarios (num_tel, passwd, verif_ad, correo, nom_usuario) VALUES ('$num_tel', '$passwd', 1 , '$correo', '$nom_usuario')";
		if ($conn->query($sql) === TRUE) {
			header("Location: success.html");
		}else{
			session_start();
			$_SESSION['error'] = "Error al registrar, intenta más tarde";
			header("Location: error.html");
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
 ?>