<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'supercoolpost';

$connect = mysql_connect($dbhost, $dbuser, $dbpass);

mysql_select_db($dbname);

?>