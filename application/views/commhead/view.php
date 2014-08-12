<?PHP 
$alert = '<td><span class="label label-danger">Overdue</span></td>';
$warning = '<td><span class="label label-warning">Almost</span></td>';
$done = '<td><span class="label label-success">Done</span></td>';
$none = "<td></td>";
$undo = '<span class="glyphicon glyphicon glyphicon-repeat"></span> Undo';


function isFaciHead($faciRoles){
	return in_array(0, $faciRoles) || in_array(1, $faciRoles) || in_array(2, $faciRoles) || in_array(3, $faciRoles) || in_array(4, $faciRoles) || in_array(5, $faciRoles) || in_array(6, $faciRoles);  
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
			<h1>Tasks</h1>
		</div>
		<div class="col-sm-12">
			<?PHP if (isset($newTask)) : ?>
			<div id="taskStatus" class="alert alert-success alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				The task <strong><?= $newTask['description'] ?></strong> was successfully assigned to <strong><?= $newTask['faciAssignedName'] ?></strong>.
			</div>
			<?PHP endif; ?>
			<?PHP if (isset($taskDone)) : ?>
			<div id="taskStatus" class="alert alert-success alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				The task <strong><?= $taskDone['description'] ?></strong> was marked as finished.
				<?PHP 
				$attr = array('class' => "btn btn-default btn-sm");
				echo anchor('tasks/undo_complete/' . $taskDone['pk'], $undo, $attr);
				?>
			</div>
			<?PHP endif; ?>
			<?PHP if (isset($taskDeleted)) : ?>
			<div id="taskStatus" class="alert alert-success alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				The task <strong><?= $taskDeleted['description'] ?></strong> was successfully unassigned from <strong><?= $taskDeleted['faciAssignedName'] ?></strong>.
				<?PHP 
				$attr = array('class' => "btn btn-default btn-sm");
				echo anchor('tasks/undo_delete/'.$taskDeleted['pk'], $undo, $attr);
				?>
			</div>
			<?PHP endif; ?>
		</div>

		<?PHP if(isFaciHead($faciRoles)): ?>
		<!-- Tasks you assigned -->
		<div class="col-sm-10 col-sm-offset-1">
			
			<div class="panel panel-primary">
				<div class="panel-heading">
					Delegated tasks
				</div>
				<div class="panel-body">
					<p>I can assign tasks to my committee members so that we can be effective and productive.</p>
					<?PHP if(count($tasksAssignedBy) > 0): ?>
					<div class="table-responsive">
						<table class="table table-bordered table-condensed table-responsive">
							<thead>
								<tr>
									<th>#</th>
									<th>Task</th>
									<th>Assigned to</th>
									<th class="hidden-xs">Date assigned</th>
									<th>Deadline</th>
									<th>Date Completed</th>
									<th>Action</th>
									<th>Remarks</th>
								</tr>
							</thead>
							<tbody>
								<?PHP 	$count = 0; 
								foreach ($tasksAssignedBy as $task): 
									$count++;
								?>
								<tr>
									<td><?PHP echo $count ?></td>
									<td><?PHP echo $task['description'] ?></td>
									<td><?PHP echo $task['faciAssignedName']; ?></td>
									<td class="hidden-xs"><?PHP echo $task['dateGiven'] ?></td>
									<td><?PHP echo $task['dateExpected'] ?></td>
									<td><?PHP if($task['dateCompleted'] != NULL) echo $task['dateCompleted']; ?></td>
									<td>
										<?PHP 
										$attr = array('class' => "btn btn-default btn-xs");
										$text = '<span class="glyphicon glyphicon-trash"></span> Delete';
										echo anchor('tasks/delete/' . $task['pk'], $text, $attr);
										?>
									</td>
									<?PHP 
									if ($task['status'] == 'done') echo $done;
									else if ($task['status'] == 'alert')	echo $alert;
									else if ($task['status'] == 'warning')	echo $warning;
									else echo $none;
									?>
								</tr>
								<?PHP endforeach ?>
							</tbody>
						</table>
					</div>
					<?PHP else : ?>
					<strong> You haven't assigned tasks yet. </strong>
					<?PHP endif ?>
					<div>
						<?= anchor('tasks/assign', '<button type="button" class="btn btn-primary">Assign Task</button>'); ?>
					</div>

				</div>
			</div>
		</div>
		<?PHP endif; ?>
		<!-- Tasks assigned to you -->
		<?PHP if(count($tasksAssignedTo) > 0): ?>

		<div class="col-sm-offset-1 col-sm-10">

			<!-- Tasks assigned to you -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					My tasks
				</div>
				<div class="panel-body">
					<p>These are things that I have to do before their deadline.</p>

					<div class="table-responsive">
						<table class="table table-bordered table-condensed">
							<thead>
								<tr>
									<th>#</th>
									<th>Task</th>
									<th>From</th>
									<th class="hidden-xs">Date assigned</th>
									<th>Deadline</th>
									<th>Action</th>
									<th>Remarks</th>
								</tr>
							</thead>
							<tbody>
								<?PHP $count = 0; 
								foreach ($tasksAssignedTo as $task):  
									if($task['daysLeft'] < 0) $task['status'] = 'alert'; 
								else if( $task['daysLeft'] <= 3) $task['status'] = 'warning'; 
								else $task['status'] = 'none';
								$count++;
								?>

								<tr>
									<td><?PHP echo $count ?></td>

									<td><?PHP echo $task['description'] ?></td>
									<td><?PHP echo $task['faciCreatorName']; ?></td>
									<td class="hidden-xs"><?PHP echo $task['dateGiven'] ?></td>
									<td><?PHP echo $task['dateExpected'] ?></td>
									<td>
										<?PHP 
										$attr = array('class' => "btn btn-default btn-xs");
										$text = '<span class="glyphicon glyphicon-ok"></span> Finished';
										echo anchor('tasks/complete/' . $task['pk'], $text, $attr);
										?>
									</td>
									<?PHP 
									if ($task['status'] == 'done') echo $done;
									if ($task['status'] == 'alert')	echo $alert;
									else if ($task['status'] == 'warning')	echo $warning;
									else echo $none;
									?>
								</tr>
								<?PHP endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<?PHP else: ?>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<p>You currently do not have any tasks assigned to you.</p>
					<p><?PHP echo anchor('faci', 'Return to home page', array('class' => 'btn btn-default')); ?></p>
				</div>
			</div>
		</div>
		<?PHP endif; ?>

	</div><!-- .container -->
</body>
</html>