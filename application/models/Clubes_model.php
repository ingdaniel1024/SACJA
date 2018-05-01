<?php
class Clubes_model extends CI_Model {
	var $now;

	function __construct(){
		parent::__construct();
		$this->hoy = date('Y-m-d');
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

	function get_club_from_director($director)
	{
		$where = array('director'=>$director);
		$info = $this->db->get_where('clubes',$where)->row_array();
		return ($info!=null) ? $info : null;
	}

	function get_directiva_from_club($club,$periodo)
	{
		$this->db->select('*');
		$this->db->join('usuarios', 'usuarios.id_usuario = miembros.id_usuario');
		$this->db->join('permisos', 'permisos.id_usuario = miembros.id_usuario');
		//$query = $this->db->get();
		$where = array(
			'id_club' => $club,
			'id_periodo_anual' => $periodo
		);
		return $this->db->get_where('miembros',$where)->result_array();
	}

	function periodo_actual()
	{
		$where = array(
			'fecha_inicio <' => $this->hoy,
			'fecha_fin >' => $this->hoy
		);
		$this->db->order_by('id_periodo_anual', 'DESC');
		$this->db->limit(1);
		return $this->db->get_where('periodosanuales',$where)->row_array();
	}



}