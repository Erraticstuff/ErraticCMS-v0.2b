
	<body>
	<?php
	if (isset($_GET['post_id'])) {
		$pid = $_GET['post_id'];
	} else {
		$pid = "0";
	}
	?>
		<div>
			<h1><?= ECMS_SITE_NAME; ?></h1>
			<h3><?= ECMS_SITE_DESC; ?></h3>
			<hr>
			<div class="nav">
				<a href="#">Home</a>
				<a href="?page_id=123">Blog</a>
				<a href="?page_id=1332">Contact</a>
			</div>
			<div class="container-main">
				<?= include 'erratic-cms/public-page/display.php'; ?>
				<hr style="width: 60%">
				<div class="comment">
					<h1>Comments</h1>
					<form action="" method="post">
						<div>
							<?php include_once('erratic-cms/api/state-post-comment.php'); ?>
						</div>
						<label>Name</label><br>
						<input type="text" name="name"><br>
						<label>E-mail</label><br>
						<input type="email" name="email" id=""><br>
						<label>Website</label><br>
						<input type="text" name="websiteurl" id=""><br>
						<label>Text</label><br>
						<textarea name="content"></textarea><br>
						<input type="hidden" name="postid" value="<?php echo $pid;?>">
						<button type="submit" name="postcomment">Submit a comment</button><br>
					</form>
				</div>
				<hr style="width: 60%">
				<center>
					<div class="comment-section">
						<?php echo include('erratic-cms/api/load-comment.php'); ?>
					</div>
				</center>
			</div>
