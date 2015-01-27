<?php session_start();
include "../../db.php";
?>
<html>
<head>
<title>"SuperCoolPost Blog"</title>
<link rel="stylesheet" href="../../css/blogstyle.css">
<script src="jquery-1.11.2.min.js" type="text/javascript"></script>
<body>
<?php
$stmt = $db->prepare('SELECT * FROM blogs WHERE owner = ?');
				$stmt->bindParam(1, $_SESSION['uid'], PDO::PARAM_INT);
				$stmt->execute();
				$blogs_row = $stmt->fetchALL(PDO::FETCH_ASSOC);
				
				//add some "Order By" UI functionality here
				function compare_datetimes($a, $b)
					{
					    $t1 = strtotime($a["datetime"]);
					    $t2 = strtotime($b["datetime"]);

					    return ($t2 - $t1);
					}

				usort($blogs_row, "compare_datetimes");
					

				
				
				?>


<article>

<div id="main">
	<div id="banner">
	<p><h1 class="blog_title">Blog Title</h1></p>
	<p><h2 class="blog_subtitle">Blog Subtitle</h2></p>
	</div>
	<div id="content">
		<div id="col1">
		<?

		for($count = 0; $count < count($blogs_row); $count++){
					if($blogs_row[$count]['draft'] == 0){
					echo '<p><span class="post_listing">' . '<span class="post_listing_title">' . $blogs_row[$count]['title'] . '</span></br>' . '<span class="post_listing_body">' . substr($blogs_row[$count]['body'],0,60) . '...</span></br><span class="datetime">' . $blogs_row[$count]['datetime'] . ' </span><span class="edit_delete"><a href="edit_post.php?post_id=' . $blogs_row[$count]['id'] . '">Edit</a>   <a href="delete_post.php?post_id=' . $blogs_row[$count]['id'] . '" onclick="return confirm(\'Warning: This is not an undoable action. Are you sure you want to delete this post?\');">Delete</a></span></p>';			
					}

				}	
				
				?>
		</div>
		<div id="col2">

		Post
		Post
		Post
		</div>
		
	</div>
	<div id="footer"><p align = "center">Blog created on <a href="../../index.php">SuperCoolPost</a></p></div>
</div>
</div>


</article>




</body>

</html>