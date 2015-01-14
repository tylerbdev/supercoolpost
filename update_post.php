<?php
include "header.php";
include "db.php";

 
  $title = $_POST['title'];
  $body = $_POST['body'];
  
  //if($_POST['update_date']) MAKE SURE TO MAKE IT SO THE DATE IS UPDATED BY CHOICE!!! ("warning this will change the display order of your blog page!")
  $datetime = date("Y-m-d H:i:s");
   // dont forget to add CUSTOM TIMEZONE functionality here!!!
  
  if($_POST['update_post'] == "Change To Draft"){
  	$draft = 1;	
  } elseif($_POST['update_post'] == "Update Draft"){
  	$draft = 1;
  } elseif($_POST['update_post'] == "Post"){
    $draft = 0;
  }
    elseif($_POST['update_post'] == "Update"){
    $draft = 0;
  
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