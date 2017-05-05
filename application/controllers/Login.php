<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['css'] = array(
			'/sacja/css/bootstrap.min.css',
		    '/sacja/css/font-awesome.min.css',
		    '/sacja/css/nprogress.css',
		    '/sacja/css/animate.min.css',
		    '/sacja/css/custom.min.css'
			);
		$this->load->view('login',$data);
	}
}
