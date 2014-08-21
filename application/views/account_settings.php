<!DOCTYPE html>
<html>
<head>
	<?PHP $this->load->view("header"); ?>

	<link href="<?PHP echo base_url(); ?>css/bootstrap-editable.css" rel="stylesheet"/>
	<script type="text/javascript" src="<?PHP echo base_url(); ?>js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="<?PHP echo base_url(); ?>js/jquery-pwdstr.js"></script>
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
            color:#B40404;
        }
        .weak{
            color:#DF7401;
        }
        .medium{
            color:#FFFF00;
        }
        .strong{
            color:#9AFE2E;
        }
        .verystrong{
            color:#0B610B;
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
							<th class="col-sm-2">First Name</th>
							<td class="col-sm-10">
								<a href="#" class="editableText" id="firstName" name="firstName" data-name="firstName" data-title="Enter first name">
									<?php echo $this -> session -> userdata('firstName') ?>
								</a>
							</td>
						</tr>

						<tr>
							<th>Middle Name</th>
							<td> 
								<a href="#" class="editableText" data-name="middleName" data-title="Enter last name">
									<?php echo $this -> session -> userdata('middleName') ?>
								</a>
							</td>
						</tr>

						<tr>
							<th>Last Name</th>
							<td> 
								<a href="#" class="editableText" data-name="lastName" data-title="Enter last name">
									<?php echo $this -> session -> userdata('lastName') ?>
								</a>
							</td>
						</tr>

						<tr>
							<th>Birthdate </th>
							<td> 
								<a href="#" id="birthDate" data-name="birthDate" data-title="Enter date of birth" data-type="combodate">
									<script type="text/javascript">					
										var dob = <?php echo json_encode($this->session->userdata('birthDate')); ?>;
										var parsed = moment(dob, "YYYY-MM-DD");
										var bdayWords = parsed.format("MMMM D, YYYY");
										$('#birthDate').attr('data-value', dob);
										document.write(bdayWords);
									</script>
								</a>
							</td>
						</tr>

						<tr>
							<th>Course </th>
							<td> 
								<a href="#" id="course" data-name="course" data-title="Select course" data-type="select">
									<?php echo $this -> session -> userdata('course') ?>
								</a>
							</td>
						</tr>

						<tr>
							<th>Password </th>
							<td> 
								<a href="#" id="password" data-type ="password" data-name="password" data-title="Enter password">
									*******
								</a>
							</td>
						</tr>


					</tbody>
				</table>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<?PHP echo anchor('', 'Return to home page', array('class' => 'btn btn-default')); ?>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript">

    </script>
	</html>