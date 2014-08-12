<!DOCTYPE html>
<html>
<head>
	
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Edit Event</h1>
		</div>
		<div class = "row">
			<div class="col-md-12">
				<div class="panel panel-default" id="event">
					<div class="panel-body">
						<?php
						$attr = array('onsubmit' => 'return validate()', 'class' => 'form-horizontal');
						/* If there is an event */
						if(isset($eEntry)){
							/* Get that event */
							$event = $eEntry[0];

							/* and its details */
							$id = $event['pk'];
							$title = $event['event'];
							$description = $event['description'];
							$date = $event['eventDate'];

							$d = preg_split("[-]", $date);
							$year = $d[0];
							$month = $d[1];
							$d = preg_split("[ ]", $d[2]);
							$day = $d[0];

							/* and hide its ID */
							echo form_open('event/edited', $attr); 
							echo form_hidden('eID', $id);
						}
						else{
							/* or simply open the form for adding a new event */
							echo form_open('event/added', $attr); 
						}
						?>
						<div class="form-group">
							<label class="col-sm-1 control-label">Title</label>
							<div class="col-sm-11">
								<input type="text" class="form-control" id="title" name="eventTitle" placeholder="Enter event title here"
								value="<?PHP echo set_value('eventTitle', $title); ?>"
								>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-1 control-label">Description</label>
							<div class="col-sm-11">
								<textarea type="text" class="form-control" id="desc" name="eventDesc" placeholder="Enter event description here"
								><?PHP echo set_value('eventDesc', $description); ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-1 control-label">Date</label>
							<div class="col-sm-11">
								<input class="datepicker form-control" id ="eventDate" name="eventDate"
								value="<?PHP echo set_value('eventDate', $date); ?>"
								>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-11">
								<button type="submit" class="btn btn-primary">Save Changes</button>
								<?= anchor('event', 'Cancel', array('class' => 'btn btn-danger btn-cancel')); ?>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div><!-- .container -->
<script src="<?PHP echo base_url(); ?>js/bootstrap-datepicker.js"></script>
<script>
		//initial calls,
		$(document).ready(function(){
			setDatePickerToCurrentDate();
		});
		

		function validate(){
			return true;
		}
		
		function setDatePickerToCurrentDate(){
			var dateNow = new Date();
			<?PHP if (isset($eEntry)): ?>
			var now = new Date(<?PHP echo $year; ?>, <?PHP echo $month - 1; ?>, <?PHP echo $day; ?>, 0, 0, 0, 0);
			<?PHP else: ?>
			var now = new Date(dateNow.getFullYear(), dateNow.getMonth(), dateNow.getDate(), 0, 0, 0, 0);
			<?PHP endif; ?>
			$('.datepicker').datepicker('setValue', now);
		}
		</script>
	</body>
	</html>
