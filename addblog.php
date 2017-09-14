<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	include_once('home/catalog/connect.khan');
	include_once('home/catalog/session.khan');
?>






<p>
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="text" name="author" placeholder="Author"/><br />
			<input type="text" name="about" placeholder="Blog About"/><br />
			<input type="text" name="content" placeholder="content"/><br />
			<label>Select Image (jpg only)</label>
			<input type="file" name="fileupld" placeholder="Only JPG Image" /><br />
			<input type="submit" name="btn" value="Add Blog"/><br />
		</form>
		
</p>


<?php
//throwing success message
	  if(isset($_SESSION['resizedone'])){
		  if($_SESSION['resizedone']=="success"){
		  unset($_SESSION['resizedone']);
		  echo	"<div  style='padding:7px; border: 0px solid; height:90px; background:#F90; opacity: 0.5; width:100%; margin:10px; border-radius:5px; color:#ffffff; font-size:18px;'><p>Data stored sucessfully ! </p>
				 </div>";
		  }
	  }
		
		
	if(isset($_POST['btn'])){ 		
		$author=mysql_real_escape_string(trim(strip_tags(stripslashes($_POST['author']))));
		$about=mysql_real_escape_string(trim(strip_tags(stripslashes($_POST['about']))));	;
		$content=mysql_real_escape_string(trim(strip_tags(stripslashes($_POST['content']))));	
		
		$fname=$_FILES['fileupld']['tmp_name'];
		$path="assets/blogs/".$author.$_FILES['fileupld']['name'];
		$thumbpath=	"assets/blogs/thumbs/".$author.$_FILES['fileupld']['name'];	
					
		$query="INSERT INTO `blog`(`author`, `about`, `content`, `imgpath`,`thumb`) VALUES  ('$author', '$about', '$content', '$path','$thumbpath');";
		
		if(mysqli_query($dbconn,$query) or die( mysqli_error())){
			move_uploaded_file($fname,$path);
			copy($path,$thumbpath);
			
			//resizing image
			header('location:home/components/resize520-278.php?img='.$path.'&thumbpath='.$thumbpath);
			
		}
		else{	
			echo '<div style="width:80%; padding-top:50px; padding-bottom:60px; padding-left:20%; overflow:hidden; color:red; font-size:32px; 		background:#999999;">Something went wrong. Contact your administrator</div>';
		}
					
	}

?>


</body>
</html>
