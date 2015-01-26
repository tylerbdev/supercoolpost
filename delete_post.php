<?php
include "header.php";
include "db.php";

$id = $_GET['post_id'];
$owner = $_SESSION["uid"];

$stmt = $db->prepare('SELECT * FROM blogs WHERE id = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetchALL(PDO::FETCH_ASSOC);


if($row[0]['owner'] == $owner){
$sql = "DELETE FROM `blogs` WHERE `id` = :id";                                      
$stmt = $db->prepare($sql);                                              
$stmt->bindParam(':id', $id, PDO::PARAM_INT);                                      
$stmt->execute(); 
header('Location: member.php');
} else{
  echo('THIS IS NOT YOUR POST');
}




?>