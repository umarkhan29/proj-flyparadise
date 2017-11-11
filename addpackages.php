<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<p>
<?php
		include_once('home/catalog/connect.khan');
?>
<?php
		include_once('home/components/addpackage.khan');
?>

<form action="" method="POST"  enctype="multipart/form-data">
			<input type="text" name="title" placeholder="Title"/><br />
			<input type="text" name="destination" placeholder="Destination"/><br />
			<input type="text" name="duration" placeholder="Duration"/><br />
			<input type="text" name="hotelstar" placeholder="Hotel Star"/><br />
			<input type="text" name="description" placeholder="Description"/><br />
			<input type="text" name="price" placeholder="Price"/><br />
			<label>Select Image (jpg only)</label>
			<input type="file" name="fileupld" placeholder="Only JPG Image" /><br />
			<label>Flights Included</label>
			<select name="includeflights" />
				<option value="No">No</option>
				<option  value="Yes">Yes</option>				
				
			</select> <br />
			
			
			<label>Local Cab Included</label>
			<select name="localcab" />
				<option  value="No">No</option>
				<option  value="Yes">Yes</option>				
				
			</select> <br /><br />
			
			<input type="submit" name="btn" value="Add"/><br />
</form>


</p>

</body>
</html>
