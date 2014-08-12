<!DOCTYPE html>
<html>
<head>
	
	<?PHP $this->load->view("header"); ?>

</head>
<body>
	<?PHP $this->load->view('navigation'); ?>
	<div class="container">
		<div class="page-header">
			<h1>Welcome back my friend!<small></small></h1>
		</div>
		<div class="col-sm-12">
			<?PHP if (validation_errors() != ""): ?>
			<div class="alert alert-danger alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<label>Error!</label>
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>
		<div class="row">
			<div id="loginform" class="panel panel-primary col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
				<div class="panel-heading">
					Log in
				</div>
				<div class="panel-body">
					<?php 
					$attr = array('class' => 'form-horizontal');
					echo form_open('verifylogin', $attr); ?>
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label hidden-sm">Username</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" id="username" name="username" placeholder='Enter username' required/>
						</div>

					</div>
					<div class="form-group">
						<label for="password" class="col-sm-2 control-label hidden-sm">Password</label>
						<div class="col-sm-10">
							<input class="form-control" type="password" id="password" name="password"  placeholder='Enter password' required/>
						</div>
					</div>
					<div class="pull-right">
						<input class="btn btn-primary" type="submit" value="Login" />
						<?php echo anchor('account/forgot', 'Forgot password?', array('class' => 'btn btn-default')); ?>
					</div>
					<?php form_close(); ?>
				</div>
			</div>
		</div>
		<div class="row hidden">
			<div class="panel panel-default">
				<div class="panel-heading">
					Easy login
				</div>
				<div class="panel-body">
					<p>This is a developer tool that lets developers easily log in to accounts (without memorizing their passwords).</p>
					<p>
						<?= anchor('verifylogin/dev', '<button type="button" class="btn btn-default">Student Head</button>') ?>
						<?= anchor('verifylogin/dev/2', '<button type="button" class="btn btn-default">Class Faci</button>') ?>
						<?= anchor('verifylogin/dev/3', '<button type="button" class="btn btn-default">Bible Study Leader</button>') ?>
						<?= anchor('verifylogin/dev/4', '<button type="button" class="btn btn-default">Outreach Head</button>') ?>
						<?= anchor('verifylogin/dev/5', '<button type="button" class="btn btn-default">IM Head</button>') ?>
						<?= anchor('verifylogin/dev/6', '<button type="button" class="btn btn-default">Comm Head</button>') ?>
						<?= anchor('verifylogin/dev/7', '<button type="button" class="btn btn-default">Monitoring Head</button>') ?>
						<?= anchor('verifylogin/dev/8', '<button type="button" class="btn btn-default">Facilitator</button>') ?>
						<?= anchor('verifylogin/dev/9', '<button type="button" class="btn btn-default">Student</button>') ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
</body>
</html>
