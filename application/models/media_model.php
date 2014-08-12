 <?php

 class Media_model extends CI_Model {

 	const UPLOADS_FOLDER = './uploads/';

 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->helper(array('directory', 'file'));
 	}

	/*
	*	This function just retrieves all the uploaded files.
	*/
	public function getUploadedFiles()
	{
		$fileNames = directory_map(Media_model::UPLOADS_FOLDER);
		$uploadedFiles = array();
		if ($fileNames && $fileNames != "")
			foreach($fileNames as $fileName){
				$file= get_file_info(Media_model::UPLOADS_FOLDER.$fileName);
				$file['name'] = $fileName;
				$file['sizeString'] = $this->convertToString($file['size']);

				$uploadedFiles[] = $file;
			}
			return $uploadedFiles;
		}

		private function convertToString($size){
			$units = array('', 'K', 'M', 'G', 'T');
			$string = '';
			$index = 0;
			while($size >= 1000 && $index < 5){
				$index++;
				$size /= 1000;
			}

			return $size.' '.$units[$index].'B';

		}
	}