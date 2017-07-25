<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	include_once('home/catalog/connect.khan');
?>






<p>
		<form action="" method="POST">
			<input type="text" name="author" placeholder="Author"/><br />
			<input type="text" name="about" placeholder="Blog About"/><br />
			<input type="text" name="content" placeholder="content"/><br />
			<input type="submit" name="btn" value="Add Review"/><br />
		</form>
		
</p>


<?php

	if(isset($_POST['btn'])){ 		
		$author=mysql_real_escape_string(trim(strip_tags(stripslashes($_POST['author']))));
		$about=mysql_real_escape_string(trim(strip_tags(stripslashes($_POST['about']))));	;
		$content=mysql_real_escape_string(trim(strip_tags(stripslashes($_POST['content']))));	;					
		$query="INSERT INTO `blog`(`author`, `about`, `content`) VALUES  ('$author', '$about', '$content');";
		
		if(mysqli_query($dbconn,$query) or die( mysqli_error())){
			echo'<div style="width:80%;padding-top:50px; padding-bottom:60px; padding-left:20%; overflow:hidden; color:green; font-size:32px; background:#999999;"> New Blog Created</div>';
		}
		else{	
			echo '<div style="width:80%; padding-top:50px; padding-bottom:60px; padding-left:20%; overflow:hidden; color:red; font-size:32px; 		background:#999999;">Something went wrong. Contact your administrator</div>';
		}
					
	}

?>


</body>
</html>
