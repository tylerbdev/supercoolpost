<?php
include "header.php";
include "db.php";

 
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $first_setup_complete = 0;
 
//Make member_blog/x/index.php
mkdir("member_blog/". $username, 777, true);
$file = "member_blog_index.php";
$newfile = "member_blog/" . $username . "/index.php";
copy($file,$newfile);


$sql = "INSERT INTO main (username, password, email, first_setup_complete) VALUES (:username, :password, :email, :first_setup_complete)";
                                          
$stmt = $db->prepare($sql);
                                              
$stmt->bindParam(':username', $username, PDO::PARAM_STR);      
$stmt->bindParam(':password', $password, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':first_setup_complete', $first_setup_complete, PDO::PARAM_INT);


                                      
$stmt->execute(); 

header('Location: registration_confirm.php');





?>