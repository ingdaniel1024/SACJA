<?php
	require('conexion.php');

	//VARIABLES
	$descripcion = $_POST['descripcion'];
	$clase = $_POST['clase'];
	if (isset($_POST['esEspecialidad'])) { $esEspecialidad=1; } else {$esEspecialidad=0;}
	$idCategoriaClases = $_POST['idCategoriaClases'];

	$qiRequisito = "INSERT into requisitosclase (descripcion, esEspecialidad, idCategoriaClases, opcionesNecesarias, opcionesDisponibles) 
		values ('$descripcion','$esEspecialidad','$idCategoriaClases',1,1)";
	$iRequisito = $mysqli->query($qiRequisito);

	if ($mysqli->affected_rows) {
		session_start();
		$_SESSION['tituloNotificacion'] = '¡Hecho!';
		$_SESSION['mensajeNotificacion'] = 'Requisito añadido exitosamente.';
		$_SESSION['tipoNotificacion'] = 'success';
	} else {
		session_start();
		$_SESSION['tituloNotificacion'] = 'Error';
		$_SESSION['mensajeNotificacion'] = 'No se pudo añadir el requisito.';
		$_SESSION['tipoNotificacion'] = 'warning';
	}

	header('location: ../inicio.php?pagina=administrarRequisitos&clase='.$clase);
?>