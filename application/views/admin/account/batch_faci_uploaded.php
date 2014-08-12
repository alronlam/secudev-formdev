<!DOCTYPE html>
<html>
<head>
	
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Accepted batch <?PHP echo $faci_batch; ?></h1>
		</div>
		<div class="col-sm-12">
			<div class="alert alert-success alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Success!</strong> You were able to successfully enroll a new batch of facilitators!
			</div>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default">
				<div class="panel panel-content">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class='hidden-xs'>ID Number</th>
								<th colspan='2'>Name</th>
								<th class='hidden-xs'>Course</th>
								
							</tr>
						</thead>
						<tbody>
							<?PHP $i = 0; foreach($result as $student): ?>
							<tr>
								<td class='hidden-xs'><?= $student['idnumber'] ?></td>
								<td><?= $student['firstname'] ?></td>
								<td><?= $student['lastname'] ?></td>
								<td class='hidden-xs'><?= $student['course'] ?></td>
								
							</tr>
							<?PHP $i++; ?>
							<?PHP endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<p><?PHP echo anchor('admin/facis', 'Return to accounts', array('class' => 'btn btn-default')); ?></p>				
					</div>
			</div>
		</div>
	</div><!-- .container -->

</body>
</html>
