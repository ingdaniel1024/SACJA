<?php
class Usuarios_model extends CI_Model {
	var $now;

	function __construct(){
		parent::__construct();
	}

	function info_usuario($id)
	{
		$where = array('id_usuario'=>$id);
		return $this->db->get_where('usuarios',$where)->result_array()[0];
	}
	function get_permisos($id)
	{
		$where = array('id_usuario'=>$id);
		return $this->db->get_where('permisos',$where)->row_array();
	}

	function set_permisos($usuario,$permiso,$valor=1)
	{
		//Comprobar que exista el usuario
		$where = array('id_usuario'=>$usuario);
		if(count($this->db->get_where('permisos',$where)->result_array())>0){
			//Actualizar permisos
			$this->db->set(array($permiso=>$valor));
			$this->db->where('id_usuario',$usuario);
			
			return ($this->db->update('permisos')) ? TRUE : FALSE;

		} else {
			$info = array(
				'id_usuario' => $usuario,
				$permiso => $valor
			);

			return ($this->db->insert('permisos', $info)) ? TRUE : FALSE;
		}
	}
}