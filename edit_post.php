<?php
include "header.php";
include "db.php";


$post_id = $_GET['post_id'];
$owner = $_SESSION['uid'];


	$stmt = $db->prepare('SELECT * FROM blogs WHERE id = ?');
	$stmt->bindParam(1, $post_id, PDO::PARAM_STR);
	$stmt->execute();
	$row = $stmt->fetchALL(PDO::FETCH_ASSOC);

	if($row[0]['owner'] != $owner){
		header("Location: member.php");
	}

?>


<article>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<div class="main_box">
					<h1 class="panel_title">Edit Post</h1>
					<form name="update_post_form" action="update_post.php" method="POST">
					<textarea class="textbox" style="resize:none" cols="40" rows="1" name="title" maxlength="60" placeholder="Title"><?php echo $row[0]['title']?></textarea>
					<textarea style="resize:vertical" class="textbox" cols="40" rows="35" name="body"><?php echo $row[0]['body']?></textarea>
					<input type="checkbox" name="update_datetime" value="update_datetime">Update Date and Time (This will change the current display order on your blog)<br>
					<input type="submit" name="update_post" value="Update"></input><input type="submit" name="update_post" value="Save As Draft"></input>
					<input type="hidden" name="post_id" value="<?php echo $post_id ?>" />
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
	document.title = "Edit Post";
</script

</body>

</html>