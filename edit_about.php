<?php
include "header.php";
include "db.php";

?>


<?php

$uid = $_SESSION['uid'];

$stmt = $db->prepare('SELECT * FROM main WHERE uid = :uid');
$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetchALL(PDO::FETCH_ASSOC);

?>


<article>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<div class="main_box">
					<h1 class="panel_title">Edit About</h1>
					<form name="update_about_form" action="update_about.php" method="POST">
					<textarea class="textbox" cols="40" rows="5" style="resize:none" name="about"><?php echo $row[0]['about']?></textarea>
					<input type="submit" name="update_about" value="Update"></input></input>
					</form>

				</div>
			</div>
			<div class="col2">
				

			</div>
			<div class="col3">
					
			</div>
		</div>
	</div>
</div>


</article>


<script>
	document.title = "Edit About";
</script>

</body>

</html>