<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periodo_anual extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('notifications');
		$this->load->helper('formularios');
		$this->load->helper('form');
        if (!$this->session->id) { header('Location: /'); }
        $this->load->model('sql_model','sql',TRUE);
    }

	public function index()
	{
		$data['usuario'] = $this->session->usuario;
		$data['permisos'] = $this->session->permisos;
		$data['periodo_anuales'] = $this->sql->get_where('periodosanuales',null);
		$data['view'] = 'listado/periodo_anual';
		$data['js'] = array('/js/icheck.min.js','/js/listado/periodo_anual');
		$data['css'] = array('/css/icheck/green');

		$this->load->view('inicio',$data);
	}

	public function agregar($id=null)//Formulario de registro
	{
		$data['usuario'] = $this->session->usuario;
		$data['permisos'] = $this->session->permisos;
		$data['view'] = 'registro/periodo_anual';
		$data['periodo_anual'] = ($id!=null && $id!=0) ? $this->sql->get_where('periodosanuales',array('id_periodo_anual'=>$id))[0] : null;
		if($data['periodo_anual']!=null){
			$data['periodo_anual']['fecha_inicio'] = invertir_fecha($data['periodo_anual']['fecha_inicio']);
			$data['periodo_anual']['fecha_fin'] = invertir_fecha($data['periodo_anual']['fecha_fin']);
		}
		$data['js'] = array('/js/jquery.inputmask.js');

		$this->load->view('inicio',$data);
	}
	
	public function registrar()//Guardar en la DB
	{
		//Validar fecha
		$fi = validar_fecha($this->input->post('fecha_inicio'));
		$ff = validar_fecha($this->input->post('fecha_fin'));

		//Si los formatos de fecha no son correctos eliminar las variables
		if($fi!=null && $ff!=null){
		//Fechas correctas
			$_POST['fecha_inicio'] = $fi;
			$_POST['fecha_fin'] = $ff;

			if($this->input->post('id_periodo_anual')!=null){
			//Actualizar datos existentes
				if ($this->sql->update('periodosanuales', $this->input->post(),'id_periodo_anual',$this->input->post('id_periodo_anual'))){
					$this->session->notificacion=notif('success','Periodo anual actualizado correctamente.');
				} else {
					$this->session->notificacion=notif('error','No se pudo actualizar el periodo anual.');
				}
			} else {
			//Insertar datos nuevos
				if ($this->sql->insert('periodosanuales', $this->input->post())){
					$this->session->notificacion=notif('success','Periodo anual registrado correctamente.');
				} else {
					$this->session->notificacion=notif('error','No se pudo registrar el periodo anual.');
				}
			}
		} else {
			//Fechas incorrectas
			$this->session->notificacion=notif('info','Favor de escribir correctamente las fechas.');
		}
		
		
		
		header('Location: /periodo_anual');
	}
	public function status($status,$id)
	{
		if($this->sql->change_status('periodosanuales',$status,'id_periodo_anual',$id)){
			$this->session->notificacion=notif('success','Status modificado correctamente.');
		} else {
			$this->session->notificacion=notif('error','No se pudo modificar el status.');
		}
		$this->load->library('user_agent');
		header('Location: '.$this->agent->referrer());
	}

}
