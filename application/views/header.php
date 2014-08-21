<?PHP
/* application/views/header.php
 * This header file is imported in all views so that the importing  of scripts, css, fonts are defined once, only here.
 * Additionally, data is passed here from the array $header which is an element in the array $data passed by the controller.
 * 
 * Sequence of data being passed
 * controller 		> view  		> header
 * $data ->			  $header ->
 */

?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400|Droid+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'> -->
<script src="<?PHP echo base_url(); ?>js/jquery-2.0.3.min.js"></script>
<script src="<?PHP echo base_url(); ?>js/jquery-ui.js"></script>
<script src="<?PHP echo base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?PHP echo base_url(); ?>js/docs.min.js"></script>
<?PHP if (isset($bibleReferences) && $bibleReferences): ?>
<script src="<?PHP echo base_url(); ?>js/bibreferencetagger.js"></script>
<?php endif; ?>
<?PHP if (isset($title)): ?>
	<title>FORMDEV - <?php echo $title ?></title>
<?php else: ?>
	<title>FORMDEV - Formation and Development</title>
<?php endif; ?>
<?php 	
$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
$this->output->set_header("Pragma: no-cache");
?>
<link rel="stylesheet" href="<?PHP echo base_url(); ?>css/docs.min.css">
<link rel="stylesheet" href="<?PHP echo base_url(); ?>css/jquery-ui.css">
<link rel="stylesheet" href="<?PHP echo base_url(); ?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?PHP echo base_url(); ?>css/my.css">
<link rel="stylesheet" href="<?PHP echo base_url(); ?>css/font-awesome.min.css">
<link rel="shortcut icon" href="<?PHP echo base_url(); ?>favicon.ico" />