<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcement extends CI_Controller {
	function __construct(){
		parent::__construct();
		//needed for the form stuff in the view
		$this->load->helper('form');
		$this->load->model('announcement_model');
	}

	public function index()
	{
		$this->view();
	}

	public function view()
	{
		$data['aList'] = $this->announcement_model->getAll();
		$this->load->view('guest/announcements', $data);
	}

	public function add()
	{
		$this->load->view('admin/information');
	}
	
	public function added()
	{
		$data = array(
			'announcement' => $this->input->post('announcementTitle'),
			'description' => $this->input->post('announcementDesc'),
			'postedByFaciId' => $this->session->userdata('id')
			);
		$this->announcement_model->add($data);
		$message = "Announcement Successfully added.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		$this->view();
	}

	public function edit($id)
	{
		$data = array();
		$data['aEntry'] = $this->announcement_model->get($id);
		$this->load->view('admin/info/announcement', $data);
	}

	public function edited()
	{
		$data = array(
			'announcement' => $this->input->post('announcementTitle'),
			'description' => $this->input->post('announcementDesc'),
			'pk'=>$this->input->post('aID')
			);
		
		$this->announcement_model->edit($data);
		$this->view();
	}
	
	public function delete($id)
	{
		$this->announcement_model->delete($id);
		$this->view();
	}

	public function undelete($id)
	{
		$this->view();
	}
}