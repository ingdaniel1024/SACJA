<?php
session_start();
	if (isset($_SESSION['usuario'])) {
		unset($_SESSION['usuario']);
		unset($_SESSION['correo']);
		session_destroy();
		header('location: ../index.php');
	} else {
		header('location: ../index.php');
	}
?>