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
		$data['js'] = array('/js/registros/'.$formato.'.js');

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
		if ($this->db->insert('uniones', $this->input->post())){
			$this->session->notificacion = array(
				'type' => 'success',
				'title' => 'Éxito',
				'text' => 'Unión registrada correctamente.',
				'hide' => 'false'
				);
		} else {
			$this->session->notificacion = array(
				'type' => 'error',
				'title' => 'Error',
				'text' => 'No se pudo registrar la unión.',
				'hide' => 'false'
				);
		}
		header('Location: /registro/union');
	}

	public function registrar_asociacion(){
		if ($this->db->insert('asociaciones_misiones', $this->input->post())){
			$this->session->notificacion = array(
				'type' => 'success',
				'title' => 'Éxito',
				'text' => 'Asociación registrada correctamente.',
				'hide' => 'false'
				);
		} else {
			$this->session->notificacion = array(
				'type' => 'error',
				'title' => 'Error',
				'text' => 'No se pudo registrar la asociación.',
				'hide' => 'false'
				);
		}
		header('Location: /registro/asociacion');
	}

	
}
