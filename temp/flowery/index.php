<?php session_start();
include "../../db.php";
error_reporting(E_ALL & ~E_NOTICE); 
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Niconne' rel='stylesheet' type='text/css'>
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
			<div id="about_flair"><img src="rose.png"></div>
			<h3>About</h3>
			<p><?php echo $main_row[0]['about']; ?></p>
		</div>
		<div id="posts_box">
			<div id="history_flair"><img src="rose.png"></div>
			<h3>Blog History</h3>
			<p><?php 

				$yrs = array('2014', '2015', '2016');
				for($x=0; $x<count($yrs); $x++){
					for($y=0; $y<12; $y++){
					$archive_dates[($yrs[$x])][$y] = "-" . sprintf("%02s", ($y+1));
					}
				} 			
				$blogs_row_reversed = array_reverse($blogs_row);			

				foreach($archive_dates as $key => $value){
					$new_y = $key;
					$new_m = $value;
					if($new_y != $prev_y){
						echo $new_y;
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
											echo '<ul><lh>' . $n_name . '</lh>'; 
										}
										$n_count=1;
										echo '<li>' . $t['title'] . '</li>';
									}
								}
								$prev_n = $new_n;
								echo '</ul>';
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


var menus = document.getElementById('menu').getElementsByTagName('li') 
for(var row in menus){
     if(typeof menus[row] == 'object' && menus[row].getElementsByTagName('ul').length > 0){
         menus[row].getElementsByTagName('ul')[0].className = 'selected';
     }
}
</script>
</body>
</html>
