<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../ecms-login.php?redirect=tools');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../ecms-login.php");
	}

  include('../ecms-config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body style="background-color: black; color: white;">
<?php
		
			if($_GET['page'] == "sys-info") {
				include_once('tools.sys-info.2452.php');
			} elseif ($_GET['page'] == "site-health") {
				include_once('tools.site-health.3422.php');
			} elseif ($_GET['page'] == "import-config") {
				include_once('tools.import-config.5622.php');
			} elseif ($_GET['page'] == "export-config") {
				include_once('tools.export-config.4224.php');
			} else {
				
			}
			
?>
<script src="../erratic-cms/external/toggleclr.js"></script>
<script src="script.js"></script>

</body>
</html>