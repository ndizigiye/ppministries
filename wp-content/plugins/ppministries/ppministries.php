<?php
/**
 * @package Hello_Dolly
 * @version 1.6
 */
/*
 Plugin Name: PP ministries settings
Description: PP ministries settings
Author: Armand Ndizigiye
Version: 0.1
Author URI: http://ppministries.org
*/
// Add to admin_menu function
add_action('admin_menu', 'my_menu_pages');

function my_menu_pages(){
	add_menu_page('My Page Title', 'PP ministries', 'manage_options', 'ppministries-menu', 'my_menu_output','',3);
	add_submenu_page('ppministries-menu', 'Submenu Page Title', 'Videos', 'manage_options', 'ppministries-videos','videos_menu' );
        add_submenu_page('ppministries-menu', 'Submenu Page Title', 'Articles', 'manage_options', 'ppministries-articles','articles_menu');
        add_submenu_page('ppministries-menu', 'Submenu Page Title', 'Audios', 'manage_options', 'ppministries-audios','audios_menu');
	add_submenu_page('ppministries-menu', 'Submenu Page Title2', 'Events', 'manage_options', 'ppministries-event','event_menu' );
        add_submenu_page('ppministries-menu', 'Test', 'Test', 'manage_options', 'test_menu','test_menu' );
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
	echo "<script>
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
        require_once( 'youtube.php' );

	$addvideo = new AddVideo();
        $youtube = new Youtube();

	if ($_REQUEST['action'] === 'save'){
		$id = $_POST["id"];
		$url = $_POST["url"];
		$tags = $_POST["tags"];
		$date = date('Y-m-d');
                $mailToUsers = $_POST["mail"];
                $youtubeVideoId = $youtube->getYoutubeID($url);
                $videoThumbnail = $youtube->getThumbnail($youtubeVideoId);
                $videoTitle = $youtube->getTitle($youtubeVideoId);
		global $wpdb;
		if(isset($id)){
			$query = "UPDATE wp_videos SET URL ='$url' Title = '$videoTitle'Tags = '$tags', DATE = '$date' WHERE ID =".$id;
		}
		else{
			$query = "INSERT INTO wp_videos (URL, Title, Tags, Date) VALUES ('$url','$videoTitle','$tags','$date')";
                        if($mailToUsers == true){
                             require_once 'Mail.php';
                             $mailContent = CreateBody($videoTitle, $videoThumbnail, "http://ppministries/?page_id=7");
                             var_dump(MailToAllUser($mailContent));
                        }
		}
		$wpdb->query($query);
                echo "<script>window.location.href ='".admin_url()."admin.php?page=ppministries-videos"."';</script>";
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
                echo "<script>window.location.href ='".admin_url()."admin.php?page=ppministries-videos"."';</script>";

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

function articles_menu(){
    
    require_once( 'add-article.php' );
    require_once( 'articleTable.php' );
    
    $addArticle = new AddArtice();
    
    if ($_REQUEST['action'] === 'save'){
		$id = $_POST["id"];
		$title = $_POST["title"];
		$tags = $_POST["tags"];
		$date = $_POST["date"];
		$image = $_POST["image"];
		$author = $_POST["author"];
                $summary = $_POST["summary"];
                $text = $_POST["text"];
		global $wpdb;
		if(isset($id)){
			$query = "UPDATE wp_articles SET Title ='$title', Tags = '$tags', Date = '$date' , Image = '$image' , Author = '$author', Summary = '$summary', Text = '$text'  WHERE ID =".$id;
		}
		else{
                        $date = date('Y-m-d');
			$query = "INSERT INTO wp_articles (Title, Tags, Date,Image,Author,Summary,Text) VALUES ('$title','$tags','$date','$image','$author','$summary','$text')";
		}
		$wpdb->query($query);
                echo "<script>window.location.href ='".admin_url()."admin.php?page=ppministries-articles"."';</script>";
	}

	if($_REQUEST['action'] === 'edit'){
		echo "<h2>Events"."   ".sprintf('<a href="?page=%s&action=%s">Add Event</a>',$_REQUEST['page'],'new-event').'</h2>';
		$id = intval($_REQUEST['article']);
		$edit_form = $addArticle->edit_form($id);
		echo $edit_form;
			
	}

	if($_REQUEST['action'] === 'delete'){
		$id = intval($_REQUEST['article']);
		$edit_form = $addArticle->delete($id);
		echo "<script>window.location.href ='".admin_url()."admin.php?page=ppministries-articles"."';</script>";
	}

	if($_REQUEST['action'] === 'new-article'){
		echo $addArticle->add_form();
	}
	
	if(!isset($_REQUEST['action'])){
		echo "<h2>Articles"."   ".sprintf('<a href="?page=%s&action=%s">New article</a>',$_REQUEST['page'],'new-article').'</h2>';
		$articleTable = new Article_Table();
		$articleTable->prepare_items();
		$articleTable->display();
	}
    
    
    
}

function audios_menu(){
      require_once( 'add-audio.php' );
    require_once( 'audioTable.php' );
    
    $addAudio = new AddAudio();
    
    if ($_REQUEST['action'] === 'save'){
		$id = $_POST["id"];
		$source = $_POST["source"];
		$tags = $_POST["tags"];
		$date = $_POST["date"];
		$image = $_POST["image"];
		$author = $_POST["author"];
                $summary = $_POST["summary"];
		global $wpdb;
		if(isset($id)){
			$query = "UPDATE wp_audios SET Source ='$source', Tags = '$tags', Date = '$date' , Image = '$image' , Author = '$author', Summary = '$summary'  WHERE ID =".$id;
		}
		else{
                        $date = date('Y-m-d');
			$query = "INSERT INTO wp_audios (Source, Tags, Date,Image,Author,Summary) VALUES ('$source','$tags','$date','$image','$author','$summary')";
		}
		$wpdb->query($query);
                echo "<script>window.location.href ='".admin_url()."admin.php?page=ppministries-audios"."';</script>";
	}

	if($_REQUEST['action'] === 'edit'){
		echo "<h2>Change audio</h2>";
		$id = intval($_REQUEST['audio']);
		$edit_form = $addAudio->edit_form($id);
		echo $edit_form;
			
	}

	if($_REQUEST['action'] === 'delete'){
		$id = intval($_REQUEST['audio']);
		$edit_form = $addAudio->delete($id);
		echo "<script>window.location.href ='".admin_url()."admin.php?page=ppministries-audios"."';</script>";
	}

	if($_REQUEST['action'] === 'new-audio'){
		echo $addAudio->add_form();
	}
	
	if(!isset($_REQUEST['action'])){
		echo "<h2>Audios"."   ".sprintf('<a href="?page=%s&action=%s">New audio</a>',$_REQUEST['page'],'new-audio').'</h2>';
		$audioTable = new Audio_Table();
		$audioTable->prepare_items();
		$audioTable->display();
	}
}
?>