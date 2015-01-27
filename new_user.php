<?php
include "header.php";
include "db.php";

 
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $first_setup_complete = 0;
  $public_toggle = 1;
  $about_toggle = 1;
  $about = "Enter a short description that will show up on your blog, or alternatively, turn off 'Show About Section' in Blog Settings.";
 
//Make member_blog/x/index.php
mkdir("member_blog/". $username, 750, true);
$file = "member_blog_index.php";
$newfile = "member_blog/" . $username . "/index.php";
copy($file,$newfile);


//Insert user information and default values into users table
$sql = "INSERT INTO main (username, password, email, about, public_toggle, about_toggle, first_setup_complete) VALUES (:username, :password, :email, :about, :public_toggle, :about_toggle, :first_setup_complete)";
                                          
$stmt = $db->prepare($sql);
                                              
$stmt->bindParam(':username', $username, PDO::PARAM_STR);      
$stmt->bindParam(':password', $password, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':about', $about, PDO::PARAM_STR);
$stmt->bindParam(':public_toggle', $public_toggle, PDO::PARAM_STR);
$stmt->bindParam(':about_toggle', $about_toggle, PDO::PARAM_STR);
$stmt->bindParam(':first_setup_complete', $first_setup_complete, PDO::PARAM_INT);
                                     
$stmt->execute(); 


header('Location: registration_confirm.php');





?>