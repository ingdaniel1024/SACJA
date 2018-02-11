<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function notif($type,$text,$hide='false')
{
	switch ($type) {
		case 'success'	: $title='Éxito'; break;
		case 'error'	: $title='Error'; break;
		case 'info'		: $title='Aviso'; break;
		default: /**/ break;
	}
    return array(
		'type' => $type,
		'title' => $title,
		'text' => $text,
		'hide' => $hide
		);
}
