<!DOCTYPE html>
<html>
<head>
	
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Announcements and Events</h1>
		</div>
		<div class="col-md-12">
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
						echo form_open('announcement/added', $attr); ?>
							<div class="form-group">
								<label class="col-sm-1 control-label">Tnitle</label>
								<div class="col-sm-11">
									<input type="text" class="form-control" id="title" name="announcementTitle" placeholder="Enter announcement title here">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Description</label>
								<div class="col-sm-11">
									<textarea type="text" class="form-control" id="desc" name="announcementDesc" placeholder="Enter announcement description here"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-1 col-sm-11">
									<button type="submit" class="btn btn-default">Post a new announcement</button>
								</div>
							</div>
						</form>
					</div>
				</div>



				<!-- Posting an event -->
				<div class="tab-pane fade panel panel-default" id="event">
					<div class="panel-body">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-1 control-label">Title</label>
								<div class="col-sm-11">
									<input name="announcement" type='text' class="form-control" placeholder="Enter event title here">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Description</label>
								<div class="col-sm-11">
									<textarea type="text" id="announcementDescription" class="form-control" placeholder="Enter event description here"></textarea>
								</div>
							</div>
								<div class="form-group">
								<label class="col-sm-1 control-label">Date</label>
								<div class="col-sm-11">
									<input class="datepicker form-control" id ="eventDate" name="eventDate">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-1 col-sm-11">
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
		setDatePickerToCurrentDate();

		function validate(){
			return true;
		}
		
		function setDatePickerToCurrentDate(){
			var dateNow = new Date();
			var now = new Date(dateNow.getFullYear(), dateNow.getMonth(), dateNow.getDate(), 0, 0, 0, 0);
			$('.datepicker').datepicker('setValue', now);
		}
		</script>
</body>
</html>
