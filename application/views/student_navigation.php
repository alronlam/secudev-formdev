<?PHP
$firstName = $this->account_model->getMyFirstName();
?>
<div class="container"> <!-- Container for navbar -->
	<nav class="navbar navbar-inverted navbar-static-top" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<?PHP
			$properties = array(
				'src' => 'formdev.png',
				'id' => 'brand');
			$img = img($properties);
			echo anchor('', "{$img} FORMDEV", array('class' => 'navbar-brand'));
			?>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><?php echo anchor('student', 'Home'); ?></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						Submission <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><?php echo anchor('student/workbook', 'Workbook'); ?></li>
						<li class='disabled'><?php echo anchor('student', 'Activity Report'); ?></li>
					</ul>
				</li>
				<li><?php echo anchor('student/myfaci', 'Faci details'); ?></li>

			</ul>
			<ul class="nav navbar-nav pull-right">
				<li><?php echo anchor('media/downloads', 'Files'); ?></li>
				<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<?= $firstName ?> <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><?php echo anchor('account/settings', 'Settings'); ?></li>
								<li><?php echo anchor('account/logout', 'Log Out'); ?></li>
							</ul>
						</li>
			</ul>
		</div>
	</nav>
</div>