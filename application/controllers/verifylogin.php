<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {


	function dev($id = 0){
		$this -> load -> model('class_model', '', TRUE);

		switch($id){
			case 0: 
			$username = $id = 11111111;
			$password = 'password';
			break;
			default:
			$username = $id;
			$password = $id;
			break;
		}

		

		$result = $this -> account_model -> login($username, $password);

		// sessionize user data
		if ($result) {

			$this -> session -> set_userdata('id', $result -> id);
			//$this -> session -> set_userdata('pw', hash('sha256', $password)); // done back in model derp
			$this -> session -> set_userdata('firstName', $result -> firstName);
			$this -> session -> set_userdata('middleName', $result -> middleName);
			$this -> session -> set_userdata('lastName', $result -> lastName);
			$this -> session -> set_userdata('course', $result -> course);
			$this -> session -> set_userdata('birthDate', $result -> birthDate);
		}

		// faci
		$faciRoles = $this -> faci_account_model -> getFaciRoles($id);

		// student

		// sessionize user type
		if ($faciRoles){ 
			$this -> faci_account_model -> setAccountRoles($faciRoles);
		}else{

		}

		// sessionize current term
		
		$term = $this -> class_model -> getCurrentTerm();
		$this -> session -> set_userdata('year', $term['year']);
		$this -> session -> set_userdata('term', $term['term']);

		$data['changed'] = TRUE;

		// Redirect the user to facis dashboard or student dashboard
		$dest = ($faciRoles) ? 'faci' : 'student';
		redirect($dest, 'refresh');

	}

	function index() {
		// Prevents direct access. Can't use session check since not yet logged in
		// Does not check if referred from a different site. Derp
		$this->load->library('user_agent');
		$empty = "";
	    if ($empty == $this->agent->referrer()) {
	    	redirect('', 'refresh');
	    }
	    

		$this -> load -> library('form_validation');
		$this -> form_validation -> set_rules('username', 'Username', 'trim|required|xss_clean');
		$this -> form_validation -> set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

		if ($this -> form_validation -> run() == FALSE) {
			// validation failed, redirect to login page
			$this -> load -> view('login');
		}
		else {
			// succeeded
			// duplicate code from dev D:
			$id = $this -> session -> userdata('id');
			$this -> load -> model('faci_account_model', '', TRUE);

			$faciRoles = $this -> faci_account_model -> getFaciRoles($id);

			if ($faciRoles)
				$this -> faci_account_model -> setAccountRoles($faciRoles);
			else
				;
			
			// sessionize current term
			$this -> load -> model('class_model', '', TRUE);
			$term = $this -> class_model -> getCurrentTerm();
			$this -> session -> set_userdata('year', $term['year']);
			$this -> session -> set_userdata('term', $term['term']);

			$data['changed'] = TRUE;
			redirect('', 'refresh');
		}
	}

	function check_database($password) {
		// Field validation succeeded. Validate against database.
		$username = $this -> input -> post('username');
		$result = $this -> account_model -> login($username, $password);
		// sessionize user data
		
		log_message("debug","attempts: ".$this->session->userdata('attempt'));
		if($this->session->userdata('attempt') > 9999){
			log_message("debug","Check attempts: ".$this->session->userdata('attempt'));
			$this -> form_validation -> set_message('check_database', 'Too many failed login attempts');
			return FALSE;
		}
		else{
			$this->session->set_userdata('attempt', $this->session->userdata('attempt')+1);
			log_message("debug","Failedattempts: ".$this->session->userdata('attempt'));
		}
		
		
		if ($result) {
			$this -> session -> set_userdata('id', $result -> id);
			//$this -> session -> set_userdata('pw', hash('sha256', $password)); // done back in model derp
			$this -> session -> set_userdata('firstName', $result -> firstName);
			$this -> session -> set_userdata('middleName', $result -> middleName);
			$this -> session -> set_userdata('lastName', $result -> lastName);
			$this -> session -> set_userdata('course', $result -> course);
			$this -> session -> set_userdata('birthDate', $result -> birthDate);
			log_message("debug","reset: ".$this->session->userdata('attempt'));
			$this->session->set_userdata('attempt', 0);
			
			return TRUE;
		}
		else {
			$this -> form_validation -> set_message('check_database', 'Invalid username or password');
			
			return FALSE;
		}
	}
}