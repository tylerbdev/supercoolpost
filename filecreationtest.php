<?php
chmod("member_blog/newuser", 777);
$file = "member_blog_index.php";
$newfile = "member_blog/newuser/index.php";
copy($file,$newfile);

?>