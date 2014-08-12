<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if ($this->faci_account_model->getFaciAccount())
			redirect('faci', 'refresh');
		$this->load->helper('form_helper');
		$this->load->model('announcement_model');
		$this->load->model('event_model');
		$this->load->model('outreach_model');
		
		
		$data['announcements'] = $this->announcement_model->getAll();
		$data['events'] = $this->event_model->getAll();
		$data['outreach'] = $this->outreach_model->queryActivities();
		
		$this->load->view('guest/index', $data);
	}

	
	public function about()
	{
		$this->load->view('guest/about');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */