<?php
	require('conexion.php');

	//VARIABLES
	$nombrePeriodo = $_POST['nombrePeriodo'];
	$fechaInicio = $_POST['fechaInicio'];
	$fechaFin = $_POST['fechaFin'];
	//Cambiar formato de fecha
	$fechaInicio = date("Y-m-d", strtotime($fechaInicio));
	$fechaFin = date("Y-m-d", strtotime($fechaFin));

	$qiPeriodo = "INSERT into periodosanuales (nombrePeriodo, fechaInicio, fechaFin, estaActivo) 
		values ('$nombrePeriodo','$fechaInicio','$fechaFin', 0)";
	$iPeriodo = $mysqli->query($qiPeriodo);

	if ($mysqli->affected_rows) {
		session_start();
		$_SESSION['tituloNotificacion'] = '¡Hecho!';
		$_SESSION['mensajeNotificacion'] = 'Periodo creado exitosamente.';
		$_SESSION['tipoNotificacion'] = 'success';
	} else {
		session_start();
		$_SESSION['tituloNotificacion'] = 'Error';
		$_SESSION['mensajeNotificacion'] = 'No se pudo crear el periodo.';
		$_SESSION['tipoNotificacion'] = 'error';
	}

	header('location: ../inicio.php?pagina=periodos');
?>