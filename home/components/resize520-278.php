<?php
		
		require_once('../catalog/session.khan');
		
		$image="../../";
		$image.=$_GET['img'];
		
		$thumb="../../";
	    $thumb.=$_GET['thumbpath'];
		
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
	
?>