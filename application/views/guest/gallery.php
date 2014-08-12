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
			<h1>Gallery</h1>
		</div>
		<!-- Start of bible study schedules-->
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="media">
					<a class="pull-left" href="#">
						<?php echo $mediaImage ?>
					</a>
					<div class="media-body">
						<h3 class="media-heading">Manila Science Outreach</h3>
						<p><span class="label label-primary">Outreach</span> A group of volunteer CCS students offer tutoring on 
						Fridays, from 3:30-5:30PM. The young third year students are given the opportunity to learn lessons of 
						COMPRO1 and COMPRO2 using the facilities of the school. </p>
						<p><span class="label label-default">Facilitators</span> <strong>Darwin</strong>, Elisha, Kevin, Darren, Kiel, Erika, Chelsea</p>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="media">
					<a class="pull-left" href="#">
						<?php echo $mediaImage ?>
					</a>
					<div class="media-body">
						<h3 class="media-heading">FORMDEV Recollection</h3>
						<p><span class="label label-primary">Event</span> St. La Salle invited his brothers to a spiritual retreat for 
							renewal of faith and zeal at their novitiate Vaugirard. Similarly, every facilitator is invited to join the 
							FORMDEV Recollection on May 20, 2014.</p>
						<p><span class="label label-default">Facilitators</span> <strong>Dr. Raymund Sison</strong>, Kevin, BS Leaders, Committee heads, and Class facis</p>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .container -->

</body>
</html>