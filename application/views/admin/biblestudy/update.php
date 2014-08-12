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
			$( "#leader" ).autocomplete({
				source: faciList
			});
		});
	</script>

</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Update Bible Study Group</h1>
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
						echo form_open('biblestudy/updated/'.$studygroup['pk'], $attr); ?>
						<input type="hidden" id="groupID" name="groupID" value=<?= $studygroup['pk']?>>
						<input type="hidden" id="leaderID" name="leaderID">
						<div class="form-group">
							<label for="book" class="col-sm-1 control-label">Book</label>
							<div class="col-sm-11">
								<input type="text" class="form-control" id="book" name="bookInput" placeholder="Book Name" required value=<?= "'".$studygroup['book']."'" ?> >
							</div>
						</div>
						<div class="form-group">
							<label for="leader" class="col-sm-1 control-label">Leader</label>
							<div class="col-sm-11">
								<input type="text" class="form-control" id="leader" name="leaderInput" placeholder="Faci Name" value=<?= "'".$studygroup['faciName']."'" ?> required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-11">
								<button type="submit" class="btn btn-primary">Save Changes</button>
								<?= anchor('biblestudy', 'Cancel', array('class' => 'btn btn-danger btn-cancel')); ?>
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
				var faciName = $("#leader").val();
				var indexOfFaci = $.inArray(faciName, faciList);
				if (indexOfFaci == -1){
					error(true);
					return false;
				}
				$("#leaderID").val(idList[indexOfFaci]);
				return true;
			}

			$("#faci").click(function() {
				error(false);
			});
		</script>

	</div><!-- .container -->
</body>
</html>