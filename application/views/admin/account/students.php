<!DOCTYPE html>
<html>
<head>
	<?PHP $this->load->view("header"); ?>
</head>
<body>

	<?PHP $this->load->view("navigation"); ?>
	
	<div class="container">
		<div class="page-header">
			<h1>Account management</h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<?PHP $this->load->view("admin/account/navigation"); ?>
		</div>
		<div class="page-header">
			<h1>Students</h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">

			<?PHP foreach ($sections as $key => $students): ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					Class <?PHP echo $key; ?> <small><?php echo ' (' . count($students). ' students)'; ?></small>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="col-sm-2">ID number</th>
								<th class="col-sm-4">Student name</th>
								<th class="col-sm-6 hidden-xs">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?PHP 
							foreach ($students as $student):
							 ?>
							<tr>
								<td><?PHP echo $student['id']; ?></td>
								<td><?PHP echo $student['firstName'] . " " . $student['lastName'] ?></td>
								<td class="hidden-xs">
									<?PHP echo anchor('', 'Modify account', array('class' => 'btn btn-primary btn-xs')); ?>
									<!--<?PHP //echo anchor('', 'Remind tasks', array('class' => 'btn btn-warning btn-xs')); ?>-->
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	<?php endforeach; ?>
</div>
</div>
</body>
</html>