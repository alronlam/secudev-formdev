<?PHP
$count = count($classes);
$undo = '<span class="glyphicon glyphicon glyphicon-repeat"></span> Undo';
$add = 'enroll'
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
			<h1>FORMDEV classes</h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="row">
				<?PHP if (isset($addedClass)) : ?>
				<div id="taskStatus" class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Successfully added section <strong><?= $addedClass['section'] ?></strong>. Click here to <?PHP 
					$attr = array('class' => "btn btn-primary btn-xs");
					$sec = "";
					if (isset($addedClass['section']))
						$sec = $addedClass['section'];

					echo anchor('admin/student_batch/' . $sec, $add, $attr);
					?> the FORMDEV class.
				</div>
				<?PHP endif; ?>
				<?PHP if (isset($editedClass)) : ?>
				<div id="taskStatus" class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Section <strong><?= $editedClass['section'] ?></strong> was successfully updated.

				</div>
				<?PHP endif; ?>
				<?PHP if (isset($deletedClass)) : ?>

				<div id="taskStatus" class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Section <strong><?= $deletedClass['section'] ?></strong> was successfully deleted.
					<?PHP 
					$attr = array('class' => "btn btn-default btn-sm");
					echo anchor('admin/undeleteClass/'.$deletedClass['section'].'/'.$deletedClass['venue'].'/'.$deletedClass['day'].'/'.$deletedClass['timeStart'].'/'.$deletedClass['timeEnd'].'/'.$deletedClass['classFaciId'], $undo, $attr);
					?>
				</div>
				<?PHP endif; ?>
			</div>

			<!-- Start of class schedules-->
			<div class="row">
				<div class="col-sm-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							General Information
						</div>
						<div class="panel-body">
							<p><span class="label label-default center-block"><?= $count ?> FORMDEV classes</span></p>
							<p><span class="label label-default center-block">25 Facilitators serving</span></p>
							<p><span class="label label-default center-block">0 class facis in training</span></p>
							<div class="space"></div>
							<p>
								<?= anchor('admin/addClass', 'Add new FORMDEV class', array('class' => 'btn btn-primary center-block')); ?>
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-8 hidden-xs">

					<div class="panel panel-default">
						<div class="panel-heading">
							FORMDEV Classes management
						</div>
						<div class="panel-body">
							<p>As the student head, you need to manage which facis go to which FORMDEV classes.</p>
							<p>Some considerations are the facis' schedule, the number of students for the class,
								and preference.</p>
							</div>

						</div>
					</div>
				</div>
				<div class="row">
				<?PHP foreach($classes as $class):
				$id = $class['pk'];
				$section = $class['section'];
				$faciGroupLeader = $class['classFaciName'];
				$groups = $class['groups'];
				?>
				<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<?= "{$section} - {$faciGroupLeader}" ?>

							
						</div>
						<div class="list-group">
							<?PHP
							if ($groups != "" && count($groups) > 0){
								foreach ($groups as $group): 
									$faci = $group['faci'];
								$firstname = $faci -> firstName;
								$lastname = $faci -> lastName;
								?>
								<a href="#" class="list-group-item"><?= "{$firstname} {$lastname}" ?></a>
								<?PHP endforeach;
							}else{ ?>
							<a href="" class="list-group-item">None yet</a>
							<?PHP } ?>
						</div>
						<div class="panel-footer">
							<p>
								<strong>Schedule:</strong> <?= $class['day'].' '.$class['timeStart'].'-'. $class['timeEnd']?>
							</p>
							<?PHP if($isStudentHead): 
							echo anchor('admin/student_batch/'.$class['section'], '<span class="glyphicon glyphicon-plus"></span>', array('class' => 'btn btn-primary btn-xs')).' ';
							$attr = array('pull_right' => FALSE,'edit' => "admin/editClass/{$id}", 'remove' => "admin/deleteClass/{$id}");
							$this->load->view('common/edit_options', $attr);
							endif; ?>
						</div>
					</div>
				</div>
				<?PHP endforeach ?>
				</div>
			</div>
		</div><!-- .container -->
	</body>
	</html>