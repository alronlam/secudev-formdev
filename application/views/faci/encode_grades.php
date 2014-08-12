<!DOCTYPE html>
<html>
<head>
	<?PHP $this->load->view("header"); ?>
	<title>FORMDEV Website 3.0</title>
</head>
<body>

	<?PHP $this->load->view("navigation"); ?>
	
	<div class="container">
		<div class="page-header">
			<h1>Group 1 <small>Faci Darren and Nikkol</small></h1>
		</div>
		<div class="col-md-12">
			<div class="dropdown">
				<ul class="nav nav-pills">
					<li class="active">
						<a id="drop1" data-toggle="dropdown" href="#">Pick Student <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
							<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Carlos Javier Reyes</a></li>
							<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Wilbert Luy</a></li>
							<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Dannison Yao</a></li>
						</ul>

					</li>
					
				</ul>
			</div>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#reflection" data-toggle="tab">Reflection</a></li>
				<li><a href="#activity" data-toggle="tab">Activity</a></li>
				<li><a href="#misc" data-toggle="tab">Miscellaneous</a></li>
			</ul>
			<div class="panel panel-default">
				<div id="myContent" class="tab-content">
					<div class="tab-pane fade in active" id="reflection">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Workbook Reflection</th>
									<th>Score</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Chapter 1 : Introduction</td>
									<td>1.0</td>
								</tr>
								<tr>
									<td>Chapter 2 : Beginnings in Reims</td>
									<td>1.0</td>
								</tr>
								<tr>
									<td>Chapter 3 : Beginnings in Paris</td>
									<td>1.0</td>
								</tr>
								<tr>
									<td>Chapter 4 : Crisis in Paris</td>
									<td>1.0</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="activity">
						<p>activitiyes</p>
					</div>
					<div class="tab-pane fade" id="misc">
						<p>Misc</p>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .container -->

</body>
</html>