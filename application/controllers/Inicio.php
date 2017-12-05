<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
        if (!$this->session->id) { header('Location: /'); }
    }

	public function index()
	{
		$data['persona'] = $this->session->persona;
		$data['permisos'] = $this->session->permisos;
		$data['view'] = 'dummy';

		$this->load->view('inicio',$data);
	}

}
