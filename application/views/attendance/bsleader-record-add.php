<!DOCTYPE html>
<html>
<head>
	
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	
	<div class="container"> <!-- container for the header and content -->
		<div class="col-sm-4 col-md-4" id="recordPicker" style="height:500px">
			<div class="page-header">
				<h1>Bible Study Attendance <br><small> Manage attendance records.</small></h1>
			</div>
			<ul class="nav nav-stacked">
				<li class=""><a href="#add-record" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span> Add Record</a></li>
				<li class="active"><a href="#feb1-2014" data-toggle="tab">April 9, 2014</a></li>
				<li><a href="#feb1-2014" data-toggle="tab">April 2, 2014</a></li>
				<li><a href="#feb1-2014" data-toggle="tab">March 19, 2014</a></li>
				<li><a href="#feb1-2014" data-toggle="tab">March 12, 2014</a></li>
				<li><a href="#feb1-2014" data-toggle="tab">March 5, 2014</a></li>
				<li><a href="#feb1-2014" data-toggle="tab">February 26, 2014</a></li>
				<li><a href="#feb1-2014" data-toggle="tab">February 19, 2014</a></li>
				<li><a href="#feb1-2014" data-toggle="tab">February 12, 2014</a></li>
				<li><a href="#feb1-2014" data-toggle="tab">February 5, 2014</a></li>
				<li><a href="#feb1-2014" data-toggle="tab">January 29, 2014</a></li>
				<li><a href="#feb1-2014" data-toggle="tab">January 22, 2014</a></li>
				<li><a href="#feb1-2014" data-toggle="tab">January 15, 2014</a></li>
				<li><a href="#feb1-2014" data-toggle="tab">January 8, 2014</a></li>
				<li><a href="#feb1-2014" data-toggle="tab">January 1, 2014</a></li>
			</ul>
		</div>
		<div class="col-sm-8 col-md-8">
			<div class="tab-content" >
				<div class="tab-pane fade in active" id="add-record">
					
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail">
								<img src="img/duke.png" alt="Image cannot be loaded.">
								<div class="caption">
									<!--<h3>Dukie</h3>-->
									<p style="">Delos Santos, Duke Danielle</p>
									<div class="btn-group" data-toggle="buttons-radio">
										<button type="button" class="btn btn-primary active" data-toggle="button">Present</button>
										<button type="button" class="btn btn-primary" data-toggle="button">Late</button>
										<button type="button" class="btn btn-primary" data-toggle="button">Absent</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail">
								<img src="img/alron.png" alt="Image cannot be loaded.">
								<div class="caption">
									<!--<h3>Ronnie</h3>-->
									<p>Lam, Alron Jan</p>
									<div class="btn-group" data-toggle="buttons-radio">
										<button type="button" class="btn btn-primary active" data-toggle="button">Present</button>
										<button type="button" class="btn btn-primary" data-toggle="button">Late</button>
										<button type="button" class="btn btn-primary" data-toggle="button">Absent</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail">
								<img src="img/mico.png" alt="Image cannot be loaded.">
								<div class="caption">
									<!--<h3>Micky</h3>-->
									<p>Macatangay, Jules Matthew</p>
									<div class="btn-group" data-toggle="buttons-radio">
										<button type="button" class="btn btn-primary active" data-toggle="button">Present</button>
										<button type="button" class="btn btn-primary" data-toggle="button">Late</button>
										<button type="button" class="btn btn-primary" data-toggle="button">Absent</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail">
								<img src="img/ivan.png" alt="Image cannot be loaded.">
								<div class="caption">
									<!--<h3>Ivy</h3>-->
									<p>Paner, Ivan</p>
									<div class="btn-group" data-toggle="buttons-radio">
										<button type="button" class="btn btn-primary active" data-toggle="button">Present</button>
										<button type="button" class="btn btn-primary" data-toggle="button">Late</button>
										<button type="button" class="btn btn-primary" data-toggle="button">Absent</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail">
								<img src="img/ivan.png" alt="Image cannot be loaded.">
								<div class="caption" id="guest">
									<!--<h3>Ivy</h3>-->
									<p>Sapalo, Darren (Guest)</p>
									<div class="btn-group" data-toggle="buttons-radio">
										<button type="button" class="btn btn-primary" data-toggle="button">Present</button>
										<button type="button" class="btn btn-primary" data-toggle="button">Late</button>
										<button type="button" class="btn btn-primary active" data-toggle="button">Absent</button>
									</div>
								</div>
							</div>
						</div>
					</div>  
				</div>
				<div class="tab-pane fade" id="feb1-2014">
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail">
								<img src="img/duke.png" alt="Image cannot be loaded.">
								<div class="caption">
									<!--<h3>Dukie</h3>-->
									<p style="">Delos Santos, Duke Danielle</p>
									<div class="btn-group" data-toggle="buttons-radio">
										<button type="button" class="btn btn-primary active" data-toggle="button">Present</button>
										<button type="button" class="btn btn-primary" data-toggle="button">Late</button>
										<button type="button" class="btn btn-primary" data-toggle="button">Absent</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail">
								<img src="img/alron.png" alt="Image cannot be loaded.">
								<div class="caption">
									<!--<h3>Ronnie</h3>-->
									<p>Lam, Alron Jan</p>
									<div class="btn-group" data-toggle="buttons-radio">
										<button type="button" class="btn btn-primary active" data-toggle="button">Present</button>
										<button type="button" class="btn btn-primary" data-toggle="button">Late</button>
										<button type="button" class="btn btn-primary" data-toggle="button">Absent</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail">
								<img src="img/mico.png" alt="Image cannot be loaded.">
								<div class="caption">
									<!--<h3>Micky</h3>-->
									<p>Macatangay, Jules Matthew</p>
									<div class="btn-group" data-toggle="buttons-radio">
										<button type="button" class="btn btn-primary" data-toggle="button">Present</button>
										<button type="button" class="btn btn-primary active" data-toggle="button">Late</button>
										<button type="button" class="btn btn-primary" data-toggle="button">Absent</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail">
								<img src="img/ivan.png" alt="Image cannot be loaded.">
								<div class="caption">
									<!--<h3>Ivy</h3>-->
									<p>Paner, Ivan</p>
									<div class="btn-group" data-toggle="buttons-radio">
										<button type="button" class="btn btn-primary" data-toggle="button">Present</button>
										<button type="button" class="btn btn-primary" data-toggle="button">Late</button>
										<button type="button" class="btn btn-primary active" data-toggle="button">Absent</button>
									</div>
								</div>
							</div>
						</div>

					</div>  
				</div>
				<div class="tab-pane fade" id="jan25-2014">
					Tab 3 content
				</div>
			</div>
		</div>
	</div><!-- .container -->
	<script src="<?PHP echo base_url(); ?>js/bootstrap-datepicker.js"></script>  
	<script>
	//initial calls
	setDatePickerToCurrentDate();

		//functions
		function setDatePickerToCurrentDate(){
			var dateNow = new Date();
			var now = new Date(dateNow.getFullYear(), 3, 9, 0, 0, 0, 0);
			$('.datepicker').datepicker('setValue', now);
		}
		//$('.nav-tabs').button()
		</script>
	</body>
	</html>