<?php
	require('conexion.php');

	//VARIABLES
	$correoUsuarioExistente = $_POST['correoUsuarioExistente'];
	$nombre = $_POST['nombre'];
	$cargo = $_POST['cargo'];
	$apellidoPaterno = $_POST['apellidoPaterno'];
	$apellidoMaterno = $_POST['apellidoMaterno'];
	$sexo = $_POST['sexo'];
	$correo = $_POST['correo'];
	$contrasena = $_POST['contrasena'];
	$contrasenaRepetida = $_POST['contrasenaRepetida'];
	$idClub = $_POST['idClub'];

	//Verificar si ya tenía correo
	if($correoUsuarioExistente!=''){
		//Ingresó un correo

		$qvCorreo = "SELECT *  from usuarios where correo = '$correoUsuarioExistente'";
		$vCorreo = $mysqli->query($qvCorreo);
		if ($vCorreo->num_rows) {
			//Es válido el correo
			//Sacar su ID
			while ($a=$vCorreo->fetch_array()){ $idUsuario = $a['idUsuario']; }
			//Verificar si ya está en la directiva
			$qvDirectiva = "SELECT * from miembros where idUsuario = $idUsuario";
			$vDirectiva = $mysqli->query($qvDirectiva);
			if($vDirectiva->num_rows){
				//Ya está en la directiva
				session_start();
				$_SESSION['tituloNotificacion'] = 'Aviso';
				$_SESSION['mensajeNotificacion'] = 'Este usuario ya forma parte de la directiva.';
				$_SESSION['tipoNotificacion'] = 'info';
			} else {
				agregarDirectiva();
				session_start();
				$_SESSION['tituloNotificacion'] = '¡Hecho!';
				$_SESSION['mensajeNotificacion'] = 'Usuario añadido a la directiva exitosamente.';
				$_SESSION['tipoNotificacion'] = 'success';
			}
			
		} else {
			//No es válido el correo
			session_start();
			$_SESSION['tituloNotificacion'] = 'Error';
			$_SESSION['mensajeNotificacion'] = 'El correo introducido es incorrecto.';
			$_SESSION['tipoNotificacion'] = 'info';
		}

	} else {
		//No ingresó correo. Es un usuario nuevo
		if ($contrasena==$contrasenaRepetida) {
			$idUsuario = crearUsuario();
			agregarDirectiva();
			session_start();
			$_SESSION['tituloNotificacion'] = '¡Hecho!';
			$_SESSION['mensajeNotificacion'] = 'Usuario añadido a la directiva exitosamente.';
			$_SESSION['tipoNotificacion'] = 'success';
		} else {
			//Contraseñas incorrectas
			session_start();
			$_SESSION['tituloNotificacion'] = 'Error';
			$_SESSION['mensajeNotificacion'] = 'Lo sentimos, las contraseñas no coinciden.';
			$_SESSION['tipoNotificacion'] = 'error';
		}
		
	}
	//Verificar si el correo es correcto
	//Verificar si ya está en la directiva
	//
	function crearUsuario(){
		global $mysqli, $cargo, $nombre, $apellidoPaterno, $apellidoMaterno, $sexo, $correo, $contrasena;
		$contrasena = sha1($contrasena);
		$qiUsuario = "INSERT into usuarios (nombre, apellidoPaterno, apellidoMaterno, sexo, correo, contrasena) 
		values ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$sexo', '$correo', '$contrasena')";
		$iUsuario = $mysqli->query($qiUsuario);

		$qsacarID = "SELECT * from usuarios where correo = '$correo'";
		$sacarID = $mysqli->query($qsacarID);
		while($c=$sacarID->fetch_array()){ $idUsuario = $c['idUsuario']; }
		//Otorgarle permisos
		switch($cargo){
			case 'Consejero':
				$qPermisos = "INSERT into permisos (idUsuario, esConsejero) values ($idUsuario, 1)";
			break;
			case 'Instructor':
				$qPermisos = "INSERT into permisos (idUsuario, esInstructor) values ($idUsuario, 1)";
			break;
			case 'Secretario':
				$qPermisos = "INSERT into permisos (idUsuario, esSecretario) values ($idUsuario, 1)";
			break;
			case 'Tesorero':
				$qPermisos = "INSERT into permisos (idUsuario, esTesorero) values ($idUsuario, 1)";
			break;
		}

		$permisos = $mysqli->query($qPermisos);
		//Darlo de alta en la tabla de perfil
		$qPerfil = "INSERT into perfil (idUsuario) values ($idUsuario)";
		$pPerfil = $mysqli->query($qPerfil);
		return $idUsuario;
	}
	function agregarDirectiva(){
		global $mysqli, $idUsuario, $cargo, $idClub;
		//Añadir a directiva
		$qAgregar = "INSERT into miembros (idClub, idUsuario, cargo) 
		values ('$idClub', '$idUsuario', '$cargo')";
		$agregar = $mysqli->query($qAgregar);
		//Permiso
		switch($cargo){
			case 'Consejero':
				$qPermiso = "UPDATE permisos set esConsejero = 1 where idUsuario = $idUsuario";
			break;
			case 'Instructor':
				$qPermiso = "UPDATE permisos set esInstructor = 1 where idUsuario = $idUsuario";
			break;
			case 'Secretario':
				$qPermiso = "UPDATE permisos set esSecretario = 1 where idUsuario = $idUsuario";
			break;
			case 'Tesorero':
				$qPermiso = "UPDATE permisos set esTesorero = 1 where idUsuario = $idUsuario";
			break;
		}
		$permiso = $mysqli->query($qPermiso);
	}
	
	header('location: ../inicio.php?pagina=administrarDirectivaClub');
?>