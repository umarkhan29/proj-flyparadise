<?php 
     //secong image (thumb) for blogs
	 
	 	require_once('../catalog/session.khan');
	 
	    $image=$_GET['thumbpath'];
		
		header('content-type: image/jpeg');								
		
		$image_size=getimagesize($image);
		
		$image_width=$image_size[0];
		$image_height=$image_size[1];
		$new_width=90;
		$new_height=90;
		
		
	    $new_image=imagecreatetruecolor($new_width,$new_height);
		
		$old_image=imagecreatefromjpeg($image);	
			
		imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);
		imagejpeg($new_image,$image);
											
		//setting session for success message
		$_SESSION['resizedone']="success";
		header('location:../../addblog');
		
?>