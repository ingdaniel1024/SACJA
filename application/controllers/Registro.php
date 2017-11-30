<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$data['view'] = 'registro_club';
		$this->load->view('inicio',$data);
	}

	
}
