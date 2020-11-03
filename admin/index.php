<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../ecms-login.php?redirect=admin');
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
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!--div class="navbar-header">
      <a class="navbar-brand" href="#">ErraticCMS</a>
    </div-->
    <ul class="nav navbar-nav">
      <li><a href="#"><i class="glyphicon glyphicon-home"></i> Visit your website</a></li>
	  <li class="active"><a href="#"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-plus"></i> New</a>
        <ul class="dropdown-menu">
          <li><a href="#"></a></li>
          <li><a href="post.php?action=new-post"><i class="glyphicon glyphicon-book"></i> Post</a></li>
          <li><a href="media.php"><i class="glyphicon glyphicon-facetime-video"></i> Media</a></li>
        </ul>
      </li>
	  <li><a href="post.php"><i class="glyphicon glyphicon-book"></i> Posts</a></li>
      <li><a href="#"><i class="glyphicon glyphicon-pencil"></i> Apperance</a></li>
	  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-wrench"></i> Tools</a>
			<ul class="dropdown-menu">
				<li><a href="tools.php?page=export-config"><i class="glyphicon glyphicon-open"></i> Export your Configuration</a></li>
				<li><a href="tools.php?page=import-config"><i class="glyphicon glyphicon-save"></i> Import your Configuration</a></li>
				<li><a href="tools.php?page=site-health"><i class="glyphicon glyphicon-wrench"></i> Check your website's health</a></li>
				<li><a href="tools.php?page=sys-info"><i class="glyphicon glyphicon-info-sign"></i> [Special] Your server's hosting info</a></li>
			</ul>
	  </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Hello, <?php echo $_SESSION['username']; ?></a>
			<ul class="dropdown-menu">
				<li onclick="toggleclr()"><a href="#" id="txt"><i class="glyphicon glyphicon-adjust"></i> Switch to dark mode</a></li>
				<li><a href="?logout=1" style="color: red;"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
			</ul>
	  </li>
    </ul>
  </div>
</nav>
  
<div class="container">
  	<h3>Welcome to ErraticCMS</h3>
  	<p>Note : This CMS is still in beta version!</p>
	<hr>
	<h3>Your Uploads</h3>
	<p><a class="btn btn-success" role="button" href="media.php?action=upload" target="_blank">Upload your media</a></p>
	<div style="max-width: 600px; min-width: 300px; width:auto; max-height: 600px; min-height: 300px; height:auto; overflow: scroll;">
	<?php
		include_once('../ecms-config.php');
	$db = mysqli_connect(ECMS_DB_HOST, ECMS_DB_USR, ECMS_DB_PASS, ECMS_DB_NAME);

	if(! $db ) {
		die('Could not connect: ' . mysql_error());
	}
	$sql = 'SELECT fileName, fileSize, fileType, hash_md5, year_uploaded, month_uploaded FROM media';
	$retval = mysqli_query( $db, $sql );
	
	if(! $retval ) {
		die('Could not get data: ' . mysql_error());
	}
	
	while($row = mysqli_fetch_assoc($retval)) {
		echo "File Name : {$row['fileName']}<br> ".
			"File Size : {$row['fileSize']}<br> ".
			"File Type : {$row['fileType']}<br> ".
			"Hash : {$row['hash_md5']}<br>".
			"Uploaded at : {$row['year_uploaded']} / {$row['month_uploaded']} <br>".
			"<a class='btn btn-danger' role='button' href='media.php?file_rm={$row['fileName']}&year={$row['year_uploaded']}&month={$row['month_uploaded']}'>Delete</a>&nbsp;<a class='btn btn-primary' role='button' href='?file_dl={$row['fileName']}'>Download</a>".
			"<hr><br>";
	}
	
	echo "Fetched data successfully\n";
	
	mysqli_close($db);
	?>
	</div>
	<h3>Your Posts</h3>
	<div style="max-width: 600px; min-width: 300px; width:auto; max-height: 600px; min-height: 300px; height:auto; overflow: scroll;">
	<?php
			include_once('../ecms-config.php');
			$dbconpost = mysqli_connect(ECMS_DB_HOST, ECMS_DB_USR, ECMS_DB_PASS, ECMS_DB_NAME);
			$dbsqlpostlog = 'SELECT post_id, year_published, month_published, day_published, filename FROM posts';
			$dbgetpostlog = mysqli_query( $dbconpost, $dbsqlpostlog );
			
			if(! $dbgetpostlog ) {
				echo 'Could not get data';
			}
			
			while($rowpostlog = mysqli_fetch_assoc($dbgetpostlog)) {
				echo "<span>Post ID : ". $rowpostlog['post_id'] ."</span><br>";
				echo "<span>Published at : ". $rowpostlog['month_published'] ."/". $rowpostlog['day_published'] ."/". $rowpostlog['year_published'] ."</span><br>";
				echo "<span>Filename : ". $rowpostlog['filename'] ."</span><br>";
				echo "<a href='../?post_id=". $rowpostlog['post_id'] ."' target='_blank' role='button' class='btn btn-primary'>View this post</a>&nbsp;<a href='post.php?rm_post=". $rowpostlog['post_id'] ."' role='button' class='btn btn-danger'>Delete this post</a>";
				echo "<hr><br>";
			}
			
			echo "Fetched data successfully\n";
			?>
	</div>
	<h3>Comments</h3>
	<div style="max-width: 600px; min-width: 300px; width:auto; max-height: 600px; min-height: 300px; height:auto; overflow: scroll;">
	<?php
	include_once('../ecms-config.php');
	$dbcomm = mysqli_connect(ECMS_DB_HOST, ECMS_DB_USR, ECMS_DB_PASS, ECMS_DB_NAME);

	if(!$dbcomm ) {
		die('Could not connect: ' . mysql_error());
	}
	$sqlcomment = 'SELECT PostID, Name, Email, weburl, content, ipaddr FROM comments';
	$getcomm = mysqli_query( $dbcomm, $sqlcomment );
	
	if(! $getcomm ) {
		echo 'Could not get data: ';
	}
	
	while($rowcomment = mysqli_fetch_assoc($getcomm)) {
		echo "Name : {$rowcomment['Name']}<br> ".
			"E-mail : {$rowcomment['Email']}<br> ".
			"URL : {$rowcomment['weburl']}<br> ".
			"Content : {$rowcomment['content']}<br> ".
			"IP Address : {$rowcomment['ipaddr']}<br> ".
			"<hr><br>";
	}
	
	echo "Fetched data successfully\n";
		?>
	</div>
  	<hr>
  	<div style="padding: 10px; bottom: 1;">
			<p>Powered by ErraticCMS | <a href="#">Remove Branding?</a></p>
	</div>
</div>
<script src="../erratic-cms/external/toggleclr.js"></script>
</body>
</html>