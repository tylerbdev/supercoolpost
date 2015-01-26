<?php
include "header.php";
include "db.php";



$uid = $_SESSION['uid'];

	$stmt = $db->prepare('SELECT * FROM main WHERE uid = ?');
	$stmt->bindParam(1, $uid, PDO::PARAM_STR);
	$stmt->execute();
	$row = $stmt->fetchALL(PDO::FETCH_ASSOC);

?>


<article>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<div class="main_box">
					<h1 class="panel_title">Edit User Settings</h1>
					<h1 class="panel_title">TODO: make each one of these options besides the checkbox its own separate hideable/showable form</h2>
					<form name="update_user_settings" action="update_user.php" method="POST">
					<label>Edit Username:</label>
					<textarea class="textbox" cols="40" rows="1" name="username"><?php echo $row[0]['username']?></textarea>
					<label>Edit Password:</label></br>
					<input type="password" name="password" size="25"><?php echo $row[0]['password']?></br>
					<label>Retype Password:</label></br>
					<input type="password" name ="retype_password" size="25"><?php echo $row[0]['password']?></input></br>
					<label>Edit Email:</label>
					<textarea class="textbox" cols="40" rows="1" name="email"><?php echo $row[0]['email']?></textarea>
					<input type="checkbox" name="newslist" value="1">Send me news and updates about SuperCoolPost (this option is just for show)<br> 
					<input type="submit" name="update_user" value="Update"></input><input type="update_user" name="submit_post" value="Cancel"></input>
					</form>

				</div>
			</div>
			<div class="col2">
				

				</div>

			</div>
			<div class="col3">
				
				
			</div>
		</div>
	</div>
</div>


</article>




</body>

</html>