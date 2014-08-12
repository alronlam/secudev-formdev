<?PHP
$count = count($bibleStudies);
$undo = '<span class="glyphicon glyphicon glyphicon-repeat"></span> Undo';
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
			<h1>Bible study groups</h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<?PHP if (isset($addedGroup)) : ?>
					<div id="taskStatus" class="alert alert-success alert-dismissable fade in">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						Successfully added a Bible Study Group on <strong><?= $addedGroup['book'] ?></strong>.
					</div>
					<?PHP endif; ?>
					<?PHP if (isset($updatedGroup)) : ?>
					<div id="taskStatus" class="alert alert-success alert-dismissable fade in">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						The Bible Study Group on <strong><?= $updatedGroup['book'] ?></strong> was successfully updated.
					</div>
					<?PHP endif; ?>
					<?PHP if (isset($deletedGroup)) : ?>

					<div id="taskStatus" class="alert alert-success alert-dismissable fade in">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						The Bible Study Group on <strong><?= $deletedGroup['book'] ?></strong> was successfully deleted.
						<?PHP 
						$attr = array('class' => "btn btn-default btn-sm");
						echo anchor('biblestudy/undelete/'.$deletedGroup['book'].'/'.$deletedGroup['studyLeaderId'], $undo, $attr);
						?>
					</div>
					<?PHP endif; ?>
				</div>
			</div>
			<div class="row">
				<!-- Start of bible study schedules-->
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							General Information
						</div>
						<div class="panel-body">
							
							<p><span class="label label-default center-block"><?= $count ?> FORMDEV bible study groups</span></p>
							<p><span class="label label-default center-block">25 Facilitators in formation</span></p>
							<p><span class="label label-default center-block">0 BS leaders in training</span></p>
							<div class="space"></div>
							<p>
								<?= anchor('biblestudy/add', 'Add new bible study group', array('class' => 'btn btn-primary center-block')); ?>
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-8 hidden-xs">

					<div class="panel panel-default">
						<div class="panel-heading">
							About FORMDEV Bible studies
						</div>
						<div class="panel-body">
							<p>FORMDEV bible studies are the main way of forming the students. This is through
								studying the bible led by a bible study leader. </p>
								<p>In a bible study, a group of facis read one chapter of the bible per term, 
									reflecting on two (2) chapters per week and applying a bible verse throughout 
									the week.</p>
								</div>

							</div>
						</div>
					</div>
					<div class="row">

						<?PHP
						if ($bibleStudies != "" && count($bibleStudies) > 0)
							foreach($bibleStudies as $bibleStudy):

								$id = $bibleStudy['pk'];
							$book = $bibleStudy['book'];
							$leader = $bibleStudy['faciName'];
							$members = $bibleStudy['members'];
							?>

							<div class="col-sm-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<?= "{$book} led by {$leader}"; ?>
									</div>

									<ul class="list-group">
										<?PHP 
										if ($members != "" && count($members) > 0){
											foreach ($members as $member): 
												$memberName = $member['firstName'] . " " . $member['lastName'];
											?>
											<li class="list-group-item"><?= $memberName ?> <?PHP // <span class="badge">12</span> ?></li>
											<?PHP endforeach;
										}else{ ?>
										<li class="list-group-item">No BS handles yet.</li>
										<?PHP } ?>

									</ul>
									<div class="panel-footer">
										<?PHP if($isStudentHead): 
										$attr = array('pull_right' => FALSE, 'edit' => "biblestudy/update/{$id}", 'remove' => "biblestudy/delete/{$id}");
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