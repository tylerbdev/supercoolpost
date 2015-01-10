<?php
include "header.php";
include "db.php";
?>
<?php

$query = "SELECT uid, username, title FROM main";
$result = mysql_query($query);

while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
	print_r($row);
}

?>

</table>
</body>

</html>