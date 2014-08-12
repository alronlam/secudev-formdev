<div class="container"> <!-- Container for navbar -->
	<nav class="navbar navbar-inverted navbar-static-top" role="navigation">
		<div class="container-fluid">
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
					<!-- Information -->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							Information <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><?php echo anchor('outreach', 'Outreach'); ?></li>
							<li><?php echo anchor('announcement/view', 'Announcements'); ?></li>
							<li><?php echo anchor('event/view', 'Events'); ?></li>
						</ul>
					</li>
				</ul> 
				<ul class="nav navbar-nav navbar-right">
					<li><?php echo anchor('media/downloads', 'Files'); ?></li>
					<li><?php echo anchor('account/login', 'Log in'); ?></li>
				</ul>
			</div>
		</div>
	</nav>
</div>
