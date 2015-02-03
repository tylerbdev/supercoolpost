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
				if(($_GET['page'] == 1 || !isset($_GET['page']) && !isset($_GET['p']) && !isset($_GET['y']) && !isset($_GET['p']))) {
					$page = 1;
				} else {
					$page = $_GET['page'];
				}
				
				$posts_page_start = ($page - 1) * 1;
				$num_of_pages = ceil(count($blogs_row) / 1);

				if(!isset($_GET['p']) && !isset($_GET['y']) && !isset($_GET['m'])){
				for($count = $posts_page_start; $count < $posts_page_start+1 && $count < count($blogs_row); $count++){
					if($blogs_row[$count]['draft'] == 0){
						echo '<span class="post_listing"><a href="index.php?p=' . $blogs_row[$count]['id'] . '"><span class="post_listing_title">' . $blogs_row[$count]['title'] . '</span></a></br><span class="datetime">' . $blogs_row[$count]['datetime'] . '<p><span class="post_listing_body">' . $blogs_row[$count]['body'] . '</span></p></span>';			
					}
				}
			}
		//Individual post
				if(isset($_GET['p'])  && !isset($_GET['y']) && !isset($_GET['m']) ){
					$stmt = $db->prepare('SELECT * FROM blogs WHERE id = ?');
					$stmt->bindParam(1, $_GET['p'], PDO::PARAM_INT);
					$stmt->execute();
					$post_row = $stmt->fetchALL(PDO::FETCH_ASSOC);
					echo '<span class="post_title">' . $post_row[0]['title'] . '</span></br>';
					echo '<span class="datetime">' . $post_row[0]['datetime'] . '</span>';
					echo '<p>' . $post_row[0]['body'] . '</p>';
				}
		//Archive listings
			 if(isset($_GET['y']) && !isset($_GET['m'])){
			 	$stmt = $db->prepare('SELECT * FROM blogs WHERE SUBSTRING(datetime, 1, 4) = ?');
					$stmt->bindParam(1, $_GET['y'], PDO::PARAM_STR);
					$stmt->execute();
					$posts_row = $stmt->fetchALL(PDO::FETCH_ASSOC);
					echo '<span class="post_title">' . $_GET['y'] . '</span></br>';
					for($count = 0; $count < count($posts_row); $count++){
						echo '<br><a href="index.php?p=' .  $posts_row[$count]['id']  . '">' . $posts_row[$count]['title'] . '</a><br>';
				}
			 }

			 if(isset($_GET['y']) && isset($_GET['m'])){
			 	switch($_GET['m']){
					case -01:
					$m_name = "January";
					break;
					case -02:
					$m_name = "February";
					break;
					case -03:
					$m_name = "March";
					break;
					case -04:
					$m_name = "April";
					break;
					case -05:
					$m_name = "May";
					break;
					case -06:
					$m_name = "June";
					break;
					case -07:
					$m_name = "July";
					break;
					case -08:
					$m_name = "August";
					break;
					case -09:
					$m_name = "September";
					break;
					case -10:
					$m_name = "October";
					break;
					case -11:
					$m_name = "November";
					break;
					case -12:
					$m_name = "December";
					break;
				}
			 	$stmt = $db->prepare('SELECT * FROM blogs WHERE SUBSTRING(datetime, 1, 4) = ? AND SUBSTRING(datetime, 5, 3) = ? AND owner = ?' );
					$stmt->bindParam(1, $_GET['y'], PDO::PARAM_STR);
					$stmt->bindParam(2, $_GET['m'], PDO::PARAM_STR);
					$stmt->bindParam(3, $_SESSION['uid'], PDO::PARAM_STR);
					$stmt->execute();
					$posts_row = $stmt->fetchALL(PDO::FETCH_ASSOC);
					echo '<span class="post_title">' . $m_name . ' ' . $_GET['y'] . '</span><br>';
					for($count = 0; $count < count($posts_row); $count++){
						echo '<br><a href="index.php?p=' .  $posts_row[$count]['id']  . '">' . $posts_row[$count]['title'] . '</a><br>';
				}
			 }




		//Prev and Next page buttons
				if(!isset($_GET['p'])  && !isset($_GET['y']) && !isset($_GET['p']) ){
				echo '<p class="page_buttons">';
				if($page == 1){
					echo '<span class="prev_entry_button"><a href="index.php?page=' . ($page+1) . '">Older Entry</a></span>'; 	
					echo '<span class="next_entry_button">Newer Entry';
				}elseif($page == $num_of_pages){
					echo '<span class="prev_entry_button"><a href="index.php?page=' . ($page+1) . '">Older Entry</a></span>';
					echo '<span class="next_entry_button">Newer Entry</span>';
				}else {
					echo '<span class="prev_entry_button"><a href="index.php?page=' . ($page+1) . '">Older Entry</a></span>';
					echo '<span class="next_entry_button"><a href="index.php?page=' . ($page-1) . '">Newer Entry</a></span>';
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
		<?php 

				$yrs = array('2014', '2015');
				for($x=0; $x<count($yrs); $x++){
					for($y=0; $y<12; $y++){
					$archive_dates[($yrs[$x])][$y] = "-" . sprintf("%02s", ($y+1));
					}
				} 			
				$blogs_row_reversed = array_reverse($blogs_row);	

				//method to count posts per month
				function countMonthly($month){
					global $blogs_row_reversed;
					$xcount = 0;
					foreach($blogs_row_reversed as $u){
						if(substr($u['datetime'], 4, 3) == "$month"){
							$xcount++;
						}
					}
				 	return $xcount;
				 }	

				foreach($archive_dates as $key => $value){
					$new_y = $key;
					$new_m = $value;
					if($new_y != $prev_y){
						echo '<p><a href="index.php?y=' . $new_y . '">' . $new_y . '</a></p>';
						foreach($new_m as $n){
							$new_n = $n;
							$n_count = 0;
							switch($n){
								case -01:
								$n_name = "January";
								break;
								case -02:
								$n_name = "February";
								break;
								case -03:
								$n_name = "March";
								break;
								case -04:
								$n_name = "April";
								break;
								case -05:
								$n_name = "May";
								break;
								case -06:
								$n_name = "June";
								break;
								case -07:
								$n_name = "July";
								break;
								case -08:
								$n_name = "August";
								break;
								case -09:
								$n_name = "September";
								break;
								case -10:
								$n_name = "October";
								break;
								case -11:
								$n_name = "November";
								break;
								case -12:
								$n_name = "December";
								break;
							}
							if($new_n != $prev_n){
								foreach($blogs_row_reversed as $t){
									if(substr($t['datetime'], 0, 4) == $new_y && substr($t['datetime'], 4, 3) == $n){
										if($n_count == 0) { 
											echo '<li><a href="index.php?y=' . $new_y . '&m=' . $n . '">' . $n_name . ' (';
											echo  countMonthly($n) . ')</a></li>'; 
										}
										$n_count=1;
										
									}
								}
								$prev_n = $new_n;
								
							}							
						}						
					}
				$prev_y = $new_y;
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

