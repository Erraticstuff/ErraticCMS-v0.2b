<?php
	include('../ecms-config.php');
	if($_SERVER['SERVER_NAME'] == ECMS_HOST_NAME) {
		$fileName = $_FILES["file"]["name"];
		$fileTmp = $_FILES["file"]["tmp_name"];
		$fileType = $_FILES["file"]["type"];
		$fileSize = $_FILES["file"]["size"];
		$year = date("Y");
		$month = date("m");
		$folder = "../erratic-cms/uploads/". $year . "/". $month ."/";
		$sqldbhst = mysqli_connect(ECMS_DB_HOST, ECMS_DB_USR, ECMS_DB_PASS, ECMS_DB_NAME);
		$irlpath = '../erratic-cms/uploads/'. $year . '/'. $month .'/'. $fileName;

		if(empty($_FILES["file"])) {
			echo "Oops You have not selected any file yet<br>";
		}

		if (!file_exists($folder))
			mkdir($folder);
	
		if(move_uploaded_file($fileTmp, $folder . "$fileName")){
			echo $fileName .' Uploaded<br>File location : <a href="../erratic-cms/uploads/'. $year . '/'. $month .'/'. $fileName . '" target="_blank">Click here</a>';
		} else {
			echo "Upload failed! :(";
		}
		
		$hashfile = md5_file($irlpath);
		$query = "INSERT INTO media (fileName, fileSize, fileType, hash_md5, year_uploaded, month_uploaded) VALUES('$fileName', '$fileSize', '$fileType', '$hashfile', '$year', '$month')";
		mysqli_query($sqldbhst, $query);
	} else {
		echo "ERROR: 401 Unauthorized";
	}
?>