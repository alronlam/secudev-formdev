<?PHP 
/**
 * To use this visual component, call:
 * $this->load->view('common/undo_option, $options);
 *
 * Wherein options is an array with two keys:
 * <key - value>
 * 
 * link - the link for undoing the action, ending with a /
 * 			e.g. 'outreach/undelete/'
 *
 * id   - the id (primary key) of the database item to be updated
 *			e.g. 1
 */

if (isset($link) && isset($id)){
	$attr = array('class' => "btn btn-warning btn-sm");
	$undo = '<i class="fa fa-undo"></i> undo';
	echo anchor($link . $id, $undo, $attr);
}
?>