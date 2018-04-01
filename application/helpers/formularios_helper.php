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

function boton($type,$text,$icon=null,$url='#')
{
	$icon = ($icon!=null) ? " <i class='$type fa fa-$icon'></i>" : '';
	return "<a href='#'><button type='button' class='btn btn-$type btn-xs' data-toggle='modal' data='1' data-target='$url'>$text $icon</button> </a>";
}
