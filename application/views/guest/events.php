<?PHP
// New implementation
$formdev_logo_image_attr = array(
	'src' => 'img/logo.png',
	'alt' => '150x150',
	'data-src' => 'holder.js/150x150',
	'width' => '150',
	'height' => '150',
	'class' => 'center-block'
	);
$formdev_logo_image = img($formdev_logo_image_attr);
$permissions = $this->faci_account_model->getAccountRoles();
$isStudentHead = $permissions && in_array(0, $permissions);
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
		<div class="page-header">
			<h1>
				<?PHP 
				$button = "<span class='glyphicon glyphicon-plus'></span>";
				if ($isStudentHead)
					echo anchor('event/add', $button, array('class' => 'btn btn-primary btn-md pull-right'));
				?>
				Events
			</h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="row">
				<?PHP
				if( $eList == FALSE || isset($eList) == FALSE || $eList == "" ){
					echo"<h2>There are no Events</h2>";
				}else
				{
					foreach ($eList as $dataEntry): 
						$title = $dataEntry['event'];
					$description = $dataEntry['description'];
					$id = $dataEntry['pk'];
					?>
					<div class="col-sm-6">

						<div class="panel panel-default">
							<div class="panel-heading">
								<?PHP
								echo $title; 
								
								?>
							</div>
							<?PHP echo $formdev_logo_image; ?>
							<div class="panel-body">
								<div class="row">
									<div class="pull-left">

									</div>

								</div>
								<div class="row">
									<p><?PHP echo $description; ?></p>
								</div>
							</div>
							<?PHP 
							if ($isStudentHead):
								?>
									
							<div class="panel-footer">
								<?php $this->load->view('common/edit_options', array('pull_right' => FALSE, 'edit' => 'event/edit/' . $id, 'remove' => 'event/delete/' . $id));  ?>
							</div>
						<?php endif; ?>
						</div>
					</div>
					<?PHP endforeach; 
				}
				?>
			</div>
		</div>
	</div>

</body>
</html>