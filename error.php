<?php 
	session_start();
	$error = $_SESSION['error'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SUCCESS</title>
	<meta charset="UTF-8"/>
    <title>Secure</title>
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css">
    <link rel="stylesheet" href="materialize/css/YXzLBN.css">
    <meta name="viewport" content="width=device.width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body style="display: flex; -webkit-display: flex; justify-content: center; -webkit-justify-content: center; align-items: center; -webkit-align-items: center;">
	<div class="card active red" style="width: 50%; height: 50%; display: flex; -webkit-display: flex; justify-content: center; -webkit-justify-content: center; align-items: center; -webkit-align-items: center; flex-direction: column; -webkit-flex-direction: column;">
		<h1 class="white-text"><?php echo $error; ?></h1>
		<?php $_SESSION['error'] = ""; ?>
		<a class="btn white black-text" href="index.html">Volver</a>
	</div>
</body>
</html>
