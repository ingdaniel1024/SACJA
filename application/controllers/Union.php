<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Union extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('notifications');
		$this->load->helper('form');
        if (!$this->session->id) { header('Location: /'); }
        $this->load->model('sql_model','sql',TRUE);
    }

	public function index()
	{
		$data['usuario'] = $this->session->usuario;
		$data['permisos'] = $this->session->permisos;
		$data['uniones'] = $this->sql->get_where('uniones',null);
		$data['view'] = 'listado/union';
		$data['js'] = array('/js/icheck.min.js','/js/listado/union');
		$data['css'] = array('/css/icheck/green');

		$this->load->view('inicio',$data);
	}

	public function agregar($id=null)//Formulario de registro
	{
		$data['usuario'] = $this->session->usuario;
		$data['permisos'] = $this->session->permisos;
		$data['view'] = 'registro/union';
		$data['union'] = ($id!=null && $id!=0) ? $this->sql->get_where('uniones',array('id_union'=>$id))[0] : null;

		$this->load->view('inicio',$data);
	}
	
	public function registrar()//Guardar en la DB
	{
		if($this->input->post('id_union')!=null){
		//Actualizar datos existentes
			if ($this->sql->update('uniones', $this->input->post(),'id_union',$this->input->post('id_union'))){
				$this->session->notificacion=notif('success','Unión actualizada correctamente.');
			} else {
				$this->session->notificacion=notif('error','No se pudo actualizar la unión.');
			}
		} else {
		//Insertar datos nuevos
			if ($this->sql->insert('uniones', $this->input->post())){
				$this->session->notificacion=notif('success','Unión registrada correctamente.');
			} else {
				$this->session->notificacion=notif('error','No se pudo registrar la unión.');
			}
		}
		
		header('Location: /union');
	}
	public function status($status,$id)
	{
		if($this->sql->change_status('uniones',$status,'id_union',$id)){
			$this->session->notificacion=notif('success','Status modificado correctamente.');
		} else {
			$this->session->notificacion=notif('error','No se pudo modificar el status.');
		}
		$this->load->library('user_agent');
		header('Location: '.$this->agent->referrer());
	}

}
