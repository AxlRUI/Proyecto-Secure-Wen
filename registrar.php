<?PHP
$hostname="localhost";
$database="secure_data";
$username="root";
$password="2JcyLX5y/*";
$json=array();
	if(isset($_GET["names"])&&($_GET["user"]) && isset($_GET["pwd"])){
		$names=$_GET['names']
		$user=$_GET['user'];
		$pwd=$_GET['pwd'];
		
		$conexion=mysqli_connect($hostname,$username,$password,$database);
		
		$consulta="INSERT INTO usuarios(nom_usuario, correo, passwd) VALUES ('{$nom_usuario}','{$correo}' , '{$passwd}')";
		$resultado=mysqli_query($conexion,$consulta);

       
		if($consulta){
		   $consulta="SELECT * FROM usuarios  WHERE names='{$nom_usuario}'";
		   $resultado=mysqli_query($conexion,$consulta);

			if($reg=mysqli_fetch_array($resultado)){
				$json['datos'][]=$reg;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}



		else{
			$results["nom_usuario"]='';
			$results["correo"]='';
			$results["passwd"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
		
	}
	else{   
		    $results["nom_usuario"]='';
		   	$results["correo"]='';
			$results["passwd"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
?>

