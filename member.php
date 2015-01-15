<?php
include "header.php";
include "db.php";

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
					<form name="insert_post" action="insert.php" method="POST">
					<textarea class="textbox" cols="40" rows="1" name="title" placeholder="Title"></textarea>
					<textarea class="textbox" cols="40" rows="5" name="body"></textarea>
					<input type="submit" name="submit_post" value="Post"></input><input type="submit" name="submit_post" value="Save As Draft"></input>
					</form>

				</div>
			</div>
			<div class="col2">
				<div class="box">
				<h4 class="panel_title">Post List</h4>
				<?php


				$stmt = $db->prepare('SELECT * FROM blogs WHERE owner = ?');
				$stmt->bindParam(1, $_SESSION['uid'], PDO::PARAM_INT);
				$stmt->execute();
				 $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
				
				//add some "Order By" UI functionality here
				function compare_datetimes($a, $b)
					{
					    $t1 = strtotime($a["datetime"]);
					    $t2 = strtotime($b["datetime"]);

					    return ($t2 - $t1);
					}

				usort($row, "compare_datetimes");
					

				for($count = 0; $count < count($row); $count++){
					if($row[$count]['draft'] == 1){
					echo '<p><span class="post_listing">' . '<span class="post_listing_title">' . $row[$count]['title'] . ' (Draft)</span></br>' . '<span class="post_listing_body">' . substr($row[$count]['body'],0,60) . '...</span></br><span class="datetime">' . $row[$count]['datetime'] . ' </span><span class="edit_delete"><a href="edit_draft.php?post_id=' . $row[$count]['id'] . '">Edit</a>   Delete</span></p>';			
					} else {
						echo '<p><span class="post_listing">' . '<span class="post_listing_title">' . $row[$count]['title'] . '</span></br>' . '<span class="post_listing_body">' . substr($row[$count]['body'],0,60) . '...</span></br><span class="datetime">' . $row[$count]['datetime'] . ' </span><span class="edit_delete"><a href="edit_post.php?post_id=' . $row[$count]['id'] . '">Edit</a>   Delete</span></p>';			
					}



					//put a javascript confirmation of the delete ^^^
				}	
				
				
				?>

				</div>

			</div>
			<div class="col3">
				<div class="box">
				<h4 class="panel_title">Edit Settings</h4>
				<p></p>
				<p>Edit Blog</p>
				<p><a href="edit_user_settings.php">Edit User Settings</a><p>
				<p>Edit About</p>
				</div>
				
			</div>
		</div>
	</div>
</div>


</article>




</body>

</html>