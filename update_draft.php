<?php
include "header.php";
include "db.php";

 
  $title = $_POST['title'];
  $body = $_POST['body'];
  $id = $_POST['post_id'];
  
  //if($_POST['update_date']) MAKE SURE TO MAKE IT SO THE DATE IS UPDATED BY CHOICE!!! ("warning this will change the display order of your blog page!")
  $datetime = date("Y-m-d H:i:s");
   // dont forget to add CUSTOM TIMEZONE functionality here!!!
  
 if($_POST['update_draft'] == "Update Draft"){
    $draft = 1; 
  } elseif($_POST['update_draft'] == "Post"){
    $draft = 0;
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