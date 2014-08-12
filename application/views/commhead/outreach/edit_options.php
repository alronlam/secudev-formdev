<?PHP 
$editDOM = '<span class="glyphicon glyphicon-pencil"></span> ';
$removeDOM = '<span class="glyphicon glyphicon-remove"></span> ';
?>
<div class="pull-right">
	<?PHP 
	if (isset($edit))
		echo anchor($edit, $editDOM); 
	if (isset($remove))
		echo anchor($remove, $removeDOM);
	?>
</div>