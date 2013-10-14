<?php



class Video{

    function getLastAddedVideo(){
        global $wpdb;
        $data = $wpdb->get_results('SELECT * FROM wp_videos ORDER BY ID DESC LIMIT 0, 1');
        return $data[0];
    }
}

?>