<?PHP
$edit = '<span class="glyphicon glyphicon-pencil"></span> ';
$remove = '<span class="glyphicon glyphicon-remove"></span> ';

// evaluate
$isStudentAdmin = true;

$shownEntries = 3;
?>

<!DOCTYPE html>
<html>
<head>
	
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view('navigation'); ?>
	<?PHP $this->load->view('carousel'); ?>
	<div class="container">
		<!-- Welcome -->
		

		<!-- Announcements -->
		<div class="page-header">
			<h1>Information just for you!</h1>
		</div>
		
		<div class= "row">
			<div class="col-sm-4">
				<?php
				$noOfAnnouncements = count($announcements);
				if($noOfAnnouncements == 0):
				?>
					<div class="panel panel-info">
						<div class="panel-heading">There are no new announcements 
						</div>
					</div>
				<?php else: ?>
					<div class="panel panel-info">
						<div class="panel-heading">
							<i class="glyphicon glyphicon-bullhorn"></i>
							Announcements
							<span class="badge"><?php echo $noOfAnnouncements?></span>
							<?PHP
							echo anchor('announcement', 'View All', array('class' => 'btn btn-info pull-right btn-xs'));
							?>
						</div>
						<div class="list-group">
							<?php 
							for($i = 0; $i < $shownEntries && $i < $noOfAnnouncements; $i++)
								echo "<a href=\"#\" class=\"list-group-item\">".$announcements[$i]['announcement']."</a>";
							?>
						</div>
					</div>
				<?php endif; ?>				
			</div>
			<div class="col-sm-4">
				<?php
				$noOfEvents = count($events);
				if($noOfEvents == 0):
				?>
					<div class="panel panel-info">
						<div class="panel-heading">There are no new events
						</div>
					</div>
				<?php else: ?>
					<div class="panel panel-info">
						<div class="panel-heading">
							<i class="glyphicon glyphicon-star"></i>
							Events
							<span class="badge"><?php echo $noOfEvents?></span>
							<?PHP
							echo anchor('event', 'View All', array('class' => 'btn btn-info pull-right btn-xs'));
							?>
						</div>
						<div class="list-group">
							<?php 
							for($i = 0; $i < $shownEntries && $i < $noOfEvents; $i++)
								echo "<a href=\"#\" class=\"list-group-item\">".$events[$i]['event']."</a>";
							?>
						</div>
					</div>
				<?php endif; ?>				
			</div>
			<div class="col-sm-4">
				<?php
				$noOfOutreach = count($outreach);
				if($noOfOutreach == 0):
				?>
					<div class="panel panel-info">
						<div class="panel-heading">There are no new outreach activities
						</div>
					</div>
				<?php else: ?>
					<div class="panel panel-info">
						<div class="panel-heading">
							<i class="glyphicon glyphicon-road"></i>
							Outreach Activities
							<span class="badge"><?php echo $noOfOutreach?></span>
							<?PHP
							echo anchor('outreach', 'View All', array('class' => 'btn btn-info pull-right btn-xs'));
							?>
						</div>
						<div class="list-group">
							<?php 
							for($i = 0; $i < $shownEntries && $i < $noOfOutreach; $i++)
								echo "<a href=\"#\" class=\"list-group-item\">".$outreach[$i]['title']."</a>";
							?>
						</div>
					</div>
				<?php endif; ?>				
			</div>
		</div>
		
		<!--<?PHP foreach($announcements as $announcement): ?>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?PHP echo $announcement['announcement']; ?>

				</div>
				<div class="panel-body">
					<?PHP echo anchor('announcement', 'More', array('class' => 'btn btn-default btn-xs pull-right')); ?>
					<?PHP echo $announcement['description']; ?>

				</div>
			</div>
		</div>
		<?PHP endforeach; ?>
		-->

<div class="page-header">
			<!--<h1>About us</h1> isnt this a bit weird since the log in is under about us-->
		</div>
		<div class="col-sm-5 col-sm-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
					What is FORMDEV?
				</div>
				<div id="about-section" class="panel-body">

					<p>
						<strong>FORMDEV</strong> is a special <strong>program and community</strong> of volunteer faculty, 
						staff, alumni, and students of the College of Computer Studies (CCS) of De La Salle University (DLSU).
					</p>
					<p class="more-section" style="display: none">
						The mission of FORMDEV is to proclaim and demonstrate the Lasallian and Gospel values of <strong>faith,
						zeal, and love,</strong> especially for one’s <em>community and for the poor</em>.

						You can read more about FORMDEV from the <strong>FORMDEV Handbook</strong>, which tells the story of FORMDEV,
						explains the Lasallian values that FORMDEV focuses on, specifies the duties of FORMDEV facis, and lists all 
						the facis of FORMDEV, past and present.
					</p>
					<p>
						<button type='button' id="more" class='btn btn-primary btn-md'>Read more</button>
						<?PHP 
						echo anchor('media/downloads', 'Download the handbook', array('class' => 'more-section btn btn-default btn-md', 'style' => 'display: none'));
						?>
					</p>
				</div>
			</div>
		</div>

		<?PHP if ($this->account_model->getAccount() == false): ?>
		<!-- Log in -->
		<div class="col-sm-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Welcome back!
				</div>
				<div class="panel-body">
					<?PHP 
					$attr = array('class' => 'form-horizontal');
					echo form_open('verifylogin', $attr); ?>
					<div class="form-group">
						<label for="username" class="col-sm-3 control-label">Username</label>
						<div class="col-sm-9">
							<input class="form-control" type="text" id="username" name="username" required/>
						</div>

					</div>
					<div class="form-group">
						<label for="password" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-9">
							<input class="form-control" type="password" id="password" name="password" required/>
						</div>
					</div>
					<div class="pull-right">
						<input class="btn btn-primary" type="submit" value="Login" />
						<?php echo anchor('account/forgot', 'Forgot password?', array('class' => 'btn btn-default')); ?>
					</div>
					<?PHP form_close(); ?>
				</div>
			</div>
		</div>
		<?PHP endif; ?>
		

	</div><!-- .container -->
	<script type="text/javascript">
	$( "#more" ).click(function() {
		$( ".more-section" ).toggle("fast", function(){
			if ($("#more").text() == 'Read less')
				$("#more").text('Read more');
			else
				$("#more").text('Read less');
		});
	});

	</script>
</body>
</html>