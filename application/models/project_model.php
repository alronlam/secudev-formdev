<?php

class Project_model extends CI_Model {

	const PROJECT_MODEL = "project";

	public function __construct()
	{
		
	}

	/*
	 * Darren notes: Please use camelCaseIdentifiers.
	 */
	public function getAllProjects()
	{
		$query = $this->db->get(self::PROJECT_MODEL);
		return $query->result_array();
	}


	public function getProject($where)
	{
		//$query = $this->db->get_where('student', array('fName' => $fName));
		$query = $this->db->get_where(self::PROJECT_MODEL, array($where));
		return $query->row_array();
	}

	public function createProject($project_data)
	{
		return $this->db->insert(self::PROJECT_MODEL, $project_data);
	}
}