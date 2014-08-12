<!DOCTYPE html>
<html>
<head>

	<?PHP $this->load->view("header"); ?>

</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	
	<div class="container">
		<div class="page-header">
			<h1><?= ' Chapter ' . $chapter; ?></h1>
		</div>
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong><?= $title; ?></strong>
				</div>
				<div class="panel-body">
					<?php echo $text;?>
				</div>
			</div>
		</div>
			<?php echo form_open('student/revised'); ?>
			<?php $nAnswer = 0; ?>
			<?php foreach($questions as $question):
				$answer = $answers[$nAnswer++];
			 ?>
			<div class="row">
				<div class="panel panel-primary">
					<div class="panel-heading"><strong><?= $question['question'] ?></strong></div>
					<div class="panel-body">
						<textarea class="form-control" rows="3" placeholder="<?= $answer ?>" name="answer<?= $nAnswer ?>" value=""> <?= $answer ?></textarea>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		
		<!--  Submit section  -->
		<div class="row">
			<div class="panel panel-default panel-warning">
				<div class="panel-heading"><strong>Warning!</strong></div>
				<div class="panel-body">
					<p>After submitting your chapter reflections, your answers will be 
						<strong>permanently</strong> saved. You will not be able to edit
						your answers afterwards.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<input type="submit" class="btn btn-success" value="Submit chapter" />
		</div>
	</div>
  </form>
</body>
</html>
