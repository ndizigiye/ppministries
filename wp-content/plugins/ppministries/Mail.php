<?php
/*
 * Mail script to email to all users when a new video is added
 * on the web site
 */
function GetUsers($xmlPath){
    $users = simplexml_load_file($xmlPath);
    $user = $users->user;
    return $user;
}

function MailToAllUser($content){
    $dir = plugin_dir_path( __FILE__ );
    $xmlPath = $dir.'mails.xml' ;
    $users = GetUsers($xmlPath);
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $headers .= "From: ndiarmand@gmail.com" . "\r\n";
    foreach ($users as $user) {
        $to = $user->email;
        $subject = "Video nshasha";
        mail($to,$subject,$content,$headers);
        return "Mail Sent.";
    }
}

function CreateBody($title,$thumbnail,$url){
    
    $html ="<html><body>";
    $html .= "Yesu ashimwe benedata,"."</br></br>";
    $html .= "Kuri website twashizeho video nshasha"."</br>";
    $html .= "Nimurabe hano:"."</br></br>";
    $html .= "<a href='".$url."'>".$title."</a>"."</br></br>";
    $html .= "<img height='360' width='480' scr='".$thumbnail."'/>"."</br>";
    $html .= "<html><body>";
    
    return $html;
}
?>
