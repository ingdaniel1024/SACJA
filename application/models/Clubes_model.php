<?php
class Clubes_model extends CI_Model {
	var $now;

	function __construct(){
		parent::__construct();
	}

	function club($club_id=0)
	{
		$this->db->select('c.*, u.nombre, u.apellido_paterno');
		$this->db->join('usuarios as u', 'c.director = u.id_usuario', 'left');
		$query = $this->db->get('clubes as c');

		return (count($query->result_array())) ? $query->result_array() : null;
	}

	function get_director_from_club($club)
	{
		$where = array('id_club'=>$club);
		$info = $this->db->get_where('clubes',$where)->row_array();
		return ($info['director']!='') ? $info['director'] : null;
	}

}