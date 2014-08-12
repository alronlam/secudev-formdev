<?php

class Task_model extends CI_Model {

	const TASK_MODEL = "Task";
	
	public function __construct()
	{
		 parent::__construct();
	}

	/*
	* This private function is only called within this class.
	* Given a facilitator ID, this function returns an array of tasks assigned to that faciltiator. 
	*
	* The following information is included:
	* ID number of who assigned it to you (faciCreatorID)
	* description of the task
	* deadline
	* date of completion
	*/
	private function queryTasksAssignedTo($faciID)
	{
		$this->db->select('`pk`, `faciAssignedID`, `faciCreatorID`, `description`, `dateGiven`, `dateExpected`, `dateCompleted`');
		$this->db->from('Faci');
		$this->db->join('Task', 'Task.faciAssignedID = Faci.id');
		$this->db->where('faciAssignedID', $faciID);
		$this->db->where('isDeleted', 0); /* Non-deleted tasks only */
		$this->db->where('dateCompleted IS NULL', null, false); /* Non-completed tasks only */
		$this->db->order_by('dateExpected', 'asc');

		$query = $this->db->get();
		$result = $query->result_array();

		return $result;
	}

	/*
	* This private function is only called within this class.
	* Given a facilitator ID, this function returns an array of tasks assigned by that faciltiator. 
	*
	* The following information is included:
	* ID number of who assigned it to you (faciCreatorID)
	* description of the task
	* deadline
	* date of completion
	*/
	private function queryTasksAssignedBy($faciID)
	{
		$this->db->select('`pk`, `faciAssignedID`, `faciCreatorID`, `description`, `dateGiven`, `dateExpected`, `dateCompleted`');
		$this->db->from('Faci');
		$this->db->join('Task', 'Task.faciCreatorID = Faci.id');
		$this->db->where('faciCreatorID', $faciID);
		$this->db->where('isDeleted', 0); /* Non-deleted tasks only */
		//$this->db->where('dateCompleted IS NULL', NULL, false); /* Non-completed tasks only */
		//$this->db->order_by('dateCompleted', 'asc');
		$this->db->order_by('dateExpected', 'asc');

		$query = $this->db->get();
		return $query->result_array();
	}


	/*
	* Given a facilitator ID, this function returns an array of tasks assigned to the specified facilitator.
	* 
	* This is the function that is called by the controller. It sends out the prepared information containing the names, 
	* instead of the ID numbers of the facilitators.
	*/
	public function tasksOf($faciID){
		$result = $this->queryTasksAssignedTo($faciID);
		$answer = array();
		foreach ($result as $task) {
			$answer[] = $this->taskPolishDetails($task);
		}
		return $answer;
	}

	/*
	* Given a facilitator ID, this function returns an array of tasks that the specified facilitator has delegated to other members.
	* 
	* This is the function that is called by the controller. It sends out the prepared information containing the names, 
	* instead of the ID numbers of the facilitators.
	*/
	public function tasksBy($faciID){
		$result = $this->queryTasksAssignedBy($faciID);
		$answer = array();
		foreach ($result as $task) {
			$answer[] = $this->taskPolishDetails($task);
		}
		return $answer;
	}

	/*
	 * This function changes the IDs into names, adds the number of days left, and
	 * checks whether the task is finshed or not.
	 */
	private function taskPolishDetails($task){

		// Turn ID to name - the person who assigned the task
		$assignedByID = $task['faciCreatorID'];
		$assignedBy = $this->account_model->getFullName($assignedByID);
		$task['faciCreatorName'] = $assignedBy;

		// Turn ID to name - the person assigned to do it
		$assignedByID = $task['faciAssignedID'];
		$assignedBy = $this->account_model->getFullName($assignedByID);
		$task['faciAssignedName'] = $assignedBy;

		// Number of days left
		$task['daysLeft'] = floor((strtotime($task['dateExpected']) - strtotime(date('Y-m-d')))/3600/24);

		// Finished or not
		$task['isFinished'] = $task['dateCompleted'] != null;

		// Status
		if ($task['isFinished'])
			$task['status'] = 'done';
		else if($task['daysLeft'] < 0) 
			$task['status'] = 'alert'; 
		else if( $task['daysLeft'] <= 3)
			$task['status'] = 'warning'; 
		else 
			$task['status'] = 'none';

		return $task;
	}

	//This function is for assigning a task, and the ID of the new task is returned.
	public function assignTask()//$faciCreatorID, $faciAssignedID, $description, $dateExpected)
	{
		$data = array(
		   'description' => $this->input->post('task'),
		   //'dateGiven' => date('yyyy-mm-dd'), //doesn't work for some reason
		   'dateExpected' => date('Y-m-d', strtotime($this->input->post('deadline'))),
		   'faciAssignedID' => $this->input->post('faciID'),
		   'faciCreatorID' => $this->session->userdata('id')
		);
		$this->db->set('dateGiven', 'NOW()', FALSE);
		$this->db->insert('Task', $data); 
		return $this->db->insert_id();
	}
	
	public function complete($taskPK)
	{
		$this->db->where('pk', $taskPK);
		$this->db->set('dateCompleted', date('Y-m-d'));
		$this->db->update(Task_model::TASK_MODEL);
	}

	public function undoCompleteTask($taskPK)
	{
		$this->db->where('pk', $taskPK);
		$this->db->set('dateCompleted', NULL);
		$this->db->update(Task_model::TASK_MODEL);
	}

	/*
	* Deletion should be done by marking the pk as negative. This way, the data is not lost
	* but instead just marked as deleted. In the same way, the selection of tasks should only
	* ask for tasks with a positive pk.
	*/
	public function deleteTask($taskPK)
	{
		$this->db->where('pk', $taskPK);
		$this->db->set('isDeleted', 1); //set the deleted task's pk to the next smallest negative number.
		$this->db->update(Task_model::TASK_MODEL);
	}

	public function undoDeleteTask($taskPK)
	{
		$this->db->where('pk', $taskPK);
		$this->db->set('isDeleted', 0);
		$this->db->update(Task_model::TASK_MODEL);
	}

	public function getTaskDetails($taskPK)
	{
		$this->db->select('*');
		$this->db->from(Task_model::TASK_MODEL);
		$this->db->where('pk', $taskPK);

		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $this->taskPolishDetails($query->row_array());
	}
}