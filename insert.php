<?php
include "db.php";

if( $_POST )
{
 
  $title = $_POST['title'];
  $body = $_POST['body'];

  $title = mysql_real_escape_string($title);
  $body = mysql_real_escape_string($body);
  $datetime = 

 
  $query = "INSERT INTO `supercoolpost`.`blogs` (`title`, `body`, `datetime`, `draft`) VALUES ('$title', '$body', '$datetime', '0')";

  mysql_query($query);
}
?>