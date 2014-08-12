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
	<script type="text/javascript">
		$(function ()  
			{ $("#moreinfo").popover();  
		});  
	</script>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	
	<div class="container">
		<div class="page-header">
			<h1>View class</h1>
		</div>
		<div class="container">
			<!-- Start of bible study schedules-->
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>General Information</strong>
					</div>
					<div class="panel-body">
						<p><span class="label label-default">Class Faci: Darren Sapalo</span></p>
						<p><span class="label label-default">Class Henchie: Dang Singe</span></p>
						<p><span class="label label-primary">Schedule: Tues, 2:40PM - 4:10PM</span></p>
						<p><span class="label label-info">41 students</span></p>
						<div class="space"></div>
						<p>This whole page is currently not yet implemented.</p>

					</div>
				</div>
			</div>
			<div class="col-md-8 hidden-xs">

				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>About FORMDEV Classes</strong>
					</div>
					<div class="panel-body">
					<p>FORMDEV groups are composed of at most 8 members, 
					with classes containing at most 45 students.</p>
					<p>To pass FORMDEV, students need to accumulate at least
					27 of 30 points. At the end of the term, the final exam
					is 3 points with 2 bonus questions for an extra point each.</p>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-4 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Group 1, Darren Sapalo</strong>
				</div>
				<ul class="list-group">
					<li class="list-group-item">Roberto Cruz <span class="badge">42</span></li>
					<li class="list-group-item">Holly Chua <span class="badge">25</span></li>
					<li class="list-group-item">Jeremiah Lugtu <span class="badge">37</span></li>
					<li class="list-group-item">Marvin Bables <span class="badge">15</span></li>
					<li class="list-group-item">Alec Vega <span class="badge">56</span></li>
				</ul>
			</div>
		</div>
		<div class="col-md-4 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Group 2, Grace Bajo</strong>
				</div>
				<ul class="list-group">
					<li class="list-group-item">Roberto Cruz <span class="badge">16</span></li>
					<li class="list-group-item">Holly Chua <span class="badge">74</span></li>
					<li class="list-group-item">Jeremiah Lugtu <span class="badge">25</span></li>
					<li class="list-group-item">Marvin Bables <span class="badge">78</span></li>
					<li class="list-group-item">Alec Vega <span class="badge">23</span></li>
				</ul>
			</div>
		</div>
		<div class="col-md-4 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Group 3, Mark Larosa</strong>
				</div>
				<ul class="list-group">
					<li class="list-group-item">Roberto Cruz <span class="badge">93</span></li>
					<li class="list-group-item">Holly Chua <span class="badge">44</span></li>
					<li class="list-group-item">Jeremiah Lugtu <span class="badge">22</span></li>
					<li class="list-group-item">Marvin Bables <span class="badge">62</span></li>
					<li class="list-group-item">Alec Vega <span class="badge">78</span></li>
				</ul>
			</div>
		</div>

	</div><!-- .container -->

</body>
</html>