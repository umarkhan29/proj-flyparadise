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
			Price : <br />
			
			<input type="text" name="jan2" placeholder="Jan - March (2 room)"/> <input type="text" name="jan3" placeholder="Jan - March(3 room)"/><br />
			<input type="text" name="april2" placeholder="April - June (2 room)"/> <input type="text" name="april3" placeholder="April - June(3 room)"/><br />
			<input type="text" name="july2" placeholder="July - Sep (2 room)"/> <input type="text" name="july3" placeholder="July - Sep(3 room)"/><br />
			<input type="text" name="oct2" placeholder="Oct - Dec (2 room)"/> <input type="text" name="oct3" placeholder="Oct - Dec(3 room)"/>
			<br /><br />
			
			<input type="submit" name="btn" value="Add"/><br />
		</form>
		
</p>





</body>
</html>
