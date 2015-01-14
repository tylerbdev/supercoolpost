<?php
include "header.php";
include "db.php";


$post_id = $_GET['post_id']

// IF POST ID 

?>


<?php

	//if post id is not a post associated with the session user uid, return error page (SORRY THIS RESOURCE IS NOT AVAILABLE)

	$stmt = $db->prepare('SELECT * FROM blogs WHERE id = ?');
	$stmt->bindParam(1, $post_id, PDO::PARAM_STR);
	$stmt->execute();
	$row = $stmt->fetchALL(PDO::FETCH_ASSOC);

?>

<!-- if post id = draft, make button options UPDATE DRAFT and POST. if != draft make options UPDATE and CHANGE TO DRAFT -->
<article>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<div class="main_box">
					<h1 class="panel_title">New Post</h1>
					<form name="update_post" action="update_post.php" method="POST">
					<textarea class="textbox" cols="40" rows="1" name="title" placeholder="Title"><?php echo $row[0]['title']?></textarea>
					<textarea class="textbox" cols="40" rows="5" name="body"><?php echo $row[0]['body']?></textarea>
					<input type="submit" name="submit_post" value="Update"></input><input type="submit" name="submit_post" value="Save As Draft"></input>
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




</body>

</html>