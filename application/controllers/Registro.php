<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('file');
		$this->load->helper('notifications');
		$this->load->model('sql_model','sql',TRUE);
		if (!$this->session->id) { header('Location: /'); }
		$this->load->database();
	}

	public function index($formato='')
	{
		$data['persona'] = $this->session->persona;
		$data['permisos'] = $this->session->permisos;
		$data['view'] = ($formato!='')?'registro/'.$formato:'dummy';
		if (file_exists('js/registros/'.$formato.'.js')) {
			$data['js'] = array('/js/registros/'.$formato.'.js');
		}
		/*USUARIO*/
		if($formato=='usuario'){
			array_push($data['js'], '/js/icheck.min.js','/js/jquery.inputmask.js');
			$data['css'] = array('/css/icheck/green.css');

		}
		/*USUARIO*/

		$this->load->view('inicio',$data);
	}

	public function registrar_usuario()
	{
		$where = array(
			'correo' => $this->input->post('correo')
		);		

		if($this->input->post('contrasena') == $this->input->post('contrasena2')){
			unset($_POST['contrasena2']);
			$_POST['contrasena'] = sha1($_POST['contrasena']);
			$query = $this->db->get_where('usuarios',$where);
			$result = $query->row_array();
			if(count($query->result())==0){

				//Validar fecha
				$fn = $this->input->post('fecha_nacimiento');
				if(!is_int(strpos($fn, '_')) && $fn!=''){ //Si la fecha es correcta modifica la sintaxis
					$f_original = $fn;
					$f = explode('/', $f_original);
					$_POST['fecha_nacimiento'] = $f[2].'-'.$f[1].'-'.$f[0];
				} else { unset($_POST['fecha_nacimiento']); } //En caso de error elimina la fecha

				//Validar clase
				if($this->input->post('id_clase')==0){ unset($_POST['id_clase']); }

				//Validar telefono
				if(strpos($this->input->post('telefono'), '_')){ unset($_POST['telefono']); }

				if ($this->sql->insert('usuarios', $this->input->post())){
					$this->session->notificacion=notif('success','Usuario registrado correctamente.');
				} else {
					$this->session->notificacion=notif('error','No se pudo registrar el usuario');
				}
			} else {
				$this->session->notificacion=notif('info','Ese usuario ya estaba registrado.');
			}
		} else{
			$this->session->notificacion=notif('error','Las contraseñas no coinciden.');
		}
		header('Location: /registro/usuario');
	}

	public function registrar_union()
	{
		if ($this->sql->insert('uniones', $this->input->post())){
			$this->session->notificacion=notif('success','Unión registrada correctamente.');
		} else {
			$this->session->notificacion=notif('error','No se pudo registrar la unión.');
		}
		header('Location: /registro/union');
	}

	public function registrar_asociacion()
	{
		if ($this->sql->insert('asociaciones_misiones', $this->input->post())){
			$this->session->notificacion=notif('success','Asociación registrada correctamente.');
		} else {
			$this->session->notificacion=notif('error','No se pudo registrar la asociación.');
		}
		header('Location: /registro/asociacion');
	}

	public function registrar_distrito()
	{
		if ($this->sql->insert('distritos', $this->input->post())){
			$this->session->notificacion=notif('success','Distrito registrado correctamente.');
		} else {
			$this->session->notificacion=notif('error','No se pudo registrar el distrito.');
		}
		header('Location: /registro/distrito');
	}
	public function registrar_iglesia()
	{
		if ($this->sql->insert('iglesias', $this->input->post())){
			$this->session->notificacion=notif('success','Iglesia registrada correctamente.');
		} else {
			$this->session->notificacion=notif('error','No se pudo registrar la iglesia.');
		}
		header('Location: /registro/iglesia');
	}
	public function registrar_club()
	{
		if ($this->sql->insert('clubes', $this->input->post())){
			$this->session->notificacion=notif('success','Club registrado correctamente.');
		} else {
			$this->session->notificacion=notif('error','No se pudo registrar el club.');
		}
		header('Location: /registro/club');
	}

	
}
