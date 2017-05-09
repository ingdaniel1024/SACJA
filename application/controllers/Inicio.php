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
		$data['title'] = 'SACJA';
		$data['css'] = array(
			'/css/bootstrap.min.css',
			'/css/font-awesome.min.css',
			'/css/nprogress.css',
			'/css/custom.min.css'
			);
		$data['js'] = array(
			'/js/jquery.min.js',
			'/js/bootstrap.min.js',
			'/js/fastclick.js',
			'/js/nprogress.js',
			'/js/custom.min.js'
			);
		$this->load->view('inicio',$data);
	}

}
