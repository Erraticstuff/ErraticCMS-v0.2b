<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../ecms-login.php?redirect=new-post');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../ecms-login.php");
	}
	include_once('../ecms-config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
	$(document).ready(function(){
		$("form").on("submit", function(event){
			event.preventDefault();
	
			var formValues= $(this).serialize();
			var actionUrl = $(this).attr("action");
	
			$.post(actionUrl, formValues, function(data){
				$("#result").html(data);
			});
		});
	});
	</script>
</head>
<body style="background-color: black; color: white;">
<?php
if(isset($_GET['action'])) {
	if($_GET['action'] == "new-post") {
		include('new-post.2133.php');
	} elseif (empty($_GET['action'])) {
		include('posts-list.3133.php');
	}
} elseif(isset($_GET['rm_post'])) {
	include('rm-post.app.1312.php');
} else {
	include('posts-list.3133.php');
}
?>
<script src="../erratic-cms/external/toggleclr.js"></script>
</body>
</html>