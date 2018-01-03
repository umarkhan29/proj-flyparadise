<?php
		
		require_once('../catalog/session.khan');
		require_once('../catalog/connect.khan');
		
		//resizing first image
		
		$image="../../";
		$image.=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['img1']))));
		$image_size=getimagesize($image);
		$image_width=$image_size[0];
		$image_height=$image_size[1];
		$new_width=658;
		$new_height=448;
	    $new_image=imagecreatetruecolor($new_width,$new_height);
		$old_image=imagecreatefromjpeg($image);		
		imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);
		imagejpeg($new_image,$image);
		
		//Second Image
		
		$image="../../";
		$image.=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['img']))));							
		$image_size=getimagesize($image);
		$image_width=$image_size[0];
		$image_height=$image_size[1];
		$new_width=658;
		$new_height=448;
	    $new_image=imagecreatetruecolor($new_width,$new_height);
		$old_image=imagecreatefromjpeg($image);		
		imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);
		imagejpeg($new_image,$image);
		
		
		//Third Image
		
		$image="../../";
		$image.=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['img3']))));								
		$image_size=getimagesize($image);
		$image_width=$image_size[0];
		$image_height=$image_size[1];
		$new_width=658;
		$new_height=448;
	    $new_image=imagecreatetruecolor($new_width,$new_height);
		$old_image=imagecreatefromjpeg($image);		
		imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);
		imagejpeg($new_image,$image);
		
		//setting session foe success message
		$_SESSION['resizedone']="success";
		header('location:../../addpackages');
		
	
?>