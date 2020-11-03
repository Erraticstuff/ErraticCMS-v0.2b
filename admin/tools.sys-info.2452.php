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
				<li class="active"><a href="#"><i class="glyphicon glyphicon-info-sign"></i> [Special] Your server's hosting info</a></li>
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
  <?php
$postmaxsize = ini_get('post_max_size');
$uploadsize = ini_get('upload_max_filesize');
if($postmaxsize < $uploadsize) {
	$uploadfilesizelimit = $postmaxsize;
} elseif ($uploadsize < $postmaxsize) {
	$uploadfilesizelimit = $uploadsize;
}
?>
    <h1>Server Info</h1>
    <p>Server&apos;s host name : <span><?php echo $_SERVER['SERVER_NAME']; ?></span></p>
    <p>Server&apos;s IP address : <span><?php echo $_SERVER['REMOTE_ADDR']; ?></span></p
    <p>Server&apos;s protocol : <span><?php echo $_SERVER['SERVER_PROTOCOL']; ?></span></p>
    <p>Server&apos;s port : <span><?php echo $_SERVER['SERVER_PORT']; ?></span></p>
    <p>Server&apos;s software : <span><?php echo $_SERVER['SERVER_SOFTWARE']; ?></span></p>
    <p>Server&apos;s PHP version (Deprecated): <span><?php echo phpversion('tidy'); ?></span></p>
    <p>Upload file size limit : <span><?= $uploadfilesizelimit; ?></span></p>
    <h3>Your php.ini config</h3>
    <div style="max-width: 600px; min-width: 300px; width:auto; max-height: 600px; min-height: 300px; height:auto; overflow: auto;">
    upload_max_filesize = <?= ini_get('upload_max_filesize');?><br>
    post_max_size = <?= ini_get('post_max_size'); ?><br>
    memory_limit = <?= ini_get('memory_limit');?><br>
    upload_tmp_dir = <?= ini_get('upload_tmp_dir');?><br>
    display_errors = <?= ini_get('display_errors');?><br>
    max_execution_time = <?= ini_get('max_execution_time');?><br>
    max_file_uploads = <?= ini_get('max_file_uploads');?><br>
    max_input_time = <?= ini_get('max_input_time');?><br>
    SMTP host = <?= ini_get('SMTP');?><br>
    smtp_port = <?= ini_get('smtp_port');?><br>
    allow_url_fopen	= <?= ini_get('allow_url_fopen');?><br>
    allow_url_include = <?= ini_get('allow_url_include');?><br>
    default_charset	= <?= ini_get('default_charset');?><br>
    error_log = <?= ini_get('error_log');?><br>
    </div>
    <br>
    <a href="#" onclick="phpinf()">Show phpinfo()</a>
    <div class="phpinfo" id="phpinfo" style="display: none;">
    <?php include_once('phpinfo.app.1221.php'); ?>
    </div>
  	<hr>
  	<div style="padding: 10px; bottom: 1;">
			<p>Powered by ErraticCMS | <a href="#">Remove Branding?</a></p>
	</div>
</div>
