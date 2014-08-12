<!DOCTYPE html>
<html>
<head>
	
	<?PHP $this->load->view("header"); ?>
	
	<?PHP 	
	$nameList = array();
	$idList = array();
	foreach ($faciList as $faciEntry){
		$idList[] = $faciEntry['id'];
		$nameList[] = $faciEntry['firstName'].' '.$faciEntry['lastName']; 
	}
	?>

	<script>
		var faciList= <?php echo json_encode($nameList); ?>;
		var idList = <?php echo json_encode($idList); ?>;
		$(function() {
			$( "#faci" ).autocomplete({
				source: faciList
			});
		});
	</script>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Assign Tasks <!--<small>as <?PHP echo $user_type; ?></small>--></h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="invalidfaci" class="alert alert-danger alert-dismissable fade in" style="display: none">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Please select a valid facilitator.
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<p>To assign a tasks to a facilitator, enter their name, task to accomplish, and date of deadline.</p>
						<?php
						$attr = array('onsubmit' => 'return validate()', 'class' => 'form-horizontal');
						echo form_open('tasks/assigned', $attr); ?>
						<input type="hidden" id="faciID" name="faciID">
						<div id="test"></div>
						<div class="form-group">
							<label for="faci" class="col-sm-2 control-label">Facilitator</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="faci" name="faci" placeholder="Assign facilitator" required>
							</div>
						</div>
						<div class="form-group">
							<label for="task" class="col-sm-2 control-label">Task</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="task" name="task" placeholder="Enter task" required>
							</div>
						</div>
						<div class="form-group">
							<label for="date" class="col-sm-2 control-label">Deadline</label>
							<div class="col-sm-10">
								<input class="datepicker form-control" id ="deadline" name="deadline" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Assign Task</button>
								<?= anchor('tasks', 'Cancel', array('class' => 'btn btn-danger btn-cancel')); ?>
							</div>
						</div>
					</form>
				</div> <!-- .panel-body -->
			</div> <!-- .panel -->
		</div>
	</div><!-- .container -->

	<script src="<?PHP echo base_url(); ?>js/bootstrap-datepicker.js"></script>
	<script>
		//initial calls
		setDatePickerToCurrentDate();

		$(document).ready(function() {
			error(false);
		});



		function error(b){
			if (b){
				$("#faci").css("background-color", "#f2dede");
				$("#invalidfaci").show();	
			}else{
				$("#invalidfaci").hide();	
				$("#faci").css("background-color", "#FFF");
			}
		}

		function validate(){
			error(false);
			var faciName = $("#faci").val();
			var indexOfFaci = $.inArray(faciName, faciList);
			if (indexOfFaci == -1){
				error(true);
				return false;
			}
			$("#faciID").val(idList[indexOfFaci]);
			return true;
		}

		$("#faci").click(function() {
			error(false);
		});


		//functions
		function setDatePickerToCurrentDate(){
			var dateNow = new Date();
			var now = new Date(dateNow.getFullYear(), dateNow.getMonth(), dateNow.getDate(), 0, 0, 0, 0);
			$('.datepicker').datepicker('setValue', now);
		}
		//$('.nav-tabs').button()
	</script>
</div>
</body>
</html>
