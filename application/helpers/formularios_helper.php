<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function validar_fecha($fecha)
{
	if(!is_int(strpos($fecha, '_')) && $fecha!=''){ //Si la fecha es correcta modifica la sintaxis
		if($fecha!='00/00/0000'){
			//Fecha correcta
			$f_original = $fecha;
			$f = explode('/', $f_original);
			return $f[2].'-'.$f[1].'-'.$f[0];
		}
	}
	return null;
}

function invertir_fecha($fecha)
{
	$f = explode('-',$fecha);
	return $f[2].'-'.$f[1].'-'.$f[0];
}
