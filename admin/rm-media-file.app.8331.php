<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include_once('../ecms-config.php');

$link = mysqli_connect(ECMS_DB_HOST, ECMS_DB_USR, ECMS_DB_PASS, ECMS_DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$name = $_GET['file_rm'];
$yearflrm = $_GET['month'];
$mnthflrm = $_GET['year'];

// Attempt delete query execution
$sql = "DELETE FROM media WHERE fileName='". $name ."'";
if(mysqli_query($link, $sql)){
    echo "Deleting ". $name ." ...<br>";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$linkflrm = "../erratic-cms/uploads/". $mnthflrm ."/". $yearflrm . "/". $name;

if(!is_dir($linkflrm)) {
    if(!file_exists($linkflrm)) {
        echo "<br>". $name ." already deleted";
    } else { 
        if(unlink($linkflrm)) {
            echo "<br>". $name ." deleted";
        }
    }
} else {
    echo "This is a directory NOT a file";
}
// Close connection
mysqli_close($link);
?>
<p><a href="#" class="btn btn-primary" role="button" onclick="window.history.back()"><i class="glyphicon glyphicon-circle-arrow-left"></i> Go back</a></p>