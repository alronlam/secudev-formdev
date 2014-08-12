<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outreach extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('outreach_model');
		$this->load->model('settings_model');

		//needed for the form stuff in the view
		$this->load->helper('form'); 
	}

	public function index()
	{
		$this->view();
	}
	/*
	*	This function called when requesting to view the outreach activities.
	*/
	public function view($data = array())
	{
		$id = $this -> session -> userdata('id');
		$data['faciRoles'] = $this -> faci_account_model -> getFaciRoles($id);
		$data['activities'] = $this -> outreach_model -> queryActivities();
		$data['termAndYear'] = $this -> settings_model -> getTermAndYear();
		$this->load->view('guest/outreach/view', $data);
	}

	/*
	*	This function called when viewing the add outreach activity page.
	*/
	public function add($data = array())
	{
		$data['faciList'] = $this->faci_account_model->getFaciList();
		$this->load->view('commhead/outreach/add', $data);
	}

	/*
	*	This function called when actually ading an outreach activity.
	*/
	public function added()
	{
		$data = array();
		$newActivityPK = $this->outreach_model->addActivity();
		$data['newActivity'] = $this->outreach_model->getActivityDetails($newActivityPK);
		$this->view($data);
	}

	/*
	*	This function called when deleting an outreach activity.
	*/
	public function delete($activityPK)
	{
		$data = array();
		$data['deletedActivity'] = $this->outreach_model->getActivityDetails($activityPK);

		$this->outreach_model->deleteActivity($activityPK);
		$this->view($data);
	}
	/*
	*	This function called when undoing a delete outreach activity action.
	*/
	public function undelete($activityPK)
	{
		$this->outreach_model->undoDeleteActivity($activityPK);
		$this->index();
	}

	/*
	*	This function called to load the edit page.
	*/
	public function edit($activityPK)
	{
		$data = array();
		$data['faciList'] = $this->faci_account_model->getFaciList();
		$data['activity'] = $this->outreach_model->getActivityDetails($activityPK);

		$this->load->view('commhead/outreach/edit', $data);
	}
	/*
	*	This function called to actually edit an activity.
	*/
	public function edited($activityPK)
	{
		$data = array();
		$data['editedActivity'] = $this->outreach_model->getActivityDetails($activityPK);

		$this->outreach_model->editActivity($activityPK);
		$this->view($data);
	}
}