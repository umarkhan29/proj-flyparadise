<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	include_once('home/catalog/connect.khan');
	include_once('home/components/val.php');
	
?>


<?php
//uploading component here
	include_once('home/components/addtc.khan');
	
?>
<p>
		<form action="" method="POST">
			<input type="text" name="place" placeholder="Place"/><br />
			<input type="text" name="tc" placeholder="Terms and Conditions"/><br />
			
			<input type="submit" name="btn" value="Add"/>
		</form>
</p>

</body>
</html>
