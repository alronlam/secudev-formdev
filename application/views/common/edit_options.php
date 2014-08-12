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

$editDOM = '<span class="glyphicon glyphicon-pencil"></span>';
$removeDOM = '<span class="glyphicon glyphicon-remove"></span>';
$eattr = array('class' => 'btn btn-success btn-xs');
$rattr = array('class' => 'btn btn-danger btn-xs');
if (!isset($pull_right))
	$pull_right = true;

if ($pull_right)
	echo '<div class="pull-right">';

	if (isset($edit))
		echo anchor($edit, $editDOM, $eattr) . ' ';
	if (isset($remove))
		echo anchor($remove, $removeDOM, $rattr);

if ($pull_right)
	echo '</div>';