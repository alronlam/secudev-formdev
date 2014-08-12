<?PHP 
/**
 * To use this visual component, call:
 * $this->load->view('common/edit_options, $options);
 *
 * Wherein options is an array with two keys:
 * <key - value>
 * 
 * edit - link to edit content
 * remove - link to remove content
 */
$addButton = "<span class='glyphicon glyphicon-plus'></span>";

if (isset($addLink)){
	$addDOM = anchor($addLink, $addButton, array('class' => 'btn btn-primary btn-md'));
}
?>

<div class="col-sm-4 col-sm-offset-4">
	<div class="panel panel-default">
		<div class="panel-heading">Options</div>
		<div class="panel-body">
			<?PHP if (isset($addDOM)) echo $addDOM; ?>
		</div>
	</div>
</div>