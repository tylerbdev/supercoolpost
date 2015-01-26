<?php session_start();
?>
<html>
<head>
<title>"Welcome to SuperCoolPost!"</title>
<link rel="stylesheet" href="css/style.css">
<script src="jquery-1.11.2.min.js" type="text/javascript"></script>
<body>
<div class="header_table">
	<div id='logo_space'>
		<a href="index.php"><img src="images/logo.png" height="100px"></a>
	</div>
	<div id='login_area'>
		<?php 
			error_reporting(E_ALL & ~E_NOTICE); 
			if($_SESSION['login'] == "valid"){
				echo "Welcome, " . $_SESSION['username'] . ". <a href='logout.php'>Log out</a>";
				echo "<p><a href='member.php'>Member Portal</a> | <a href='member_blog/" . $_SESSION['username'] . "/index.php'>View My Blog</a></p>";

			} elseif($_SESSION['login'] == "invalid"){
			echo "<p>Login invalid, please try again. [Forgot Password?]";
			echo"
				<div class='login1'>
				<form action='verify.php' method='post'>
				<input id='name' name='username' placeholder='username' type='text'></br>
				<input id='password' placeholder='password'name='password' type='password'></br>
				</div>
				<div class='login2'>
				<input name='submit' type='submit' value='Login'>
				</form>
				</div>
				";
			} elseif(!$_SESSION || $_SESSION == NULL){
				echo "
				<div class='login1'>
				<form action='verify.php' method='post'>
				<input id='name' name='username' placeholder='username' type='text'></br>
				<input id='password' placeholder='password'name='password' type='password'></br>
				</div>
				<div class='login2'>
				<input name='submit' type='submit' value='Login'>
				</form>
				</div>
				";
			}
		?>

	</div>

</div>

