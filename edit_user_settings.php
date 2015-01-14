<?php
include "header.php";
include "db.php";

?>


<article>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<div class="main_box">
					<h1 class="panel_title">Edit User Settings</h1>
					<form name="update_user_settings" action="update_user.php" method="POST">
					<label>Edit Username:</label>
					<textarea class="textbox" cols="40" rows="1" name="username"></textarea>
					<label>Edit Password:</label></br>
					<input type="password" size="25"></br>
					<label>Retype Password:</label></br>
					<input type="password" size="25"></br>
					<label>Edit Email:</label>
					<textarea class="textbox" cols="40" rows="1" name="pass"></textarea>
					<input type="checkbox" name="newslist" value="newslist">Send me news and updates about SuperCoolPost (this is just for show)<br> 
					<input type="submit" name="submit_post" value="Update"></input><input type="submit" name="submit_post" value="Cancel"></input>
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