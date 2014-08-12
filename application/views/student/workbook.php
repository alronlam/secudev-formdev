<?PHP
// New implementation
$formdev_logo_image_attr = array(
	'src' => 'img/logo.png',
	'alt' => '150x150',
	'data-src' => 'holder.js/150x150',
	'width' => '150',
	'height' => '150'
	);
$formdev_logo_image = img($formdev_logo_image_attr);

function getChapterGlyphicon($due, $release, $hasReply, $hasAnswer, $offset){ 
	$link = $offset + 1; // Visually display numbers starting from 1
	$datenow = strtotime(date('Y-m-d'));
	// Convert the dates into unix time - measured in seconds
	$releaseUnix = strtotime(date('Y-m-d')); //strtotime($release);
	$dueUnix = strtotime(date('Y-m-d')); // strtotime($due);

	/* No permissions set yet, permanently locked */
	if ($due == 'none'){
		echo '<button type="button" class="btn btn-default disabled">';
		echo '<span class="glyphicon glyphicon-ban-circle"></span> Locked'; 
		echo '</button>';
		return;
	}

	/* There are permissions set, just not allowed for now. Tells handle to wait. */
	if($releaseUnix > $datenow){
		echo '<button type="button" class="btn btn-default disabled">';
		echo '<span class="glyphicon glyphicon-ban-circle"></span> Locked until '; 
		echo $release;
		echo '</button>';
		return;
	}

	/* Has been replied to by your faci */
	if($hasReply){
		echo '<button type="button" class="btn btn-default disabled">';
		echo '<span class="glyphicon glyphicon-star"></span> Graded';
		echo '</button>';
		echo anchor('student/replied/'.$link, 'Read Feedback', 'class="btn btn-primary"'); 
		return;
	}

	if ($hasAnswer){
		echo '<button type="button" class="btn btn-default disabled">';
		echo '<span class="glyphicon glyphicon-time"></span> Due: ';
		echo $due;
		echo '</button>';
		echo anchor('student/chapter/'.$link, 'Revise answers', 'class="btn btn-info"'); 
	}else

	/* You need to answer it */
	if($dueUnix > $datenow){
		echo '<button type="button" class="btn btn-default disabled">';
		echo '<span class="glyphicon glyphicon-time"></span> Due: ';
		echo $due;
		echo '</button>';
		echo anchor('student/chapter/'.$link, 'Answer', 'class="btn btn-primary"'); 
	}

	/* You're late */
	else if ($dueUnix <= $datenow){ 
		echo '<button type="button" class="btn btn-default disabled">';
		echo '<span class="glyphicon glyphicon-ban-circle"></span> Late: ';
		echo $due;
		echo '</button>';
		echo anchor('student/chapter/'.$link, 'Answer', 'class="btn btn-primary"'); 
	}
	/* You may change your answers */
	else if($hasReply == false){
		echo '<button type="button" class="btn btn-default disabled">';
		echo '<span class="glyphicon glyphicon-star"></span> Completed';
		echo '</button>';
		echo anchor('student/chapter/'.$link, 'Revise Answers', 'class="btn btn-primary"'); 
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Workbook: The Work Is Yours</h1>
		</div>
		<?PHP 
		$this->load->helper('text');

		/* Begin looping over the chapters */
		for($i = 0; $i < Chapter_Model::NUM_CHAPTERS; $i++):

			/* Prepare the data for displaying */
		$chapter = $chapterInformation[$i];

		$title = $chapter['title'];
		$story = $chapter['story'];
		// Preview at least 25 words
		$storyPreview = word_limiter($story, 25);
		$dueDate = $chapter['dueDate'];
		$releaseDate = $chapter['releaseDate'];


		$hasReply = false;
		$hasAnswer = false;

		/* The answers */
		if ($answers)
			foreach ($answers as $answer) {
				if ($answer['chapterFk'] == $i + 1){
					if ($answer['answer'] != ""){
						$hasAnswer = true;
						break;
					}
				}
			}


		/* Divide the workbook into rows, containing three chapters */
		$dividedBy = 4;

		$div = 12 / $dividedBy;
		$shouldStartRow = $i % $dividedBy == 0;
		$shouldEndRow = $i % $dividedBy == $dividedBy - 1;
		if ($shouldStartRow) echo "<div class='row'>";

		/* Begin iteration over all chapters */
		?>
		<div class="col-md-<?= $div ?>">
			<div class="panel panel-default">
				<div class="panel-heading"><strong> Chapter <?= $i + 1 ?></strong> <?= $title ?> </div>
				<div class="panel-body">
					<?= $formdev_logo_image ?>
					<div class="caption">
						<p><?= $storyPreview ?></p>
					</div>
				</div>
				<div class="panel-footer">
					<div class="btn-group btn-group-vertical center-block">
						<?PHP getChapterGlyphicon($dueDate, $releaseDate, $hasReply, $hasAnswer, $i);?>
					</div>
				</div>
			</div>
		</div>

		<?PHP 
		if ($shouldEndRow) echo "</div>";
		endfor;
		?>
	</div><!-- .container -->

</body>
</html>