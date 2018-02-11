<?php
class Sql_model extends CI_Model {
	var $now;

	function __construct(){
		parent::__construct();
	}

	function insert($table,$info)
	{
		return ($this->db->insert($table, $info)) ? TRUE : FALSE;
	}
}