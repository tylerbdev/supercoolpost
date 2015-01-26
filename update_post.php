<?php
include "header.php";
include "db.php";

 
  $title = $_POST['title'];
  $body = $_POST['body'];
  $id = $_POST['post_id'];
  
 $now = new DateTime();
$now->setTimezone(new DateTimeZone($_SESSION['timezone']));
$datetime = $now->format("Y-m-d H:i:s");
  
 if($_POST['update_post'] == "Update"){
    $draft = 0; 
  } elseif($_POST['update_post'] == "Save As Draft"){
    $draft = 1;
  }
  

  $owner = $_SESSION["uid"];


  

    $sql = "UPDATE blogs SET title=:title, body =:body, draft=:draft WHERE id = :id";
                                          
$stmt = $db->prepare($sql);
                                              
$stmt->bindParam(':title', $title, PDO::PARAM_STR);      
$stmt->bindParam(':body', $body, PDO::PARAM_STR);
$stmt->bindParam(':draft', $draft, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);

                                      
$stmt->execute(); 

if($_POST['update_datetime'] == true){
  $sql = "UPDATE blogs SET datetime=:datetime WHERE id= :id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':datetime', $datetime, PDO::PARAM_STR);
  $stmt->bindParam(':id', $id, PDO::PARAM_STR);
  $stmt->execute(); 
}




  header('Location: post_confirm.php');



?>