<?php
/*
$db_host="localhost";
$db_user="root";
$db_name="secure_data";
$db_password="2JcyLX5y";
$db_table_name="usuarios";

   $db_connection = mysqli_connect($db_host, $db_user, $db_password);
*/
 
$hostname="localhost";
$database="secure_data";
$username="root";
$password="2JcyLX5y/*";
$db_table_name="usuarios";
$db_connection=mysqli_connect($hostname, $username, $password, $database);
if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}
$subs_num_tel = ($_POST['num_tel']);
$subs_passwd = ($_POST['passwd']);
$subs_correo = ($_POST['correo']);
$subs_nom_usuario = ($_POST['nom_usuario']);

$resultado=mysqli_query("SELECT * FROM '$db_table_name' WHERE correo = '$subs_correo'", $db_connection);

if (mysqli_num_rows($resultado)>0)
{

header('Location: Fail.html');

} else {
	
	$insert_value = "INSERT INTO `usuarios` (`num_tel`, `passwd`, `verif_ad`, `correo`, `nom_usuario`) VALUES ('$subs_num_tel', '$passwd', '1', '$subs_correo', '$subs_nom_usuario')";
	if($db_connection->query($insert_value) === TRUE{
		echo "OK";
	}else{
		echo "ERORR: ".$insert_value."<br>".$db_connection->error;
	}

//$retry_value = mysqli_query($insert_value, $db_connection);

/*if (!$retry_value) {
   die('Error: ' . mysqli_error());
}*/
	
header('Location: index2.html');

}

mysqli_close($db_connection);

		
?>