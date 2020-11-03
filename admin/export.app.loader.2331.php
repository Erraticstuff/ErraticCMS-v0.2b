
<?php

include_once('../ecms-config.php');

if($_SERVER['SERVER_NAME'] == ECMS_HOST_NAME) {
    $yearbackup = date("Y");
    $monthbackup = date("m");
    $daybackup = date("d");
    $hourbackup = date("H");
    $minutesbackup = date("i");
    $secondsbackup = date("s");
    $numidbackup = rand();
    class FlxZipArchive extends ZipArchive 
    {
    public function addDir($location, $name) 
    {
        $this->addEmptyDir($name);
        $this->addDirDo($location, $name);
    } 
    private function addDirDo($location, $name) 
    {
        $name .= '/';
        $location .= '/';
        $dir = opendir ($location);
        while ($file = readdir($dir))
        {
            if ($file == '.' || $file == '..') continue;
            $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
            $this->$do($location . $file, $name . $file);
        }
    } 
    }
    ?>

    <?php
    $the_folder = '../erratic-cms/uploads';
    $zip_file_name = "../erratic-cms/backup/archive-erratic-cms-backup-". $yearbackup ."-". $monthbackup ."-". $daybackup ."-". $hourbackup ."-". $minutesbackup ."-". $secondsbackup ."-". $numidbackup . ".zip";
    $za = new FlxZipArchive;
    $res = $za->open($zip_file_name, ZipArchive::CREATE);
    if($res === TRUE) 
    {
        $za->addDir($the_folder, basename($the_folder));
        echo "DONE";
        $za->close();
    }
    else{
        echo 'Could not create a zip archive';
    }
} else {
    echo "ERROR: 401 Unauthorized";
}
?>