<?php
include "db.php";

if( $_POST )
{
 
  $title = $_POST['title'];
  $body = $_POST['body'];

  $title = mysql_real_escape_string($title);
  $body = mysql_real_escape_string($body);

//Retrieve user's timezone to enable usage of date() for post timestamp
  $user_timezone = FETCH
  date_default_timezone_set($user_timezone)
  $datetime = 

 
  $query = "INSERT INTO `supercoolpost`.`blogs` (`title`, `body`, `datetime`, `draft`) VALUES ('$title', '$body', '$datetime', '1')";

  mysql_query($query);
}
?>