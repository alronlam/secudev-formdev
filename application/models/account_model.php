<?php
/* Shared functions for both faci and student */
class account_model extends CI_Model {
	const TABLE_NAME = 'PersonalInfo';
	public $COLUMNS = array('id', 'password', 'firstName', 'middleName', 'lastName', 'course', 'birthDate');
	public $COLUMN_WITHOUT_NAME = array('id', 'password', 'course', 'birthDate');

	function insert($row) {
		$this-> db -> where('id', $row['idnumber']);
		$query = $this->db->get(account_model::TABLE_NAME);
		if ($query -> num_rows() > 0) {
			return false;
		}

		$this -> db -> set('id', $row['idnumber']);
		$password = hash('sha256', $row['idnumber']);
		$this -> db -> set('password', $password);
		$this -> db -> set('firstname', $row['firstname']);
		$this -> db -> set('lastname', $row['lastname']);
		$this -> db -> set('course', $row['course']);
		if (isset($row['birthDate']))
			$this -> db -> set('birthDate', $row['birthDate']);
		
		return $this -> db -> insert(account_model::TABLE_NAME);
	}

	function login($username, $password) {
		$this -> db -> select('id, firstName, middleName, lastName, course, birthDate');
		$this -> db -> from(account_model::TABLE_NAME);
		$this -> db -> where('id', $username);
		// DEBUG, make login available for all.
		$this -> db -> where('password', hash('sha256', $password)); 
		$this -> db -> limit(1);
		$query = $this -> db -> get();

		if ($query -> num_rows() == 1)
			return $query -> row();
		return false;
	}

	/* Private function for logging in , used by sessions */
	private function _login($username, $password) {
		$this -> db -> select('id, firstName, middleName, lastName, course, birthDate');
		$this -> db -> from(account_model::TABLE_NAME);
		$this -> db -> where('id', $username);
		$this -> db -> where('password', $password); 
		$this -> db -> limit(1);
		$query = $this -> db -> get();

		if ($query -> num_rows() == 1)
			return $query -> row();

		return false;
	}

	function getAccount(){
		if ($this->session->userdata('id') != "" && $this->session->userdata('pw') != ""){
			$id = $this->session->userdata('id');
			$pw = $this->session->userdata('pw');
			return $this->_login($id, $pw);
		}
		return false;
	}

	function get($id) {
		$this -> db -> select( $this->allColumnsWithName($this->COLUMN_WITHOUT_NAME) );
		$this -> db -> from(account_model::TABLE_NAME);
		$this -> db -> where('id', $id);
		$this -> db -> limit(1);
		$query = $this -> db -> get();

		if ($query -> num_rows() == 1)
			return $query ->row();
		else
			return false;
	}

	/**
	 * Given an array of IDs, return the respective accounts
	 */
	function getTheFollowing($ids) {
		$this -> db -> select( $this->allColumnsWithName($this->COLUMN_WITHOUT_NAME) );
		$this -> db -> from(account_model::TABLE_NAME);
		$this -> db -> where_in('id', $ids);
		$query = $this -> db -> get();

		if ($query -> num_rows() > 0)
			return $query ->result_array();
		else 
			return false;
	}

	/**
	 * Given a person ID, this function returns the selected person's full name only.
	 *
	 * Returns false if person ID is invalid.
	 */
	function getFullName($id){
		$this -> db -> select("CONCAT ( firstName, SPACE(1), lastName ) as name");
		$this -> db -> from(account_model::TABLE_NAME);
		$this -> db -> where('id', $id);
		$this -> db -> limit(1);
		$query = $this -> db -> get();

		if ($query -> num_rows() == 1) {
			return $query ->row()->name;
		}
		else {
			return false;
		}
	}

	/**
	 * Given a person ID, this function returns the selected person's first name only.
	 *
	 * Returns false if person ID is invalid.
	 */
	function getMyFirstName(){

		$id = $this->session->userdata('id');
		$pw = $this->session->userdata('pw');
		$this -> db -> select("CONCAT ( firstName ) as name");
		$this -> db -> from(account_model::TABLE_NAME);
		$this -> db -> where('id', $id);
		$this -> db -> where('password', $pw);
		$this -> db -> limit(1);
		$query = $this -> db -> get();

		if ($query -> num_rows() == 1) {
			return $query ->row()->name;
		}
		else {
			return false;
		}
	}

