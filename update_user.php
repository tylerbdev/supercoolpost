<?php
include "header.php";
include "db.php";

 
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $uid = $_SESSION["uid"];


   $sql = "UPDATE blogs SET username=:username, password=:password, email=:email WHERE uid = :uid";
                                          
$stmt = $db->prepare($sql);
                                              
$stmt->bindParam(':username', $username, PDO::PARAM_STR);      
$stmt->bindParam(':password', $password, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':uid', $uid, PDO::PARAM_STR);

                                      
$stmt->execute(); 

header('Location: settings_confirm.php');



?>