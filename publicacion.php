<?php 
	$num_tel = $_POST['num_tel'];
		$nom_usuario = $_POST['nom_usuario'];
		$dat_publicacion = $_POST['dat_publicacion'];
		$fecha_inc = $_POST['passwd'];
		$passwd = $_POST['passwd'];		

		$passwd = $_POST['passwd'];
		$correo = $_POST['correo'];
		
			$sql = "INSERT INTO usuarios (num_tel, passwd, verif_ad, correo, nom_usuario) VALUES ('$num_tel', '$passwd', 1 , '$correo', '$nom_usuario')";
				if ($conn->query($sql) === TRUE) {
					header("Location: success.html");
				}else{
					session_start();
					$_SESSION['error'] = "Error al registrar, intenta más tarde";
					header("Location: error.html");
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
?>