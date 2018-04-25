<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('notifications');
		$this->load->helper('form');
		$this->load->helper('formularios');
        if (!$this->session->id) { header('Location: /'); }
        $this->load->model('sql_model','sql',TRUE);
    }

	public function index()
	{
		$data['persona'] = $this->session->persona;
		$data['permisos'] = $this->session->permisos;
		$data['usuarios'] = $this->sql->get_where('usuarios',null);
		$data['view'] = 'listado/usuario';
		$data['js'] = array(
			'/js/icheck.min.js',
			'/js/jquery.inputmask.js',
			'/js/listado/usuario.js');
		$data['css'] = array('/css/icheck/green');

		$this->load->view('inicio',$data);
	}

	public function agregar($id=null)//Formulario de registro
	{
		$data['persona'] = $this->session->persona;
		$data['permisos'] = $this->session->permisos;
		$data['view'] = 'registro/usuario';
		$data['usuario'] = ($id!=null && $id!=0) ? $this->sql->get_where('usuarios',array('id_usuario'=>$id))[0] : null;
		if($data['usuario']!=null){
			$data['usuario']['fecha_nacimiento'] = invertir_fecha($data['usuario']['fecha_nacimiento']);
			$data['js_vars'] = array('id_clase'=>$data['usuario']['id_clase']);
		}
		$data['js'] = array('/js/icheck.min.js','/js/jquery.inputmask.js','/js/registros/usuario');
		$data['css'] = array('/css/icheck/green');

		$this->load->view('inicio',$data);
	}

	function validar_formulario($formulario){

		$where = array(
			'correo' => $formulario['correo']
		);
		
		if($formulario['contrasena'] != $formulario['contrasena2']){
			$this->session->notificacion=notif('error','Las contraseñas no coinciden.');
			return FALSE;
		}

		$query = $this->sql->get_where('usuarios',$where);
		if(count($query)){
			$this->session->notificacion=notif('info','Ese usuario ya estaba registrado.');
			return FALSE;
		}

		return TRUE;
	}
	
	public function registrar()//Guardar en la DB
	{
		if($this->input->post('id_usuario')!=null){
			//Actualizar datos existentes
			if ($this->sql->update('usuarios', $this->input->post(),'id_usuario',$this->input->post('id_usuario'))){
				$this->session->notificacion=notif('success','Usuario actualizado correctamente.');
			} else {
				$this->session->notificacion=notif('error','No se pudo actualizar el usuario.');
			}
		} else {
			//Insertar datos nuevos
			if ($this->validar_formulario($this->input->post())){

				//Eliminar contrasena 2
				unset($_POST['contrasena2']);

				//Validar fecha
				$fn = $this->input->post('fecha_nacimiento');
				if(!is_int(strpos($fn, '_')) && $fn!=''){ //Si la fecha es correcta modifica la sintaxis
					if($this->input->post('fecha_nacimiento')=='00/00/0000'){
						unset($_POST['fecha_nacimiento']);	
					} else {
						$f_original = $fn;
						$f = explode('/', $f_original);
						$_POST['fecha_nacimiento'] = $f[2].'-'.$f[1].'-'.$f[0];
					}
				} else { unset($_POST['fecha_nacimiento']); } //En caso de error elimina la fecha

				//Validar telefono
				if(strpos($this->input->post('telefono'), '_')){ unset($_POST['telefono']); }

				//Codificar contrasena
				$_POST['contrasena'] = sha1($this->input->post('contrasena'));

				if ($this->sql->insert('usuarios', $this->input->post())){
					$this->session->notificacion=notif('success','Usuario registrado correctamente.');
				} else {
					$this->session->notificacion=notif('error','No se pudo registrar el usuario');
				}
			}
			
		}

		header('Location: /usuario');
	}
	public function status($status,$id)
	{
		if($this->sql->change_status('usuarios',$status,'id_usuario',$id)){
			$this->session->notificacion=notif('success','Status modificado correctamente.');
		} else {
			$this->session->notificacion=notif('error','No se pudo modificar el status.');
		}
		$this->load->library('user_agent');
		header('Location: '.$this->agent->referrer());
	}

}
