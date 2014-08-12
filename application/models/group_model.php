<?php
/* Shared functions for both faci and student */
class Group_Model extends CI_Model {
	const TABLE_NAME = 'Group';

	// Group model should be able to get faci ID given a student ID.

	function getGroupsOfClass($classID) {
		$this -> db -> select('pk, groupFaciId, classFk');
		$this -> db -> from(Group_Model::TABLE_NAME);
		$this -> db -> where('classFk', $classID);
		
		$query = $this -> db -> get();
		
		$result = array();
		if ($query -> num_rows() > 0)
			foreach ($query->result() as $row) { 
				$faciID = $row -> groupFaciId;
				$faciData = $this->faci_account_model->get($faciID);

				$result[] = array(
					'groupID' => $row -> pk,
					'faci' => $faciData,
					'classFk' => $classID,
				);
			}
		return $result;
	}

	function insertGeneric($class) {
		$this-> db -> where('id', $row['idnumber']);
		$query = $this->db->get(account_model::TABLE_NAME);
		if ($query -> num_rows() > 0) {
			return false;
		}

		$this -> db -> set('id', $row['idnumber']);
		$this -> db -> set('password', $row['idnumber']);
		$this -> db -> set('firstname', $row['firstname']);
		$this -> db -> set('lastname', $row['lastname']);
		$this -> db -> set('course', $row['course']);
		return $this -> db -> insert(account_model::TABLE_NAME);
	}

	function getGroupFaciOf($student_id){
		$groupFk = $this->getGroupOf($student_id);
		if($groupFk != false){
			$this->db->select('groupFaciId');
			$this->db->from('group');
			$this->db->where('pk', $groupFk);

			return $this->db->get()->row()->groupFaciId;
		}
		return false;
	
		/*
		$query = $this -> db -> select('`faciId`') -> from('facigroupmap') -> join ('student', 'student.groupFk = facigroupmap.groupFk')->get();
		if ($query->num_rows() > 0)
			return $query -> row() -> faciId;
		return false;
		*/
	}

	function getGroupOf($studentId){
		$this->db->select('groupFk');
		$this->db->from('student');
		$this->db->where('id', $studentId);

		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query -> row() -> groupFk;
		return false;
	}

	function getGroupsLedBy($faciID){
		$this->db->select('*');
		$this->db->from('group');
		$this->db->where('groupFaciId', $faciID);

		return $this->db->get()->result_array();
	}

	function getStudentsInGroup($groupPK){
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('groupFk', $groupPK);

		return $this->db->get()->result_array();
	}

	function getStudentsOf($faciID){
		$groups = $this->getGroupsLedBy($faciID);
		$students = array();
		foreach($groups as $group){
			$members = $this->getStudentsInGroup($group['pk']);
			foreach($members as $member)
				$students[] = $member;
		}
		return $students;
	}
}
?>