<?php
include "header.php";
include "db.php";


$main_stmt = $db->prepare('SELECT * FROM main WHERE uid = ?');
$main_stmt->bindParam(1, $_SESSION['uid'], PDO::PARAM_INT);
$main_stmt->execute();
$main_row = $main_stmt->fetchALL(PDO::FETCH_ASSOC);
$first_setup_complete = $main_row[0]['first_setup_complete'];

?>
<div id="new_user_overlay">
     <div>
          <h2>Welcome to SuperCoolPost!</h2>
          <p>You haven't set up your blog yet. You'll need to do this before you can begin posting.</p>
          <p><a href="edit_blog.php">Take Me There!</a><p>
     </div>
</div>
<script>
	var first_setup_complete = <?php echo $first_setup_complete ?>;
	ovr = document.getElementById("new_user_overlay");
	if(first_setup_complete == 0){
		ovr.style.visibility = "visible";
		
	} else {
		ovr.style.visibility = "hidden";
	
	}
</script>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<div class="main_box">
					<h2 class="panel_title">New Post</h2>
					<form name="insert_post" action="insert.php" method="POST">
					<textarea class="textbox" style="resize:none" cols="40" rows="1" maxlength="60" name="title" placeholder="Title"></textarea>
					<textarea style="resize:vertical" class="textbox" cols="40" rows="35" name="body"></textarea>
					<input type="submit" name="submit_post" value="Post"></input><input type="submit" name="submit_post" value="Save As Draft"></input>
					</form>
				</div>
			</div>
			<div class="col2">
				<div class="box">
				<h4 class="panel_title">Post List</h4>
				<?php
				//Query member's posts
				$stmt = $db->prepare('SELECT * FROM blogs WHERE owner = ?');
				$stmt->bindParam(1, $_SESSION['uid'], PDO::PARAM_INT);
				$stmt->execute();
				$row = $stmt->fetchALL(PDO::FETCH_ASSOC);

				 //Sort by date and time
				function compare_datetimes($a, $b)
					{
					    $t1 = strtotime($a["datetime"]);
					    $t2 = strtotime($b["datetime"]);

					    return ($t2 - $t1);
					}

				usort($row, "compare_datetimes");	
				
				//Pagination	
				if($_GET['page'] == 1 || !isset($_GET['page'])){
					$page = 1;
				} else {
					$page = $_GET['page'];
				}
				// $page = $_GET['page'];
				$posts_page_start = ($page - 1) * 8;
				$num_of_pages = ceil(count($row) / 8);

				echo '<p class="page_buttons">';
				if($page == 1){
					echo 'Previous | '; 	
					echo '<a href="member.php?page=' . ($page+1) . '">Next</a>';
				}elseif($page == $num_of_pages){
					echo '<a href="member.php?page=' . ($page-1) . '">Previous</a> | ';
					echo 'Next';
				}else {
					echo '<a href="member.php?page=' . ($page-1) . '">Previous</a> | ';
					echo '<a href="member.php?page=' . ($page+1) . '">Next</a>';
				}
				echo '</p>';

				for($count = $posts_page_start; $count < $posts_page_start+8 && $count < count($row); $count++){
					if($row[$count]['draft'] == 1){
					echo '<p><span class="post_listing">' . '<span class="post_listing_title">' . $row[$count]['title'] . ' (Draft)</span></br>' . '<span class="post_listing_body">' . substr($row[$count]['body'],0,60) . '...</span></br><span class="datetime">' . $row[$count]['datetime'] . ' | </span><span class="listing_buttons"><a href="edit_post.php?post_id=' . $row[$count]['id'] . '">Edit</a></span>   <span class="listing_buttons"><a href="delete_post.php?post_id=' . $row[$count]['id'] . '" onclick="return confirm(\'Warning: This is not an undoable action. Are you sure you want to delete this post?\');">Delete</a></span> <span class="listing_buttons"><a href="member_blog/' . $main_row[0]['username'] . '/index.php?p=' . $row[$count]['id'] . '" target="_blank">View</a></span></p>';			
					} else {
						echo '<p><span class="post_listing">' . '<span class="post_listing_title">' . $row[$count]['title'] . '</span></br>' . '<span class="post_listing_body">' . substr($row[$count]['body'],0,60) . '...</span></br><span class="datetime">' . $row[$count]['datetime'] . ' | </span><span class="listing_buttons"><a href="edit_post.php?post_id=' . $row[$count]['id'] . '">Edit</a></span>   <span class="listing_buttons"><a href="delete_post.php?post_id=' . $row[$count]['id'] . '" onclick="return confirm(\'Warning: This is not an undoable action. Are you sure you want to delete this post?\');">Delete</a></span> <span class="listing_buttons"><a href="member_blog/' . $main_row[0]['username'] . '/index.php?p=' . $row[$count]['id'] . '" target="_blank">View</a></span></p>';			
					}
				}	


				?>


				</div>

			</div>
			<div class="col3">
				<div class="box">
				<h4 class="panel_title">Edit Settings</h4>
				<p></p>
				<p><a href="edit_blog.php">Edit Blog</a></p>
				<p><a href="edit_user_settings.php">Edit User Settings</a><p>
				<p><a href="edit_about.php">Edit About</a></p>
				</div>
				
			</div>
		</div>
	</div>
</div>


</article>

</body>

</html>