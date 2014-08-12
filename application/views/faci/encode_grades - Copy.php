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
		<div class="row">
			<div class="col-md-3">
				<div class="btn-group">
					<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-open"></i> Export Data <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">to Excel File(.xls)</a></li>
						<li><a href="#">to CSV File(.csv)</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#reflec" data-toggle="tab">Reflection</a></li>
					<li><a href="#activity" data-toggle="tab">Activity</a></li>
					<li><a href="#misc" data-toggle="tab">Miscellaneous</a></li>
				</ul>
			</div>
		</div>
		<div class="tab-content">
			<div class="tab-pane fade in active" id="group1">
				<div class="tab-content">
					<div class="tab-pane fade in active" id="reflec">
						<div class="row">
							<div class="col-sm-3 col-md-3">
								<table class="table">
									<thead>
										<tr>
											<th><input type="checkbox"> Name</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="checkbox"> Lam, Alron</td>
										</tr>
										<tr>
											<td><input type="checkbox"> Paner, Ivan</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-sm-3 col-md-9">
								<table class="table">
									<thead>
										<tr>
											<th>Week1</th>
											<th>Week2</th>
											<th>Week3</th>
											<th>Week4</th>
											<th>Week5</th>
											<th>Week6</th>
											<th>Week7</th>
											<th>Week8</th>
											<th>Week9</th>
											<th>Week10</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>3</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>5</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="activity">
						<div class="row">
							<div class="col-sm-3 col-md-3">
								<table class="table">
									<thead>
										<tr>
											<th><input type="checkbox"> Name</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="checkbox"> Lam, Alron</td>
										</tr>
										<tr>
											<td><input type="checkbox"> Paner, Ivan</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-sm-3 col-md-9">
								<table class="table">
									<thead>
										<tr>
											<th>Week1</th>
											<th>Week2</th>
											<th>Week3</th>
											<th>Week4</th>
											<th>Week5</th>
											<th>Week6</th>
											<th>Week7</th>
											<th>Week8</th>
											<th>Week9</th>
											<th>Week10</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>10</td>
										</tr>
										<tr>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>5</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="misc">
						<div class="row">
							<div class="col-sm-3 col-md-3">
								<table class="table">
									<thead>
										<tr>
											<th><input type="checkbox"> Name</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="checkbox"> Lam, Alron</td>
										</tr>
										<tr>
											<td><input type="checkbox"> Paner, Ivan</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-sm-3 col-md-9">
								<table class="table">
									<thead>
										<tr>
											<th>Week1</th>
											<th>Week2</th>
											<th>Week3</th>
											<th>Week4</th>
											<th>Week5</th>
											<th>Week6</th>
											<th>Week7</th>
											<th>Week8</th>
											<th>Week9</th>
											<th>Week10</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>7</td>
										</tr>
										<tr>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>7</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="group2">
				<div class="tab-content">
					<div class="tab-pane fade in active" id="reflec">
						<div class="row">
							<div class="col-sm-3 col-md-3">
								<table class="table">
									<thead>
										<tr>
											<th>Name</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Macatangay, Matthew</td>
										</tr>
										<tr>
											<td>Delos Santos, Duke</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-sm-3 col-md-9">
								<table class="table">
									<thead>
										<tr>
											<th>Week1</th>
											<th>Week2</th>
											<th>Week3</th>
											<th>Week4</th>
											<th>Week5</th>
											<th>Week6</th>
											<th>Week7</th>
											<th>Week8</th>
											<th>Week9</th>
											<th>Week10</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>10</td>
										</tr>
										<tr>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="activity">
						<div class="row">
							<div class="col-sm-3 col-md-3">
								<table class="table">
									<thead>
										<tr>
											<th>Name</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Macatangay, Matthew</td>
										</tr>
										<tr>
											<td>Delos Santos, Duke</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-sm-3 col-md-9">
								<table class="table">
									<thead>
										<tr>
											<th>Week1</th>
											<th>Week2</th>
											<th>Week3</th>
											<th>Week4</th>
											<th>Week5</th>
											<th>Week6</th>
											<th>Week7</th>
											<th>Week8</th>
											<th>Week9</th>
											<th>Week10</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>0</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>9</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="misc">
						<div class="row">
							<div class="col-sm-3 col-md-3">
								<table class="table">
									<thead>
										<tr>
											<th>Name</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Macatangay, Matthew</td>
										</tr>
										<tr>
											<td>Delos Santos, Duke</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-sm-3 col-md-9">
								<table class="table">
									<thead>
										<tr>
											<th>Week1</th>
											<th>Week2</th>
											<th>Week3</th>
											<th>Week4</th>
											<th>Week5</th>
											<th>Week6</th>
											<th>Week7</th>
											<th>Week8</th>
											<th>Week9</th>
											<th>Week10</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>0</td>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>5</td>
										</tr>
										<tr>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>0</td>
											<td>6</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="group3">
				<div class="tab-content">
					<div class="tab-pane fade in active" id="reflec">
						<div class="row">
							<div class="col-sm-3 col-md-3">
								<table class="table">
									<thead>
										<tr>
											<th>Name</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Cruz, Bobby</td>
										</tr>
										<tr>
											<td>Sapalo, Darren</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-sm-3 col-md-9">
								<table class="table">
									<thead>
										<tr>
											<th>Week1</th>
											<th>Week2</th>
											<th>Week3</th>
											<th>Week4</th>
											<th>Week5</th>
											<th>Week6</th>
											<th>Week7</th>
											<th>Week8</th>
											<th>Week9</th>
											<th>Week10</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
										</tr>
										<tr>
											<td>1</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>3</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="activity">
						<div class="row">
							<div class="col-sm-3 col-md-3">
								<table class="table">
									<thead>
										<tr>
											<th>Name</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Macatangay, Matthew</td>
										</tr>
										<tr>
											<td>Delos Santos, Duke</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-sm-3 col-md-9">
								<table class="table">
									<thead>
										<tr>
											<th>Week1</th>
											<th>Week2</th>
											<th>Week3</th>
											<th>Week4</th>
											<th>Week5</th>
											<th>Week6</th>
											<th>Week7</th>
											<th>Week8</th>
											<th>Week9</th>
											<th>Week10</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>0</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>9</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="misc">
						<div class="row">
							<div class="col-sm-3 col-md-3">
								<table class="table">
									<thead>
										<tr>
											<th>Name</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Macatangay, Matthew</td>
										</tr>
										<tr>
											<td>Delos Santos, Duke</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-sm-3 col-md-9">
								<table class="table">
									<thead>
										<tr>
											<th>Week1</th>
											<th>Week2</th>
											<th>Week3</th>
											<th>Week4</th>
											<th>Week5</th>
											<th>Week6</th>
											<th>Week7</th>
											<th>Week8</th>
											<th>Week9</th>
											<th>Week10</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>0</td>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>5</td>
										</tr>
										<tr>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>0</td>
											<td>6</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="group4">
				<div class="tab-content">
					<div class="tab-pane fade in active" id="reflec">
						<div class="row">
							<div class="col-sm-3 col-md-3">
								<table class="table">
									<thead>
										<tr>
											<th>Name</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Monteverde, Lance</td>
										</tr>
										<tr>
											<td>Ong, Arianne</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-sm-3 col-md-9">
								<table class="table">
									<thead>
										<tr>
											<th>Week1</th>
											<th>Week2</th>
											<th>Week3</th>
											<th>Week4</th>
											<th>Week5</th>
											<th>Week6</th>
											<th>Week7</th>
											<th>Week8</th>
											<th>Week9</th>
											<th>Week10</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>0</td>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>6</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>7</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="activity">
						<div class="row">
							<div class="col-sm-3 col-md-3">
								<table class="table">
									<thead>
										<tr>
											<th>Name</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Macatangay, Matthew</td>
										</tr>
										<tr>
											<td>Delos Santos, Duke</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-sm-3 col-md-9">
								<table class="table">
									<thead>
										<tr>
											<th>Week1</th>
											<th>Week2</th>
											<th>Week3</th>
											<th>Week4</th>
											<th>Week5</th>
											<th>Week6</th>
											<th>Week7</th>
											<th>Week8</th>
											<th>Week9</th>
											<th>Week10</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>0</td>
											<td>0</td>
											<td>1</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>9</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="misc">
						<div class="row">
							<div class="col-sm-3 col-md-3">
								<table class="table">
									<thead>
										<tr>
											<th>Name</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Macatangay, Matthew</td>
										</tr>
										<tr>
											<td>Delos Santos, Duke</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-sm-3 col-md-9">
								<table class="table">
									<thead>
										<tr>
											<th>Week1</th>
											<th>Week2</th>
											<th>Week3</th>
											<th>Week4</th>
											<th>Week5</th>
											<th>Week6</th>
											<th>Week7</th>
											<th>Week8</th>
											<th>Week9</th>
											<th>Week10</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>0</td>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>5</td>
										</tr>
										<tr>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>0</td>
											<td>0</td>
											<td>6</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div><!-- .container -->

</body>
</html>