<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('upload');
		$this->load->library('CSVReader');
		$this->load->model('class_model');
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
		$this->load->view('view_events_and_activities');
	}
	/**
	 * Course evaluations
	 */
	public function evaluations()
	{
		$this->load->view('admin/course_evaluation');
	}
	/**
	 * Course evaluations
	 */
	public function biblestudy()
	{
		// bluedirect
		$this->load->view('admin/bible_study');
	}
	/**
	 * Course evaluations
	 */
	public function classes($data = array())
	{
		$id = $this -> session -> userdata('id');
		$faciRoles = $this->faci_account_model->getFaciRoles($id);
		
		$data['isStudentHead'] = in_array(0, $faciRoles);
		$data['classes'] = $this->class_model->getAllClasses();

		$this->load->view('admin/classes', $data);
	}

	/**
	 * Announcements
	 */
	public function information()
	{
		$this->load->view('admin/information');
	}
	/**
	 * Verse of the Week
	 */
	public function verse()
	{
		/** Information passed to the header */
		$data['header'] = array(
			'bibleReferences' => TRUE,
			'title' => 'Verse Of The Week'
			);
		$this->load->view('verse/add', $data);
	}

	/**
	 * Account management.
	 * This view begins by viewing the list of facilitators.
	 */
	public function accounts(){
		$this->load->model('bible_study_model');
		$facis = $this->faci_account_model->getFaciList();
		$this->load->view('admin/account/index');
	}

		/**
	 * Account management.
	 * This view begins by viewing the list of facilitators.
	 */
	public function facis(){
		$this->load->model('bible_study_model');
		$facis = $this->faci_account_model->getFaciList();

		/* Categorizes facis by batch */
		$facisByBatch = array();
		foreach ($facis as $faci) {
			$faci['bibleStudy'] = 'None';
			$bibleStudy = $this->bible_study_model->groupOf($faci['id']);
			if ($bibleStudy){
				$faci['bibleStudy'] = $bibleStudy -> book;
			}


			// Sort by batch
			$batch = $faci['batch'];
			if (array_key_exists($batch, $facisByBatch)){
				array_push($facisByBatch[$batch], $faci);
			}else{
				$facisByBatch[$batch] = array();
				array_push($facisByBatch[$batch], $faci);
			}
		}
		ksort($facisByBatch);
		$facisByBatch = array_reverse($facisByBatch);
		$data['batches'] = $facisByBatch;
		$this->load->view('admin/account/facis', $data);
	}

	public function students(){

		$students = $this->student_model->getStudentList();

		/* Categorizes students by section */
		$studentsBySection = array();
		foreach ($students as $student)	{
			$section = $this->student_model->getSection($student['classFk']);
			if($section != false){
				if (array_key_exists($section, $studentsBySection)){
					array_push($studentsBySection[$section], $student);
				}else{
					$studentsBySection[$section] = array();
					array_push($studentsBySection[$section], $student);
				}				
			}
		}

		ksort($studentsBySection);
		$studentsBySection = array_reverse($studentsBySection);
		$data['sections'] = $studentsBySection;
		$this->load->view('admin/account/students', $data);
	}

	/**
	 * New batch of FORMDEV facilitators
	 */
	public function faci_batch($error = '')
	{
		$data = array();
		
		$data['error'] = $error;
		$this->load->view('admin/account/batch_faci', $data);
	}
	/**
	 * Uploading faci accounts
	 */
	public function faci_batch_confirm(){
		$faci_batch = $this->input->post('batch');
		
		$config['allowed_types'] = '*';
		$config['max_size']	= '400';
		$config['upload_path'] = './uploads/';
		$config['file_name'] = 'faci_batch_' . $faci_batch . "_" . date("m-d-Y_H-i-s");
		$data['file_name'] = $config['file_name'];
		$data['faci_batch'] = $faci_batch;
		
		$this->load->library('upload', $config);
		
		$this->upload->initialize($config);
		if ($faci_batch == "")
		{
			/* There was a problem, so display the error. */
			$error = array('error' => "<p>Please input a batch for these facilitators.</p>");
			$this->load->view('admin/account/batch_faci', $error);	
		}
		else if ( ! $this->upload->do_upload()) {
			/* There was a problem, so display the error. */
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('admin/account/batch_faci', $error);
		}
		else {
			/* Data has been uploaded */
			$uploadData = $this->upload->data();
			$data['upload_data'] = $uploadData;
			/* Get the CSV file to be parsed */
			$name_of_file = './uploads/' . $uploadData['file_name'];
			$values = $this->csvreader->parse_file($name_of_file);
			
			$data['result'] = array();
			/* Set the batch for the faci */
			foreach ($values as $row) {
				$row['batch'] = $faci_batch;
				$row['firstname'] = ucwords($row['firstname']);
				$row['lastname'] = ucwords($row['lastname']);
				$row['course'] = strtoupper($row['course']);
				$errorMessage = $this -> account_model -> getInsertErrors($row);
				if ($errorMessage != "") {
					$row['error'] = $errorMessage;
				}

				array_push($data['result'], $row);
			}
			
			if (isset($problems)) {
				$data['error'] = $problems;
			}
			$this->load->view('admin/account/batch_faci_confirm', $data);
		}
	}

	public function faci_batch_upload(){
		if ($this->input->post('submitForm') == 'Cancel') {
			redirect('admin/faci_batch');
		}

		$file_name = $this->input->post('file_name');
		$faci_batch = $this->input->post('faci_batch');
		$data['faci_batch'] = $faci_batch;
		$name_of_file = './uploads/' . $file_name . '.csv';
		$values = $this->csvreader->parse_file($name_of_file);
		$data['result'] = array();
		
		/* Do database insertion for each row. */
		foreach ($values as $row) {
			/*Checks if the faci to be added already exists. */
			$row['batch'] = $faci_batch;
			$row['firstname'] = ucwords($row['firstname']);
			$row['lastname'] = ucwords($row['lastname']);
			$row['course'] = strtoupper($row['course']);
			
			/* Insert into database using faci account model */
			$errorMessage = $this -> account_model -> getInsertErrors($row);
			if ($errorMessage == "") {
				$account_inserted = $this -> account_model -> insert($row);
				$faci_inserted = $this -> faci_account_model -> insert($row);
				array_push($data['result'], $row);
			}
		}
		$this->load->view('admin/account/batch_faci_uploaded', $data);
	}

	/**
	 * New FORMDEV class
	 */
	public function student_batch($classSection = NULL) {
		$data = array();
		
		$this -> load -> model('class_model');
		$data['classList'] = $this -> class_model -> getAllClasses();

		if($classSection != NULL)
			$data['classSection'] = $classSection;

		$this->load->view('admin/account/batch_student', $data);
	}


	public function student_batch_confirm(){
		$classPk = $this->input->post('classpk');
		$section = $this->input->post('section');
		
		$config['allowed_types'] = '*';
		$config['max_size']	= '400';
		$config['upload_path'] = './uploads/';
		$config['file_name'] = 'class_' . $classPk . "_" . date("m-d-Y_H-i-s");
		$data['file_name'] = $config['file_name'];
		$data['classPk'] = $classPk;
		$data['section'] = $section;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($classPk == ""){
			$this -> load -> model('class_model');
			$data['classList'] = $this -> class_model -> getAllClasses();
			$data['error'] = '<p>Please input a section for this FORMDEV class.</p>';
			$this->load->view('admin/account/batch_student', $data);
		}
		/* Read above how the faci accounts were extracted from the uploaded CSV file. */
		else if ( ! $this->upload->do_upload()) {
			/* There was a problem, so display the error. */
			$this -> load -> model('class_model');
			$data['classList'] = $this -> class_model -> getAllClasses();
			$data['error'] = $this->upload->display_errors();
			$this->load->view('admin/account/batch_student', $data);
		}
		else{
			/* Data has been uploaded */
			$uploadData = $this->upload->data();
			$data['upload_data'] = $uploadData;
			$name_of_file = './uploads/' . $uploadData['file_name'];
			$values = $this->csvreader->parse_file($name_of_file);
			$data['result'] = array();

			foreach($values as $row){
				$row['firstname'] = ucwords($row['firstname']);
				$row['lastname'] = ucwords($row['lastname']);
				$row['course'] = strtoupper($row['course']);
				
				$errorMessage = $this -> account_model -> getInsertErrors($row);
				if ($errorMessage != "") {
					$row['error'] = $errorMessage;
				}

				array_push($data['result'], $row);
			}

			if (isset($problems)) {
				$data['error'] = $problems;
			}
			$this->load->view('admin/account/batch_student_confirm', $data);
		}
	}

	/**
	 * Uploading class list
	 */
	public function student_batch_upload(){
		if ($this->input->post('submitForm') == 'Cancel') {
			redirect('admin/student_batch');
		}


		$file_name = $this->input->post('file_name');
		$classPk = $this->input->post('classPk');
		$section = $this->input->post('section');
		$data['section'] = $section;
		$name_of_file = './uploads/' . $file_name . '.csv';
		$values = $this->csvreader->parse_file($name_of_file);
		$data['result'] = array();

		foreach($values as $row){
			$row['classFk'] = $classPk;
			/* Capitalize first letters for names and all caps for course*/
			$row['firstname'] = ucwords($row['firstname']);
			$row['lastname'] = ucwords($row['lastname']);
			$row['course'] = strtoupper($row['course']);
			/* Insert into database using student model */
			
			$errorMessage = $this -> account_model -> getInsertErrors($row);
			if ($errorMessage == "") {
				$account_inserted = $this -> account_model -> insert($row);
				$faci_inserted = $this -> student_model -> insert($row);
				array_push($data['result'], $row);
			}
		}

		$this->load->view('admin/account/batch_student_uploaded', $data);
	}

	public function new_announcement(){
		$this->load->model('announcement_model');
		$this->announcement_model->addAnnouncement();
		$message = "Announcement Successfully added.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		$this->information();
	}

	public function new_event(){
		$this->load->model('event_model');
		$this->event_model->addEvent();
		$message = "Event Successfully added.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		$this->information();
	}

	public function new_votw(){
		$this->load->model('verse_model');
		$this->verse_model->newVerse();
		echo "<script type='text/javascript'>alert('Verse successfully added!');</script>";
		$this->verse();
	}

	public function addClass()
	{
		$data = array();
		$data['faciList'] = $this->faci_account_model->getFaciList();
		$this->load->view('admin/class/add', $data);
	}

	public function addedClass(){
		$pk = $this->class_model->addClass();
		$data = array();
		$data['addedClass'] = $this->class_model->get($pk);
		$this->classes($data);
	}

	public function deleteClass($pk)
	{
		$data = array();
		$data['deletedClass'] = $this->class_model->get($pk);
		$this->class_model->deleteClass($pk);
		$this->classes($data);
	}

	public function undeleteClass($section, $venue, $day, $timeStart, $timeEnd, $faciId)
	{
		$this->class_model->undeleteClass($section, $venue, $day, $timeStart, $timeEnd, $faciId);
		$this->classes();
	}

	public function editClass($pk){
		$data = array();
		$data['faciList'] = $this->faci_account_model->getFaciList();
		$data['class'] = $this->class_model->get($pk);
		$this->load->view('admin/class/edit',$data);
	}

	public function editedClass($pk){
		$data = array();
		$this->class_model->editClass($pk);
		$data['editedClass'] = $this->class_model->get($pk);
		$this->classes($data);
	}

}
/* End of file admin.php */
/* Location: ./application/controllers/admin.php */