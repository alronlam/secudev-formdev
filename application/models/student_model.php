<?php
class Student_Model extends CI_Model {
	const TABLE_NAME = 'Student';

 	/**
 	 * Darren notes: This method's comments should dictate what the CSV row
 	 * contains. What are its columns?
 	 * 
 	 * 
	 * Inserts a database entry given a csv row
	 */
 	function insert($row) {
 		/* Check if student already exists */
 		$this-> db -> where('id', $row['idnumber']);
 		$query = $this->db->get(Student_Model::TABLE_NAME);
 		if ($query -> num_rows() > 0) {
 			return false;
 		}

 		$this -> db -> set('id', $row['idnumber']);
 		$this -> db -> set('classFk', $row['classFk']);

 		return $this -> db -> insert(Student_Model::TABLE_NAME);
 	}

	/**
	 * Darren notes: This should pass the student ID and group ID independently,
	 * not within an array.
	 */
	function assignStudentToGroup($student, $group) {
		$this -> db -> set('groupFk', $group['pk']);
		$this -> db -> where('id', $student['id']);
		
		/*
		 * Darren: It should be like this.
		
		$this -> db -> set('groupFk', $group);
		$this -> db -> where('id', $student);
		
		 */
		
		$this -> db -> update('products');
	}

	/**
	 * Gets all students with a section
	 */

	function getStudentList(){
		$this -> db -> select('*');
		$this -> db -> from(Student_Model::TABLE_NAME);
		$this -> db -> join('PersonalInfo', 'Student.id = PersonalInfo.id');
		$this -> db -> where('classFk IS NOT NULL');
		$query = $this -> db -> get();

		if ($query -> num_rows() > 0)
			return $query ->result_array();
		else
			return false;				

	}

	/**
	 * Gets the section of the student by class FK
	 */

	function getSection($id){
		$this -> db -> select('section');
		$this -> db -> from(Class_Model::TABLE_NAME);
		$this -> db -> join(Student_Model::TABLE_NAME, 'Student.classFk = Class.pk');
		$this -> db -> where('Student.classFk', $id);
		$query = $this -> db -> get();

		if ($query -> num_rows() == 0) return false;
		$row = $query -> row();
		return $row -> section;
	}

	/**
	 * Returns the data of a student given his or her ID number.
	 */
	function get($id){
		$this -> db -> select('*');
		$this -> db -> from(Student_Model::TABLE_NAME);
		$this -> db -> join('PersonalInfo', 'Student.id = PersonalInfo.id');
		$this -> db -> where('PersonalInfo.id', $id);
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		
		if ($query -> num_rows() == 0) return false;

		return $query -> row();
	}

	function exists($id){
		return $this->get($id) != false;
	}

	function getStudentAccount(){
		if ($account = $this->account_model->getAccount()){
			return $this->get($account->id);
		}
		return false;
	}
}
?>