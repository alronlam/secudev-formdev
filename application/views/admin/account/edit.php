<!DOCTYPE html>
<html>
<head>
	<?PHP $this->load->view("header"); ?>

	<link href="<?PHP echo base_url(); ?>css/bootstrap-editable.css" rel="stylesheet"/>
	<script type="text/javascript" src="<?PHP echo base_url(); ?>js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="<?PHP echo base_url(); ?>js/zxcvbn.js"></script>
	<script src="<?PHP echo base_url(); ?>js/bootstrap-editable.min.js"></script>
	<script src="<?PHP echo base_url(); ?>js/moment.min.js"></script>
	<script src="<?PHP echo base_url(); ?>js/combodate.js"></script>
	<script src="<?PHP echo base_url(); ?>js/accountsettings.js"></script>

	<style type="text/css">
		.editable-password span {
			width: 80px;
			display: inline-block;
		}

        .veryweak{
            color:#F22613;
        }
        .weak{
            color:#F9690E;
        }
        .medium{
            color:#F9BF3B;
        }
        .strong{
            color:#19B5FE;
        }
        .verystrong{
            color:#87D37C;
        }

	</style>

</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Settings <small></small></h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					You can change your account's settings here.
				</div>
			</div>
			<div class="panel panel-default">
				<table class="table table-striped">
					<tbody>
						<tr>
							<th class="col-sm-2">Name</th>
							<td class="col-sm-10">
									<?php echo $this->account_model->getFullName($this -> session -> userdata('modifying')) ?>
								
							</td>
						</tr>

						
						<tr>
							<th>Role </th>
							<td> 
								<a href="#" id="role" data-name="role" data-title="Select role" data-type="select"
									<?php 
										$role = $this->account_model->getRole($this -> session -> userdata('modifying'));
										echo $role ? "data-value=".$role : "";
									?>>
								</a>
							</td>
						</tr>

						


					</tbody>
				</table>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<?PHP echo anchor('admin/facis', 'Return to accounts management', array('class' => 'btn btn-default')); ?>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript">

    </script>
	</html>