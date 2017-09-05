<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	include_once('home/catalog/connect.khan');
	include_once('home/components/val.php');
	if(isset($_POST['btn']))  val_name($_POST['name']); 
?>





<?php
	//uploading component here
	include_once('home/components/addreview.khan');
	
?>
<p>
		<form action="" method="POST">
			<input type="text" name="name" placeholder="Name"/><br />
			<input type="text" name="about" placeholder="Review About"/><br />
			<input type="text" name="desc" placeholder="Review"/><br />
			<select name="stars">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option selected>5</option>
			</select><br />
			<input type="submit" name="btn" value="Add Review"/>
		</form>
</p>

</body>
</html>
