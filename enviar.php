<?php 
	include('login.php');
	date_default_timezone_set('America/Mexico_City');
	if(!isset($_POST['categoria'])){
		header("location: /");
	}

	else{
		$telefono=$_SESSION['login_user_sys'];
		$categoria=$_POST['categoria'];
		$fecha=$_POST['fecha'];
		$hora=$_POST['hora'];
		$descripcion=$_POST['descripcion'];
		$latitud=$_POST['latitud'];
		$longitud=$_POST['longitud'];

		include('conexion.php');

		$sql="SELECT id_usuario FROM usuarios WHERE num_tel= '".$telefono."'";
		$res=$conn->query($sql);

		$row=$res->fetch_assoc();
		$id=$row['id_usuario'];

		$sql="INSERT INTO `publicaciones` (`id_publicacion`, `id_usuario`, `publicacion`, `fecha_inc`, `fecha_pub`, `coor_lon`, `coor_lat`, `categoria`) VALUES (NULL, '".$id."', '".$descripcion."', '".$fecha."', '".date("Y-m-d")." ".date("H:i:s")."', '".$longitud."', '".$latitud."', '".$categoria."')";
		$res=$conn->query($sql);

		$conn->close();

		header("location: /");
	}
?>