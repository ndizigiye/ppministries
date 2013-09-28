<?php
class AddEvent{
	
	function add_form(){
		$form='
<div class="wrap">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
 <script>
  $(function() {
	$( "#date" ).datepicker({ dateFormat: "yy-mm-dd" });
    $( "#date" ).datepicker();
  });
  </script>
<div id="icon-options-general" class="icon32"><br></div><h2>Add new Event</h2>

<form method="post" action="?page=ppministries-event&action=save">
<table class="form-table">
<tbody>
<tr valign="top">
<th scope="row"><label for="title">Title</label></th>
<td><input name="title" type="text" id="title" value="" class="regular-text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="place">Place</label></th>
<td><input name="place" type="text" id="place" value="" class="regular-text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="date">Date</label></th>
<td><input name="date" type="text" id="date" value="" class="regular-text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="start">Start Time</label></th>
<td><input name="start" type="text" id="start" value="hh:mm" class="regular-text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="end">End Time</label></th>
<td><input name="end" type="text" id="end" value="hh:mm" class="regular-text"></td>
</tr>

</tbody></table>
<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p></form>

</div>
		';
		
		
		return  $form;
	}
	
	function edit_form($id){
		global $wpdb;
		$data = $wpdb->get_results('SELECT * FROM wp_events WHERE ID='.$id);
		$form='
				
<div class="wrap">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

  <script>
  $(function() {
	$( "#date" ).datepicker({ dateFormat: "yy-mm-dd" });
    $( "#date" ).datepicker();
  });
  </script>
<div id="icon-options-general" class="icon32"><br></div><h2>Add new Video</h2>
	
<form method="post" action="?page=ppministries-event&action=save">
<table class="form-table">
<tbody>
<tr valign="top">
<td><input name="id" type="hidden" id="id" value="'.$data[0]->ID.'" class="regular-text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="title">Title</label></th>
<td><input name="title" type="text" id="title" value="'.$data[0]->Title.'" class="regular-text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="place">Place</label></th>
<td><input name="place" type="text" id="place" value="'.$data[0]->Place.'" class="regular-text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="date">Date</label></th>
<td><input name="date" type="text" id="date" value="'.$data[0]->Date.'" class="regular-text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="start">Start Time</label></th>
<td><input name="start" type="text" id="start" value="'.$data[0]->Start.'" class="regular-text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="end">End Time</label></th>
<td><input name="end" type="text" id="end" value="'.$data[0]->End.'" class="regular-text"></td>
</tr>
	
</tbody></table>
<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p></form>
	
</div>
		';
	
	
		return  $form;
	}
	
	function delete($id){
		global $wpdb;
		$query = "DELETE FROM wp_events WHERE ID=".$id;
		$wpdb->query($query);
	}
}