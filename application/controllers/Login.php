<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['css'] = array(
			'/css/bootstrap.min.css',
			'/css/font-awesome.min.css',
		  '/css/nprogress.css',
		  '/css/animate.min.css',
		  '/css/custom.min.css'
			);
		$this->load->view('login',$data);
	}
}
