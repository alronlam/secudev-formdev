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
			<div class="panel panel-default">
				<div class="panel-body">
					<p>Please select whether you want to view faci or student accounts.</p>
					<p>If you are <span class="label label-primary">Preparing for a new term</span> you may enroll classes or accept batches of facilitators as well.</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>