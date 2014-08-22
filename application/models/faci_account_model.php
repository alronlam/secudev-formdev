<?php

	/**
	 * Roles as represented in the database
	 * 1 - Student Head
	 * 2 - Class Facilitator
	 * 3 - Bible Study Leader
	 * 4 - Outreach Head
	 * 5 - IMC Head
	 * 6 - Communications Head
	 * 7 - Monitoring Head
	 * 8 - Facilitator
	 *
	 */

	class faci_account_model extends CI_Model {
		const TABLE_NAME = 'Faci';
		const FACI_ROLE_TABLE_NAME = 'FaciRoleMap';
		const FACI_TYPE_TABLE_NAME = 'FaciType';

	/**
	 * Darren notes: Instead of $row, pass each value of the row to the 
	 * function. e.g. f('name', 'batch')
	 */
	public function insert($row) {
		$this-> db -> where('id', $row['idnumber']);
		$query = $this->db->get(faci_account_model::TABLE_NAME);
		if ($query -> num_rows() > 0) {
			return false;
		}

		$this -> db -> set('id', $row['idnumber']);
		$this -> db -> set('batch', $row['batch']);
		return $this -> db -> insert(faci_account_model::TABLE_NAME);
	}

	/**
	 * Array - returns a list of numbers representing different roles.
	 * 
	 * See database or the top of this file to see the available roles.
	 * Returns false if the given faci ID is invalid.
	 */
	public function getFaciRoles($faci_id) {

		// First check if person is a facilitator
		if ( $this -> get($faci_id) ){

		}else{
			return false;
		}

		$this -> db -> select('FaciRoleMap.faciTypeFk AS faciType');
		$this -> db -> from(faci_account_model::FACI_ROLE_TABLE_NAME);
		$this -> db -> where('faciId', $faci_id);
		$query = $this -> db -> get();

		if ($query -> num_rows() > 0) {
			$result = $query -> result_array();
			$type = array();
			foreach ($result as $row) {
				// The database represents the roles starting by 1
				// But the system represents the roles starting by 0
				// 
				// Reduce by 1 to resolve issue
				$type[] = $row['faciType'] - 1; 
			}
			return $type;
		}
		else {
			return false;
		}
	}
	
	public function getFaciType($faci_id) {

		// First check if person is a facilitator
		if ( $this -> get($faci_id) ){

		}else{
			return false;
		}

		$this -> db -> select('FaciRoleMap.title AS title');
		$this -> db -> from(faci_account_model::FACI_TYPE_TABLE_NAME);
		$this -> db -> where('faciId', $faci_id);
		$query = $this -> db -> get();

		if ($query -> num_rows() > 0) {
			$result = $query -> result_array();
			
			return $result;
		}
		else {
			return false;
		}
	}
	
	public function getAllFaciType() {

		$this -> db -> select('FaciRoleMap.pk as role_id, FaciRoleMap.title AS title');
		$this -> db -> from(faci_account_model::FACI_TYPE_TABLE_NAME);
		$query = $this -> db -> get();

		if ($query -> num_rows() > 0) {
			$result = $query -> result_array();
			$type = array();
			foreach ($result as $row) {
				// The database represents the roles starting by 1
				// But the system represents the roles starting by 0
				// 
				// Reduce by 1 to resolve issue
				$type[$row['role_id'] - 1] = $row['title']; 
				
			}
			return $type;
		}
		else {
			return false;
		}
	}

	/**
	 * This function returns the facilitator list.
	 */
	public function getFaciList(){
		$this->db->select('*');
		$this->db->from(faci_account_model::TABLE_NAME);
		$this->db->join('PersonalInfo', 'PersonalInfo.id = '.faci_account_model::TABLE_NAME.'.id');
		$query = $this -> db -> get();

		if ($query -> num_rows() > 0)
			return $query ->result_array();
		else
			return false;
	}

	/**
	 * Given a person ID, this returns the complete information
	 * of a facilitator (bible study group), including his or her
	 * personal information.
	 *
	 * Returns false if person ID is invalid.
	 */
	public function get($faci_id) {
		$this-> db -> select('*');
		$this-> db -> from(faci_account_model::TABLE_NAME);
		$this-> db -> join('PersonalInfo', 'PersonalInfo.id = '.faci_account_model::TABLE_NAME.'.id');
		$this -> db -> where('PersonalInfo.id', $faci_id);
		$this -> db -> limit(1);
		$query = $this -> db -> get();

		if ($query -> num_rows() == 0) return false;
		
		return $query -> row();
	}

	/**
	 * Returns true if person exists, and
	 *         false if person ID is invalid.
	 */
	public function exists($id){
		return $this->get($id) != false;
	}

	/**
	 * Given an array of roles, return the array into a properly
	 * comma separated phrase.
	 */
	public function getRoles($roles){
		$result = "";
		$i = 0;
		do{
			$role = $roles[$i];
			$result = $result . $this->getRole($role);
			if (++$i < count($roles))
				$result = $result . ", ";
		}while($i < count($roles));
		return $result;
	}

	/**
	 * Same as getRoles except for this account
	 */
	public function myRoles(){
		return $this->getRoles( $this -> getAccountRoles() );
	}

	private function getRole($role){
		switch($role){
			case 0: return "Student Head";
			case 1: return "Class Facilitator";
			case 2: return "Bible Study Leader";
			case 3: return "Outreach Head";
			case 4: return "IMC Head";
			case 5: return "Communications Head";
			case 6: return "Monitoring Head";
			case 7: return "Facilitator";
			case 8: return "Student";
			default: return "Invalid user type";
		}
	}

	public function getAccountRoles(){
		return $this->session->userdata('faciRoles');
	}

	public function setAccountRoles($val){
		$this->session->set_userdata('faciRoles', $val);
	}

	/**
	 * Given an id, return an array of students assigned
	 * to the faculty for the current term.
	 *
	 * Each student is an array with columns: 
	 * id, firstName, middleName, classPk, groupPk
	 */
	public function getAssignedStudents($id) {
		$year = $this -> session -> userdata('year');
		$term = $this -> session -> userdata('term');

		/* Joins tables to retrieve assigned student info */
		$this -> db -> select('Student.id, PersonalInfo.firstName, PersonalInfo.middleName, PersonalInfo.lastName, Group.pk AS groupPk, Class.pk AS classPk');
		$this -> db -> from('faci');
		$this -> db -> join('Group', "groupFaciId = Faci.id");
		$this -> db -> join('Class', 'Group.classFk = Class.pk');
		$this -> db -> join('Student', 'Group.pk = Student.groupFk');
		$this -> db -> join('PersonalInfo', 'Student.id = PersonalInfo.id');
		$this -> db -> where('Faci.id', $id);
		$this -> db -> where('Class.year', $year);
		$this -> db -> where('Class.term', $term);
		$query = $this -> db -> get();
		
		$students = array();
		$result = $query -> result();
		
		/* convert row results into array */
		foreach ($result as $row) {
			$student = array(
				'id' => $row -> id,
				'firstName' => $row -> firstName,
				'middleName' => $row -> middleName,
				'lastName' => $row -> lastName,
				'groupPk' => $row -> groupPk,
				'classPk' => $row -> classPk
				);
			$students[] = $student;
		}
		
		return $students;
	}
	/**
	 * Returns true if the account is a facilitator.
	 */
	function getFaciAccount(){
		if ($account = $this->account_model->getAccount()){
			return $this->get($account -> id);
		}
		return false;
	}
}
?>