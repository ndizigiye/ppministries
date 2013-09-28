<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License
 
Name       : WaterDrop 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130505
 
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PPministries</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="<?php bloginfo('template_url') ?>/js/default.js"></script>
<script src="js/default.js"></script>
<link
    href="<?php bloginfo('template_url') ?>/lib/menucool/themes/1/js-image-slider.css"
    rel="stylesheet" type="text/css" />
<script
    src="<?php bloginfo('template_url') ?>/lib/menucool/themes/1/js-image-slider.js"
    type="text/javascript"></script>
<link
    href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700"
    rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_url') ?>/css/default.css"
    rel="stylesheet" type="text/css" media="all" />
<link href="<?php bloginfo('template_url') ?>/css/watch.css"
    rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<?php
//videos setup
require_once( ABSPATH . 'wp-content/plugins/ppministries/youtube.php' );

global $wpdb;
$id = $_REQUEST['id'];

if (!isset($id)){
    $data = $wpdb->get_results('SELECT ID FROM wp_videos ORDER BY ID DESC LIMIT 0, 1');
    echo '<script> window.location = "'.'/?page_id=8&id='.$data[0]->ID.'"</script>';
    var_dump($data);
}
$data= $wpdb->get_results('SELECT URL FROM wp_videos WHERE ID='.$id);
$url = $data[0]->URL;
$youtube = new Youtube();
$videoID = $youtube->getYoutubeID($url);
$videoTitle = $youtube->getTitle($videoID);
$videoDescription = $youtube->getDescription($videoID);
$videoDate = $youtube->getDate($id);
$videoTags = $youtube->getTags($id);
$videoTags = $videoTags[0];

$relatedVideos= $wpdb->get_results("SELECT * FROM wp_videos WHERE Tags LIKE '%".$videoTags[0]."%' OR Tags LIKE '%".$videoTags[1]."%'");


?>
<body>
    <div id="wrapper">
        <div id="header">
            <div id="logo">
                <h1>
                    <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?> </a>
                </h1>
                <p></p>
            </div>
        </div>
        <!-- end #header -->
        <div id="menu">
            <?php wp_nav_menu(array('theme_location' => 'main_nav', 'container' => '')); ?>
        </div>
        <div id="two-column">
            <div id="search-box">
                <input type="text" class="search" /> <a
                    href="http://ppministries/design/watch.html" class="link-style">Search</a>
                <a href="http://ppministries/design/browse-video.html"
                    id="browse-button" class="link-style">Browse</a>
            </div>
            <div id="video-main">
                <h2>
                    <?php echo $videoTitle?>
                </h2>
                <iframe width="700" height="400"
                    src="//www.youtube.com/embed/<?php echo $videoID?>?rel=0&autoplay=1" rel="0"
                    frameborder="0"  allowfullscreen></iframe>
                    testestetsetsetset<br>teaetaetsetasetasetset
                <div id="video-description">
                    <p id="video-date"><?php echo date('D', $videoDate).', '.$videoDate;?></p>
                    <p id="video-summary">
                        <?php echo $videoDescription ?>
                    </p>
                    <p id="tags">
                        <img src="images/tag.png" width="14px" height="14px" /> <b>Tags</b>:
                        <?php 
                        foreach($videoTags as $tag){
                            echo '<a href="?s="'.$tag.'">'.$tag.'</href>';
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div id="related-videos">
                <h2>related videos</h2>
                <div id="thumbnails">
                <?php 
                foreach ($relatedVideos as $video){
                    
                    $thisVideoId = $youtube->getYoutubeID($video->URL);
                    $thisVideoTitle = $youtube->getTitle($thisVideoId);
                    $thisVideoThumbnail = $youtube->getThumbnail($thisVideoId);
                    
                    echo '<div id="thumbnail">'.
                    '<img src="'.$thisVideoThumbnail.'" width="120"
                            height="90" alt="" /> <a href="'."/?page_id=8&id=".$video->ID.'">'.$thisVideoTitle.'</a>'.
                    "</div>";
                }
                ?>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        <p>
            Copyright (c) 2013 ppministries.nl All rights reserved. Design by <a
                href="http://www.freecsstemplates.org/" rel="nofollow">FreeCSSTemplates.org</a>
        </p>
    </div>
</body>
</html>