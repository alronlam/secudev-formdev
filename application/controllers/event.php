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

		$this->load->view('admin/information');
	}

	public function added()
	{
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
	
	public function edit($id, $error = NULL)
	{

		$data['eEntry'] = $this->event_model->get($id);
		if (!is_null($error)) {
			$data['error'] = $error;
		}
		$this->load->view('admin/info/event', $data);
	}
	
	public function edited()
	{
		try {
			$data = array(
				'event' => $this->input->post('eventTitle'),
				'description' => $this->input->post('eventDesc'),
				'eventDate' => date_format(new DateTime($this->input->post('eventDate')), 'Y-m-d'),
				'pk' => $this->input->post('eID')
				);
			$this->event_model->edit($data);	
			$this->view();
		} catch (Exception $ex) {
			$id = $this->input->post('eID');
			$this->edit($id, "Incorrect date format");
		}
	}

	public function delete($id)
	{
		$this->event_model->delete($id);
		$this->view();
	}

	public function undelete($id)
	{
		$this->view();
	}
}