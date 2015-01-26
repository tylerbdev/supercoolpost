<?php

include "header.php";
include "db.php";

?>
<div id="login_register_form">
<div id="login_register_form_title">
<h2>Register an Account</h2>
</div>
<?php
if($_SESSION['login'] == "valid"){
	header("Location:member.php");
}
?>
<form action="new_user.php" method="post">
<label>Username: </label>
<input id="name" name="username" type="text"></br><span class="field_subtext">Must be between 5-20 characters, letters or numbers only</span></br>
<label>Email: </label>
<input id="email" name="email" type="text"></br>
<label>Password: </label>
<input id="password" name="password" type="password"></br>
<span class="field_subtext">Must be between 5-20 characters, letters, numbers, and symbols</span>
<label>Confirm Password: </label>
<input id="passwordconf" name="passwordconf" type="password"></br>
<p>
<input id="register" name="register" type="submit" style="margin-right:15px; margin-left:50px" value=" Register "></p>
</form>
</div>




</body>

</html>