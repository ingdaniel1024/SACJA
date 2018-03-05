<?php
class Clases_model extends CI_Model {
	var $now;

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function validate_user($form)
	{
		$where = array(
			'id_clase <' => 7 //Los primeros 6 registros son las clases de Conquistadores
		);
		
		$query = $this->db->get_where('clases',$where);
		$result = $query->row_array();

		return (count($query)) ? $result : 0;
	}
}