<?php
/* Model for accessing the announcements */
class Announcement_Model extends CI_Model {
	const TABLE_NAME = 'announcement';

	public function __construct()
	{
		parent::__construct();
	}

	// public function deleteAllAnnouncementsBefore()
	
	public function delete($id)
	{
		$data = array('pk' => -$id);
		$this->db->where('pk', $id); 
		return $this->db->update(Announcement_Model::TABLE_NAME, $data); 
	}
	
	public function edit($data)
	{
		$this->db->where('pk', $data['pk']); 
		return $this->db->update(Announcement_Model::TABLE_NAME, $data); 
	}
	
	public function add($data)
	{
		$this->db->set('datePosted', 'NOW()', FALSE);
		$this->db->insert(Announcement_Model::TABLE_NAME, $data); 
		return $this->db->insert_id();
	}
	
	/**
	 * Array - Given a valid announcement ID, returns its details.
	 */
	function get($id) {
		$this -> db -> select('*');
		$this -> db -> from(Announcement_Model::TABLE_NAME);
		$this -> db -> where('pk', $id);
		$this -> db -> limit(1);
		$query = $this -> db -> get();

		if ($query -> num_rows() == 1) {
			return $query ->result_array();
		}
		else {
			return false;
		}
	}

	/**
	 * Array - Returns all announcements details in an array.
	 */
	function getAll(){
		$this -> db -> select('*');
		$this -> db -> from(Announcement_Model::TABLE_NAME);
		$this->db->where('pk >', 0); 
		$this -> db -> order_by('datePosted', 'desc');
		$query = $this -> db -> get();
		
		if ($query -> num_rows() > 0) {
			return $query -> result_array();
		}
		else {
			return FALSE;
		}
	}

	/**
	 * Returns true if the announcement ID is valid.
	 */
	function exists($id){
		return $this->get($id) != false;
	}
}
?>