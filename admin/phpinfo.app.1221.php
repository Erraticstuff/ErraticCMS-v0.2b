<?php
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../ecms-login.php?redirect=phpinfo-admin');
	} else {
        echo phpinfo();
    }

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../ecms-login.php");
    }
?>