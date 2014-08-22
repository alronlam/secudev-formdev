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
			<h1>Facilitators</h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">

			<?PHP foreach ($batches as $key => $facis): ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					Batch <?PHP echo $key; ?> <small><?php echo ' (' . count($facis). ' faci/s)'; ?></small>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="col-sm-3">Facilitator name</th>
								<th class="col-sm-3">Bible study group</th>
								<th class="col-sm-6 hidden-xs">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?PHP 
							foreach ($facis as $faci): ?>
							<tr>
								<td><?PHP echo $faci['firstName'] . " " . $faci['lastName'] ?></td>
								<td><?PHP echo $faci['bibleStudy'] ?></td>
								<td class="hidden-xs">
									<?PHP echo anchor('admin/edit/'.$faci['id'], 'Modify account', array('class' => 'btn btn-primary btn-xs')); ?>
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