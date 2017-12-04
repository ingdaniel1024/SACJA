<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->load->helper('url');

		$data['title'] = 'SACJA';
		$data['css'] = array(
			'/css/bootstrap.min.css',
			'/css/font-awesome.min.css',
			'/css/nprogress.css',
			'/css/animate.min.css',
			'/css/custom.min.css'
			);
		$this->load->view('login',$data);
	}

	public function validate()
	{
		$this->load->model('login_model','login',TRUE);
		$form = $this->input->post();
		$validate_id = $this->login->validate_user($form);

		if ($validate_id > 0) {
			//$_SESSION['id'] = $validate_id;
			$this->session->id = $validate_id;
			$this->load->model('personas_model','persona',TRUE);
			$this->session->persona = $this->persona->info_persona($this->session->id);
			$this->session->permisos = $this->persona->permisos($this->session->id);
			header("Location: /inicio");
		} else {
			header("Location: /");
		}
        
	}

	public function cerrar_sesion()
	{
		unset($_SESSION['id']);
		unset($_SESSION['persona']);
		unset($_SESSION['permisos']);
        header('Location: /');
	}
}
