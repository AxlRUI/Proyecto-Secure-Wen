
<?php
    session_start(); // Iniciando sesion
    $error=''; // Variable para almacenar el mensaje de error
    if (isset($_POST['login'])) {
        if (empty($_POST['tel']) || empty($_POST['passwd'])) {
            $error = "Username or Password is invalid";
        }
        else{
            // Define $username y $password
            $user=$_POST['tel'];
            $pass=$_POST['passwd'];
            // Estableciendo la conexion a la base de datos
            include("conexion.php");//Contiene de conexion a la base de datos

            /*// Para proteger de Inyecciones SQL 
            $username=mysqli_real_escape_string($con,(strip_tags($username,ENT_QUOTES)));
            $password=sha1($password);//Algoritmo de encriptacion de la contraseña http://php.net/manual/es/function.sha1.php*/

            $sql = "SELECT num_tel, passwd FROM usuarios WHERE num_tel = '" . $user . "' and passwd ='".$pass."';";
            $query=$conn->query($sql);

            if ($query->num_rows == 1){
                $_SESSION['login_user_sys']=$user; // Iniciando la sesion
                header("location: /"); // Redireccionando a la pagina profile.php
            } 
            else {
                $error = "El correo electrónico o la contraseña es inválida.";
            }
        }
    }
?>
