<?php session_start();
include "../../db.php";
error_reporting(E_ALL & ~E_NOTICE); 
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>
</head>
<body>

<?php
//Get blog posts
$stmt = $db->prepare('SELECT * FROM blogs WHERE owner = ?');
$stmt->bindParam(1, $_SESSION['uid'], PDO::PARAM_INT);
$stmt->execute();
$blogs_row = $stmt->fetchALL(PDO::FETCH_ASSOC);

//Get blog settings
$stmt = $db->prepare('SELECT * FROM main WHERE uid = ?');
$stmt->bindParam(1, $_SESSION['uid'], PDO::PARAM_INT);
$stmt->execute();
$main_row = $stmt->fetchALL(PDO::FETCH_ASSOC);

if($main_row[0][public_toggle] == 0){
	header("Location:../private.php");
}

//sort posts by datetime
function compare_datetimes($a, $b)
{
	$t1 = strtotime($a["datetime"]);
	$t2 = strtotime($b["datetime"]);
    return ($t2 - $t1);
}
usort($blogs_row, "compare_datetimes");
?>

<div id="wrapper">
	<div id="header">
		<span class="title"><a href="index.php"><?php echo $main_row[0]['title']; ?></a></span>
		<span class="subtitle"><br><?php echo $main_row[0]['subtitle']; ?></br></span>
	</div>
	<div id="main">
		<?php
		//Pagination	
				if(($_GET['page'] == 1 || !isset($_GET['page']) && !isset($_GET['p']))){
					$page = 1;
				} else {
					$page = $_GET['page'];
				}
				
				$posts_page_start = ($page - 1) * 1;
				$num_of_pages = ceil(count($blogs_row) / 1);

				if(!isset($_GET['p'])){
				for($count = $posts_page_start; $count < $posts_page_start+1 && $count < count($blogs_row); $count++){
					if($blogs_row[$count]['draft'] == 0){
						echo '<span class="post_listing"><a href="index.php?p=' . $blogs_row[$count]['id'] . '"><span class="post_listing_title">' . $blogs_row[$count]['title'] . '</span></a></br><span class="datetime">' . $blogs_row[$count]['datetime'] . '<p><span class="post_listing_body">' . $blogs_row[$count]['body'] . '</span></p></span>';			
					}
				}
			}
		//Individual post
				if(isset($_GET['p'])){
					$stmt = $db->prepare('SELECT * FROM blogs WHERE id = ?');
					$stmt->bindParam(1, $_GET['p'], PDO::PARAM_INT);
					$stmt->execute();
					$post_row = $stmt->fetchALL(PDO::FETCH_ASSOC);
					echo '<span class="post_title">' . $post_row[0]['title'] . '</span></br>';
					echo '<span class="datetime">' . $post_row[0]['datetime'] . '</span>';
					echo '<p>' . $post_row[0]['body'] . '</p>';
				}
				
		//Prev and Next page buttons
				if(!isset($_GET['p'])){
				echo '<p class="page_buttons">';
				if($page == 1){
					echo '<span class="prev_entry_button">Previous Entry'; 	
					echo '<span class="next_entry_button"><a href="index.php?page=' . ($page+1) . '">Next Entry</a></span>';
				}elseif($page == $num_of_pages){
					echo '<span class="prev_entry_button"><a href="index.php?page=' . ($page-1) . '">Previous Entry</a></span>';
					echo '<span class="next_entry_button">Next Entry</span>';
				}else {
					echo '<span class="prev_entry_button"><a href="index.php?page=' . ($page-1) . '">Previous Entry</a></span>';
					echo '<span class="next_entry_button"><a href="index.php?page=' . ($page+1) . '">Next Entry</a></span>';
				}
				echo '</p>';	
				}


				?>
	</div> 
	<div id="sidebox">
		<div id="about_box">
			<h3>About</h3>
			<p><?php echo $main_row[0]['about']; ?></p>
		</div>
		<div id="posts_box">
			<h3>Blog History</h3>
			<p><?php 
				for($count = 0; $count < count($blogs_row); $count++){
				if($blogs_row[$count]['draft'] == 0){
					echo '<p><span class="history_listing">' . '<span class="history_listing_title"><a href="index.php?p=' . $blogs_row[$count]['id'] . '">' . $blogs_row[$count]['title'] . '</a></span></br><span class="history_datetime">' . $blogs_row[$count]['datetime'] . ' </span>';			
					}
				}
			 ?></p>
		</div>
	</div>
	<div id="footer_pad">
	</div>
</div>
<div id="footer_wrapper">
	<div id="footer">
		Blog made with <a href="../index.php">SuperCoolPost</a>
	</div>
</div>

<!-- About Box Toggle -->
<script>
	var about_toggle = <?php echo $main_row[0]['about_toggle'] ?>;
	abt = document.getElementById("about_box");
	if(about_toggle == 0){
		abt.style.display = "none";
		
	}else if(about_toggle == 1) {
		abt.style.display = "block";
		}
</script>
</body>
</html>

