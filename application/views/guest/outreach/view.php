<?PHP
if ($faciRoles)
	$isOutreachHead = in_array(3, $faciRoles);
else
	$isOutreachHead = FALSE;
?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.min.js"></script>
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<?PHP $this->load->view("carousel"); ?>
	<div class="container">
		<div class="page-header">
			<h1>
				<?PHP 
				$button = "<span class='glyphicon glyphicon-plus'></span>";
				if ($isOutreachHead)
					echo anchor('outreach/add', $button, array('class' => 'btn btn-primary btn-md pull-right'));
				?>
				Outreach activities</h1>
			</div>
			
			<div class="col-sm-12">
				<?PHP if (isset($newActivity)) : ?>
				<div id="taskStatus" class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					The activity <em><?= $newActivity['title'] ?></em> was added successfully.
				</div>
				<?PHP endif; ?>
				<?PHP if (isset($editedActivity)) : ?>
				<div id="taskStatus" class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					The activity <em><?= $editedActivity['title'] ?></em> was edited successfully.
				</div>
				<?PHP endif; ?>
				<?PHP if (isset($deletedActivity)) : 
				$options = array(
					'link' => 'outreach/undelete/',
					'id' => $deletedActivity['pk']
					);
					?>
					<div id="activityStatus" class="alert alert-success alert-dismissable fade in">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Success!</strong>
						The outreach activity <em><?= $deletedActivity['title'] ?></em> was deleted successfully. Click <?PHP $this->load->view('common/undo_option', $options); ?> to revert changes.

					</div>
					<?PHP endif; ?>
				</div>

				<?PHP if(count($activities) > 0): ?>
				<div class="col-sm-10 col-sm-offset-1">
					<?PHP foreach ($activities as $activity): ?>
					<div class="col-sm-6">
						<div class="panel panel-default">

							<div class="panel-heading">
									<?= $activity['title'] ?>
							</div>
							<div class="panel-body">
								<p>
									<?= $activity['description'] ?>
								</p>
								<p><em>Led by <?= $activity['ledByFaciName'] ?> </em></p>
							</div>
							<?PHP if ($isOutreachHead): ?>
							<div class="panel-footer">
								<?PHP
								// If is the outreach committee head
								$options = array(
									'pull_right' => FALSE,
									'edit' => 'outreach/edit/'.$activity['pk'],
									'remove' => 'outreach/delete/'.$activity['pk']);
								$this->load->view('common/edit_options', $options);
								?>
							</div>
							<?PHP endif; ?>
						</div>
					</div>
					<?PHP endforeach; ?>
				</div>
				<?PHP else: ?>
				<div class="col-sm-10 col-sm-offset-1">
					<div class="panel panel-default">
						<div class="panel-body">
							There were no outreach activities found.
						</div>
					</div>
				</div>
				<?PHP endif; ?>
			</div>
		</div>

	</body>
	</html>