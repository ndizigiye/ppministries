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

function MailToAllUser(){
    $users = GetUsers('C:\Users\ndizigiye\Documents\websites\ppministries\wp-content\plugins\ppministries\mails.xml' );
    foreach ($users as $user) {
        $to = $user->email;
        $subject = "Test mail";
        $message = "Hello! This is a simple email message.";
        $from = "info@ppministries.org";
        $headers = "From:" . $from;
        mail($to,$subject,$message,$headers);
        return "Mail Sent.";
    }
}
?>
