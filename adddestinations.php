<?php
	include_once('home/catalog/connect.khan');
	include_once('home/catalog/session.khan');
	require_once('home/components/employeeauthorize.fly');
 	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php require_once('home/common/employeeheader.fly');//adding employee header  ?>
<p>
<?php
		//throwing success message
	  if(isset($_SESSION['resizedone'])){
		  if($_SESSION['resizedone']=="success"){
		  unset($_SESSION['resizedone']);
		  echo	"<div  style='padding:7px; border: 0px solid; height:90px; background:#F90; opacity: 0.5; width:100%; margin:10px; border-radius:5px; color:#ffffff; font-size:18px;'><p>Data stored sucessfully ! </p>
				 </div>";
		  }
	  }
	  
	//adding add destination module	  
	include_once('home/components/adddest.fly');
?>

<form action="" method="POST"  enctype="multipart/form-data">
			
			<input type="text" name="destination" placeholder="Destination"/><br />
			<input type="text" name="alias" placeholder="Destination Alias"/><br />
			<input type="text" name="description" placeholder="Description"/><br />
			<input type="text" name="heading2" placeholder="heading2"/><br />
			<input type="text" name="description2" placeholder="Sub description"/><br />
			<label>Select Image</label>
			<input type="file" name="fileupld" placeholder="Choose Image" /><br />
			Links Via:
			<input type="checkbox" name="air-link" value="Air">Flight
			<input type="checkbox" name="water-link" value="Water">Water
			<input type="checkbox" name="road-link" value="Road">Road
			<input type="checkbox" name="rail-link" value="Rail">Rail
			<br />
			Worth Watching (Seperate each worth watching item with a comma ',') 
			<input type="text" name="worthwatching" placeholder="Worth Watching"/><br />
			Getaways (Seperate each getaway item with a comma ',') 
			<input type="text" name="getaways" placeholder="Getaways"/><br />
			
			<label>Select Sub Image</label>
			<input type="file" name="fileupld2" placeholder="Choose Image" /><br />
			<input type="text" name="history" placeholder="History"/><br />
			<input type="text" name="culture" placeholder="Culture"/><br />
			<input type="text" name="food" placeholder="Food"/><br />
			<select name="tags">
				<option value="Popular">Popular</option>
				<option value="Hot"  >Hot</option>
				<option value="Best Selling">Best Selling</option>
			</select>
		<br />
			<input type="submit" name="btn" value="Add Destination"/><br />
</form>


</p>
<?php require_once('home/common/footer.fly');//adding employee header ?>

</body>
</html>
