<!DOCTYPE html>
<html>
<head>
	
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Information</h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					Create announcements, events, and new outreach activities here.
				</div>
			</div>
			<ul class="nav nav-tabs">
				<li class="active">
					<a data-toggle="tab" href="#announcement">Announcement</a>
				</li>
				<li>
					<a data-toggle="tab" href="#event">Events</a>
				</li>
			</ul>
			<div class="tab-content">

				<!-- Posting an announcement -->
				<div class="tab-pane fade in active panel panel-default" id="announcement">
					<div class="panel-body">
						<?php
						$attr = array('onsubmit' => 'return validate()', 'class' => 'form-horizontal');
						$title = "";
						$description = "";

						/* If you are editing an existing announcement */
						if(isset($aEntry)){
							/* Get that announcement */
							$announcement = $aEntry[0];

							/* and its details */
							$id = $announcement['pk'];
							$title = $announcement['announcement'];
							$description = $announcement['description'];

							/* display the form for editing, and hide an input */
							echo form_open('announcement/edited', $attr); 
							echo form_hidden('aID', $id);
						}
						else{
							echo form_open('announcement/added', $attr); 
						}
						?>
							<div class="form-group">
								<label class="col-sm-2 control-label">Title</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="title" name="announcementTitle" placeholder="Enter announcement title here" 
									value="<?php echo set_value('announcementTitle', $title); ?>"
									>
									</input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Description</label>
								<div class="col-sm-10">
									<textarea type="text" class="form-control" id="desc" name="announcementDesc" placeholder="Enter announcement description here"><?php echo set_value('announcementDesc', $description); ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">Post a new announcement</button>
								</div>
							</div>
						</form>
					</div>
				</div>



				<!-- Posting an event -->
				<div class="tab-pane fade panel panel-default" id="event">
					<div class="panel-body">
						<?php
						$attr = array('onsubmit' => 'return validate()', 'class' => 'form-horizontal');
						/* If there is an event */
						$date = "";
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
								<label class="col-sm-2 control-label">Title</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="title" name="eventTitle" placeholder="Enter event title here"
									value="<?PHP echo set_value('eventTitle', $title); ?>"
									>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Description</label>
								<div class="col-sm-10">
									<textarea type="text" class="form-control" id="desc" name="eventDesc" placeholder="Enter event description here"
								><?PHP echo set_value('eventDesc', $description); ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Date</label>
								<div class="col-sm-10">
									<input class="datepicker form-control" id ="eventDate" name="eventDate"
									value="<?PHP echo set_value('eventDate', $date); ?>"
									>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">Post a new event</button>
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
			<?PHP if (true && isset($eEntry)): ?>
			var now = new Date(<?PHP echo $year; ?>, <?PHP echo $month - 1; ?>, <?PHP echo $day; ?>, 0, 0, 0, 0);
			<?PHP else: ?>
			var now = new Date(dateNow.getFullYear(), dateNow.getMonth(), dateNow.getDate(), 0, 0, 0, 0);
			<?PHP endif; ?>
			$('.datepicker').datepicker('setValue', now);
		}
		</script>
	</body>
	</html>
