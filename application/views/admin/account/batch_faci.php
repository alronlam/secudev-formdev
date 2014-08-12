<!DOCTYPE html>
<html>
<head>
	
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Accept facilitators</h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<?PHP if (isset($error) && $error != "") : ?>
			<div class="alert alert-danger alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Error!</strong><?PHP echo $error;?>
			</div>
			<?PHP endif; ?>
			
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<?PHP
						$attr = array('class' => 'form-horizontal');
						echo form_open_multipart('admin/faci_batch_confirm', $attr); ?>


						<div class="form-group">
							<label class='col-sm-3 control-label'>Select file</label>
							<div class="col-sm-9">
								<input type="file" class="form-control" name="userfile"/>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-3">Batch</label>
							<div class="col-sm-9">

								<input type="text" class="form-control" name="batch" placeholder="13a">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Upload</button>
								<?PHP echo anchor('admin/accounts', 'Cancel', array('class' => 'btn btn-default')); ?>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">Sample CSV file</div>
				<div class="panel-body">
					<?PHP echo img(array('src' => 'img/faci_batch_example.png', 'class' => 'img-rounded')); ?>
					<div class="space"></div>
					<p>By default, the facilitator's <strong>username and password is his/her ID number</strong>.</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>