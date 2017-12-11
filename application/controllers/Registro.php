<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		if (!$this->session->id) { header('Location: /'); }
		$this->load->database();
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

	public function registrar_union(){
		$this->db->insert('uniones', $this->input->post());

		$data['persona'] = $this->session->persona;
		$data['permisos'] = $this->session->permisos;
		$data['view'] = 'mensaje';
		$data['mensaje'] = 'Unión registrada correctamente';

		$this->load->view('inicio',$data);
	}

	
}
