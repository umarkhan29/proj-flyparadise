<?php
		
		require_once('../catalog/session.khan');
		
		$image="../../";
		$image.=$_GET['img'];
		
		$thumb="../../";
	    $thumb.=$_GET['thumbpath'];
		
		if(exif_imagetype($image)==IMAGETYPE_JPEG){
			header('content-type: image/jpeg');								
			
			$image_size=getimagesize($image);
			
			$image_width=$image_size[0];
			$image_height=$image_size[1];
			$new_width=520;
			$new_height=278;
			
			
			$new_image=imagecreatetruecolor($new_width,$new_height);
			
			$old_image=imagecreatefromjpeg($image);	
				
			imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);
			
			imagejpeg($new_image,$image);
			
			header('location:resizeblogthumb.php?thumbpath='.$thumb);
		}
		
		//adding png support
		if(exif_imagetype($image)==IMAGETYPE_PNG){
			header('content-type: image/png');								
			
			$image_size=getimagesize($image);
			
			$image_width=$image_size[0];
			$image_height=$image_size[1];
			$new_width=520;
			$new_height=278;
			
			
			$new_image=imagecreatetruecolor($new_width,$new_height);
			
			$old_image=imagecreatefrompng($image);	
				
			imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);
			
			imagepng($new_image,$image);
			
			header('location:resizeblogthumb.php?thumbpath='.$thumb);
		}
	
?>