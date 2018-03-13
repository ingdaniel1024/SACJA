<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distrito extends CI_Controller {

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
		$data['distritos'] = $this->sql->get_where('distritos',null);
		$data['view'] = 'listado/distrito';
		$data['js'] = array('/js/icheck.min.js','/js/listado/distrito');
		$data['css'] = array('/css/icheck/green');

		$this->load->view('inicio',$data);
	}

	public function agregar($id=null)//Formulario de registro
	{
		$data['persona'] = $this->session->persona;
		$data['permisos'] = $this->session->permisos;
		$data['view'] = 'registro/distrito';
		$data['distrito'] = ($id!=null && $id!=0) ? $this->sql->get_where('distritos',array('id_distrito'=>$id))[0] : null;
		if($data['distrito']!=null){
			$data['js_vars'] = array('id_asociacion'=>$data['distrito']['id_asociacion']);
		}
		$data['js'] = array('/js/registros/distrito');

		$this->load->view('inicio',$data);
	}
	
	public function registrar()//Guardar en la DB
	{
		if($this->input->post('id_distrito')!=null){
		//Actualizar datos existentes
			if ($this->sql->update('distritos', $this->input->post(),'id_distrito',$this->input->post('id_distrito'))){
				$this->session->notificacion=notif('success','Distrito actualizado correctamente.');
			} else {
				$this->session->notificacion=notif('error','No se pudo actualizar el distrito.');
			}
		} else {
		//Insertar datos nuevos
			if ($this->sql->insert('distritos', $this->input->post())){
				$this->session->notificacion=notif('success','Distrito registrado correctamente.');
			} else {
				$this->session->notificacion=notif('error','No se pudo registrar el distrito.');
			}
		}
		
		header('Location: /distrito');
	}
	public function status($status,$id)
	{
		if($this->sql->change_status('distritos',$status,'id_distrito',$id)){
			$this->session->notificacion=notif('success','Status modificado correctamente.');
		} else {
			$this->session->notificacion=notif('error','No se pudo modificar el status.');
		}
		$this->load->library('user_agent');
		header('Location: '.$this->agent->referrer());
	}

}
