<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iglesia extends CI_Controller {

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
		$data['iglesias'] = $this->sql->get_where('iglesias',null);
		$data['view'] = 'listado/iglesia';
		$data['js'] = array('/js/icheck.min.js','/js/listado/iglesia');
		$data['css'] = array('/css/icheck/green');

		$this->load->view('inicio',$data);
	}

	public function agregar($id=null)//Formulario de registro
	{
		$data['usuario'] = $this->session->usuario;
		$data['permisos'] = $this->session->permisos;
		$data['view'] = 'registro/iglesia';
		$data['iglesia'] = ($id!=null && $id!=0) ? $this->sql->get_where('iglesias',array('id_iglesia'=>$id))[0] : null;
		if($data['iglesia']!=null){
			$data['js_vars'] = array('id_distrito'=>$data['iglesia']['id_distrito']);
		}
		$data['js'] = array('/js/icheck.min.js','/js/registros/iglesia');

		$this->load->view('inicio',$data);
	}
	
	public function registrar()//Guardar en la DB
	{
		if($this->input->post('id_iglesia')!=null){
		//Actualizar datos existentes
			if ($this->sql->update('iglesias', $this->input->post(),'id_iglesia',$this->input->post('id_iglesia'))){
				$this->session->notificacion=notif('success','Iglesia actualizada correctamente.');
			} else {
				$this->session->notificacion=notif('error','No se pudo actualizar la iglesia.');
			}
		} else {
		//Insertar datos nuevos
			if ($this->sql->insert('iglesias', $this->input->post())){
				$this->session->notificacion=notif('success','Iglesia registrada correctamente.');
			} else {
				$this->session->notificacion=notif('error','No se pudo registrar la iglesia.');
			}
		}
		
		header('Location: /iglesia');
	}
	public function status($status,$id)
	{
		if($this->sql->change_status('iglesias',$status,'id_iglesia',$id)){
			$this->session->notificacion=notif('success','Status modificado correctamente.');
		} else {
			$this->session->notificacion=notif('error','No se pudo modificar el status.');
		}
		$this->load->library('user_agent');
		header('Location: '.$this->agent->referrer());
	}

}
