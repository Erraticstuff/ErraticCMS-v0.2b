<?php
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../ecms-login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../ecms-login.php");
    }
    //$_GET['file_dl']
    include_once('../ecms-config.php');
    $dbdl = mysqli_connect(ECMS_DB_HOST, ECMS_DB_USR, ECMS_DB_PASS, ECMS_DB_NAME);
 
    if(!$dbdl ) {
     die('Could not connect: ' . mysql_error());
    }

    $sqlexec = 'SELECT fileName, fileSize, fileType, hash_md5, year_uploaded, month_uploaded FROM media';
    $getfl = mysqli_query( $dbdl, $sqlexec );
    
    if(! $getfl ) {
       die('Could not get data: ' . mysql_error());
    }
    
    while($row = mysqli_fetch_assoc($getfl)) {
          $filename = $_GET['file_dl'];
          $file = "../erratic-cms/uploads/{$row['year_uploaded']}/{$row['month_uploaded']}/".$filename;
          
        header('Location: '. $file);
    }
    
    //echo "Fetched data successfully\n";
    
    mysqli_close($db);
?>