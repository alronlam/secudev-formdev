<?php
$return = '<span class="glyphicon glyphicon-repeat"> Return to Viewing Activities</span>';
?>
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
			<h1>New outreach </h1>
		</div>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div id="invalidfaci" class="alert alert-danger alert-dismissable fade in" style="display: none">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Please select a valid facilitator.
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">New outreach activity for <?PHP echo 'Term '.$this->session->userdata('term').', '.$this->session->userdata('year').'-'.($this->session->userdata('year')+1) ?></div>
					<div class="panel-body">
						<?php
						$attr = array('onsubmit' => 'return validate()', 'class' => 'form-horizontal');
						echo form_open('outreach/added', $attr); ?>

						<input type="hidden" id="faciID" name="faciID">
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">Title</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" required id="title" name="title" placeholder="Activity Title" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="faci" class="col-sm-2 control-label">Description</label>
							<div class="col-sm-10">
								<textarea type="text" rows="5" class="form-control" required id="description" name="description" placeholder="Description"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="faci" class="col-sm-2 control-label">Facilitator</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" required id="faci" name="faci" placeholder="Assign facilitator">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Add Activity</button>
								<?PHP
								echo anchor('outreach', 'Cancel', array('class' => 'btn btn-default'));
								?>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	error(false);
});

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

function error(b){
	if (b){
		$("#faci").css("background-color", "#f2dede");
		$("#invalidfaci").show();	
	}else{
		$("#invalidfaci").hide();	
		$("#faci").css("background-color", "#FFF");
	}
}

</script>
</body>
</html>