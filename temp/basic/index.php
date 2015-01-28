<?php session_start();
include "../../db.php";
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
		if(isset($_GET['p'])==false){
			//run pagination
			for($count = 0; $count < count($blogs_row); $count++){
				if($blogs_row[$count]['draft'] == 0){
					echo '<p><span class="post_listing">' . '<span class="post_listing_title"><a href="index.php?p=' . $blogs_row[$count]['id'] . '">' . $blogs_row[$count]['title'] . '</a></span></br>' . '<span class="post_listing_body">' . substr($blogs_row[$count]['body'],0,60) . '...</span></br><span class="datetime">' . $blogs_row[$count]['datetime'] . ' </span>';			
					}
				}	
			}elseif(isset($_GET['p'])){
				$stmt = $db->prepare('SELECT * FROM blogs WHERE id = ?');
				$stmt->bindParam(1, $_GET['p'], PDO::PARAM_INT);
				$stmt->execute();
				$post_row = $stmt->fetchALL(PDO::FETCH_ASSOC);
				echo '<span class="post_title">' . $post_row[0]['title'] . '</span></br>';
				echo '<span class="datetime">' . $post_row[0]['datetime'] . '</span>';
				echo '<p>' . $post_row[0]['body'] . '</p>';
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
