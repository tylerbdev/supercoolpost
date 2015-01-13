<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'supercoolpost';




 $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
   

?>