<?php
ob_start();
session_start();

// $username = $_POST['username'];
// $password = $_POST['password'];


// $query = "SELECT uid, username, password
// FROM member
// WHERE username = '$username';";
 
// $result = $db->query($query);
 
// if(mysql_num_rows($result) == 0) // User not found. So, redirect to login_form again.
// {
// echo "Username not found";
// }
 
// $userData = mysql_fetch_array($result, MYSQL_ASSOC);
// // $hash = hash('sha256', $password) );
 
// // if($hash != $userData['password']) // Incorrect password. So, redirect to login_form again.
// // {
// // header('Location: login.html');
// // }else{ // Redirect to home page after successful login.
// session_regenerate_id();
// $_SESSION['sess_user_id'] = $userData['uid'];
// $_SESSION['sess_username'] = $userData['username'];
// session_write_close();


?>
