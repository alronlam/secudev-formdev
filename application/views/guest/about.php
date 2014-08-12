<?PHP
// New implementation
$formdev_logo_image_attr = array(
	'src' => 'img/logo.png',
	'alt' => '150x200',
	'data-src' => 'holder.js/150x200',
	'width' => '150',
	'height' => '200',
	);
$formdev_logo_image = img($formdev_logo_image_attr);

// Old implementation
// <img data-src="holder.js/150x200" src="img/logo.png" alt="150x200" width="150" height="200">
?>

<!DOCTYPE html>
<html>
<head>
	
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view('navigation'); ?>
	<?PHP $this->load->view('carousel'); ?>
	<div class="container">
		<!-- Welcome -->
		<div class="page-header">
			<h1>Welcome to FORMDEV <small>A community of Faith, Zeal, and Love</small></h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p><strong>FORMDEV</strong> is a special <strong>program and community</strong> of volunteer faculty, staff, alumni, and students of the College of Computer Studies (CCS) of De La Salle University (DLSU). The mission of FORMDEV is to proclaim and demonstrate the Lasallian and Gospel values of <strong>faith, zeal, and love,</strong> especially for one’s <em>community and for the poor</em>.</p>

			</div>
		</div>
		<!-- History -->
		<div class="page-header">
			<h1>History <small>The early beginnings</small></h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p>In 2000, a group of CCS professors and students began <strong>meeting weekly to study the life of St. La Salle</strong>, believing that this would inspire them to be more Christ-like and more concerned about the plight of the poor. In 2001, when they finished studying <em>Br. Luke Salm</em>’s biography of St. La Salle, <strong>The Work is Yours</strong>, the student members of the group unanimously felt that all CCS students should go through the same experience that they went through of getting to know Christ, St. La Salle, themselves, and other members of the CCS community more deeply.</p>

				<p>Thus, FORMDEV was born, and a 0.5-unit course, also called FORMDEV, was offered to CCS students in 2002. By God’s grace, FORMDEV (the program, community, and course) continues to exist to this day.</p>
			</div>
		</div>

		<!-- Invitation -->
		<div class="page-header">
			<h1>Learn more! <small></small></h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p>If you would like to know more about FORMDEV, we invite you to read the FORMDEV Handbook. It tells the story of FORMDEV, explains the Lasallian values that FORMDEV focuses on, specifies the duties of FORMDEV facis, and lists all the facis of FORMDEV, past and present.</p>
			</div>
		</div>

	</div><!-- .container -->

</body>
</html>