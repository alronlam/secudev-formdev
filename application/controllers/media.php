<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media extends CI_Controller {

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
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'download', 'directory'));
		$this->load->model('media_model');
	}

	function upload()
	{
		$this->load->view('faci/upload_media', array('error' => ' ' ));
	}

	function do_upload()
	{

		$this->load->library('upload');

		$fileName = $this->upload->data()["file_name"];
		$fileName = $this->security->sanitize_filename($fileName); 
		$config['file_name'] = $fileName;

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'txt|ppt|pptx|doc|docx|pdf|csv|xls|xlsx';
		$config['max_size']	= '25000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['remove_spaces'] = TRUE;

		$this->upload->initialize($config);


		if ( ! $this->upload->do_upload())
		{
			$data = array('error' => $this->upload->display_errors());
			$this->load->view('faci/upload_media', $data);
		}
		else
		{
			$data = array('uploadData' => $this->upload->data());
			$this->load->view('faci/upload_media', $data);
		}
	}

	public function index()
	{
		$this->downloads();
	}

	public function gallery()
	{
		$this->load->view('guest/gallery');
	}

	public function downloads()
	{
		$data = array();
	 	$faciRoles = $this->faci_account_model->getAccountRoles();

	 	$isFaci = false;
	 	for($i=0; $i<9; $i++)
			if($faciRoles && in_array($i, $faciRoles)){
				$isFaci = true;
				break;
			}

		$data['isFaci'] = $isFaci;
		$data['uploadedFiles'] = $this->media_model->getUploadedFiles();
		$this->load->view('guest/downloads', $data);
	}

	/*
	*	This function does the actual download command. Currently downloads files to the user's desktop.
	*/
	public function download($fileName)
	{
		$data = file_get_contents("./uploads/".$fileName); // Read the file's contents
		force_download($fileName, $data);
		$this->index();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */