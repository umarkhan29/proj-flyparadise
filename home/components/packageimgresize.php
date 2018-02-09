<?php
		
		require_once('../catalog/session.khan');
		require_once('../catalog/connect.khan');
		$action=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['action']))));
		//resizing first image
		
		$image="../../";
		$image.=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['img1']))));
		if(exif_imagetype($image)==IMAGETYPE_JPEG){
			$image_size=getimagesize($image);
			$image_width=$image_size[0];
			$image_height=$image_size[1];
			$new_width=658;
			$new_height=492;
			$new_image=imagecreatetruecolor($new_width,$new_height);
			$old_image=imagecreatefromjpeg($image);		
			imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);
			imagejpeg($new_image,$image);
		}
		if(exif_imagetype($image)==IMAGETYPE_PNG){
			$image_size=getimagesize($image);
			$image_width=$image_size[0];
			$image_height=$image_size[1];
			$new_width=658;
			$new_height=492;
			$new_image=imagecreatetruecolor($new_width,$new_height);
			$old_image=imagecreatefrompng($image);		
			imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);
			imagepng($new_image,$image);
		}
		
		//Second Image
		
		$image="../../";
		$image.=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['img2']))));							
		
		if(exif_imagetype($image)==IMAGETYPE_JPEG){
			$image_size=getimagesize($image);
			$image_width=$image_size[0];
			$image_height=$image_size[1];
			$new_width=658;
			$new_height=492;
			$new_image=imagecreatetruecolor($new_width,$new_height);
			$old_image=imagecreatefromjpeg($image);		
			imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);
			imagejpeg($new_image,$image);
		}
		if(exif_imagetype($image)==IMAGETYPE_PNG){
			$image_size=getimagesize($image);
			$image_width=$image_size[0];
			$image_height=$image_size[1];
			$new_width=658;
			$new_height=492;
			$new_image=imagecreatetruecolor($new_width,$new_height);
			$old_image=imagecreatefrompng($image);		
			imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);
			imagepng($new_image,$image);
		}
		
		//Third Image
		
		$image="../../";
		$image.=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['img3']))));								
		$image_size=getimagesize($image);
		$image_width=$image_size[0];
		$image_height=$image_size[1];
		$new_width=658;
		$new_height=492;
	    $new_image=imagecreatetruecolor($new_width,$new_height);
		$old_image=imagecreatefromjpeg($image);		
		imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);
		imagejpeg($new_image,$image);
		
		//setting session foe success message
		$_SESSION['resizedone']="success";
		if($action=='update')
			header('location:../../updatepackages');
		else
			header('location:../../addpackages');
		
	
?>