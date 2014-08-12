<?PHP
$array = array(
	'src' => 'holder.js/125x125',
	'alt' => 'Picture of Facilitator',
	'width' => 125,
	'height' => 125
	);
$mediaImage = img($array);
?>

<!DOCTYPE html>
<html>
<head>
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	
	<div class="container">
		<div class="page-header">
			<h1>View group</h1>
		</div>
		<!-- Start of bible study schedules-->
		<div class="col-md-12">
			<div class="dropdown">
				<ol class="breadcrumb">
					<li><a href="#">FORMDEV S20</a></li>
					<li class="active">Group 1</li>
				</ol>
			</div>

			<div class="panel panel-default">
				<div class="media">
					<a class="pull-left" href="#">
						<?php echo $mediaImage ?>
					</a>
					<div class="media-body">
						<h3 class="media-heading">Group 1</h3>
						<p><span class="label label-primary">Faci</span> Darren Sapalo</p>
						<p><span class="label label-default">Members</span> Cruz, Cordero, Bables, Suangco, Luy</p>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="media">
					<a class="pull-left" href="#">
						<?php echo $mediaImage ?>
					</a>
					<div class="media-body">
						<h3 class="media-heading">Group 2</h3>
						<p><span class="label label-primary">Faci</span> Raiza Paras</p>
						<p><span class="label label-default">Members</span> Cruz, Cordero, Bables, Suangco, Luy</p>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="media">
					<a class="pull-left" href="#">
						<?php echo $mediaImage ?>
					</a>
					<div class="media-body">
						<h3 class="media-heading">Group 3</h3>
						<p><span class="label label-primary">Faci</span> Bryce Siyyap</p>
						<p><span class="label label-default">Members</span> Cruz, Cordero, Bables, Suangco, Luy</p>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="media">
					<a class="pull-left" href="#">
						<?php echo $mediaImage ?>
					</a>
					<div class="media-body">
						<h3 class="media-heading">Group 4</h3>
						<p><span class="label label-primary">Faci</span> Theresa Mendoza</p>
						<p><span class="label label-default">Members</span> Cruz, Cordero, Bables, Suangco, Luy</p>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="media">
					<a class="pull-left" href="#">
						<?php echo $mediaImage ?>
					</a>
					<div class="media-body">
						<h3 class="media-heading">Group 5</h3>
						<p><span class="label label-primary">Faci</span> Elisha Gonzales</p>
						<p><span class="label label-default">Members</span> Cruz, Cordero, Bables, Suangco, Luy</p>
					</div>
				</div>
			</div>

		</div>

	</div><!-- .container -->

</body>
</html>