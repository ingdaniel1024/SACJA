<?php
class Personas_model extends CI_Model {
	var $now;

	function __construct(){
		parent::__construct();
	}

	function info_persona($id)
	{
		$query = "
			SELECT * from personas
			where idUsuario = '$id'";
		$res = $this->db->query($query);
		$result = $res->row_array();

		return (count($res)) ? $result : null;
	}
	function permisos($id)
	{
		$query = "
			SELECT * from permisos
			where idUsuario = '$id'";
		$res = $this->db->query($query);
		$result = $res->row_array();

		return (count($res)) ? $result : null;
	}
}