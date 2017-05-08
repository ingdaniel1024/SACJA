<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->helper('form');
		$this->load->helper('url');

        $this->load->library('form_validation');

        $this->load->view('success');
        
	}
}
