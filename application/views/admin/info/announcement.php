<!DOCTYPE html>
<html>
<head>
	
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Edit Announcement</h1>
		</div>
		<div class = "row">
			<div class="col-md-12">
				<div class="panel panel-default" id="announcement">
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
								<label class="col-sm-1 control-label">Title</label>
								<div class="col-sm-11">
									<input type="text" class="form-control" id="title" name="announcementTitle" placeholder="Enter announcement title here" 
									value="<?php echo set_value('announcementTitle', $title); ?>"
									>
									</input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Description</label>
								<div class="col-sm-11">
									<textarea type="text" class="form-control" id="desc" name="announcementDesc" placeholder="Enter announcement description here"><?php echo set_value('announcementDesc', $description); ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-1 col-sm-11">
									<button type="submit" class="btn btn-primary">Save Changes</button>
									<?= anchor('announcement', 'Cancel', array('class' => 'btn btn-danger btn-cancel')); ?>
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
s