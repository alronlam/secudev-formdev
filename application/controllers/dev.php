<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dev extends CI_Controller {
	/**
	 * A private class providing developer tools.
	 */
	public function index()
	{
	}

	public function user($type = -1)
	{
		$data = array();
		if ($type < 0)
			$type = $this->faci_account_model->getAccountRoles();
		else
			$data['changed'] = TRUE;

		if (array_key_exists('changed', $data) && $data['changed'] == TRUE){
			$this->faci_account_model->setAccountRoles(array($type));
		}else{
			$data['faciRoles'] = $this->faci_account_model->getAccountRoles();
		}
		$this->load->view('dev/user', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */