<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('file');
		if (!$this->session->id) { header('Location: /'); }
		$this->load->database();
	}

	public function index($formato='')
	{
		$data['persona'] = $this->session->persona;
		$data['permisos'] = $this->session->permisos;
		$data['view'] = ($formato!='')?'registro/'.$formato:'dummy';
		if (file_exists('js/registros/'.$formato.'.js')) {
			$data['js'] = array('/js/registros/'.$formato.'.js');
		}		

		$this->load->view('inicio',$data);
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

	public function registrar_distrito(){
		if ($this->db->insert('distritos', $this->input->post())){
			$this->session->notificacion = array(
				'type' => 'success',
				'title' => 'Éxito',
				'text' => 'Distrito registrado correctamente.',
				'hide' => 'false'
				);
		} else {
			$this->session->notificacion = array(
				'type' => 'error',
				'title' => 'Error',
				'text' => 'No se pudo registrar el distrito.',
				'hide' => 'false'
				);
		}
		header('Location: /registro/distrito');
	}
	public function registrar_iglesia(){
		if ($this->db->insert('iglesias', $this->input->post())){
			$this->session->notificacion = array(
				'type' => 'success',
				'title' => 'Éxito',
				'text' => 'Iglesia registrada correctamente.',
				'hide' => 'false'
				);
		} else {
			$this->session->notificacion = array(
				'type' => 'error',
				'title' => 'Error',
				'text' => 'No se pudo registrar la iglesia.',
				'hide' => 'false'
				);
		}
		header('Location: /registro/iglesia');
	}

	
}
