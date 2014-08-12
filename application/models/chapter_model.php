<?php
class	Chapter_Model extends CI_model{
	const NUM_CHAPTERS = 8;
	const CHAPTER_TABLE = 'chapter';
	
	/* Gets the chapters details (title, story) only, regardless of any section */
	function getAllChapters(){
		$query = $this->db->select('`pk`, `title`, `story`')->from(Chapter_Model::CHAPTER_TABLE)->order_by('pk', 'asc')->get();
		return $query->result_array();
	}

	function getChapter($id){
		$query = $this->db->select('`pk`, `title`, `story`')->from(Chapter_Model::CHAPTER_TABLE)->where('pk', $id)->get();
		return $query->row();
	}

	/* Gets chapter details (title, story) and the dates (releaseDate, dueDate) of the chapters depending on the section */
	function getAllChaptersWithDates($section){
		$chapters = $this->getAllChapters();
		$this->db->select('`dueDate`, `releaseDate`');
		$this->db->from('chapterpermission');
		$this->db->where('classFK', $section);
		$this-> db ->order_by('chapterFK','asc');
		
		$query = $this->db->get();
		$dates = $query->result_array();
		
		for($i = 0; $i < Chapter_Model::NUM_CHAPTERS; $i++) {
			// Get the current chapter and places it into a new array
			$chapter = $chapters[$i]; 
			// Get the current dates of the selected chapter

			if (isset($dates[$i])){
				$currentDates = $dates[$i];

				// Add the elements to the array
				$chapter['dueDate'] = $currentDates['dueDate'];
				$chapter['releaseDate'] = $currentDates['releaseDate'];
				
			}else{
				$chapter['dueDate'] = 'none';
				$chapter['releaseDate'] = 'none';
			}

			// Append the array to the result
			$result[] = $chapter;
		}
		return $result;
	}


	function insertChapters(){
		
	}

	function getChapterDueDates($section){
		$this->db->select('`dueDate`');
		$this->db->from('chapterpermission');
		$this->db->where('classFK', $section);
		$this-> db ->order_by('chapterFK','asc');
		$query = $this->db->get();

		$result = $query->result_array();

		for ($i = 0; $i < Chapter_Model::NUM_CHAPTERS; $i++) {
			$chapterDueDates[$i] = $result[$i]['dueDate'];
			if(!isset($chapterDueDates[$i])) $chapterDueDates[$i] = '2999-12-31';
		}

		return $chapterDueDates;
	}
	function getChapterReleaseDates($section){
		$this->db->select('`releaseDate`');
		$this->db->from('chapterpermission');
		$this->db->where('classFK', $section);
		$this-> db ->order_by('chapterFK','asc');
		$query = $this->db->get();

		$result = $query->result_array();

		for ($i = 0; $i < Chapter_Model::NUM_CHAPTERS; $i++) {
			$chapterReleaseDates[$i] = $result[$i]['releaseDate'];
			if(!isset($chapterReleaseDates[$i])) $chapterReleaseDates[$i] = '1941-12-08';
		}

		return $chapterReleaseDates;
	}
	
	function viewQuestions($chapter){
		$this-> db -> select('`question`');
		$this-> db -> from('question');
		$this-> db -> where('chapterFk', $chapter);

		$query = $this->db->get();
		$result = $query->result_array();

		return $result;
	}
}
?>