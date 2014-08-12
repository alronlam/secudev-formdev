<!DOCTYPE html>
<html>
<head>
	<?PHP $this->load->view("header", $header); ?>
</head>
<body>
	<?PHP $this->load->view("navigation"); ?>
	<div class="container">
		<div class="page-header">
			<h1>Verse of the Week</h1>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default">
				<div id="invalidfaci" class="alert alert-danger alert-dismissable fade in" style="display: none">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Please select a valid facilitator.
				</div>
				<div class="panel-body">
						<?php
						$attr = array('onsubmit' => 'return validate()', 'class' => 'form-horizontal');
						echo form_open('admin/verse', $attr); ?>
						<div class="form-group">
							<label for="book" class="col-sm-1 control-label">Book</label>
							<div class="col-sm-11">
								<input type="text" class="form-control" id="book" name="bookInput" placeholder="John" autofocus>
							</div>
						</div>
						<div class="form-group">	
							<label for="chapter" class="col-sm-1 control-label">Chapter</label>
							<div class="col-sm-11">
								<input type="text" class="form-control" id="chapter" name="chapterInput" placeholder="3">
							</div>
						</div>
						<div class="form-group">
							<label for="verse" class="col-sm-1 control-label">Verse</label>
							<div class="col-sm-11">
								<input type="text" class="form-control" id="verse" name="verseInput" placeholder="16-18">
							</div>
						</div>
						<div class="form-group">
							<label for="application" class="col-sm-1 control-label">Application</label>
							<div class="col-sm-11">
								<textarea type="text" class="form-control" id="application" name="applicationInput" placeholder="Enter the application of the verse (500 chars max)"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-11">
								<button type="submit" class="btn btn-primary">Update Verse of the Week</button>
							</div>
						</div>
						
					</form>
				</div>
			</div> <!-- .panel-body -->
		</div>

		<script>
			$(document).ready(function() {
				error(false);
			});



			function error(b){
				if (b){
					$("#faci").css("background-color", "#f2dede");
					$("#invalidfaci").show();	
				}else{
					$("#invalidfaci").hide();	
					$("#faci").css("background-color", "#FFF");
				}
			}

			function validate(){
				error(false);
				var faciName = $("#leader").val();
				var indexOfFaci = $.inArray(faciName, faciList);
				if (indexOfFaci == -1){
					error(true);
					return false;
				}
				$("#leaderID").val(idList[indexOfFaci]);
				return true;
			}

			$("#faci").click(function() {
				error(false);
			});
		</script>
	</div><!-- .container -->
</body>
</html>