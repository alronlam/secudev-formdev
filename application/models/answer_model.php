<?php
class Answer_Model extends CI_Model {
	const NUM_CHAPTERS = 8;
	const CHAPTER_TABLE = 'chapter';
	const ANSWER_TABLE = 'answer';
	const QUESTION_TABLE = 'question';
	

	function getAnswersAndReplies($studentID, $chapter){
		$this->db->select(Answer_Model::QUESTION_TABLE . '.`pk` as question_id, `question`, `answer`, `reply`, `dateAnswered`, `dateReplied`, `dateOpened`, `chapterFk`');
		$this->db->from(Answer_Model::ANSWER_TABLE);
		$this->db->join(Answer_Model::QUESTION_TABLE, Answer_Model::ANSWER_TABLE . '.questionFK = ' . Answer_Model::QUESTION_TABLE . '.pk');
		$this->db->where('studentID', $studentID);
		$this->db->where('chapterFk', $chapter);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		return false;
	}

	function getUnrepliedAnswers($faciID){
		$this->load->model('group_model');
		$students = $this->group_model->getStudentsOf($faciID);
		//query from answer where studentid in students, and reply == NULL
		$answers = array();

		foreach($students as $student){
			$this->db->select('*');
			$this->db->from('answer');
			$this->db->where('studentId', $student['id']);
			$this->db->where('reply', NULL);
			$query = $this->db->get();
			if($query->num_rows > 0)
				$answers[] = $query->row_array();
		}
		return $answers;
	}

	// old 
	// function studentAnswer($studentID){
	// 	$this->db->select('`answer.pk`, `question`,`answer`, `reply`, `dateAnswered`, `dateReplied`, `dateOpened`, `chapterFk`');
	// 	$this->db->from(Answer_Model::ANSWER_TABLE);
	// 	$this->db->where('studentID', $studentID);
	// 	$this->db->join('question', 'answer.questionFK = question.pk');
	// 	$this->db->order_by('chapterFk');
		
	// 	$query = $this->db->get();
	// 	$result = $query->result_array();

	// 	return $result;

	// }

	function getAllAnswersAndReplies($studentID){
		$this->db->select('`answer.pk`, `question`, `answer`, `reply`, `dateAnswered`, `dateReplied`, `dateOpened`, `chapterFk`');
		$this->db->from(Answer_Model::ANSWER_TABLE);
		$this->db->join(Answer_Model::QUESTION_TABLE, Answer_Model::ANSWER_TABLE . '.questionFK = ' . Answer_Model::QUESTION_TABLE . '.pk');
		$this->db->where('studentID', $studentID);
		$this->db->order_by('chapterFk', 'asc');
		$query = $this->db->get();
		$result = $query -> result();
		
		$answers = array();
		foreach ($result as $row) {
			$answer = array(
				'pk' => $row -> pk,
				'question' => $row -> question,
				'answer' => $row -> answer,
				'reply' => $row -> reply,
				'dateAnswered' => $row -> dateAnswered,
				'dateReplied' => $row -> dateReplied,
				'dateOpened' => $row -> dateOpened,
				'chapterFk' => $row -> chapterFk
			);
			$answers[] = $answer;
		}
		
		return $answers;
	}

	function getQuestions($chapter){
		$this->db->select('`pk`, `question`');
		$this->db->from(Answer_Model::QUESTION_TABLE);
		$this->db->where('chapterFk', $chapter);
		$query = $this -> db -> get();
		if ($query -> num_rows() > 0)
			return $query -> result_array();
		return false;
	}

	function insertChapterAnswers($chapter, $answer, $questionID, $studentID, $faciID){
		$this-> db -> where('id', $studentID);
		$query = $this->db->get('answer');
		$this -> db -> set('pk', $studentID.$chapter.$questionID);
		$this -> db -> set('date_answered', date('Y-m-d'));
		$this -> db -> set('studentID', $studentID);
		return $this -> db -> insert('answer');
	}

	function getAnswerID($studentID, $faciID, $questionID){
		$this -> db -> select('pk');
		$this -> db -> from(Answer_Model::ANSWER_TABLE);
		$this -> db -> where('questionFk', $questionID);
		$this -> db -> where('faciId', $faciID);
		$this -> db -> where('studentId', $studentID);

		$query = $this -> db -> get();
		if ($query->num_rows() > 0)
			return $query -> row() -> pk;
		return false;
	}

	function update($studentID, $faciID, $chapter, $answers){
		foreach ($answers as $questionID => $answer){
			if ($answerID = $this->getAnswerID($studentID,$faciID, $questionID))
				$this->_updateOne($answerID, $answer);
			else
				$this->_insertOne($studentID, $faciID, $questionID, $chapter, $answer);
		}
	}

	function _updateOne($answerID, $answer){
		$data = array(
			'answer' => $answer,
			'dateAnswered' => date('Y-m-d'),
			);

		$this -> db -> where('pk', $answerID);
		$this -> db -> update('answer', $data); 
	}

	function isCorrectQuestionToChapter($questionFk, $chapter){
		return TRUE;
	}

	function _insertOne($studentID, $faciID, $questionID, $chapter, $answer){
		if ($this->isCorrectQuestionToChapter($questionID, $chapter) == false) return false;
		$answer = trim($answer);
		if (strlen($answer) == 0) return false;
		$data = array(
			'answer' => $answer,
			'faciId' => $faciID,
			'studentId' => $studentID,
			'questionFk' => $questionID,
			'dateAnswered' => date('Y-m-d'),
			);

		$this -> db -> insert(Answer_Model::ANSWER_TABLE, $data); 
	}

	function insertFaciReply($replies) {
		foreach($replies as $answerPk => $reply){
			$data = array(
			'reply' => $reply,
			'faciId' => $this -> session -> userdata('id'),
			);
			$this -> db -> where('pk', $answerPk);
			$this -> db -> update(Answer_Model::ANSWER_TABLE, $data);	
		}
	}
}
?>