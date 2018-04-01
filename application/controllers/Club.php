<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Club extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('notifications');
		$this->load->helper('form');
		$this->load->helper('formularios_helper');
        if (!$this->session->id) { header('Location: /'); }
        $this->load->model('sql_model','sql',TRUE);
        $this->load->model('clubes_model','club',TRUE);
    }

	public function index()
	{
		$data['persona'] = $this->session->persona;
		$data['permisos'] = $this->session->permisos;
		$data['clubes'] = $this->club->club();
		$data['view'] = 'listado/club';
		$data['js'] = array('/js/icheck.min.js','/js/listado/club.js','/js/select2.full.js');
		$data['css'] = array('/css/icheck/green','/css/select2.min.css');

		$this->load->view('inicio',$data);
	}

	public function agregar($id=null)//Formulario de registro
	{
		$data['persona'] = $this->session->persona;
		$data['permisos'] = $this->session->permisos;
		$data['view'] = 'registro/club';
		$data['club'] = ($id!=null && $id!=0) ? $this->sql->get_where('clubes',array('id_club'=>$id))[0] : null;
		if($data['club']!=null){
			$data['js_vars'] = array('id_iglesia'=>$data['club']['id_iglesia']);
		}
		$data['js'] = array('/js/icheck.min.js','/js/registros/club');

		$this->load->view('inicio',$data);
	}
	
	public function registrar()//Guardar en la DB
	{
		if($this->input->post('id_club')!=null){
		//Actualizar datos existentes
			if ($this->sql->update('clubes', $this->input->post(),'id_club',$this->input->post('id_club'))){
				$this->session->notificacion=notif('success','Club actualizado correctamente.');
			} else {
				$this->session->notificacion=notif('error','No se pudo actualizar el club.');
			}
		} else {
		//Insertar datos nuevos
			if ($this->sql->insert('clubes', $this->input->post())){
				$this->session->notificacion=notif('success','Club registrado correctamente.');
			} else {
				$this->session->notificacion=notif('error','No se pudo registrar el club.');
			}
		}
		
		header('Location: /club');
	}

	public function asignar_director()//Actualizar en la DB
	{
		if($this->input->post('id_club')!=null && $this->input->post('director')!=null){
		//Asignar director
			$director = array('director' => $this->input->post('director'));
			if ($this->sql->update('clubes', $director,'id_club',$this->input->post('id_club'))){
				$this->session->notificacion=notif('success','Director asignado correctamente.');
			} else {
				$this->session->notificacion=notif('error','No se pudo asignar el director.');
			}
		}
		
		header('Location: /club');
	}

	public function status($status,$id)
	{
		if($this->sql->change_status('clubes',$status,'id_club',$id)){
			$this->session->notificacion=notif('success','Status modificado correctamente.');
		} else {
			$this->session->notificacion=notif('error','No se pudo modificar el status.');
		}
		$this->load->library('user_agent');
		header('Location: '.$this->agent->referrer());
	}

}
