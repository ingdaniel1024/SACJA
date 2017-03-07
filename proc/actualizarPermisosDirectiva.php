<?php
	require('conexion.php');

	//VARIABLES
	$idUsuario = $_POST['idUsuario'];
	if(isset($_POST['esConsejero'])){$esConsejero=1;} else { $esConsejero=0;}
	if(isset($_POST['esInstructor'])){$esInstructor=1;} else { $esInstructor=0;}
	if(isset($_POST['esSecretario'])){$esSecretario=1;} else { $esSecretario=0;}
	if(isset($_POST['esTesorero'])){$esTesorero=1;} else { $esTesorero=0;}
	if(isset($_POST['esDirector'])){$esDirector=1;} else { $esDirector=0;}
	//Actualizar permisos
	$qActualizarPermisos = "UPDATE permisos set
	esConsejero = '$esConsejero',
	esInstructor = '$esInstructor',
	esSecretario = '$esSecretario',
	esTesorero = '$esTesorero',
	esDirector = '$esDirector'
	where idUsuario = '$idUsuario'";
	$actualizarPermisos = $mysqli->query($qActualizarPermisos);
	//Verificar que su permiso original permanezca
	$qbCargo = "SELECT * from miembros where idUsuario = '$idUsuario'";
    $bCargo = $mysqli->query($qbCargo);
    while($a=$bCargo->fetch_array()){ $cargo = $a['cargo'];}
	
	$qPermisoOriginal = "UPDATE permisos set
	es".$cargo." = '$esConsejero'
	where idUsuario = '$idUsuario'";
	$permisoOriginal = $mysqli->query($qPermisoOriginal);

	session_start();
	$_SESSION['tituloNotificacion'] = '¡Hecho!';
	$_SESSION['mensajeNotificacion'] = 'Permisos actualizados exitosamente.';
	$_SESSION['tipoNotificacion'] = 'success';
	
	header('location: ../inicio.php?pagina=administrarPermisosClub');
?>