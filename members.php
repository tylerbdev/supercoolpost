<?php
include "header.php";
include "db.php";
include "session.php";
?>
<?php

/*$query = "SELECT uid, username, title FROM main";
$result = mysql_query($query);

while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
	print_r($row);
}
*/

?>

<article>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<div class="main_box">
					<h1 class="panel_title">New Post</h1>
					<form name="myform" action="insert.php" method="POST">
					<textarea class="textbox" cols="40" rows="1" name="title">
					</textarea>
					<textarea class="textbox" cols="40" rows="5" name="myname">
					</textarea>
					<input type="submit">Post</input>
					</form>

				</div>
			</div>
			<div class="col2">
				<div class="box"><h4 class="panel_title">Post List</h4></div>

			</div>
			<div class="col3">
				<div class="box"><h4 class="panel_title">Edit Settings</h4></div>
				<p>Edit Blog</p>
				<p>Edit User Settings<p>
				<p>Edit About</p>
			</div>
		</div>
	</div>
</div>


</article>




</body>

</html>