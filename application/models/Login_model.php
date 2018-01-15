<?php
class Login_model extends CI_Model {
	var $now;

	function __construct(){
		parent::__construct();
	}

	function validate_user($form)
	{
		$where = array(
			'correo' => $form['correo'],
			'contrasena' => sha1($form['contrasena'])
		);
		
		$query = $this->db->get_where('usuarios',$where);
		$result = $query->row_array();

		return (count($query)) ? $result['id_usuario'] : 0;
	}
}