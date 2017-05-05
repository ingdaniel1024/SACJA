<?php
	require('conexion.php');

	$correo = $_POST['correo'];
	$contrasena = sha1($_POST['contrasena']);

	$query =  "SELECT * from usuarios where correo = '$correo' and contrasena = '$contrasena'";
	$verificar = $mysqli->query($query);

	if ($verificar->num_rows==1) { //Login correcto
		while($a=$verificar->fetch_array()){
			$idUsuario = $a['idUsuario'];
			$correo = $a['correo'];
		}

		session_start();
		$_SESSION['usuario'] = $idUsuario;
		//$_SESSION['correo'] = $correo;
		header('location: ../inicio.php'); //Redirección a la página principal.
		echo 'Acceso';
	} else { //Login incorrecto.
		//Notificación de error.
		session_start();
		$_SESSION['tituloNotificacion'] = 'Error';
		$_SESSION['mensajeNotificacion'] = 'Lo sentimos, las contraseñas no coinciden.';
		$_SESSION['tipoNotificacion'] = 'error';
		header('location: ../index.php');
	}
?>