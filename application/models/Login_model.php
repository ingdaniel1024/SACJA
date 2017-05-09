<?php
class Login_model extends CI_Model {
	var $now;

	function __construct(){
		parent::__construct();

	}

	function validate_user($form)
	{
		$correo = $form['correo'];
		$contrasena = sha1($form['contrasena']);
		$query = "
			SELECT * from usuarios
			where correo = '$correo'
			and contrasena = '$contrasena'";
		$res = $this->db->query($query);
		$result = $res->row_array();

		return (count($res)) ? $result['idUsuario'] : 0;
	}
}