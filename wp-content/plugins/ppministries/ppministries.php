<?php
/**
 * @package Hello_Dolly
 * @version 1.6
 */
/*
 Plugin Name: PP ministries settings
Description: PP ministries settings
Author: Armand Ndizigiye
Version: 1.0
Author URI: http://ppministries.org
*/
// Add to admin_menu function
add_action('admin_menu', 'my_menu_pages');

function my_menu_pages(){
	add_menu_page('My Page Title', 'PP ministries', 'manage_options', 'ppministries-menu', 'my_menu_output','',3);
	add_submenu_page('ppministries-menu', 'Submenu Page Title', 'Videos', 'manage_options', 'ppministries-videos','videos_menu' );
	add_submenu_page('ppministries-menu', 'Submenu Page Title2', 'Events', 'manage_options', 'ppministries-event','event_menu' );
}

function wp_gear_manager_admin_scripts() {
wp_enqueue_media();
}

function wp_gear_manager_admin_styles() {
	wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts', 'wp_gear_manager_admin_scripts');
add_action('admin_print_styles', 'wp_gear_manager_admin_styles');

function my_menu_output(){
	echo "
			<script>
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
 
		jQuery('#mca_features_tray').val(attachment.id);
 
		// but you could get the URL instead by doing something like this:
		jQuery('#image').val(attachment.sizes.thumbnail.url);
 
		// and you can change 'thumbnail' to get other image sizes
 
	});
 
	file_frame.open();
 
});
			</script>
			<input type='text' name='image' id='image' value=''>
			<input type='button' name='choose button' id='selector' class='button button-primary' value='Save Changes'>
			";
}

function videos_menu(){
	
	require_once( 'add-video.php' );
	require_once( 'videoTable.php' );

	$addvideo = new AddVideo();

	if ($_REQUEST['action'] === 'save'){
		$id = $_POST["id"];
		$url = $_POST["url"];
		$tags = $_POST["tags"];
		$date = date('Y-m-d');
		global $wpdb;
		if(isset($id)){
			$query = "UPDATE wp_videos SET URL ='$url', Tags = '$tags', DATE = '$date' WHERE ID =".$id;
		}
		else{
			$query = "INSERT INTO wp_videos (URL, Tags, Date) VALUES ('$url','$tags','$date')";
		}
		$wpdb->query($query);
		echo "<h2>Videos"."   ".sprintf('<a href="?page=%s&action=%s">Add video</a>',$_REQUEST['page'],'new-video').'</h2>';
		$videoTable = new Video_Table();
		$videoTable->prepare_items();
		$videoTable->display();
	}

	if($_REQUEST['action'] === 'edit'){
		echo "<h2>Videos"."   ".sprintf('<a href="?page=%s&action=%s">Add video</a>',$_REQUEST['page'],'new-video').'</h2>';
		$id = intval($_REQUEST['movie']);
		$edit_form = $addvideo->edit_form($id);
		echo $edit_form;
		 
	}

	if($_REQUEST['action'] === 'delete'){
		$id = intval($_REQUEST['movie']);
		$edit_form = $addvideo->delete($id);
		echo "<h2>Videos"."   ".sprintf('<a href="?page=%s&action=%s">Add video</a>',$_REQUEST['page'],'new-video').'</h2>';
		$videoTable = new Video_Table();
		$videoTable->prepare_items();
		$videoTable->display();

	}

	if($_REQUEST['action'] === 'new-video'){
		echo $addvideo->add_form();
	}
	
	if(!isset($_REQUEST['action'])){
		echo "<h2>Videos"."   ".sprintf('<a href="?page=%s&action=%s">Add video</a>',$_REQUEST['page'],'new-video').'</h2>';
		$videoTable = new Video_Table();
		$videoTable->prepare_items();
		$videoTable->display();
	}
}

function event_menu(){

	require_once( 'add-event.php' );
	require_once( 'eventsTable.php' );

	$addEvent = new AddEvent();

	if ($_REQUEST['action'] === 'save'){
		$id = $_POST["id"];
		$title = $_POST["title"];
		$place = $_POST["place"];
		$date = $_POST["date"];
		var_dump($date);
		$start = $_POST["start"];
		$end = $_POST["end"];
		global $wpdb;
		if(isset($id)){
			$query = "UPDATE wp_events SET Title ='$title', Place = '$place', Date = '$date' , Start = '$start' , End = '$end'  WHERE ID =".$id;
		}
		else{
			$query = "INSERT INTO wp_events (Title, Place, Date,Start,End) VALUES ('$title','$place','$date','$start','$end')";
		}
		$wpdb->query($query);
		echo "<h2>Events"."   ".sprintf('<a href="?page=%s&action=%s">Add Event</a>',$_REQUEST['page'],'new-event').'</h2>';
		$eventTable = new Event_Table();
		$eventTable->prepare_items();
		$eventTable->display();
	}

	if($_REQUEST['action'] === 'edit'){
		echo "<h2>Events"."   ".sprintf('<a href="?page=%s&action=%s">Add Event</a>',$_REQUEST['page'],'new-event').'</h2>';
		$id = intval($_REQUEST['event']);
		$edit_form = $addEvent->edit_form($id);
		echo $edit_form;
			
	}

	if($_REQUEST['action'] === 'delete'){
		$id = intval($_REQUEST['event']);
		$edit_form = $addEvent->delete($id);
		echo "<h2>Events"."   ".sprintf('<a href="?page=%s&action=%s">Add Event</a>',$_REQUEST['page'],'new-event').'</h2>';
		$eventTable = new Event_Table();
		$eventTable->prepare_items();
		$eventTable->display();
	}

	if($_REQUEST['action'] === 'new-event'){
		echo $addEvent->add_form();
	}
	
	if(!isset($_REQUEST['action'])){
		echo "<h2>Events"."   ".sprintf('<a href="?page=%s&action=%s">Add Event</a>',$_REQUEST['page'],'new-event').'</h2>';
		$eventTable = new Event_Table();
		$eventTable->prepare_items();
		$eventTable->display();
	}
}
//table of events
?>