<nav id="facinav" class="navbar navbar-default" role="navigation">
	<div class="container-fluid">

		<!-- Collect the nav links, forms, and other content for toggling -->
<!-- 			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li><a href="#">Separated link</a></li>
						<li class="divider"></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
			</ul> -->
			<ul class="nav navbar-nav">
				<li>
					<?php echo anchor('admin/facis', 'Facis'); ?>
				</li>
				<li>
					<?php echo anchor('admin/students', 'Students'); ?>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Register a... <i class="glyphicon glyphicon-chevron-down"></i></a> 
					<ul class="dropdown-menu">
						<li>
							<?php echo anchor('admin/faci_batch','New batch of facilitators') ?>
						</li>
						<li>
							<?php echo anchor('admin/student_batch','New FORMDEV class') ?>
						</li>
						<li class="divider"></li>
						<li class="disabled"><a href="#">New facilitator</a></li>
						<li class="disabled"><a href="#">New student</a></li>
					</ul>
				</li>
				
			</ul>
		</div><!-- /.container-fluid -->

	</nav>
	<div class="space"></div>