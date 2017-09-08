<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<p>
<?php
		include_once('home/catalog/connect.khan');
		include_once('home/catalog/session.khan');
?>
<?php
		include_once('home/components/addpopulardesthp.khan');
		
		 //throwing success message
	  if(isset($_SESSION['resizedone'])){
		  if($_SESSION['resizedone']=="success"){
		  unset($_SESSION['resizedone']);
		  echo	"<div  style='padding:7px; border: 0px solid; height:90px; background:#F90; opacity: 0.5; width:100%; margin:10px; border-radius:5px; color:#ffffff; font-size:18px;'><p>Data stored sucessfully ! </p>
				 </div>";
		  }
	  }
?>

<form action="" method="POST"  enctype="multipart/form-data">
			
			<input type="text" name="destination" placeholder="Destination"/><br />
			<input type="text" name="description" placeholder="Description"/><br />
			
			<label>Select Image (jpg only)</label>
			<input type="file" name="fileupld" placeholder="Only JPG Image" /><br />
			
			
			<input type="submit" name="btn" value="Add"/><br />
</form>


</p>

</body>
</html>
