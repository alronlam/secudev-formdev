<!DOCTYPE html>
<html>
<head>
	
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Enrolling FORMDEV Class</h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="alert alert-info fade in">
				<p><strong>Alright!</strong> These were the students detected from the file for the section <?php echo  $section; ?>.
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class='hidden-xs'>ID Number</th>
								<th colspan='2'>Name</th>
								<th class='hidden-xs'>Course</th>
								<th>Remarks</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 0; foreach($result as $student): ?>
							<tr>
								<td class='hidden-xs'><?= $student['idnumber'] ?></td>
								<td><?= $student['firstname'] ?></td>
								<td><?= $student['lastname'] ?></td>
								<td class='hidden-xs'><?= $student['course'] ?></td>
								<td>
									<?php if (isset($student['error'])): ?>
										<span class="glyphicon glyphicon-remove"></span> <?= $student['error'] ?>

									<?PHP else: ?>
										<span class="glyphicon glyphicon-ok"></span>

								<?php endif; ?>
							</td>
						</tr>
						<?PHP $i++; endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<p> Only valid accounts will be added. Please ensure that these are the correct details for the new accounts. </p>
				<?PHP 
				$hidden = array('file_name' => $file_name, 'section' => $section, 'classPk' => $classPk);
				echo '<P>' . form_open('admin/student_batch_upload', '', $hidden);
				$attr = array('name' => 'RegisterClass', 'class' => 'btn btn-primary', 'value' => 'Continue');
				echo form_submit($attr, 'Continue');
				echo ' ';
				echo anchor('admin/students', 'Cancel', array('class' => 'btn btn-default')) . "</P>";
				echo form_close();
				?>
			</div>
		</div>

	</div>
</div>
</div><!-- .container -->

</body>
</html>