	/**
	 * Returns true if the person ID is valid.
	 */
	function exists($id){
		return $this->get($id) != false;
	}

	/**
	 * Appends the full name to the columns to be selected.
	 */
	function allColumnsWithName($array){
		return "CONCAT ( firstName, SPACE(1), lastName ) as name, " . $this->allColumns($array);
	}

	/**
	 * Given an array, it outputs all of its contents separated by commas.
	 */
	function allColumns($array){
		$string = "";
		$i = 0;
		$max = count($array);
		do{
			$string = $string . $array[$i];
			if ($i + 1 < $max)
				$string = $string . ", ";
			$i++;
		}while($i < $max);
		return $string;
	}

	/**
	 * Updates the database given a field and the new value
	 */
	function update($field, $value) {
		$id = $this -> session -> userdata('id');
		$this -> db -> where('id', $id);
		$data = array(
			$field => $value
			);
		$this -> db -> update('PersonalInfo', $data);
		$this -> session -> set_userdata($field, $value);
	}

	/**
	 * Updates the database given the password
	 */
	function updatePassword($old, $password, $confirm) {
		$status = array(
			'ok' => true,
			'message' => ''
			);

		
		if (empty($old) || empty($password) || empty($confirm)) {
			$status['ok'] = false;
			$status['message'] = 'All fields are required.';
			return $status;
		};

		if (hash('sha256', $old)!= $this -> session -> userdata('pw')) {
			$status['ok'] = false;
			$status['message'] = 'Old password is incorrect.';
			return $status;
		}


		if ($password != $confirm) {
			$status['ok'] = false;
			$status['message'] = "Values are not equal.";
			return $status;
		}
		
		if (strlen($password) < 6 || strlen($password) > 30) {
			$status['ok'] = false;
			$status['message'] = "Password must be between 6 to 30 characters.";
			return $status;
		}

		$id = $this -> session -> userdata('id');
		$this -> db -> where('id', $id);
		$data = array(
			'password' => hash('sha256', $password)
			);
		$this -> db -> update('PersonalInfo', $data);
		$this -> session -> set_userdata('pw', hash('sha256', $password)); 

		return $status;
	}

	/**
	 * Checks the database whether the username and email are in the same row. 
	 * If both are in the same row, it will return that row. Else it will return false.
	 */
	function getPassword($id, $email) {
		$this -> db -> select('*');
		$this -> db -> from(account_model::TABLE_NAME);
		$this -> db -> where('id', $id);
		$this -> db -> where('email', $email);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1)
			return $query -> row();
		else
			return false;
	}

	/**
	* Checks if all details in a row are complete.
	* Returns an error message for incomplete details.
	*/
	public function getInsertErrors($row) {
		if ($this -> exists($row['idnumber'])) {
			return "The person already exists in the database.";
		}
		$missingDetails = array();
		if ($row['idnumber'] == "" || strlen($row['idnumber']) != 8) {
			$missingDetails[] = 'valid ID number';
		}

		if ($row['firstname'] == "") {
			$missingDetails[] = 'first name';
		}

		if ($row['lastname'] == "") {
			$missingDetails[] = 'last name';
		}

		$courseValid = true;
		if (!$this -> isCourseValid($row['course'])) {
			$courseValid = false;
		}

		$errorMessage = "";
		if (count($missingDetails) > 0) {
			$count = 0;
			$errorMessage = "Missing";
			foreach ($missingDetails as $detail) {
				$count++;
				if ($count > 1) {
					$errorMessage .= ",";
				}
				$errorMessage .= " ";
				
				$errorMessage .= $detail;
			}
			$errorMessage .= ". ";
		}
		if (!$courseValid) {
			$errorMessage .= "Course is invalid.";
		}

		return $errorMessage;
	}

	private function isCourseValid($course) {
		$validCourses = array(
			"BS CS-ST", "BS CS-CSE", "BS CS-IST", "BS CS-NE", 
			"BS INSYS", "BS IT"
		);
		return in_array($course, $validCourses);
	}
}
?>