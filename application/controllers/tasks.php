<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks extends CI_Controller {
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

	function __construct(){
		parent::__construct();

		$this->load->helper('form'); //needed for the form stuff in the view
		$this->load->model('task_model');
		
	}

	//should change this so that id number of whoever is logged in is used instead of having a default value.
	public function index($data = array())
	{
		$id = $this -> session -> userdata('id');
		$data['faciRoles'] = $this -> faci_account_model -> getFaciRoles($id);

		/* Gets all visible tasks */
		$data['tasksAssignedTo'] = $this->task_model->tasksOf($this->session->userdata('id'));
		$data['tasksAssignedBy'] = $this->task_model->tasksBy($this->session->userdata('id'));
		$data['faciRoles'] = $this->faci_account_model->getAccountRoles();
		$this->load->view('commhead/view', $data);
	}

	//not modified yet
	public function assign()
	{
		$this->load->helper("form");
		$data = array();
		
		$data['faciList'] = $this->faci_account_model->getFaciList();
		$this->load->view('commhead/assign', $data);
	}

	//Helper function that converts the id column into an array. used to query the names of these ids
	private function convertToIDArray($table)
	{
		$ids = array();
	    foreach($table as $row)
	    {
	        $ids[] = $row['faciAssignedID']; // add each user id to the array
	    }
	    return $ids;
	}

	/*
	*	This function called when actually completing a task.
	*/
	public function complete($taskID)
	{
		$this->task_model->complete($taskID);

		$data = array(); //reset the contents of data
		$data['taskDone'] = $this->task_model->getTaskDetails($taskID);
		$this->index($data);
	}
	/*
	*	This function called when undoing a complete action.
	*/
	public function undo_complete($taskID)
	{
		$this->task_model->undoCompleteTask($taskID);

		$data = array(); //reset the contents of data
		$this->index($data);
	}

	/*
	*	This function called when actually deleting a task.
	*/
	public function delete($taskID)
	{
		$data = array(); //reset the contents of data
		$data['taskDeleted'] = $this->task_model->getTaskDetails($taskID);
		
		$this->task_model->deleteTask($taskID);
		$this->index($data);
	}
	/*
	*	This function called when undoing a delete action.
	*/
	public function undo_delete($taskID)
	{
		$this->task_model->undo_deleteTask($taskID);

		$data = array(); //reset the contents of data
		$this->index($data);
	}
	/*
	*	This function called when actually assigning a task.
	*/
	
	public function assigned()
	{
		$newTaskPK = $this->task_model->assignTask();
		$newTask = $this->task_model->getTaskDetails($newTaskPK);
		$newTask['faciAssignedName'] = $this->account_model->getFullName($newTask['faciAssignedID']);

		$data = array();
		$data['newTask'] = $newTask;
		$this->index($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */