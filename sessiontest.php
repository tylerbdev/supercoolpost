<?php
include "header.php";
include "db.php";

$uid = $_SESSION['uid'];

echo "The session thing is:" . $_SESSION["username"];

$stmt = $db->prepare('SELECT * FROM main WHERE uid = ?');
$stmt->bindParam(1, $uid, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

print_r($row);
echo "<p>" . $row['timezone'] . "</p>";


echo "the timezone is: " . $_SESSION['timezone'];

echo "<p>" . print_r($_SESSION);

?>



</body>

</html>