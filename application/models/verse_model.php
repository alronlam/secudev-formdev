<?php
class Verse_Model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

	public function newVerse()//$book, $chapter, $verse)
	{
		// insert into verse
		$data = array(
  		'book' => $this->input->post('bookInput') ,
   		'chapter' => $this->input->post('chapterInput') ,
	   	'verse' => $this->input->post('verseInput') ,
	   	'application' => $this->input->post('applicationInput')
		);

		$this->db->insert('verse', $data);

		// if this week already has a verse, delete it and replace it with this one
		$id = $this->db->insert_id();
		$week = date("Y-m-d", strtotime("last Sunday"));

		$this->db->where('week', $week);
		$this->db->delete('verseoftheweek');

		// reflect changes in verseoftheweek
		$data = array(
			'versefk' => $id ,
			'week' => $week
		);

		$this->db->insert('verseoftheweek', $data);
	}

    // functions below this comment line are not tested/incomplete
	public function retrieveVerseOfTheWeek()
	{
		$this->db->select('versefk');
		$week = date("Y-m-d", strtotime("last Sunday"));
		$this->db->where('week', $week);
		$results = $this->db->get('verseoftheweek')->result();

		// not sure what i should return here, but for now:
		// returns an empty array if no verse of the week
		// pero if meron, returns array with one element(id, elementset)
		return $results;
	}
	
	public function updateVerse()//$id, $newBook, $newChapter, $newVerse)
	{	
		//$id = $this->input->post('id');

		$data = array(
  		'book' => $this->input->post('bookInput') ,
   		'chapter' => $this->input->post('chapterInput') ,
	   	'verse' => $this->input->post('verseInput') ,
	   	'application' => $this->input->post('applicationInput')
		);

		$this->db->where('pk', $id);
		$this->db->update('verse', $data);
	}

	// unsure if this should be a flagged delete (isDeleted w/e)
	public function deleteVerse($id)
	{
		$this->db->where('pk', $id);
		$this->db->delete('verse');
	}
}
?>