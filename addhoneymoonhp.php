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
		include_once('home/components/addhoneymoonhp.khan');
		
?>

<form action="" method="POST"  enctype="multipart/form-data">
			
			<input type="text" name="destination" placeholder="Destination"/><br />
			<input type="text" name="heading" placeholder="Heading"/><br />
			<input type="text" name="description" placeholder="Description"/><br />
			<input type="text" name="duration" placeholder="Duration"/><br />
			<input type="text" name="type" placeholder="Type"/><br />
			
			
			
			<label>Select Image (jpg only)</label>
			<input type="file" name="fileupld" placeholder="Only JPG Image" /><br />
			
			
			<input type="submit" name="btn" value="Add"/><br />
</form>


</p>

</body>
</html>
