<?php
/* Model for accessing the event */
class Event_Model extends CI_Model {
	const TABLE_NAME = 'event';

	
	public function delete($id)
	{
		$arr = array('pk' => -$id);
		$this->db->where('pk', $id);
		return $this->db->update(Event_Model::TABLE_NAME, $arr); 
	}
	
	public function edit($data)
	{
		$this->db->where('pk', $data['pk']); 
		return $this->db->update(Event_Model::TABLE_NAME, $data); 
	}
	
	public function add($data)
	{
		$this->db->set('datePosted', 'NOW()', FALSE);
		$this->db->insert('event', $data); 
		return $this->db->insert_id();
	}
	
	/**
	 * Array - Given a valid event ID, returns its details.
	 */
	function get($id) {
		$this -> db -> select('*');
		$this -> db -> from(Event_Model::TABLE_NAME);
		$this -> db -> where('pk', $id);
		$this -> db -> limit(1);
		$query = $this -> db -> get();

		if ($query -> num_rows() == 1) {
			return $query -> result_array();
		}
		else {
			return false;
		}
	}

	/**
	 * Array - Returns all event details in an array.
	 */
	function getAll(){
		$this -> db -> select('*');
		$this -> db -> from(Event_Model::TABLE_NAME);
		$this -> db -> where('pk >', 0);
		$this -> db -> order_by('datePosted', 'desc');
		$query = $this -> db -> get();

		if ($query -> num_rows() > 0) {
			return $query -> result_array();
		}
		else {
			return false;
		}
	}

	/**
	 * Returns true if the event ID is valid.
	 */
	function exists($id){
		return $this->get($id) != false;
	}
}
?>