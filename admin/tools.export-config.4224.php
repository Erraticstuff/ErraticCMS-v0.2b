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
          <li><a href="post.php?action=new-post"><i class="glyphicon glyphicon-book"></i> Post</a></li>
          <li class="active"><a href="media.php"><i class="glyphicon glyphicon-facetime-video"></i> Media</a></li>
        </ul>
      </li>
	  <li><a href="post.php"><i class="glyphicon glyphicon-book"></i> Posts</a></li>
      <li><a href="#"><i class="glyphicon glyphicon-pencil"></i> Apperance</a></li>
	  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-wrench"></i> Tools</a>
			<ul class="dropdown-menu">
				<li class="active"><a href="#"><i class="glyphicon glyphicon-open"></i> Export your Configuration</a></li>
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
<?php
$yearbackupcnf = date("Y");
$monthbackupcnf = date("m");
$daybackupcnf = date("d");
$hourbackupcnf = date("H");
$minutesbackupcnf = date("i");
$secondsbackupcnf = date("s");
$numidbackupcnf = rand();
?>
<div class="container">
  	<h3>Welcome to ErraticCMS</h3>
  	<p>Note : This CMS is still in beta version!</p>
	<hr>
    <h3>Export / Backup your config's</h3>
    <p><a href="../ecms-config.php" download="backup-config-erraticcms-<?= $yearbackupcnf; ?>-<?= $monthbackupcnf; ?>-<?= $daybackupcnf; ?>-<?= $hourbackupcnf; ?>-<?= $minutesbackupcnf; ?>-<?= $secondsbackupcnf; ?>-<?= $numidbackupcnf; ?>.php">Download your website's config</a></p>
    <hr>
    <h3>Export / Backup your uploads</h3>
    <a onclick="exportaction()" href="export.app.loader.2331.php">Export</a>
    <h4 id="event-loading"></h4>
    <p id="warning"></p>
  	<hr>
  	<div style="padding: 10px; bottom: 1;">
			<p>Powered by ErraticCMS | <a href="#">Remove Branding?</a></p>
	</div>
</div>
<script src="script.js"></script>