<?php
class Settings_model extends CI_Model {
	const CURRENT_TERM_AND_YEAR = 'currentterm';
	/* 
	 * Returns current term.
	 */
	public function getTerm(){
		$this->db->select('term');
		$this->db->from(Settings_model::CURRENT_TERM_AND_YEAR);
		$result = $this->db->get()->row_array();
		return $result['term'];
	}
	/* 
	 * Returns current school year as a string
	 */
	public function getYear(){
		$this->db->select('year');
		$this->db->from(Settings_model::CURRENT_TERM_AND_YEAR);
		$result = $this->db->get()->row_array();
		$startYear = $result['year'];
		return $startYear.'-'.($startYear+1);
	}
	/* 
	 * Returns first part of the school year. (if SY is 2014-2015, 2014 is returned)
	 */
	public function getStartYear(){
		return $this->session->userdata['year'];
	}
	/* 
	 * Returns second part of the school year. (if SY is 2014-2015, 2015 is returned)
	 */
	public function getEndyear(){
		return $this->session->userdata['year'] + 1;
	}

	/* 
	 * Returns String for convenience in views.
	 */
	public function getTermAndYear(){
		$term = Settings_model::getTerm();
		$year = Settings_model::getYear();
		return 'Term '.$term.', AY '.$year;
	}
}
?>