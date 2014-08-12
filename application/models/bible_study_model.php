<?php
class Bible_Study_Model extends CI_Model {
	const TABLE_NAME = "biblestudygroup";
	function __construct()
	{
		parent::__construct();
		$this -> load -> model('settings_model');
	}

	public function addGroup() {
		$data = array(
			'year' => date("Y") ,
			'term' => $this -> settings_model -> getTerm() ,
			'book' => $this -> input -> post('bookInput') ,
			'studyLeaderId' => $this -> input -> post('leaderID')
			);
		$this -> db -> insert(Bible_Study_Model::TABLE_NAME, $data);
		//Update faci's biblestudy foreign key
		$data2 = array(
			'bibleStudyGroupFk' => $this -> db -> insert_id()
			);
		$this -> db -> WHERE('id', $data['studyLeaderId']);
		$this -> db -> update(faci_account_model::TABLE_NAME, $data2);
		return $data2['bibleStudyGroupFk'];
	}

	public function queryGroups(){
		$this -> db -> SELECT('*');
		$this -> db -> FROM(Bible_Study_Model::TABLE_NAME);
		$this -> db -> order_by('book', 'asc');
		$query = $this -> db -> get();
		$result = $query -> result_array();
		$groups = array();
		foreach($result as $row){
			$group = Bible_Study_Model::polishDetails($row);
			$group['members'] = $this->queryMembers($row['pk']);
			$groups[] = $group;
			
		}
		return $groups;
	}

	private function polishDetails($group){
		$group['faciName'] = $this -> account_model -> getFullName($group['studyLeaderId']);
		return $group;
	}

	// not sure if this works 
	public function getGroupDetails($id) {
		$this -> db -> WHERE('pk', $id);
		$query = $this -> db -> get(Bible_Study_Model::TABLE_NAME);
		$result = $query -> row_array();
		return Bible_Study_Model::polishDetails($result);
	}

	public function removeGroup($id) {
		// $id
		$this -> db -> WHERE('pk', $id);
		$this -> db -> delete(Bible_Study_Model::TABLE_NAME);
	}

	public function restoreGroup($book, $faciID){
		$data = array(
			'year' => date("Y") ,
			'term' => $this -> settings_model -> getTerm() ,
			'book' => $book ,
			'studyLeaderId' => $faciID
			);

		$this -> db -> insert(Bible_Study_Model::TABLE_NAME, $data);
	}

	public function updateGroup() {
		$id = $this -> input -> post('groupID');

		$data = array(
			'book' => $this -> input -> post('bookInput') ,
			'studyLeaderId' => $this -> input -> post('leaderID')
			);

		$this -> db -> WHERE('pk', $id);
		$this -> db -> update(Bible_Study_Model::TABLE_NAME, $data);
	}

	/* BS Groups */

	public function addMember() {
		// faciId
		$this -> db -> WHERE('id', $faciId); 
	}

	public function groupOf($faciID) {
		$this -> db -> SELECT('*');
		$this -> db -> join(faci_account_model::TABLE_NAME, faci_account_model::TABLE_NAME . '.bibleStudyGroupFk = ' . bible_study_model::TABLE_NAME . '.pk');
		$this -> db -> WHERE('id', $faciID); 
		$query = $this -> db -> get(bible_study_model::TABLE_NAME);
		if ($query -> num_rows() == 1){
			$answer = $query -> result();
			return $answer[0];
		}
		else
			return false;
	}

	public function removeMember($faciId) {
		$this -> db -> WHERE('id', $faciId);
		$this -> db -> update('faci', array('bibleStudyGroupFk' => 'NULL'));
	}

	public function queryMembers($groupID){
		$this -> db -> SELECT('`PersonalInfo`.`id`, `firstName`, `middleName`, `lastName`');
		$this -> db -> FROM(faci_account_model::TABLE_NAME);
		$this -> db -> join('PersonalInfo', 'PersonalInfo.id = '.faci_account_model::TABLE_NAME.'.id');
		$this -> db -> WHERE('bibleStudyGroupFk', $groupID);
		$query = $this -> db -> get();

		if ($query -> num_rows() > 0)
			return $query ->result_array();
		else
			return false;
	}
}
?>