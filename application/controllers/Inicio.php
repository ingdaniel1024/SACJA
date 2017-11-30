<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');

        if (!$this->session->id) {
        	header('Location: /');
        }
    }

	public function index()
	{
		$this->load->model('personas_model','persona',TRUE);
		$data['persona'] = $this->persona->info_persona($this->session->id);
		$data['permisos'] = $this->persona->permisos($this->session->id);
		$data['view'] = 'contenido_plantilla';

		$this->load->view('inicio',$data);
	}

}
