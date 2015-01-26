<?php
include "db.php";

$uid = $_SESSION['uid'];

$stmt = $db->prepare('SELECT * FROM main WHERE id = ?');
$stmt->bindParam(1, $uid, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetchALL(PDO::FETCH_ASSOC);

echo $row;
?>


