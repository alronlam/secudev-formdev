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
			<h1>Grade student <small></small></h1>
		</div>
		<div class="col-md-12">
				<div class="dropdown">
					<ol class="breadcrumb">
						<li><a href="#">FORMDEV S20</a></li>
						<li><a href="#">Group 1</a></li>
						<li class="active">Dannison Yao</li>
					</ol>
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