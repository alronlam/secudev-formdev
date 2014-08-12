<!DOCTYPE html>
<html>
<head>
	
	<?PHP $this->load->view("header"); ?>

	<?PHP 	
	$classStringList = array();
	$pkList = array();
	foreach ($classList as $class){
		$pkList[] = $class['pk'];
		$classStringList[] = $class['section'].' | '.$class['venue'].' | '.$class['day']
		.' '.$class['timeStart'].' - '.$class['timeEnd']; 
	}
	?>

	<script>
	var classList= <?php echo json_encode($classStringList); ?>;
	var pkList = <?php echo json_encode($pkList); ?>;
	$(function() {
		$( "#section" ).autocomplete({
			source: classList
		});
	});
	</script>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Enroll students</h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div id="invalidClass" class="alert alert-danger alert-dismissable fade in" style="display: none">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Please select a valid class.
			</div>
		
			<?PHP if (isset($error) && $error != "") : ?>
			<div class="alert alert-danger alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Error!</strong><?php echo $error;?>
			</div>
			<?PHP endif; ?>
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-body">

						<?php 
						$attr = array('class' => 'form-horizontal', 'onsubmit' => 'return validate()');
						echo form_open_multipart('admin/student_batch_confirm', $attr);?>
						<div class="form-group">

							<label class='col-sm-3 control-label'>Select file</label>
							<div class="col-sm-9">
								<input type="file" class="form-control" name="userfile"/>
							</div>

						</div>

						<div class="form-group">
							<label class="control-label col-sm-3">Class</label>
							<div class="col-sm-9">
								<input type="hidden" id="classpk" name="classpk">
								<input type="text" class="form-control" name="section" id="section" 
								<?php if(isset($classSection)) echo 'value = "'.$classSection.'"'; ?> >
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="btn btn-primary">Upload</button>
								<?PHP echo anchor('admin/accounts', 'Cancel', array('class' => 'btn btn-danger')); ?>
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
					<?PHP echo img(array('src' => 'img/student_batch_example.png', 'class' => 'img-rounded')); ?>
					<div class="space"></div>
					<p>By default, the student's <strong>username and password is his/her ID number</strong>.</p>
				</div>
			</div>
		</div>
	</div>

	<script>

	$(document).ready(function() {
		error(false);
	});
	
	function error(b){
		if (b){
			$("#section").css("background-color", "#f2dede");
			$("#invalidClass").show();	
		}
		else{
			$("#invalidClass").hide();	
			$("#section").css("background-color", "#FFF");
		}
	}
	

	function validate(){
		error(false);
		var className = $("#section").val();
		var indexOfClass = $.inArray(className, classList);
		if (indexOfClass == -1){
			error(true);
			return false;
		}
		$("#classpk").val(pkList[indexOfClass]);
		return true;
	}

	$("#section").click(function() {
		error(false);
	});
	</script>
</body>
</html>