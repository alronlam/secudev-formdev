<html>
<head>
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	

	<div class="container">
		<div class="page-header">
			<h1>Upload a file</h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?PHP if (isset($error) && strlen(trim($error)) > 0) : ?>
				<div id="taskStatus" class="alert alert-danger alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong><?php echo $error; ?></strong>
				</div>
				<?php endif; ?>
				<?PHP if (isset($uploadData)) : ?>
				<div id="taskStatus" class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong><?= $uploadData['file_name']?></strong> has been uploaded.
				</div>
				<?php endif; ?>

				<div class="panel panel-default">
					<div class="panel-body">
						<?php echo form_open_multipart('media/do_upload');?>
							<div class = "form-group">
								<div class="col-sm-10">
									<p><strong>Supported file types: </strong>.csv .txt .ppt .pptx .doc .docx .pdf</p>
								</div>
							</div>
							<div class="form-group">
								<label for="selected file" class="col-sm-2 control-label"></label>
								<div class="col-sm-10">
									<input type="file" name="userfile" size="20" />
								</div>
							</div>
							<div class="form-group">
								<div class=" col-sm-10">
									<button type="submit" class="btn btn-primary">Upload</button>
									<?= anchor('media', 'Cancel', array('class' => 'btn btn-danger btn-cancel')); ?>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>