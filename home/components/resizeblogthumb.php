<?php 
     //secong image (thumb) for blogs
	 
	 	require_once('../catalog/session.khan');
	 
	    $image=$_GET['thumbpath'];
		
		if(exif_imagetype($image)==IMAGETYPE_JPEG){
			header('content-type: image/jpeg');								
			
			$image_size=getimagesize($image);
			
			$image_width=$image_size[0];
			$image_height=$image_size[1];
			$new_width=200;
			$new_height=260;
			
			
			$new_image=imagecreatetruecolor($new_width,$new_height);
			
			$old_image=imagecreatefromjpeg($image);	
				
			imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);
			imagejpeg($new_image,$image);
												
			//setting session for success message
			$_SESSION['resizedone']="success";
			header('location:../../addblog');
		}
		
		//adding png support
		if(exif_imagetype($image)==IMAGETYPE_PNG){
			header('content-type: image/png');								
			
			$image_size=getimagesize($image);
			
			$image_width=$image_size[0];
			$image_height=$image_size[1];
			$new_width=200;
			$new_height=260;
			
			
			$new_image=imagecreatetruecolor($new_width,$new_height);
			
			$old_image=imagecreatefrompng($image);	
				
			imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);
			
			imagepng($new_image,$image);
			
			//setting session for success message
			$_SESSION['resizedone']="success";
			header('location:../../addblog');
		}
		
?>