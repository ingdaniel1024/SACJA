<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function uniones()
	{
		$query = $this->db->get('uniones');
		echo json_encode($query->result_array());
	}
	public function asociaciones()
	{
		$query = $this->db->get('asociaciones_misiones');
		echo json_encode($query->result_array());
	}
	public function distritos()
	{
		$query = $this->db->get('distritos');
		echo json_encode($query->result_array());
	}
	public function iglesias()
	{
		$query = $this->db->get('iglesias');
		echo json_encode($query->result_array());
	}
	public function clases_conquistadores()
	{
		$where = array(
			'id_clase <' => 7 //Los primeros 6 registros son las clases de Conquistadores
		);
		
		$query = $this->db->get_where('clases',$where);
		$result = $query->result_array();

		echo json_encode($result);
	}
	public function usuario_existente()
	{
		;
		$where = array(
			'correo' => $this->input->post('correo') //Poner el correo en el where
		);
		
		$query = $this->db->get_where('usuarios',$where);
		$result = $query->result_array();

		echo json_encode($result);
	}
}
