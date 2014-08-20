<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('chapter_model');
		$this->load->model('answer_model');
		$this->load->helper('form');
		redirect_if_not_logged_in();
	}

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
		$this->load->view('student/dashboard');
	}

	/* View all the available chapters */
	public function workbook(){
		if ($account = $this->student_model->getStudentAccount()){
			$studentID = $account -> id;
			$section = $account -> classFk;
		}
		
		$data['chapterInformation'] = $this -> chapter_model -> getAllChaptersWithDates($section);
		$data['answers']   			= $this -> answer_model -> getAllAnswersAndReplies($studentID);

		$this->load->view('student/workbook', $data);
	}

	public function settings() {
		$this->load->view('student/settings');
	}

	public function activity_reports(){
		$this->load->view('dashboard');
	}

	public function myfaci(){
		$this->load->view('student/faci_details');
	}


	public function revised(){

	}

	public function replied($offset){
		$studentID = 1;
	}

// used to test if the due date and release date is working
	public function chapter($chapter){
		// Prepares account details
		if ($account = $this->student_model->getStudentAccount()){
			$studentID = $account -> id;
			$section = $account -> classFk;
		}

		// returns all POST items with XSS filter 
		$answers = $this->input->post(NULL, TRUE); 

		if ($answers){
			$this->load->model('group_model');

			$faciID = $this->group_model->getGroupFaciOf($studentID); // Hard coded. Group model should be able to get faci ID given a student ID.
			$this -> answer_model -> update($studentID, $faciID, $chapter, $answers);
			$data['saved'] = true;
		}
		
		$data['chapter']   = $this -> chapter_model -> getChapter($chapter);
		$data['answers']   = $this -> answer_model -> getAnswersAndReplies($studentID, $chapter);
		$data['questions'] = $this -> answer_model -> getQuestions($chapter);

		$this->load->view('student/chapter', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */