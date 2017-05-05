<?php
	require('conexion.php');

	//VARIABLES
	$descripcion = $_POST['descripcion'];
	$requisito = $_POST['requisito'];
	if (isset($_POST['esEspecialidad'])) { $esEspecialidad=1; } else {$esEspecialidad=0;}

	echo $qiRequisito = "INSERT into subrequisitos (descripcion, esEspecialidad, idRequisitoClase) 
		values ('$descripcion','$esEspecialidad','$requisito')";
	$iRequisito = $mysqli->query($qiRequisito);

	if ($mysqli->affected_rows) {
		session_start();
		$_SESSION['tituloNotificacion'] = '¡Hecho!';
		$_SESSION['mensajeNotificacion'] = 'Subrequisito añadido exitosamente.';
		$_SESSION['tipoNotificacion'] = 'success';
	} else {
		session_start();
		$_SESSION['tituloNotificacion'] = 'Error';
		$_SESSION['mensajeNotificacion'] = 'No se pudo añadir el subrequisito.';
		$_SESSION['tipoNotificacion'] = 'warning';
	}

	header('location: ../inicio.php?pagina=administrarSubrequisitos&requisito='.$requisito);
?>