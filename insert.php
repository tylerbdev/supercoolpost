<?php
include "header.php";
include "db.php";

 
  $title = $_POST['title'];
  $body = $_POST['body'];
  $datetime = date("Y-m-d H:i:s");
   // dont forget to add CUSTOM TIMEZONE functionality here!!!
  
  if($_POST['submit_post'] == "Post"){
  	$draft = 0;	
  } elseif($_POST['submit_post'] == "Save As Draft"){
  	$draft = 1;
  }
  
  $owner = $_SESSION["uid"];


	

  	$sql = "INSERT INTO blogs(title, body, owner, draft, datetime) VALUES (:title, :body, :owner, :draft, :datetime)";
                                          
$stmt = $db->prepare($sql);
                                              
$stmt->bindParam(':title', $title, PDO::PARAM_STR);      
$stmt->bindParam(':body', $body, PDO::PARAM_STR);
$stmt->bindParam(':owner', $owner, PDO::PARAM_STR);
$stmt->bindParam(':draft', $draft, PDO::PARAM_STR);
$stmt->bindParam(':datetime', $datetime, PDO::PARAM_STR);
                                      
$stmt->execute(); 




	header('Location: post_confirm.php');


?>