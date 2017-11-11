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
	include_once('home/components/addmedia.khan');
	
?>
<p>
		<form action="" method="POST">
			<input type="text" name="title" placeholder="Title"/><br />
			<input type="date" name="date" placeholder="Date"/><br />
			<input type="text" name="desc" placeholder="Description"/><br />
			
			<input type="submit" name="btn" value="Add"/>
		</form>
</p>

</body>
</html>
