<?php

include_once('././ecms-config.php');
//Test
//echo ECMS_HOST_NAME;
$output = array();

if(isset($_POST['postcomment'])) {
    $name = $_POST['name'];
    $emails = $_POST['email'];
    $websiteurl = $_POST['websiteurl'];
    $ipaddr = $_SERVER['REMOTE_ADDR'];
    $postid = $_POST['postid'];
    $content = $_POST['content'];
    $condb = mysqli_connect(ECMS_DB_HOST, ECMS_DB_USR, ECMS_DB_PASS, ECMS_DB_NAME);
    if(empty($name) || empty($emails) || empty($content)) {
        array_push($output, "ERROR: Name, Email, Content cannot be empty");
    } else {
        $query = "INSERT INTO comments (PostID, Name, Email, weburl, content, ipaddr) VALUES('". $postid ."', '". $name ."', '". $emails ."', '". $websiteurl ."', '". $content ."', '". $ipaddr ."')";
        if (mysqli_query($condb, $query)) {
            array_push($output, "INFO: Comment successfully posted!");
        }
    }
} else {
    array_push($output, "");
}


?>