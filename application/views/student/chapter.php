<!DOCTYPE html>
<html>
<head>

	<?PHP $this->load->view("header"); ?>

</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1><?= ' Chapter ' . $chapter -> pk; ?></h1>
		</div>
		<div class="row">
			<?PHP if (isset($saved)): ?>
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Success!</strong> Your changes have been saved.
			</div>
			<?PHP endif; ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong><?= $chapter -> title; ?></strong>
				</div>
				<div class="panel-body">
					<?PHP echo $chapter -> story;?>
				</div>
			</div>
		</div>
		<?PHP echo form_open('student/chapter/' . $chapter -> pk); ?>
		<?PHP for($i = 0; $i < count($questions); $i++):
			$question = $questions[$i];

			if ($answers && array_key_exists($i, $answers)){
				$answer = $answers[$i];
				$hasAnswered = isset($answer['answer']);
				if ($hasAnswered) $handleAnswer = $answer['answer'];
				$hasReplied = isset($answer['reply']);
				if ($hasReplied) $faciReply = $answer['reply'];
			}else{
				$hasAnswered = false;
				$hasReplied = false;
			}

			?>
			<div class="row">
				<div class="panel panel-primary">
					<div class="panel-heading"><strong><?= $question['question'] ?></strong></div>
					<div class="panel-body">
						<textarea class="form-control" rows="3" name="<?= $question['pk'] ?>"><?PHP if ($hasAnswered) echo $handleAnswer; ?></textarea>
					</div>
				</div>
			</div>
			<?PHP if ($hasReplied): ?>
			<div class="row">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h3 class="panel-title">Faci Reply</h3>
					</div>
					<div class="panel-body">
						<?= $faciReply ?>
					</div>
				</div>
			</div>
			<?PHP endif; ?>
		<?PHP endfor; ?>

		<!--  Submit section  -->
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<input type="submit" class="btn btn-success btn-block" value="Submit chapter" />
					</div>
				</div>
				
			</div>
		</div>
	</form>
</div>
</body>
</html>