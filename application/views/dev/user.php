<?PHP
$image_properties = array(
	'src' => 'img/logo.png',
	'width' => '100',
	'height' => '100',
	);
$logo = img($image_properties);
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
			<h1>Developer Tools <small>Change user type</small></h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="row">
				<?PHP if (isset($changed) && $changed): ?>
				<div class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Success!</strong> You successfully changed your user type to <?= $this->faci_account_model->myRoles(); ?>.
				</div>
				<?PHP elseif (isset($faciRoles)): ?>
				<div class="alert alert-info alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					You are currently logged in as a <?= $this->faci_account_model->myRoles(); ?>.
				</div>
				<?PHP endif; ?>
				<div class="panel panel-default">
					<div class="media">
						<?php echo anchor('dev/user/0', $logo, 'class="pull-left"'); ?>
						<div class="media-body">
							<h3 class="media-heading">Student Head</h3>
							<p>The current Student Head of FORMDEV is Kevin Panuelos, whose work is mostly managing the committees, updating bible study and class information, and more.</p>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="media">
						<?php echo anchor('dev/user/1', $logo, 'class="pull-left"'); ?>
						<div class="media-body">
							<h3 class="media-heading">Class Facilitator</h3>
							<p>Class facilitators are the leaders of the FORMDEV class. They have team of facilitators managing a group of students taking FORMDEV (handles).</p>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="media">
						<?php echo anchor('dev/user/2', $logo, 'class="pull-left"'); ?>
						<div class="media-body">
							<h3 class="media-heading">Bible Study Leader</h3>
							<p>Bible study leaders are the ones in charge of the formation of the facilitators. They are also the ones leading the bible study sessions. Majority
								of their uses of the website is to record attendance.
							</p>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="media">
						<?php echo anchor('dev/user/3', $logo, 'class="pull-left"'); ?>
						<div class="media-body">
							<h3 class="media-heading">Outreach Head</h3>
							<p>
								<b>Outreach head has the additional task of recording the attendances of facilitators for the faci outreach.</b>
								Committee heads can assign tasks to facilitators under their committee. This reflects under facis responsibilities.
							</p>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="media">
						<?php echo anchor('dev/user/4', $logo, 'class="pull-left"'); ?>
						<div class="media-body">
							<h3 class="media-heading">IMC Head</h3>
							<p>Committee heads can assign tasks to facilitators under their committee. This reflects under facis responsibilities.</p>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="media">
						<?php echo anchor('dev/user/5', $logo, 'class="pull-left"'); ?>
						<div class="media-body">
							<h3 class="media-heading">Communications Head</h3>
							<p>Committee heads can assign tasks to facilitators under their committee. This reflects under facis responsibilities.</p>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="media">
						<?php echo anchor('dev/user/6', $logo, 'class="pull-left"'); ?>
						<div class="media-body">
							<h3 class="media-heading">Monitoring Head</h3>
							<p>Committee heads can assign tasks to facilitators under their committee. This reflects under facis responsibilities.</p>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="media">
						<?php echo anchor('dev/user/7', $logo, 'class="pull-left"'); ?>
						<div class="media-body">
							<h3 class="media-heading">Facilitator</h3>
							<p>Facilitators can be informed of their responsibilities through their dashboard, and majority of their work such as workbook reflection checking is 
								now accomplished through the website.</p>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="media">
							<?php echo anchor('dev/user/8', $logo, 'class="pull-left"'); ?>
							<div class="media-body">
								<h3 class="media-heading">Student</h3>
								<p>Students can answer their reflections and view their current class standing.</p>
							</div>
						</div>
					</div><!-- .container -->
				</div>
			</div>
		</div>
	</body>
	</html>