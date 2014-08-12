<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faci extends CI_Controller {

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
	 
	function __construct(){
		parent::__construct();
		//needed for the form stuff in the view
		
		$this->load->model('task_model');
		$this->load->model('answer_model');
		$this->load->model('student_model');
		$this->load->model('announcement_model');
		$this->load->model('event_model');
		$this->load->model('outreach_model');
	}
	
	public function index()
	{
		$id = $this->session->userdata('id');
		
		$data['tasks'] = $this->task_model->tasksOf($id);
		
		$answers = $this->answer_model->getUnrepliedAnswers($id);
		$data['answers'] = $answers;
		
		$studentList = array();
		foreach($answers as $answer){
			array_push($studentList,$this->student_model->get($answer['studentId']));
		}
		
		$data['students'] = $studentList;
		
		$data['announcements'] = $this->announcement_model->getAll();
		$data['events'] = $this->event_model->getAll();
		$data['outreach'] = $this->outreach_model->queryActivities();
		
		$this->load->view('faci/dashboard', $data);
	}

	public function group()
	{
		$this->load->view('faci/view_group');
	}

	public function classes()
	{
		$this->load->view('classfaci/students');
	}

	public function students()
	{
		$this->load->helper('form');

		$account = $this->faci_account_model->getFaciAccount();
		if ($account == FALSE) redirect('account/logout', 'refresh');
		
		/* Determine my faci ID */	
		$faciID = $account -> id;

		/* And get all students I am handling */
		$students = $this->faci_account_model->getAssignedStudents($faciID);
		$studentsWithAnswers = array();

		/* For each student */
		foreach ($students as $student) { 

			/* Add the answers of the students into the student array */
			$student['answers'] = $this->answer_model->getAllAnswersAndReplies($student['id']);
			$studentsWithAnswers[] = $student;
		}

		/* Pass data to the view */
		$data['students'] = $studentsWithAnswers;
		$this->load->view('faci/view_students7', $data);
	}

	public function faciReply(){	
		//$answerPk = $this -> input -> post('answerPk');
		//$reply = $this -> input -> post('reply');
		
		// returns all POST items with XSS filter 
		$replies = $this->input->post(NULL, TRUE); 

		$this->load->model('answer_model');
		$this->answer_model->insertFaciReply( $replies);
		
		$this -> students();
	}


	public function reply()
	{
		$this->load->view('faci/view_answers');

	}

	public function submission()
	{
		$this->load->view('faci/view_submission');

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */