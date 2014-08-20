<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function is_logged_in() {
	$CI =& get_instance();
	$var = "";
	return  $var != $CI->session->userdata('id');
}

function redirect_if_not_logged_in() {
		if (!is_logged_in()) {
		redirect('', 'refresh');
	}
}
