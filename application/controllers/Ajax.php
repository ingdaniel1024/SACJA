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
}
