<?php
include "header.php";
include "db.php";



$uid = $_SESSION['uid'];

	$stmt = $db->prepare('SELECT * FROM main WHERE uid = ?');
	$stmt->bindParam(1, $uid, PDO::PARAM_STR);
	$stmt->execute();
	$row = $stmt->fetchALL(PDO::FETCH_ASSOC);

?>
<script>
document.title = "Edit User Settings";
</script>

<article>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<div class="main_box">
					
					<h1 class="panel_title">Edit User Settings</h1>
					<div class="confirmation" id="password_confirmation" >Password Updated</div>
					<div id="email_confirmation" class="confirmation">Email Updated</div>
					<div id="edit_password">
						<form name="update_user_password" method="POST" >
							<label>Edit Password:</label><br>
							<input type="password" name="password" size="25"><br>
							<label>Retype Password:</label><br>
							<input id="password" type="password" name ="retype_password" size="25"><br><br>
							<input id="password_submit_button" type="submit" name="update_user_password" value="Update Password">
						</form>
					</div>
					<hr>
					<div id="edit_email">
						<form name="update_user_email" action="update_user.php" method="POST">	
							<label>Edit Email:</label><br>
							<input id="email" type="textbox" style="resize:none" cols="40" rows="1" name="email"><br>
							<p align="left"><input type="checkbox" name="newslist" value="1">Send me news and updates about SuperCoolPost (this option is just for show)</p> 
							<input id="email_submit_button" type="submit" name="update_user_email" value="Update Email Settings">
						</form>
					</div>
						

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
<script>
//Password Update Submission
$("#password_submit_button").click(function(e) {
   var password = $("#password").val();
 	
   if(password != '')
   {
		$.ajax({
			url: "update_user.php",
			type: "POST",
			data: ({
			password: password
			}),
			
			success: function(data) 
			{
				$(function(){
					$("#password_confirmation").fadeOut(50);
					$("#password_confirmation").fadeIn(250);
				});
			}
      });
    }
   	e.preventDefault();
 });

//Email Update Submission
$("#email_submit_button").click(function(e) {
 	var email = $("#email").val();

 	if(email != '')
   	{
		$.ajax({
			url: "update_user.php",
			type: "POST",
			data: ({
			email: email
			}),
			
			success: function(data) 
			{
				$(function(){
					$("#email_confirmation").fadeOut(50);
					$("#email_confirmation").fadeIn(250);
				});
			}
      	});
    }
	e.preventDefault();
 });
</script>

</body>

</html>