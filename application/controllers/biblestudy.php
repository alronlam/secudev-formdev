<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BibleStudy extends CI_Controller {
	function __construct(){
		parent::__construct();
		//needed for the form stuff in the view
		$this->load->helper('form');
		$this->load->model('bible_study_model');
		$this->load->model('faci_account_model');
/*
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');		
		$this->output->set_header('Cache-Control: no-store, no-cache, max-age=0, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',FALSE);
		$this->output->set_header('Pragma: no-cache');
*/
header("cache-Control: no-store, no-cache, must-revalidate");
header("cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		
		redirect_if_not_logged_in();
	}

	public function index()
	{
    	/*print_r($this->session->userdata);
    	if (is_logged_in()) {
			echo "in";
		} else {
			echo "logged out";
		}*/
		
		$this->view();
	}

	public function view($data = array())
	{
		$id = $this -> session -> userdata('id');
		$faciRoles = $this->faci_account_model->getFaciRoles($id);
		$data['isStudentHead'] = in_array(0, $faciRoles);
		$data['bibleStudies'] = $this->bible_study_model->queryGroups();

		$this->load->view('admin/bible_study', $data);
	}

	public function add()
	{
		$this->load->helper("form");
		$data = array();
		
		$data['faciList'] = $this->faci_account_model->getFaciList();

		$this->load->view('admin/biblestudy/add', $data);
	}

	public function added()
	{
		$groupPK = $this->bible_study_model->addGroup();
		$data = array();
		$data['addedGroup'] = $this->bible_study_model->getGroupDetails($groupPK);
		$this->view($data);
	}

	public function update($groupPK)
	{
		$data = array();
		$data['faciList'] = $this->faci_account_model->getFaciList();
		$data['studygroup'] = $this->bible_study_model->getGroupDetails($groupPK);

		$this->load->view('admin/biblestudy/update', $data);
	}

	public function updated($groupPK)
	{
		$this->bible_study_model->updateGroup();
		$data = array();
		$data['updatedGroup'] = $this->bible_study_model->getGroupDetails($groupPK);
		$this->view($data);
	}

	public function delete($groupPK){
		$data['deletedGroup'] = $this->bible_study_model->getGroupDetails($groupPK);
		$this->bible_study_model->removeGroup($groupPK);
		$this->view($data);
	}

	public function undelete($book, $faciID){
		$this->bible_study_model->restoreGroup($book, $faciID);
		$this->view();
	}
}