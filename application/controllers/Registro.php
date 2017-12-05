<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		if (!$this->session->id) { header('Location: /'); }
	}

	public function index($formato='')
	{
		$data['persona'] = $this->session->persona;
		$data['permisos'] = $this->session->permisos;
		$data['view'] = ($formato!='')?'registro/'.$formato:'dummy';

		$this->load->view('inicio',$data);
	}

	public function registrar_club(){
		echo 'Hola';
		var_dump($this->input->post());
		/*$data = array(
	        'title' => $this->input->post(''),
	        'name' => $name,
	        'date' => $date
		);*/

		//$this->db->insert('mytable', $data);  
	}

	
}
