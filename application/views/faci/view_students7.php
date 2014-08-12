<?PHP
$studentCount = count($students);
$numReflections = 2; // edit later 	
$question = 2;
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
			<h1>My students</h1>
		</div>
			<div class="col-sm-10 col-sm-offset-1">
			<?PHP
			if ($studentCount == 0): 
				?>
			<div class="panel panel-default">
				<div class="panel-body">
					<p>You currently do not have any students assigned to you.</p>
					<p><?PHP echo anchor('faci', 'Return to home page', array('class' => 'btn btn-default')); ?></p>
				</div>
			</div>
			<?PHP 
			endif;
			?>
			
			<div class="row">
				<div class="col-sm-2">		
					<div class = "hidden-xs">
						<ul class="nav nav-pills nav-stacked" id="studentTab">
							<?PHP  	


						$i = 0; // counter for number of students
						foreach ($students as $student){
							$name = $student['firstName'] . ' ' . $student['lastName'];
							echo "<li><a href='#student{$i}' data-toggle='tab'>{$name}</a></li>
							";	
							$i++;
						}
						?>
					</ul>
				</div>
				<?PHP if ($studentCount > 0): ?>
				<div class="visible-xs">
					<button class="btn btn-default dropdown-toggle" data-toggle="dropdown"> 
						Student <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<?PHP
						$i = 0; // counter for number of students
						foreach ($students as $student){
							$name = $student['firstName'] . ' ' . $student['lastName'];
							echo "<li><a href='#student{$i}' data-toggle='tab'>{$name}</a></li>
							";	
							$i++;
						}
						?>
					</ul>
				</div>
				<?PHP endif; ?>
			</div>
			<div class="col-sm-10">
				<div class="tab-content">
					<?PHP 
					$sID = 0;
					foreach ($students as $student):
						$answers = $student['answers'];
				// If first student, activates the div
					$isActive = ($sID == 0) ? "active" : "";
					?>
					<!-- These are the panels containing each student -->
					<div class="tab-pane <?= $isActive ?>" id="<?= "student{$sID}"?>">
						<div class="panel-group" id="<?= "reflectionsStudent{$sID}"?>">
							<?PHP
							/* Display all reflections */
							for ($rID = 1; $rID <= $numReflections; $rID++):
								/* Opens the first reflection */
							$isFirstReflection = ($rID == 1) ? "in" : "";
							$divID = "student{$sID}reflection{$rID}";
							$data_link = "#{$divID}";
							$data_parent = "#reflectionsStudent{$sID}";
							?>
							<!-- These are panels containing the reflections [question, answer, reply] -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="<?= $data_parent ?>" href="<?= $data_link ?>">Chapter <?= $rID ?></a>
								</div>

								<div id="<?= $divID ?>" class="panel-collapse collapse <?= $isFirstReflection ?>">
									<div class="panel-body">
										<?PHP
										/* Open the form */
										$attr = array('onsubmit' => 'return validate($s, $r)','class' => 'form');
										echo form_open('faci/faciReply', $attr); 

									$qID = 0;  // Counter for the number of questions
									
									foreach ($answers as $reflectionData):
										$question = $reflectionData['question'];
									$answer = $reflectionData['answer'];
									$reply = $reflectionData['reply'];
									$reflectionDataID = $reflectionData['pk'];


									if($reflectionData['chapterFk'] == $rID):
										echo form_hidden('answerPk', $reflectionDataID);


									?>
									<p>
										<strong><?= $question ?></strong>
									</p>
									<div class="well well-sm">
										<strong><?= 'Answer: ' ?></strong><?= $answer?>
									</div>

									<div class="form-group">
										<label>Faci's reply</label>
										<textarea class="form-control" rows="3" name="<?= $reflectionData['pk'] ?>" required><?= $reply ?></textarea>
									</div>

									<?PHP $qID++ ?>	
									<?PHP endif ?>
									<?PHP endforeach; // for each answer ?>

									<?PHP if ($qID != 0): ?>
									<button type="submit" class="btn btn-submit btn-success">Save</button>
									<?PHP else: ?><div class="alert alert-danger">
									<p>Student did not answer this yet! </p>
									<a href="#" class="alert-link">Remind student?</a>
								</div>
								<?PHP
								endif;
								echo form_close();
								?>

							</div> <!-- panel-body -->
						</div> <!-- student#reflection# -->
					</div> <!-- panel -->
				</div> <!-- panel-group -->
				<?PHP
					endfor; // for each reflection 
					
					$sID++;
					endforeach; // for each student
					?>
				</div> <!-- tab-pane -->
			</div><!-- tab-content -->
		</div>
	</div>
</div> <!--col-md-12-->

<script type="text/javascript">
function validate (s, r) {

}

</script>

</div> <!--container-->

</body>
</html>	