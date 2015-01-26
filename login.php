<?php

include "header.php";
include "db.php";

?>
<div id="login_register_form">
<div id="login_register_form_title">
<h2>Login</h2>
</div>
<?php
if($_SESSION['login'] == "invalid"){
	echo "<p>Login invalid, please try again. <a href='recover.php'>Forgot Password?</a>";
}
?>
<form action="verify.php" method="post">
<label>Username: </label>
<input id="name" name="username" placeholder="username" type="text"></br>
<label>Password: </label>
<input id="password" name="password" placeholder="**********" type="password"></br>
<p>
<input id="login_submit" name="submit" type="submit" style="margin-right:15px; margin-left:50px" value=" Login "></p>
</form>
</div>




</body>

</html>