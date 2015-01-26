<?php
include "header.php";
include "db.php";

 

$uid = $_SESSION["uid"];
$about = $_POST["about"];

  

$sql = "UPDATE main SET about=:about WHERE uid = :uid";
                                          
$stmt = $db->prepare($sql);
                                              
$stmt->bindParam(':about', $about, PDO::PARAM_STR);      
$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);

                                      
$stmt->execute(); 




  header('Location: settings_confirm.php');



?>