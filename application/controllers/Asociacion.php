<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asociacion extends CI_Controller {

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
		$data['persona'] = $this->session->persona;
		$data['permisos'] = $this->session->permisos;
		$data['asociaciones'] = $this->sql->get_where('asociaciones_misiones',null);
		$data['view'] = 'listado/asociacion';
		$data['js'] = array('/js/icheck.min.js','/js/listado/asociacion');
		$data['css'] = array('/css/icheck/green');

		$this->load->view('inicio',$data);
	}

	public function agregar($id=null)//Formulario de registro
	{
		$data['persona'] = $this->session->persona;
		$data['permisos'] = $this->session->permisos;
		$data['view'] = 'registro/asociacion';
		$data['asociacion'] = ($id!=null && $id!=0) ? $this->sql->get_where('asociaciones_misiones',array('id_asociacion'=>$id))[0] : null;
		if($data['asociacion']!=null){
			$data['js_vars'] = array('id_union'=>$data['asociacion']['id_union']);
		}
		$data['js'] = array('/js/registros/asociacion');

		$this->load->view('inicio',$data);
	}
	
	public function registrar()//Guardar en la DB
	{
		if($this->input->post('id_asociacion')!=null){
		//Actualizar datos existentes
			if ($this->sql->update('asociaciones_misiones', $this->input->post(),'id_asociacion',$this->input->post('id_asociacion'))){
				$this->session->notificacion=notif('success','Unión actualizada correctamente.');
			} else {
				$this->session->notificacion=notif('error','No se pudo actualizar la unión.');
			}
		} else {
		//Insertar datos nuevos
			if ($this->sql->insert('asociaciones_misiones', $this->input->post())){
				$this->session->notificacion=notif('success','Unión registrada correctamente.');
			} else {
				$this->session->notificacion=notif('error','No se pudo registrar la unión.');
			}
		}
		
		header('Location: /asociacion');
	}
	public function status($status,$id)
	{
		if($this->sql->change_status('asociaciones_misiones',$status,'id_asociacion',$id)){
			$this->session->notificacion=notif('success','Status modificado correctamente.');
		} else {
			$this->session->notificacion=notif('error','No se pudo modificar el status.');
		}
		$this->load->library('user_agent');
		header('Location: '.$this->agent->referrer());
	}

}
