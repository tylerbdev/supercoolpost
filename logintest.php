<?php

include "header.php";
include "db.php";

?>
<div id="login">
<h2>Login Form</h2>
<?php
if($_SESSION['login'] == "invalid"){
	echo "<p>Login invalid, please try again. [Forgot Password?]";
}
?>
<form action="verify.php" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>




</body>

</html>