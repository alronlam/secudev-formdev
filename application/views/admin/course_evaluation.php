<!DOCTYPE html>
<html>
<head>
	
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Upload Course Evaluation</h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Upload a new course evaluation</strong></div>
				<div class="panel-body">
					<form role="form" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label">Course evaluation file</label>
							<div class="col-sm-10">
								<input name="course_evaluation" type='file' class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Upload course evaluation</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Describe the contents of the course evaluation file -->
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Course evaluation file</strong></div>
				<div class="panel-body">
					<p>The course evaluation file must contain a CSV file with at most 50 lines containing a list of 15 values ranging from 0 to 3.</p>
				</div>
			</div>
		</div> <!-- .panel-body -->
	</div><!-- .container -->

</body>
</html>