<?php
 	require_once('home/catalog/connect.khan');
	require_once('home/catalog/session.khan');
	require_once('home/components/employeeauthorize.fly');
 	require_once('home/common/employeeheader.fly');//adding employee header 
?>

<body>
<script src="ckeditor/ckeditor.js"></script>
<?php
	include_once('home/catalog/connect.khan');
	include_once('home/catalog/session.khan');
	//throwing success message
	  if(isset($_SESSION['resizedone'])){
		  if($_SESSION['resizedone']=="success"){
		  unset($_SESSION['resizedone']);
		  echo	"<div  style='padding:7px; border: 0px solid; height:90px; background:#F90; opacity: 0.5; width:100%; margin:10px; border-radius:5px; color:#ffffff; font-size:18px;'><p>Data stored sucessfully ! </p>
				 </div>";
		  }
	  }
?>

 



<p>

		<form action="" method="POST" enctype="multipart/form-data">
			<input type="text" name="author" placeholder="Author"/><br />
			<input type="text" name="about" placeholder="Blog About"/><br />
			<input type="text" name="blogtype" placeholder="Featured, Popular etc"/><br />
			
			
			<label>Select Image (jpg only)</label>
			<input type="file" name="fileupld" placeholder="Only JPG Image" /><br />
			 <textarea name="editor1" id="editor1" rows="10" cols="80">
				
			</textarea><br />
			<input type="submit" name="btn" value="Add Blog"/><br />
		</form>
	  <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
               CKEDITOR.replace( 'editor1', {
				filebrowserBrowseUrl: '/browser/browse.php',
				filebrowserUploadUrl: '/uploader/upload.php'
			});
            </script>	
</p>


          
			
		
		
		
<?php

		
		
	if(isset($_POST['btn'])){ 		
		$author=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['author']))));
		$about=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['about']))));	
		$blogtype=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['blogtype']))));	
		$content=($_POST['editor1']);	
		
		$fname=$_FILES['fileupld']['tmp_name'];
		$path="assets/blogs/".$author.$_FILES['fileupld']['name'];
		$thumbpath=	"assets/blogs/thumbs/".$author.$_FILES['fileupld']['name'];	
					
		$query="INSERT INTO `blog`(`author`, `about`,`blogtype`, `content`, `imgpath`,`thumb`) VALUES  ('$author', '$about','$blogtype', '$content', '$path','$thumbpath');";
		
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

<?php require_once('home/common/footer.fly');//adding employee header ?>


</body>
</html>
