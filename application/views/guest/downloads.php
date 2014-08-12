<!DOCTYPE html>
<html>
<head>
	<?PHP $this->load->view("header"); ?>
</head>
<body>
	<?PHP $this->load->view('navigation'); ?>
	<div class="container">
		<div class="page-header">
			<h1>Downloads</h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			
			<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading">
						Available downloads
						<div class="pull-right">
						<?PHP if($isFaci)
							{
								echo anchor('media/upload', '<span class="glyphicon glyphicon-plus"></span>', array('class' => 'btn btn-primary btn-xs'));
							}
						?>
						</div>
					</div>
					<div class="panel-body">
						<p>The available downloads will be directed to your default downloads folder.</p>
						<?PHP if(count($uploadedFiles) > 0): ?>
						<div class="table-responsive">
							<table class="table table-bordered table-condensed table-responsive">
								<thead>
									<tr>
										<th>#</th>
										<th>File Name</th>
										<th>Size</th>
										<th>Download</th>
									</tr>
								</thead>
								<tbody>
									<?PHP 	$count = 0; 
									foreach ($uploadedFiles as $file): 
										$count++;
									?>
									<tr>
										<td><?PHP echo $count ?></td>
										<td><?PHP echo $file['name']; ?></td>
										<td><?PHP echo $file['sizeString']; ?></td>
										<td>
											<?PHP 
											$attr = array('class' => "btn btn-default btn-xs");
											$text = '<span class="glyphicon glyphicon-save"></span>';
											echo anchor('media/download/' . $file['name'], $text, $attr);
											?>
										</td>

									</tr>
									<?PHP endforeach ?>
								</tbody>
							</table>
						</div>
						<?PHP else : ?>
						<p>There are no files available yet.</p>
						<?PHP endif ?>

					</div>
				</div>
			</div>
		</div><!-- .container -->
	</body>
	</html>