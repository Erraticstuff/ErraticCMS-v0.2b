<h3>Ummmmm....</h3>
<p>This feature is still experimental!</p>
<p><a class="btn btn-success" role="button" href="?action=upload">Upload your media</a></p>
<hr>
<h3>Your Uploads</h3>
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
         "<a class='btn btn-danger' role='button' href='?file_rm={$row['fileName']}&year={$row['year_uploaded']}&month={$row['month_uploaded']}'>Delete</a>&nbsp;<a class='btn btn-primary' role='button' href='?file_dl={$row['fileName']}'>Download</a>".
         "<hr><br>";
   }
   
   echo "Fetched data successfully\n";
   
   mysqli_close($db);
?>
</div>