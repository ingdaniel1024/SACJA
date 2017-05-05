<?php
	require('conexion.php');

	//VARIABLES
	$correoUsuarioExistente = $_POST['correoUsuarioExistente'];
	$nombre = $_POST['nombre'];
	$clase = $_POST['clase'];
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
			//Verificar si ya es miembro de este club
			$qvDirectiva = "SELECT * from miembros where idUsuario = $idUsuario";
			$vDirectiva = $mysqli->query($qvDirectiva);
			if($vDirectiva->num_rows){
				//Ya está en el club
				session_start();
				$_SESSION['tituloNotificacion'] = 'Aviso';
				$_SESSION['mensajeNotificacion'] = 'Este conquistador ya formaba parte de este club.';
				$_SESSION['tipoNotificacion'] = 'info';
			} else {
				agregarConquistador();
				session_start();
				$_SESSION['tituloNotificacion'] = '¡Hecho!';
				$_SESSION['mensajeNotificacion'] = 'Conquistador añadido al club exitosamente.';
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
			agregarConquistador();
			session_start();
			$_SESSION['tituloNotificacion'] = '¡Hecho!';
			$_SESSION['mensajeNotificacion'] = 'Conquistador añadido al club exitosamente.';
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
		global $mysqli, $clase, $nombre, $apellidoPaterno, $apellidoMaterno, $sexo, $correo, $contrasena;
		$contrasena = sha1($contrasena);
		$qiUsuario = "INSERT into usuarios (nombre, apellidoPaterno, apellidoMaterno, sexo, correo, contrasena) 
		values ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$sexo', '$correo', '$contrasena')";
		$iUsuario = $mysqli->query($qiUsuario);

		$qsacarID = "SELECT * from usuarios where correo = '$correo'";
		$sacarID = $mysqli->query($qsacarID);
		while($c=$sacarID->fetch_array()){ $idUsuario = $c['idUsuario']; }
		//Registrarlo en la tabla de permisos como Conquistador
		$qPermisos = "INSERT into permisos (idUsuario, esConquistador) values ($idUsuario, 1)";
		$permisos = $mysqli->query($qPermisos);
		//Poner su clase en perfil
		$qPerfil = "INSERT into perfil (idUsuario, claseActual) values ($idUsuario, '$clase')";
		$pPerfil = $mysqli->query($qPerfil);
		return $idUsuario;
	}
	function agregarConquistador(){
		global $mysqli, $idUsuario, $idClub;
		//Añadir a directiva
		$qAgregar = "INSERT into miembros (idClub, idUsuario, cargo) 
		values ('$idClub', '$idUsuario', 'Conquistador')";
		$agregar = $mysqli->query($qAgregar);
		//Permiso
		$qPermiso = "UPDATE permisos set esConquistador = 1 where idUsuario = $idUsuario";
		$permiso = $mysqli->query($qPermiso);
	}
	
	header('location: ../inicio.php?pagina=miembrosClub');
?>