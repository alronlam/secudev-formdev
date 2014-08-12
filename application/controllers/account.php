<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function index()
	{
		$this->login();
	}

	public function settings()
	{
		$this->load->view('account_settings');

	}

	public function update() {
		$this->load->helper('file');
		$field = $this->input->post('name');
		$value = $this->input->post('value');

		if ($value == '') {
			header('HTTP 400 Bad Request', true, 400);
			echo "This field is required.";
			return;
		}
		$this -> account_model -> update($field, $value);

	}

	public function updatePassword() {
		$value = $this->input->post('value');
		$password = $value['password'];
		$confirm = $value['confirm'];

		$status = $this -> account_model -> updatePassword($password, $confirm);

		if (!$status['ok']) {
			header('HTTP 400 Bad Request', true, 400);
			echo $status['message'];
		}		
	}
	
	public function login() {
		$this->load->helper(array('form'));
		$this->load->view('login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->helper(array('form'));
		$this->load->view('login');
	}

	public function forgot($error = ''){
		$data = array();
		$data['error'] = $error;
		$this-> load -> helper(array('form'));
		$this -> load -> view('forgot', $data);

	}

	public function send(){
		$error = '';
		$username = $this -> input -> post('username');
		$email = $this -> input -> post('email');
		$row = $this -> account_model -> getPassword($username, $email); 
		if($row != false){
			//send email
			$error = false;
		}
		else{
			$error = true;
		}

		$this -> forgot($error);
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
			"BS-CS ST", "BS-CS CSE", "BS-CS IST", "BS-CS NE", 
			"BS-INSYS", "BS-IT"
		);
		echo $course;
		return in_array($course, $validCourses);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */