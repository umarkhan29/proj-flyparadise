<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	include_once('home/catalog/connect.khan');
	include_once('home/components/hotel.khan');
?>


<p>
		<form action="" method="POST">
			<input type="text" name="name" placeholder="Name"/><br />
			<input type="text" name="location" placeholder="Location"/><br />
			<input type="text" name="stars" placeholder="Star Rating"/><br />
			<input type="text" name="desc" placeholder="Description"/><br />
			<input type="text" name="extrabedprice" placeholder="Extra Bed (Price)"/><br />
			<input type="text" name="childwithoutbed6" placeholder="Child Without Bed (6-9 Years) (Price)"/><br />
			<input type="text" name="childbelow5years" placeholder="Child (Below 5 Years) (Price)"/><br />
			<input type="text" name="cp" placeholder="CP (Price)"/><br />
			<input type="text" name="ep" placeholder="EP (Price)"/><br />
			<input type="text" name="ap" placeholder="AP (Price)"/><br />
			<input type="text" name="map" placeholder="MAP (Price)"/><br />
			
			<input type="submit" name="btn" value="Add"/><br />
		</form>
		
</p>





</body>
</html>
