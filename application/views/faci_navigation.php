<?PHP
	/**
	 * This method returns true if the facilitator has the specified role. For more information on roles,
	 * study "models/faci_account_model.php".
	 */

	function hasRole($role, $faciRoles){
		return in_array($role, $faciRoles);
	}
	$loggedIn = false;
	/* If you are logged in, display your ID instead of FORMDEV */
	if ($this->session->userdata('id') != ""){
		$loggedIn = true;
		$firstName = $this->account_model->getMyFirstName();
	}
	?>

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
						<li class='hidden-sm'><?= anchor('faci', 'Home'); ?></li>
						<li class='visible-sm'><?= anchor('faci', '<i class="fa fa-home"></i>'); ?></li>

						<li class='hidden-sm'><?= anchor('tasks', 'Tasks'); ?></li>
						<li class='visible-sm'><?= anchor('tasks', '<i class="fa fa-list"></i>'); ?></li>


					<!-- 	<li class='hidden-sm'><?= anchor('faci/students', 'My students'); ?></li>
						<li class='visible-sm'><?= anchor('faci/students', '<i class="fa fa-group"></i>'); ?></li>
 -->
						<?php if (hasRole(1, $faciRoles) || hasRole(8, $faciRoles)): ?>
							<li class="dropdown">
								<a class="hidden-sm dropdown-toggle" data-toggle="dropdown" href="#">
									Class <span class="caret"></span>
								</a>
								<a class="visible-sm dropdown-toggle" data-toggle="dropdown" href="#">
									<i class='fa fa-pencil'></i> <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<?PHP
										if (hasRole(1, $faciRoles)):
											echo anchor('faci/classes', 'View class');
										elseif (hasRole(8, $faciRoles)): 
											echo anchor('faci/classes', 'View group');
										endif;
										?>
									</li>
								</ul>
							</li>
						<?php endif; ?>

						<?PHP
// Monitoring
						if (false && (hasRole(1, $faciRoles) || hasRole(2, $faciRoles) || hasRole(3, $faciRoles))): ?>
						<li class="dropdown disabled">
							<a class="dropdown-toggle disabled" data-toggle="dropdown" href="#">
								Monitoring <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><?php echo anchor('monitoring/view', 'View attendance'); ?></li>
								<li><?php echo anchor('monitoring', 'Record attendance'); ?></li>
							</ul>
						</li>

						<?PHP endif; ?>
						<?PHP
// Manage
						if (hasRole(0, $faciRoles)): ?>
						<li class="dropdown">
							<a class="dropdown-toggle hidden-sm" data-toggle="dropdown" href="#">
								Manage <span class="caret"></span>
							</a>
							<a class="dropdown-toggle visible-sm" data-toggle="dropdown" href="#">
								<i class='fa fa-cog'></i> <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><?php echo anchor('admin/verse', 'Verse of the Week'); ?></li>
								<li><?php echo anchor('admin/accounts', 'Accounts'); ?></li>
								<li><?php echo anchor('biblestudy', 'Bible Study Groups'); ?></li>
								<li><?php echo anchor('admin/classes', 'FORMDEV Classes'); ?></li>
								<!--<li><?php //echo anchor('admin/evaluations', 'Course Evaluations'); ?></li>-->
							</ul>
						</li>
						<?PHP endif; ?>
						
						<!-- Information -->
						
						<li class="dropdown">
							<a class="dropdown-toggle hidden-sm" data-toggle="dropdown" href="#">
								Information <span class="caret"></span>
							</a>
							<a class="dropdown-toggle visible-sm" data-toggle="dropdown" href="#">
								<i class='fa fa-info'></i> <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><?php echo anchor('outreach', 'Outreach'); ?></li>
								<li><?php echo anchor('announcement/view', 'Announcements'); ?></li>
								<li><?php echo anchor('event/view', 'Events'); ?></li>
							</ul>
						</li>
						
					</ul> 
					<ul class="nav navbar-nav navbar-right">
						<li class='hidden-sm'>
							<?= anchor('media/downloads', 'Files'); ?>
						</li>
						<li class='visible-sm'>
							<?= anchor('media/downloads', '<i class="fa fa-paperclip"></i>'); ?>
						</li>
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
			</div>
		</nav>
	</div>
