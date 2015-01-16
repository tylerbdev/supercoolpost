<?php
include "header.php";
include "db.php";


$username = $_POST['username'];
$password = $_POST['password'];



 // $sth = $db->query("SELECT * FROM main WHERE username = $username");
 // $result = $sth->execute();
    

$stmt = $db->prepare('SELECT * FROM main WHERE username = ?');
$stmt->bindParam(1, $username, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if( ! $row)
{
    $_SESSION['login'] = "invalid";
    header('Location: logintest.php');

} elseif($row['username'] == $username && $row['password'] != $password) {
	$_SESSION['login'] = "invalid";
	header('Location: logintest.php');

} elseif($row['username'] == $username && $row['password'] == $password) {
	$_SESSION['login'] = "valid";
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	$_SESSION['uid'] = $row['uid'];
	$_SESSION['timezone'] = $row['timezone'];
	header('Location: member.php');
}




?>