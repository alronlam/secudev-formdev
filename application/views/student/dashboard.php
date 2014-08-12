<!DOCTYPE html>
<html>
<head>
	
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>

	<!-- Class Standing-->

	<div class = "container">
		<div class="page-header">
			<h1>Student dashboard</h1>
		</div>

		<div class ="col-sm-10 col-sm-offset-1">
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						Class standing
					</div>
					<div class="panel-body">
						<div class="progress ">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
								<span>21 / 30</span>
							</div>
						</div>

						<p>This is currently not yet implemented.</p>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						Notifications
					</div>
					<div class="panel-body">
						
						<div class="alert alert-success compressed">
							<span class="glyphicon glyphicon-ok"></span>
							Reflection 1 checked
							<a href="reflections_answered.php?usertype=8" class = "alert-link pull-right"> View</a>
						</div>

						<div class="alert alert-info compressed">
							<span class="glyphicon glyphicon-bell"></span>
							Outreach reminders
							<a href="#" class = "alert-link pull-right">View</a>
						</div>

						<div class="alert alert-warning compressed">
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							Reflection 2 deadline
							<a href="#" class = "alert-link pull-right">Answer</a>
						</div>
						<p>This is currently not yet implemented.</p>
					</div>	
				</div>
			</div>
		</div>
		<!-- Notification -->


		<div class="page-header">
			<h1>Grading</h1>
		</div>
		<!-- Nav Tabs-->
		<div class ="col-sm-10 col-sm-offset-1">
			<p>This is currently not yet implemented.</p>
			<ul class="nav nav-tabs" id="myTab">
				<li class="active">
					<a class="badge-compressed" href="#cs_reflections" data-toggle="tab">
						Reflections
						<span class="badge hidden-xs">30</span>
					</a>
				</li>
				<li>
					<a class="badge-compressed" href="#cs_attendance" data-toggle="tab">
						Participation
						<span class="badge hidden-xs">30</span>
					</a>
				</li>
				<li>
					<a class="badge-compressed" href="#cs_report" data-toggle="tab">
						Activities
						<span class="badge hidden-xs">30</span>
					</a>
				</li>
			</ul>

			<!-- Tab Content-->

			<div class = "tab-content">
				<div class="tab-pane active" id="cs_reflections">
					<table class="table table-striped">

						<thead>
							<tr>
								<th>Status</th>
								<th>Reflection number</th>
								<th>Points</th>
							</tr>
						</thead>
						<tr>
							<td> <span class="glyphicon glyphicon-ok"></span> </td>
							<td> Reflection 1 </td>
							<td> 15pts</td>	
						</tr>
						<tr>
							<td> <span class="glyphicon glyphicon-ok"></span> </td>
							<td> Reflection 2 </td>
							<td> 15pts</td>	
						</tr>

						<tr>
							<td> <span class="glyphicon glyphicon-remove"></span> </td>
							<td> Reflection 3 </td>
							<td> </td>	
						</tr>

						<tr>
							<td> <span class="glyphicon glyphicon-remove"></span> </td>
							<td> Reflection 4 </td>
							<td> </td>	
						</tr>

						<tr>
							<td> <span class="glyphicon glyphicon-remove"></span> </td>
							<td> Reflection 5 </td>
							<td> </td>	
						</tr>

						<tr>
							<td> <span class="glyphicon glyphicon-remove"></span> </td>
							<td> Reflection 6 </td>
							<td> </td>	
						</tr>

						<tr>
							<td> <span class="glyphicon glyphicon-remove"></span> </td>
							<td> Reflection 7 </td>
							<td> </td>	
						</tr>

					</table>

				</div>
				<div class="tab-pane" id="cs_attendance">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Status</th>
								<th>Date</th>
								<th>Points</th>
							</tr>
						</thead>
						<tr>
							<td> <span class="glyphicon glyphicon-ok"></span> </td>
							<td> January 14, 2014 </td>
							<td> 1 </td>	
						</tr>
						<tr>
							<td> <span class="glyphicon glyphicon-ok"></span> </td>
							<td> January 21, 2014 </td>
							<td> 1 </td>	
						</tr>
						<tr>
							<td> <span class="glyphicon glyphicon-ok"></span> </td>
							<td> January 28, 2014 </td>
							<td> 0.5 </td>	
						</tr>
					</table>
				</div>
				<div class="tab-pane" id="cs_report">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Status</th>
								<th>Activity Description</th>
								<th>Points</th>
							</tr>
						</thead>
						<tr>
							<td> <span class="glyphicon glyphicon-ok"></span> </td>
							<td> Outreach Activity Reflection </td>
							<td> 10pts</td>	
						</tr>
						<tr>
							<td> <span class="glyphicon glyphicon-ok"></span> </td>
							<td> Treasure Bag Activity Reflection </td>
							<td> 10pts</td>	
						</tr>
					</table>
				</div>
			</div>





		</div>


	</div>
</body>
</head>
</html>