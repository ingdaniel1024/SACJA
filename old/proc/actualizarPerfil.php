<?php
	require('conexion.php');

	//VARIABLES
	$idUsuario = $_POST['idUsuario'];

	$nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $sexo = $_POST['sexo'];
    $correo = $_POST['correo'];

    $fechaDeNacimiento = $_POST['fechaDeNacimiento'];
    $lada=$_POST['lada'];
    $telefono=$_POST['telefono'];
    $ciudad = $_POST['ciudad'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];

    //SUBIR IMAGEN (En caso de que la hayan subido)
    //if they DID upload a file...
	$valid_file=true;
	$message='';
	if (isset($_FILES['fotoUsuario'])) {
		echo 'Si esta el archivo<br>';
	} else {echo 'No esta el archivo<br>';}
	if($_FILES['fotoUsuario']['name']){
		//if no errors...
		if(!$_FILES['fotoUsuario']['error']){
			echo 'No hubo errores<br>';
			//now is the time to modify the future file name and validate the file
			//$new_file_name = strtolower($_FILES['fotoUsuario']['name']); //rename file
			$new_file_name = $correo.'.png'; //rename file
			if($_FILES['fotoUsuario']['size'] > (10240000)){ //No mayor a 10 MB
				$valid_file = false;
				$message = 'Imagen muy pesada';
			}
			
			//if the file has passed the test
			if($valid_file){
				//move it to where we want it to be
				if (file_exists('../img/usuarios/'.$correo.'.png')) {
					unlink('../img/usuarios/'.$correo.'.php');
				}
				move_uploaded_file($_FILES['fotoUsuario']['tmp_name'], '../img/usuarios/'.$new_file_name);
				$message = 'Imagen subida con éxito';
			}
		}
		//if there is an error...
		else
		{
			//set that to be the returned message
			$message = 'Ooops!  Error al intentar :  '.$_FILES['fotoUsuario']['error'];
		}
	} else { echo '<p>No llega el archivo</p>';}

	echo $message;

    //unlink('../img/usuarios/borrame.php');

    //Cambiar formato de la fecha de nacimiento
    $fechaDeNacimiento = date("Y-m-d", strtotime($fechaDeNacimiento));

	//Actualizar perfil (tabla usuarios)
	echo $qActualizarPerfilUsuario = "UPDATE usuario set
	nombre = '$nombre',
	apellidoPaterno = '$apellidoPaterno',
	apellidoMaterno = '$apellidoMaterno',
	sexo = '$sexo',
	correo = '$correo'
	where idUsuario = '$idUsuario'";
	$actualizarPerfilUsuario = $mysqli->query($qActualizarPerfilUsuario);
	//echo'<br>';
	//Actualizar perfil (tabla perfil)
	echo $qActualizarPerfil = "UPDATE perfil set
	fechaDeNacimiento = '$fechaDeNacimiento',
	lada = '$lada',
	telefono = '$telefono',
	ciudad = '$ciudad',
	estado = '$estado',
	pais = '$pais'
	where idUsuario = '$idUsuario'";
	$actualizarPerfil = $mysqli->query($qActualizarPerfil);
	

	session_start();
	$_SESSION['tituloNotificacion'] = '¡Hecho!';
	$_SESSION['mensajeNotificacion'] = 'Perfil actualizado exitosamente.';
	$_SESSION['tipoNotificacion'] = 'success';
	
	header('location: ../inicio.php?pagina=perfil');
?>