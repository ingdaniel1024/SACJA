<?php
	require('conexion.php');

	//VARIABLES
	$emailDirectorExistente = $_POST['emailDirectorExistente'];
	$nombre = $_POST['nombre'];
	$apellidoPaterno = $_POST['apellidoPaterno'];
	$apellidoMaterno = $_POST['apellidoMaterno'];
	$sexo = $_POST['sexo'];
	$correo = $_POST['correo'];
	$contrasena = $_POST['contrasena'];
	$contrasenaRepetida = $_POST['contrasenaRepetida'];
	$nombreClub = $_POST['nombreClub'];
	$union = $_POST['union'];
	$asociacion = $_POST['asociacion'];
	$distrito = $_POST['distrito'];
	$iglesia = $_POST['iglesia'];

	if($emailDirectorExistente!=''){
		//Introdujo correo. Es un director existente.
		//Verificar si el correo es correcto
		$qvCorreo = "SELECT * from usuarios where correo = '$emailDirectorExistente'";
		$vCorreo = $mysqli->query($qvCorreo);
		if($vCorreo->num_rows){
			while($a=$vCorreo->fetch_array()){ $idUsuario = $a['idUsuario'];}
			//Sí existe
			//Verificar que no sea Conquistador
			$qvConquis = "SELECT * from permisos where idUsuario = '$idUsuario'";
			$vConquis = $mysqli->query($qvConquis);
			while($b=$vConquis->fetch_array()){ $esConquistador = $b['esConquistador'];}
			if($esConquistador==0){
				//Verificar que no dirija otros clubes
				$qvNumeroClubes = "SELECT * from clubes where director = '$idUsuario'";
				$vNumeroClubes = $mysqli->query($qvNumeroClubes);
				if(!$vNumeroClubes->num_rows){
					//Crear Club
					crearClub();
				} else {
					//Ya tiene club asignado
					session_start();
					$_SESSION['tituloNotificacion'] = 'Error';
					$_SESSION['mensajeNotificacion'] = 'Lo sentimos, no puede dirigir 2 o más clubes.';
					$_SESSION['tipoNotificacion'] = 'info';
				}
				
			} else {
				//Es conquistador
				session_start();
				$_SESSION['tituloNotificacion'] = 'Error';
				$_SESSION['mensajeNotificacion'] = 'Lo sentimos, para no cuentas con los permisos suficientes para crear un club.';
				$_SESSION['tipoNotificacion'] = 'error';
			}
		} else {
			//No existe
			session_start();
			$_SESSION['tituloNotificacion'] = 'Error';
			$_SESSION['mensajeNotificacion'] = 'Lo sentimos, el correo proporcionado no está registrado en el sistema.';
			$_SESSION['tipoNotificacion'] = 'error';
		}
	} else {
		//No introdujo correo. Es un nuevo director
		if($contrasena==$contrasenaRepetida){
			//Contraseñas correctas. Se registra al usuario
			$idUsuario = crearDirector();
			crearClub();

			} else {
				//Contraseñas incorrectas
				session_start();
				$_SESSION['tituloNotificacion'] = 'Error';
				$_SESSION['mensajeNotificacion'] = 'Lo sentimos, las contraseñas no coinciden.';
				$_SESSION['tipoNotificacion'] = 'error';
			}
		}
	
	function crearDirector(){
		global $mysqli, $nombre, $apellidoPaterno, $apellidoMaterno, $sexo, $correo, $contrasena;
		$contrasena = sha1($contrasena);
		$qiDirector = "INSERT into usuarios (nombre, apellidoPaterno, apellidoMaterno, sexo, correo, contrasena) 
		values ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$sexo', '$correo', '$contrasena')";
		$iDirector = $mysqli->query($qiDirector);

		$qsacarID = "SELECT * from usuarios where correo = '$correo'";
		$sacarID = $mysqli->query($qsacarID);
		while($c=$sacarID->fetch_array()){ $idUsuario = $c['idUsuario']; }
		//Otorgarle permisos
		$qPermisos = "INSERT into permisos (idUsuario, esDirector) values ($idUsuario, 1)";
		$permisos = $mysqli->query($qPermisos);
		//Darlo de alta en la tabla de perfil
		$qPerfil = "INSERT into perfil (idUsuario) values ($idUsuario)";
		$pPerfil = $mysqli->query($qPerfil);
		return $idUsuario;
	}
	function crearClub(){
		global $mysqli, $idUsuario, $nombreClub, $union, $asociacion, $distrito, $iglesia;
		//Unión
		$qvUnion = "SELECT * from uniones where nombreUnion = '$union'";
		$vUnion = $mysqli->query($qvUnion);
		if($vUnion->num_rows){
			//Sí existe la Unión
			while($a=$vUnion->fetch_array()){ $idUnion = $a['idUnion'];}
		} else {
			//Crear Unión
			$qiUnion = "INSERT INTO uniones (nombreUnion) values ('$union')";
			$iUnion = $mysqli->query($qiUnion);
			//Sacar su ID
			$vUnion = $mysqli->query($qvUnion);
			while($a=$vUnion->fetch_array()){ $idUnion = $a['idUnion'];}
		}
		//Asociación
		$qvAsociacion = "SELECT * from asociaciones_misiones where nombreAsociacion = '$asociacion' and idUnion = '$idUnion'";
		$vAsociacion = $mysqli->query($qvAsociacion);
		if($vAsociacion->num_rows){
			//Sí existe la Asociacion
			while($a=$vAsociacion->fetch_array()){ $idAsociacion = $a['idAsociacion']; }
		} else {
			//Crear Asociacion
			$qiAsociacion = "INSERT INTO asociaciones_misiones (nombreAsociacion, idUnion) values ('$asociacion', '$idUnion')";
			$iAsociacion = $mysqli->query($qiAsociacion);
			//Sacar su ID
			$vAsociacion = $mysqli->query($qvAsociacion);
			while($a=$vAsociacion->fetch_array()){ $idAsociacion = $a['idAsociacion'];}
		}
		//Distrito
		$qvDistrito = "SELECT * from distritos where nombreDistrito = '$distrito' and idAsociacion = '$idAsociacion'";
		$vDistrito = $mysqli->query($qvDistrito);
		if($vDistrito->num_rows){
			//Sí existe el Distrito
			while($a=$vDistrito->fetch_array()){ $idDistrito = $a['idDistrito'];}
		} else {
			//Crear Distrito
			$qiDistrito = "INSERT INTO distritos (nombreDistrito, idAsociacion) values ('$distrito', '$idAsociacion')";
			$iDistrito = $mysqli->query($qiDistrito);
			//Sacar su ID
			$vDistrito = $mysqli->query($qvDistrito);
			while($a=$vDistrito->fetch_array()){ $idDistrito = $a['idDistrito'];}
		}
		//Iglesia
		$qvIglesia = "SELECT * from iglesias where nombreIglesia = '$iglesia' and idDistrito = '$idDistrito'";
		$vIglesia = $mysqli->query($qvIglesia);
		if($vIglesia->num_rows){
			//Sí existe la Iglesia
			while($a=$vIglesia->fetch_array()){ $idIglesia = $a['idIglesia'];}
		} else {
			//Crear Iglesia
			$qiIglesia = "INSERT INTO iglesias (nombreIglesia, idDistrito) values ('$iglesia', '$idDistrito')";
			$iIglesia = $mysqli->query($qiIglesia);
			//Sacar su ID
			$vIglesia = $mysqli->query($qvIglesia);
			while($a=$vIglesia->fetch_array()){ $idIglesia = $a['idIglesia'];}
		}
		//Club
		$qvClub = "SELECT * from clubes where nombreClub = '$nombreClub' and idIglesia = '$idIglesia'";
		$vClub = $mysqli->query($qvClub);
		if($vClub->num_rows){
			//Sí existe el Club
			session_start();
			$_SESSION['tituloNotificacion'] = 'Aviso';
			$_SESSION['mensajeNotificacion'] = 'Este club ya estaba registrado.';
			$_SESSION['tipoNotificacion'] = 'info';
		} else {
			//Crear Club
			echo $qiClub = "INSERT INTO clubes (nombreClub, tipo, idIglesia, director) 
			values ('$nombreClub', 'Conquistadores', '$idIglesia', '$idUsuario')";
			$iClub = $mysqli->query($qiClub);

			if($mysqli->affected_rows){
				session_start();
				$_SESSION['tituloNotificacion'] = '¡Hecho!';
				$_SESSION['mensajeNotificacion'] = 'Su club ha sido registrado exitosamente.';
				$_SESSION['tipoNotificacion'] = 'success';
			} else {
				session_start();
				$_SESSION['tituloNotificacion'] = 'Error';
				$_SESSION['mensajeNotificacion'] = 'Lo sentimos, hubo un error al intentar registrar su club. Intente nuevamente.';
				$_SESSION['tipoNotificacion'] = 'info';
			}
		}
	}
	header('location: ../index.php');
?>