<?php
include_once('././ecms-config.php');

$postid = $_GET['post_id'];
$pid;
if(!isset($postid)) {
    $pid = "0";
} else {
    $pid = $_GET['post_id'];
}

$commdbcon = mysqli_connect(ECMS_DB_HOST, ECMS_DB_USR, ECMS_DB_PASS, ECMS_DB_NAME);

if(!$commdbcon) {
    echo "Failed to fetch data!<br>ERROR: Cannot connect to database";
}

$commsqlload = "SELECT * FROM comments WHERE PostID=". $pid . ";";
$commqueryload = mysqli_query($commdbcon, $commsqlload);

if(!$commqueryload) {
    echo "Failed to fetch data!";
}

while($comm = mysqli_fetch_assoc($commqueryload)) {
        echo "<span>Name : ". $comm['Name'] ."</span><br>";
        echo "<span>URL : <a href='http://". $comm['weburl'] ."' target='_blank'>". $comm['weburl'] ."</a></span><br>"; 
        echo "<span>Comment : </span><br>";
        echo "<span>". $comm['content'] ."</span><br>";
        echo "<hr><br>";
}

?>