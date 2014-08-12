<!DOCTYPE html>
<html>
<head>

	<?PHP 
	$this->load->view("header"); 
	$shownEntries = 3;
	?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Home - Dashboard</h1>
		</div>
		
		
		<div class= "row">
			<div class="col-sm-6">
				<?php
				$noOfTasks = count($tasks);
				if($noOfTasks == 0):
				?>
					<div class="panel panel-success">
						<div class="panel-heading">You have no tasks to do.
						</div>
					</div>
				<?php else: ?>
					<div class="panel panel-danger">
						<div class="panel-heading">
							<i class="glyphicon glyphicon-check"></i>
							Assigned Tasks 
							<span class="badge"><?php echo $noOfTasks ?></span>
							<?PHP
							echo anchor('tasks', 'Go to Tasks Page', array('class' => 'btn btn-danger pull-right btn-xs'));
							?> 
						</div>
						<div class="list-group">
							<?php 
							for($i = 0; $i < $shownEntries && $i < $noOfTasks; $i++)
								echo "<a href=\"#\" class=\"list-group-item\">".$tasks[$i]['description']."</a>";
							?>
						</div>
						</div>
				<?php endif; ?>
			</div>
			<div class="col-sm-6">
				<?php
				$noOfWorkbooks = count($answers);
				if($noOfWorkbooks == 0):
				?>
					<div class="panel panel-success">
						<div class="panel-heading">You have no workbooks to reply to.
						</div>
					</div>
				<?php else: ?>
					<div class="panel panel-warning">
						<div class="panel-heading">
							<i class="glyphicon glyphicon-book"></i>
							Pending Workbooks 
							<span class="badge"><?php echo $noOfWorkbooks ?></span>
							<?PHP
							echo anchor('faci/students', 'Go to Workbooks Page', array('class' => 'btn btn-warning pull-right btn-xs'));
							?> 
						</div>
						<div class="list-group">
							<?php 
							for($i = 0; $i < $shownEntries && $i < $noOfWorkbooks; $i++)
								echo "<a href=\"#\" class=\"list-group-item\">".$students[$i]->lastName.", ".$students[$i]->firstName."</a>";
							?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
		
		<div class="page-header">
		</div>
		
		<!-- Announcements -->
		<div class= "row">
			<div class="col-sm-4">
				<?php
				$noOfAnnouncements = count($announcements);
				if($noOfAnnouncements == 0):
				?>
					<div class="panel panel-info">
						<div class="panel-heading">There are no new announcements.
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
						<div class="panel-heading">There are no new events.
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
						<div class="panel-heading">There are no new outreach activities.
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
		
		<!--

			<?PHP foreach($announcements as $announcement): ?>
			<div class="col-sm-3">
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
		
			<!--
			<div class="page-header">
				<h1>Dashboard</h1>
			</div>
			
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="alert alert-warning">
						<p>
							<span class="label label-warning">3 workbooks</span>
							You have not yet replied to your handle/s. Click here to 
							<?PHP
							echo anchor('faci/students', 'reply', 'class="btn btn-sm btn-warning"');
							?> to your handles.
						</p>
					</div>
					<div class="alert alert-info">
						<p>
							<span class="label label-info">2 tasks</span>
							You have some task/s assigned to you due in X days. Click here to
						<?PHP
						echo anchor('tasks', 'view', array('class' => 'btn btn-sm btn-info'));
						?> your tasks now.</p>
					</div>
					<div class="alert alert-danger">
						<p>
							<span class="label label-danger">attendance</span> 
							You have missed 1/3 of your attendance in Bible Study!
						</p>
					</div>
					<div class="alert alert-success">
						<p>
							<span class="label label-success">5 birthdays</span> 
							Darren, Bobby, and three others are celebrating their birthday this month.
						</p>
					</div>
					
				</div>
			</div>
			-->
		
	</div><!-- .container -->
</body>
</html>