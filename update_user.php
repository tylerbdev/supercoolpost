<?php
include "header.php";
include "db.php";

$uid = $_SESSION["uid"];

if(isset($_POST['password'])){
	$password = $_POST['password'];

	$sql = "UPDATE main SET password=:password WHERE uid = :uid";
	$stmt = $db->prepare($sql);                                             
	$stmt->bindParam(':password', $password, PDO::PARAM_STR);
	$stmt->bindParam(':uid', $uid, PDO::PARAM_STR);
	$stmt->execute(); 
}

if(isset($_POST['email'])){
	$email = $_POST['email'];
	
	$sql = "UPDATE main SET email=:email WHERE uid = :uid";
	$stmt = $db->prepare($sql);                                             
	$stmt->bindParam(':email', $email, PDO::PARAM_STR);
	$stmt->bindParam(':uid', $uid, PDO::PARAM_STR);
	$stmt->execute(); 
}

// header('Location: settings_confirm.php');



?>