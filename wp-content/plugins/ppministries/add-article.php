<?php
class AddArtice{
	
	function add_form(){
		$form='
<div class="wrap">
<div id="icon-options-general" class="icon32"><br></div><h2>Add new Article</h2>

<form method="post" action="?page=ppministries-articles&action=save">
<table class="form-table">
<tbody>
<tr valign="top">
<th scope="row"><label for="title">Title</label></th>
<td><input name="title" type="text" id="title" value="" class="regular-text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="tags">Tags</label></th>
<td><input name="tags" type="text" id="tags" value="" class="regular-text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="title">Image</label></th>
<td><input type="text" name="image" id="image" value="">
<input type="button" name="choose button" id="selector" class="button button-primary" value="Select image">
</td>
</tr>
<tr valign="top">
<th scope="row"><label for="author">Author</label></th>
<td><input name="author" type="text" id="author" value="" class="regular-text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="summary">Summary</label></th>
<td><textarea name="summary" type="text" id="summary" 
cols="50" rows="6" value="" class="regular-text">   
</textarea>
</td>
</tr>
<tr valign="top">
<th scope="row"><label for="text">Main Text</label></th>
<td><textarea name="text" type="text" id="text" 
cols="50" rows="6" value="" class="regular-text">   
</textarea>
</td>
</tr>
</tbody></table>
<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p></form>

</div>'.AddArtice::chooseImage();
		
		
		return  $form;
	}
	
	function edit_form($id){
		global $wpdb;
		$data = $wpdb->get_results('SELECT ID,Title,Tags,Image,Author,Summart,Text FROM wp_articles WHERE ID='.$id);
		$form='
<div class="wrap">
<div id="icon-options-general" class="icon32"><br></div><h2>Add new Articles</h2>
	
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
		$query = "DELETE FROM wp_articles WHERE ID=".$id;
		$wpdb->query($query);
	}
        
        function chooseImage(){
            return "<script>
			var file_frame;
 
//mca_tray_button is the ID of my button that opens the Media window
jQuery('#selector').live('click', function( event ){
 
  event.preventDefault();
 
	if ( file_frame ) {
		file_frame.open();
		return;
	}
 
	file_frame = wp.media.frames.file_frame = wp.media({
		title: jQuery( this ).data( 'uploader_title' ),
		button: {
			text: jQuery( this ).data( 'uploader_button_text' ),
		},
		multiple: false  
	});
 
	file_frame.on( 'select', function() {
 
		attachment = file_frame.state().get('selection').first().toJSON();
 
		// mca_features_tray is the ID of my text field that will receive the image
		// I'm getting the ID rather than the URL:
 
		jQuery('#image').val(attachment.id);
 
		// but you could get the URL instead by doing something like this:
		jQuery('#image').val(attachment.sizes.thumbnail.url);
 
		// and you can change 'thumbnail' to get other image sizes
 
	});
 
	file_frame.open();
 
});
			</script>
			";
        }
}