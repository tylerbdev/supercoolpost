<?php
include "header.php";
include "db.php";

 
  $title = $_POST['title'];
  $subtitle = $_POST['subtitle'];
  $uid = $_SESSION['uid'];

//Get Theme Choice
if($_POST['theme'] == "grunge"){
    $theme = "grunge"; 
  } elseif($_POST['theme'] == "flowery"){
    $theme = "flowery";
  } elseif($_POST['theme'] == "basic"){
  	$theme = "basic";
  } elseif($_POST['theme'] == "codey"){
  	$theme = "codey";
 }

//Get About Choice
if($_POST['about_toggle'] && $_POST['about_toggle'] == 1){
	$about_toggle = 1;
} else {
	$about_toggle = 0;
}

//Get Privacy Choice
if($_POST['public_toggle'] && $_POST['public_toggle'] == 1){
	$public_toggle = 1;
} else {
	$public_toggle = 0;
}

//Get Timezone
$timezone = $_POST['timezone'];
	
	
$sql = "UPDATE main SET title=:title, subtitle=:subtitle, theme=:theme, timezone=:timezone, about_toggle=:about_toggle, public_toggle=:public_toggle WHERE uid = $uid";
                                          
$stmt = $db->prepare($sql);
                                              
$stmt->bindParam(':title', $title, PDO::PARAM_STR);      
$stmt->bindParam(':subtitle', $subtitle, PDO::PARAM_STR);
$stmt->bindParam(':theme', $theme, PDO::PARAM_STR);
$stmt->bindParam(':timezone', $timezone, PDO::PARAM_STR);
$stmt->bindParam(':about_toggle', $about_toggle, PDO::PARAM_STR);
$stmt->bindParam(':public_toggle', $public_toggle, PDO::PARAM_STR);
                                      
$stmt->execute(); 

header('Location: settings_confirm.php');



?>