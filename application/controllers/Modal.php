<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modal extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
	}

	public function asignar_director($id_club)
	{
		$data['id_club'] = $id_club;
		$this->load->view("modals/asignar_director",$data);
	}
}
