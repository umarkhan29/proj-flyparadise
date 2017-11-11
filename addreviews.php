<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	include_once('home/catalog/connect.khan');
	include_once('home/catalog/session.khan');
	include_once('home/components/val.php');
	if(isset($_POST['btn']))  val_name($_POST['name']); 
?>





<?php
	//uploading component here
	include_once('home/components/addreview.khan');
	 //throwing success message
	  if(isset($_SESSION['resizedone'])){
		  if($_SESSION['resizedone']=="success"){
		  unset($_SESSION['resizedone']);
		  echo	"<div  style='padding:7px; border: 0px solid; height:90px; background:#F90; opacity: 0.5; width:100%; margin:10px; border-radius:5px; color:#ffffff; font-size:18px;'><p>Review added sucessfully ! </p>
				 </div>";
		  }
	  }
?>
<p>
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="text" name="name" placeholder="Name"/><br />
			<input type="text" name="about" placeholder="What you do"/><br />
			<input type="text" name="desc" placeholder="Review"/><br />
			<label>Select Image (jpg only)</label>
			<input type="file" name="fileupld" placeholder="Only JPG Image" /><br />
			<input type="submit" name="btn" value="Add Review"/>
		</form>
</p>

</body>
</html>
