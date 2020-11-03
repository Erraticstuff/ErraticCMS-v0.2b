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
          <li class="active"><a href="#"><i class="glyphicon glyphicon-book"></i> Post</a></li>
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
	<div class="newpost">
		<div style="background-color: gray; max-height: 150px; height: auto; width: 100%; padding-top: 20px; padding-bottom: 20px; padding-left: 2px;">Use <a href="https://html-online.com/editor/" target="_blank">html-online.com</a> for convert your paragraph or headings or others to html code</div><br>
		<!--form action="../erratic-cms/public-page/publish.php" name="content" method="POST">
				<center>
					<textarea placeholder="Paste or type the html code in here!" name="content" style="color: black; max-height: 502px; margin: 0px; max-width: 1125px; min-width: 276px; min-height: 374px; height:auto; width:auto;"></textarea>
				</center>
				<br>
				<input style="text-align: right; color: black;" type="submit" value="Post!">
			</form-->
			<form action="../erratic-cms/public-page/publish.php" method="POST">
				<center>
					<textarea placeholder="Paste or type the html code in here!" name="content"></textarea>
				</center>
				<input type="submit" name="publish" value="Publish">
			</form>
		<div id="result"></div>
		</div>
  	<hr>
  	<div style="padding: 10px; bottom: 1;">
			<p>Powered by ErraticCMS | <a href="#">Remove Branding?</a></p>
	</div>
</div>
</body>
</html>