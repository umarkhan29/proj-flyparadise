<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	include_once('home/catalog/connect.khan');
	include_once('home/components/hotel.fly');
?>


<p>
		<form action="" method="POST">
			<input type="text" name="name" placeholder="Name"/><br />
			<input type="text" name="location" placeholder="Destination"/><br />
			<input type="text" name="stars" placeholder="Star Rating"/><br />
			<input type="text" name="desc" placeholder="Description"/><br /><br />
			Price : 
			<input type="text" name="jan" placeholder="Jan - March"/>
			<input type="text" name="april" placeholder="April - June"/>
			<input type="text" name="july" placeholder="July - Sep"/>
			<input type="text" name="oct" placeholder="Oct - Dec"/>
			<br /><br />
			
			<input type="submit" name="btn" value="Add"/><br />
		</form>
		
</p>





</body>
</html>
