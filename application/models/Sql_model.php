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

	function get_where($table,$where)
	{
		return $this->db->get_where($table,$where)->result_array();
	}

	function change_status($table,$status,$id_db,$id_element)
	{
		$this->db->set('status', $status, FALSE);
		$this->db->where($id_db, $id_element);
		$this->db->update($table);
		return TRUE;
	}

	function update($table,$data,$id_db,$id_element)
	{
		$this->db->set($data);
		$this->db->where($id_db,$id_element);
		$this->db->update($table);
		return TRUE;
	}
}