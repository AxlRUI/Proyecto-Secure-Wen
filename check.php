<?php
	session_start();
	if(session_destroy()){
		header("Location: /"); // Redireccionando a la pagina index.php
	}
?>