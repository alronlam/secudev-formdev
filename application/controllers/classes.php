<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classes extends CI_Controller {

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
		
	}

	public function add()
	{
		$data = array();
		$data['faciList'] = $this->faci_account_model->getFaciList();
		$this->load->view('admin/class/add', $data);
	}

	public function added()
	{
		$pk = $this->class_model->addClass();
		$data = array();
		$data['addedClass'] = $this->class_model->get($pk);
		$this->classes($data);
	}
	
	public function edit($id)
	{
		$data = array();
		$data['faciList'] = $this->faci_account_model->getFaciList();
		$data['class'] = $this->class_model->get($pk);
		$this->load->view('admin/class/edit',$data);
		
	}
	
	public function edited()
	{
		$data = array();
		$this->class_model->editClass($pk);
		$data['editedClass'] = $this->class_model->get($pk);
		$this->classes($data);
	}

	public function delete($id)
	{
		$data = array();
		$data['deletedClass'] = $this->class_model->get($pk);
		$this->class_model->deleteClass($pk);
		$this->classes($data);
	}

	public function undelete($id)
	{
		$this->class_model->undeleteClass($section, $venue, $day, $timeStart, $timeEnd, $faciId);
		$this->classes();
	}
}