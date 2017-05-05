<?php
	$db_servidor = "localhost";		//Servidor.
	$db_usuario = "root";			//Usuario.
	$db_contrasena = "";			//Contraseña.
	$db_bd = "sacja";				//Base de Datos.

	// Create connection
	$mysqli = mysqli_connect($db_servidor, $db_usuario, $db_contrasena, $db_bd);	//Conexión.
	$mysqli->set_charset("utf8"); //Estándar de codificación de caracteres.
	if (!$mysqli) { //Si hay un error en la conexión.
		echo 'No conecta la base de datos.<br>';
		die('Error en la conexión: '.mysqli_connect_error());		
	}
?>