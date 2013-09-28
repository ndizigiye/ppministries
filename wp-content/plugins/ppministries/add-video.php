<?php
class AddVideo{
	
	function add_form(){
		$form='
<div class="wrap">
<div id="icon-options-general" class="icon32"><br></div><h2>Add new Video</h2>

<form method="post" action="?page=ppministries-videos&action=save">
<table class="form-table">
<tbody>
<tr valign="top">
<th scope="row"><label for="url">URL</label></th>
<td><input name="url" type="text" id="url" value="" class="regular-text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="tags">Tags (separated with commas)</label></th>
<td><input name="tags" type="text" id="tags" value="" class="regular-text"></td>
</tr>

</tbody></table>
<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p></form>

</div>
		';
		
		
		return  $form;
	}
	
	function edit_form($id){
		global $wpdb;
		$data = $wpdb->get_results('SELECT ID,URL,Tags FROM wp_videos WHERE ID='.$id);
		$form='
<div class="wrap">
<div id="icon-options-general" class="icon32"><br></div><h2>Add new Video</h2>
	
<form method="post" action="?page=ppministries-videos&action=save">
<table class="form-table">
<tbody>
<tr valign="top">
<td><input name="id" type="hidden" id="id" value="'.$data[0]->ID.'" class="regular-text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="url">URL</label></th>
<td><input name="url" type="text" id="url" value="'.$data[0]->URL.'" class="regular-text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="tags">Tags (separated with commas)</label></th>
<td><input name="tags" type="text" id="tags" value="'.$data[0]->Tags.'" class="regular-text"></td>
</tr>
	
</tbody></table>
<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p></form>
	
</div>
		';
	
	
		return  $form;
	}
	
	function delete($id){
		global $wpdb;
		$query = "DELETE FROM wp_videos WHERE ID=".$id;
		$wpdb->query($query);
	}
}