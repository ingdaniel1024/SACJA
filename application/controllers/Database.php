<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Controller {

	function __construct() {
        //$this->some_var = 'value added in class A';
    }

	public function index()
	{
		$autoload['libraries'] = array('database');
		$info = $this->get_info();
		$data['arreglo'] = $info;
		$this->load->view('db',$data);
	}

	public function get_info()
	{
		$query = "SELECT * from clases";
		$res = $this->db->query($query);

		return $res->result_array();
	}

}
