<?php

class Outreach_model extends CI_Model {

	const OUTREACH_ACTIVITIES_TABLE = "outreachactivities";
	
	public function __construct()
	{
		parent::__construct();
	}

	/*
	*	This function just queries all the non-deleted outreach activities. Calls the function polishActivitiesDetails.
	*/
	public function queryActivities()
	{
		// Darren: This should replace the ID number of the student with the real name of the student.
		$this->db->select('*');
		$this->db->from(Outreach_model::OUTREACH_ACTIVITIES_TABLE);
		$this->db->where('isDeleted', 0);
		$this->db->order_by('title', 'asc');
		$query = $this->db->get();
		$result = $query->result_array();

		return $this->polishActivitiesDetails($result);
	}

	/*
	*	This function just polishes the details (currently, only adds the name of the faci leading the acitvity) for a set of activities.
	*/
	private function polishActivitiesDetails($activities)
	{
		$newArray = array();
		foreach($activities as $activity){
			$activity['ledByFaciName'] = $this->account_model->getFullName($activity['ledByFaciId']);
			$newArray[] = $activity;
		}

		return $newArray;
	}

	/*
	*	This function just polishes the details (currently, only adds the name of the faci leading the acitvity) for one activity.
	*	Currently buggy. Outside of the model, the ledByFaciName attribute isn't set.
	*/
	private function polishAcitivityDetails($activity)
	{
		$activity['ledByFaciName'] = $this->account_model->getFullName($activity['ledByFaciId']);
		return $activity;
	}

	/*
	*	This function just returns all details regarding an activity given its pk. Currently buggy.
	*/
	public function getActivityDetails($activityPK)
	{
		$this->db->select('*');
		$this->db->from(Outreach_model::OUTREACH_ACTIVITIES_TABLE);
		$this->db->where('pk', $activityPK);

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $this->polishAcitivityDetails($query->row_array());
		}
	}


	/*
	*	This function is responsible for updating an existing outreach activity's details.
	*	Returns the new activity's pk, so it can be used later on for things like undoing the action.
	*/
	public function addActivity()
	{
		$data = array(
			'year' => $this->session->userdata('year'),
			'term' => $this->session->userdata('term'),
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'ledByFaciID' => $this->input->post('faciID')
			);

		$this->db->insert(Outreach_model::OUTREACH_ACTIVITIES_TABLE, $data); 
		return $this->db->insert_id();
	}
	/*
	*	This function is responsible for updating an existing outreach activity's details.
	*	Did not allow the editing of current year and term, because these do not change anyway.
	*/
	public function editActivity($activityPK)
	{
		$this->db->set('title', $this->input->post('title'));
		$this->db->set('description', $this->input->post('description'));
		$this->db->set('ledByFaciID', $this->input->post('faciID'));
		$this->db->where('pk', $activityPK);
		$this->db->update(Outreach_model::OUTREACH_ACTIVITIES_TABLE);
	}

	/*
	*	This function is responsible for deleting an activity by setting the 'isDeleted' column to 1.
	*/
	public function deleteActivity($activityPK)
	{
		$this->db->where('pk', $activityPK);
		$this->db->set('isDeleted', 1); //set the deleted task's pk to the next smallest negative number.
		$this->db->update(Outreach_model::OUTREACH_ACTIVITIES_TABLE);
	}
	
	/*
	*	This function is responsible for restoring a deleted activity by setting the 'isDeleted' column to 0.
	*/
	public function undoDeleteActivity($activityPK)
	{
		$this->db->where('pk', $activityPK);
		$this->db->set('isDeleted', 0);
		$this->db->update(Outreach_model::OUTREACH_ACTIVITIES_TABLE);
	}
}