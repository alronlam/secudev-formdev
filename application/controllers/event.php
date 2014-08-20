<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {

	function __construct(){
		parent::__construct();
		//needed for the form stuff in the view
		$this->load->helper('form');
		$this->load->model('event_model');
		
	}

	public function index()
	{
		$this->view();
	}

	public function view()
	{
		$data = array();
		$data['eList'] = $this->event_model->getAll();
		$this->load->view('guest/events', $data);
	}

	public function add()
	{
		redirect_if_not_logged_in();
		$this->load->view('admin/information');
	}

	public function added()
	{
		redirect_if_not_logged_in();
		$data = array(
		   'event' => $this->input->post('eventTitle'),
		   'description' => $this->input->post('eventDesc'),
		   'postedByFaciId' => $this->session->userdata('id'),
		   'eventDate' => date('Y-m-d', strtotime($this->input->post('eventDate'))),
		);
		$this->event_model->add($data);
		$message = "Event Successfully added.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		$this->view();
	}
	
	public function edit($id)
	{
		redirect_if_not_logged_in();
		$data['eEntry'] = $this->event_model->get($id);

		$this->load->view('admin/info/event', $data);
	}
	
	public function edited()
	{
		redirect_if_not_logged_in();
		$data = array(
			'event' => $this->input->post('eventTitle'),
			'description' => $this->input->post('eventDesc'),
			'eventDate' => date('Y-m-d', strtotime($this->input->post('eventDate'))),
			'pk' => $this->input->post('eID')
			);
		$this->event_model->edit($data);	
		$this->view();	
	}

	public function delete($id)
	{
		redirect_if_not_logged_in();
		$this->event_model->delete($id);
		$this->view();
	}

	public function undelete($id)
	{
		redirect_if_not_logged_in();
		$this->view();
	}
}