<?php
/*
***Erratic CMS modified version****
**Thank you for using Erratic CMS**
*Made by Erratic Stuff*
Copyright Erratic Stuff 2020-2020
*/
//Proccessing the ID's from the URI


if(empty($_GET['post_id'])) {
  $page = include('default.html');
} else {
  if (isset($_GET['post_id']) || file_exists($_GET['post_id'] . '.html')) {
    $page = include($_GET['post_id'] . '.html');
  } else {
    $page = include("erratic-cms/themes/404.php");
  }
}  

return $page;

//if(header('HTTP/1.1 404 Not Found')) {
//  echo "Oof";
//}
?>
