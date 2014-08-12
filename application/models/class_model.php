<?php
/* Shared functions for both faci and student */
class Class_Model extends CI_Model {
	const TABLE_NAME = 'Class';

	function __construct() {
		$this->load->model('group_model');
	}

	function getWithSection($section) {
		$term = $this -> getCurrentTerm();
		$this -> db -> select('pk, section, year, term, venue, day,
			timeStart, timeEnd, classFaciId');
		$this -> db -> from(Class_Model::TABLE_NAME);
		$this -> db -> where('section', $section);
		$this -> db -> where('year', $term['year']);
		$this -> db -> where('term', $term['term']);
		$query = $this -> db -> get();
		
		$result = array(
			'pk' => $query -> row('pk'),	
			'section' => $query -> row('section'),	
			'year' => $query -> row('year'),	
			'term' => $query -> row('term'),	
			'venue' => $query -> row('venue'),	
			'day' => $query -> row('day'),	
			'timeStart' => $query -> row('timeStart'),	
			'timeEnd' => $query -> row('timeEnd'),	
			'timeClassFaciId' => $query -> row('timeClassFaciId'),	
			);

		return $result;
	}

	function get($pk) {
		$term = $this -> getCurrentTerm();
		$this -> db -> select('pk, section, year, term, venue, day,
			timeStart, timeEnd, classFaciId');
		$this -> db -> from(Class_Model::TABLE_NAME);
		$this -> db -> where('pk', $pk);
		$query = $this -> db -> get();
		
		$result = array(
			'pk' => $query -> row('pk'),	
			'section' => $query -> row('section'),	
			'year' => $query -> row('year'),	
			'term' => $query -> row('term'),	
			'venue' => $query -> row('venue'),	
			'day' => $query -> row('day'),	
			'timeStart' => $query -> row('timeStart'),	
			'timeEnd' => $query -> row('timeEnd'),	
			'timeClassFaciId' => $query -> row('timeClassFaciId'),	
			'classFaciId' => $query->row('classFaciId')
			);

		return Class_model::polishDetails($result);
	}

	function getAllClasses() {
		$term = $this -> getCurrentTerm();
		$this -> db -> select('pk, section, year, term, venue, day, timeStart, timeEnd, classFaciId');
		$this -> db -> from(Class_Model::TABLE_NAME);
		$this -> db -> where('year', $term['year']);
		$this -> db -> where('term', $term['term']);
		$this -> db -> order_by('section');
		$query = $this -> db -> get();
		
		$classes = $query -> result();
		$result = array();	
		foreach ($classes as $class) {
			$row = array(
				'pk' => $class -> pk,	
				'section' => $class -> section,	
				'year' => $class -> year,	
				'term' => $class -> term,	
				'venue' => $class -> venue,	
				'day' => $class -> day,	
				'timeStart' => $class -> timeStart,	
				'timeEnd' => $class -> timeEnd,
				'groups' => $this -> group_model -> getGroupsOfClass($class -> pk),
				'classFaciId' => $class -> classFaciId,
				);
			$result[] = Class_model::polishDetails($row);
		}

		return $result;
	}

	function polishDetails($class){
		$this->load->model('account_model');
		$class['classFaciName'] = $this->account_model->getFullName($class['classFaciId']);
		return $class;
	}

	function getCurrentTerm() {
		$this -> db -> select('year, term');
		$this -> db -> from('CurrentTerm');
		$query = $this -> db -> get();
		$result = array(
			'year' => $query -> row('year'),
			'term' => $query -> row('term')
			);
		return $result;
	}

	public function addClass(){
		$currentTermYear = Class_model::getCurrentTerm();

		$data = array(
			'section'=>$this->input->post('section'),
			'year' => $currentTermYear['year'],
			'term' => $currentTermYear['term'],
			'venue' => $this->input->post('venue'),
			'day' => $this->input->post('day'),
			'timeStart' => $this->input->post('timeStart'),
			'timeEnd' => $this->input->post('timeEnd'),
			'classFaciId' => $this->input->post('classFaciId')
			);

		$this->db->insert(Class_model::TABLE_NAME, $data); 
		return $this->db->insert_id();
	}

	public function editClass($pk){
		$data = array(
			'section'=>$this->input->post('section'),
			'year' => $this->session->userdata('year'),
			'term' => $this->session->userdata('term'),
			'venue' => $this->input->post('venue'),
			'day' => $this->input->post('day'),
			'timeStart' => $this->input->post('timeStart'),
			'timeEnd' => $this->input->post('timeEnd'),
			'classFaciId' => $this->input->post('classFaciId')
			);

		$this->db->where('pk', $pk);
		$this->db->update(Class_model::TABLE_NAME, $data);
	}

	public function deleteClass($pk){
		$this->db->where('pk', $pk);
		$this->db->delete(Class_model::TABLE_NAME);
	}

	public function undeleteClass($section, $venue, $day, $timeStart, $timeEnd, $classFaciId){
		$currentTermYear = Class_model::getCurrentTerm();
		$data = array(
			'section'=>$section,
			'year' => $currentTermYear['year'],
			'term' => $currentTermYear['term'],
			'venue' => $venue,
			'day' => $day,
			'timeStart' => $timeStart,
			'timeEnd' => $timeEnd,
			'classFaciId' => $classFaciId
			);

		$this->db->insert(Class_model::TABLE_NAME, $data); 
		return $this->db->insert_id();
	}
}
?>