<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/common/employeeheader.fly');//adding employee header 
require_once('home/components/employeeauthorize.fly');
?>

<script src="ckeditor/ckeditor.js"></script>

<?php

	$uid=111; //update session here	
	
	if(isset($_GET['token']))
		$token=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['token']))));
	else
		header('location:get-in');
		
	//updating script
	if(isset($_POST['btn'])){ 		
		$author=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['author']))));
		$about=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['about']))));	
		$blogtype=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['blogtype']))));	
		$content=($_POST['editor1']);	
		
					
		$query="UPDATE `blog` SET `author`='$author',`about`='$about',`content`='$content',`blogtype`='$blogtype' WHERE `id` = '$token';";
		
		if(mysqli_query($dbconn,$query)){
			echo "Blog Updated Sucessfully";
			
		}
		else{	
			echo '<div style="width:80%; padding-top:50px; padding-bottom:60px; padding-left:20%; overflow:hidden; color:red; font-size:32px; 		background:#999999;">Something went wrong. Contact your administrator</div>';
		}
					
	}

?>



<?php
	//getting blog information
	if(isset($_GET['token'])){
		$token=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['token']))));
		$query = "SELECT * FROM `blog` WHERE `id` = '$token' LIMIT 1 ";
			if($result = mysqli_query($dbconn,$query)){
				$blog;
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$blog[] = array(
							
							'ID'		=>	$row['id'],
							'PATH' 		=> 	$row['imgpath'],
							'AUTHOR' 	=> 	$row['author'],
							'ABOUT' 	=> 	$row['about'],
							'CONTENT' 	=> 	$row['content'],
							'THUMB' 	=> 	$row['thumb'],
							'TYPE'		=> 	$row['blogtype'],
							'DATE'		=> 	$row['date'],
							'UID'		=> 	$row['uid'],
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}
	
		//checking if no blog found
		if($count<1)
			header('location:logout');
			
			
		//checking owner of blog
		if($blog[0]['UID']!=$uid)
			header('location:logout');
		
	}
		

?>



<p>

		<form action="" method="POST" enctype="multipart/form-data">
			<input type="text" name="author" placeholder="Author" value="<?php echo $blog[0]['AUTHOR']; ?>"/><br />
			<input type="text" name="about" placeholder="Blog About" value="<?php echo $blog[0]['ABOUT']; ?>" /><br />
			<input type="text" name="blogtype" placeholder="Featured, Popular etc" value="<?php echo $blog[0]['TYPE']; ?>" /><br />
			
			
			
			 <textarea name="editor1" id="editor1" rows="10" cols="80">
					<?php echo $blog[0]['CONTENT']; ?>
			</textarea><br />
			<input type="submit" name="btn" value="Update"/><br />
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

<?php require_once('home/common/footer.fly'); ?>
</body>
</html>
