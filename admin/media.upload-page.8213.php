<?php
$postmaxsize = ini_get('post_max_size');
$uploadsize = ini_get('upload_max_filesize');
if($postmaxsize < $uploadsize) {
	$uploadsizelimit = $postmaxsize;
} elseif ($uploadsize < $postmaxsize) {
	$uploadsizelimit = $uploadsize;
}
?>
<h1><i class="glyphicon glyphicon-warning-sign"></i><br>NOTE : Your upload file size limit is <?= $uploadsizelimit; ?>.<br>You can change the limit by editing the php.ini file<br><a href="tools.php?page=sys-info">More info of your server's</a></h1>
<h3>Upload your media</h3>
<form id="upload_form">
	<div class="form-group mb-5">
		<label>Choose File</label><br/>
		<input type="file" name="file" id="file" class="form-control">
	</div>
	<div class="form-group mb-5">
	  	<input type="button" id="upload" value="Upload File" class="btn btn-success">
	</div>
  	<progress id="progressBar" value="0" max="100" style="width:100%; display: none;"></progress>
	<h3 id="status"></h3>
	<p id="loaded_n_total"></p>
</form>
<script src="../erratic-cms/external/uploader.module.app.2321.js"></script>