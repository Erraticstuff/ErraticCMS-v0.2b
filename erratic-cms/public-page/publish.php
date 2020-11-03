<?php

	$content = $_POST['content'];
	$id0 = rand(0,999);
	include_once('../../ecms-config.php');
	if($_SERVER['SERVER_NAME'] !== ECMS_HOST_NAME) {
		echo "Oops!";
	} else {
		if(!empty($content)) {
			if (!file_exists($id0 .".html")) {
				$dateyr = date("Y");
				$datemnth = date("m");
				$dateday = date("d");
				$myfile = fopen("$id0.html", "w") or die("Oops. We can not post your page");
				$txt = $content;
				fwrite($myfile, $txt);
				fclose($myfile);
				$filename = $id0 .".html";
				$dbconnlogpid = mysqli_connect(ECMS_DB_HOST, ECMS_DB_USR, ECMS_DB_PASS, ECMS_DB_NAME);
				if(!$dbconnlogpid) {
					echo "ERROR: Unable to establish connection to database";
				}

				$dbqrylogpid = "INSERT INTO posts (post_id, year_published, month_published, day_published, filename)
				VALUES('". $id0 ."', '". $dateyr ."', '". $datemnth ."', '". $dateday ."', '". $filename ."')";
				
				if(mysqli_query($dbconnlogpid, $dbqrylogpid)) {
					echo "Published";
				}
			} else {
				echo "The post already published";
			}
		} else {
			echo "Oops!";
		}
	}


?>