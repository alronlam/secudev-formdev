<!DOCTYPE html>
<html>
<head>
	<?PHP $this->load->view("header"); ?>

</head>
<body>
	<?PHP $this->load->view('navigation'); ?>
	<div class="container">
		<div class="page-header">
			<h1>Retrieve password<small></small></h1>
		</div>
		<div class="col-md-12">
			<?PHP if ($error != "" && $error): ?>
			<div class="alert alert-danger alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<label>Error!</label>
				Invalid email or password.
			</div>
			<?PHP elseif ($error != "" && $error == false): ?>
			<div class="alert alert-success alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<label>Success!</label>
				Your password has been sent to your email.
			</div>
		<?php endif; ?>
		<div class="row">
			<div id="loginform" class="panel panel-default col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
				<div class="panel-heading">
					<h3 class="panel-title">Information</h3>
				</div>
				<div class="panel-body">
					<?php 
					$attr = array('class' => 'form-horizontal');
					echo form_open('account/send', $attr); ?>
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" id="username" name="username" required/>
						</div>

					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input class="form-control" type="email" id="email" name="email" required/>
						</div>
					</div>
					<input class="btn btn-primary" type="submit" value="Send Email" />
					<?php form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
</body>
</html>
