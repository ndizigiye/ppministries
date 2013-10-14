<?php

class Youtube{


	function getYoutubeID($url){
                $match = null;
		preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $match);
		return $match[0];
	}

	function getTitle($id){
		
		$feedURL = 'http://gdata.youtube.com/feeds/api/videos/' . $id;
		$entry = simplexml_load_file($feedURL);
		$entry = (array)$entry;
		$title = $entry[title];
		return $title;
	}

	function getDescription($id){
		
		$feedURL = 'http://gdata.youtube.com/feeds/api/videos/' . $id;
		$entry = simplexml_load_file($feedURL);
		$entry = (array)$entry;
		$description= $entry[content];
		return $description;
	}

	function getDate($id){

		global $wpdb;
		$data = $wpdb->get_results('SELECT Date FROM wp_videos WHERE ID='.$id);
		
		$date = $data[0]->Date;

		return $date;
	}

	function getTags($id){
		global $wpdb;
		$data = $wpdb->get_results('SELECT Tags FROM wp_videos WHERE ID='.$id);
		$data = $data[0]->Tags;
		$tags[] = split(",",$data, 5);

		return $tags;

	}

	function getThumbnail($id){

		return 'http://img.youtube.com/vi/'.$id.'/0.jpg';
	}

}