<?php include_once('ecms-module-su.php') ?>
<?php include_once('ecms-config.php'); ?>
<!--DOCTYPE html>
<html>
<head>
	<title><?=  ECMS_SITE_NAME; ?> - Login</title>
	<link rel="stylesheet" type="text/css" href="admin/style.css">
</head>
<body>

<div class="login">
	<form method="post" action="#login">
		<h2>Login</h2>
		<?php include('admin/errors.php'); ?>
			<label>Username</label><br>
			<input type="text" name="usrname"><br>
			<label>Password</label><br>
			<input type="password" name="pwd"><br>
			<button type="submit" class="btn" name="login">Login</button>
	</form>
</div>

</body>
</html-->
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Login - <?=  ECMS_SITE_NAME; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Login - <?=  ECMS_SITE_NAME; ?></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li onclick="toggleclr()"><a href="#" id="txt"><i class="glyphicon glyphicon-adjust"></i> Switch to dark mode</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <h2>Login</h2>
  <?php 
  include('admin/errors.php'); 
  ?>
  <form action="" method="POST">
    <div class="form-group">
      <label>Username:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter your username" name="usrname">
    </div>
    <div class="form-group">
      <label>Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter your password" name="pwd">
    </div>
    <button type="submit" class="btn btn-default" name="adminlogin">Login!</button>
  </form>
  <br><br>
  <a href="index.php"><i class="glyphicon glyphicon-triangle-left"></i> Go back to <?= ECMS_SITE_NAME ?> website</a>
  <div style="padding: 10px; bottom: 1;">
			<p>Powered by ErraticCMS | <a href="#">Remove Branding?</a></p>
	</div>
</div>
<script src="erratic-cms/external/toggleclr.js"></script>
</body>
</html>