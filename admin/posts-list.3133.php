<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!--div class="navbar-header">
      <a class="navbar-brand" href="#">ErraticCMS</a>
    </div-->
    <ul class="nav navbar-nav">
      <li><a href="#"><i class="glyphicon glyphicon-home"></i> Visit your website</a></li>
	  <li><a href="index.php"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-plus"></i> New</a>
        <ul class="dropdown-menu">
          <li><a href="#"></a></li>
          <li><a href="?action=new-post"><i class="glyphicon glyphicon-book"></i> Post</a></li>
          <li><a href="media.php"><i class="glyphicon glyphicon-facetime-video"></i> Media</a></li>
        </ul>
      </li>
	  <li class="active"><a href="#"><i class="glyphicon glyphicon-book"></i> Posts</a></li>
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
	<h1>Your posts</h1>
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
				echo "<a href='../?post_id=". $rowpostlog['post_id'] ."' target='_blank' role='button' class='btn btn-primary'>View this post</a>&nbsp;<a href='?rm_post=". $rowpostlog['post_id'] ."' role='button' class='btn btn-danger'>Delete this post</a>";
				echo "<hr><br>";
			}
			
			echo "Fetched data successfully\n";
			?>
		</div>
  	<hr>
  	<div style="padding: 10px; bottom: 1;">
			<p>Powered by ErraticCMS | <a href="#">Remove Branding?</a></p>
	</div>
</div>