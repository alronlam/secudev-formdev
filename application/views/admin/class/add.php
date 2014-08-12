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
		var faciList = <?php echo json_encode($nameList); ?>;
		var idList = <?php echo json_encode($idList); ?>;
		$(function() {
			$( "#faci" ).autocomplete({
				source: faciList
			});
		});

		var dayList = ['M', 'T', 'W', 'H', 'F', 'S'];
		$(function() {
			$( "#day" ).autocomplete({
				source: dayList
			});
		});

	</script>

</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Add a New Class</h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default">
				<div id="invalidfaci" class="alert alert-danger alert-dismissable fade in" style="display: none">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Please select a valid facilitator.
				</div>
				<div class="panel-body">
						<?php
						$attr = array('onsubmit' => 'return validate()', 'class' => 'form-horizontal');
						echo form_open('admin/addedClass', $attr); ?>
						<input type="hidden" id="classFaciId" name="classFaciId">
						<div class="form-group">
							<label for="section" class="col-sm-1 control-label">Section</label>
							<div class="col-sm-11">
								<input type="text" class="form-control" id="section" name="section" placeholder="Section" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="venue" class="col-sm-1 control-label">Venue</label>
							<div class="col-sm-11">
								<input type="text" class="form-control" id="venue" name="venue" placeholder="Venue" required>
							</div>
						</div>
						<div class="form-group">
							<label for="day" class="col-sm-1 control-label">Day</label>
							<div class="col-sm-11">
								<input type="text" class="form-control" id="day" name="day" placeholder="M-F" required>
							</div>
						</div>
						<div class="form-group">
							<label for="timeStart" class="col-sm-1 control-label">Start Time</label>
							<div class="col-sm-11">
								<input type="time" class="form-control" id="timeStart" name="timeStart" step="0" required>
							</div>
						</div>
						<div class="form-group">
							<label for="timeEnd" class="col-sm-1 control-label">End Time</label>
							<div class="col-sm-11">
								<input type="time" class="form-control" id="timeEnd" name="timeEnd" placeholder="End Time" required>
							</div>
						</div>
						<div class="form-group">
							<label for="faci" class="col-sm-1 control-label">Class Faci</label>
							<div class="col-sm-11">
								<input type="text" class="form-control" id="faci" name="faci" placeholder="Faci Name" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-11">
								<button type="submit" class="btn btn-primary">Add Class</button>
								<?= anchor('admin/classes', 'Cancel', array('class' => 'btn btn-danger btn-cancel')); ?>
							</div>
						</div>
					</form>
				</div>
			</div> <!-- .panel-body -->
		</div>

		<script>
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
				$("#classFaciId").val(idList[indexOfFaci]);
				return true;
			}

			$("#faci").click(function() {
				error(false);
			});
		</script>

	</div><!-- .container -->
</body>
</html>