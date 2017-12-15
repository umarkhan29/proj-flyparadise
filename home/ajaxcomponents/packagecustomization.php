<?php
include_once('../catalog/connect.khan');
include_once('../catalog/session.khan');

//creating dynamic variables

$abc="iteration";
$dcount=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['duration']))));

?>
<form action="customisepackage.php" method="POST" enctype="multipart/form-data">

	<input type="text" name="title" placeholder="Title"/><br />
	<input type="text" name="destination" placeholder="Destination"/><br />
	<input type="text" name="category" placeholder="Category"/><br />
	<input type="text" name="hotelstar" placeholder="Hotel Star"/><br />
	<input type="text" name="description" placeholder="Description"/><br />
	
	<label>Meals</label>
	<select name="meals" />
		<option value="No">No</option>
		<option  value="Yes">Yes</option>				
		
	</select> <br />
	
	<label>Siteseeing</label>
	<select name="siteseeing" />
		<option value="No">No</option>
		<option  value="Yes">Yes</option>				
		
	</select> <br />
	
	<label>Addon</label>
	<select name="addon" />
		<option value="No">No</option>
		<option  value="Yes">Yes</option>				
		
	</select> <br />

	<label>Flights Included</label>
	<select name="flight" />
		<option value="No">No</option>
		<option  value="Yes">Yes</option>				
		
	</select> <br />
	
	
	<label>Local Cab Included</label>
	<select name="cab" />
		<option  value="No">No</option>
		<option  value="Yes">Yes</option>				
		
	</select> <br />
	
	
	<label>Stay Included</label>
	<select name="stay" />
		<option value="No">No</option>
		<option  value="Yes">Yes</option>				
		
	</select> <br /><br />
	
	
	<?php
//Defining Iterations
	for($i=1;$i<=$dcount;$i++){
		echo '<input type="text" name="iteration'.$i.'"placeholder="Iteration'.$i.'" />';
		echo "&ensp;";
		echo '<input type="text" name="iterationstay'.$i.'"placeholder="Iteration'.$i.' Stay" />';
		echo "&ensp;";
		echo '<input type="text" name="iterationinclusion'.$i.'"placeholder="Iteration'.$i.' Inclusion(Use comma to seperate multiple items)" />';
		echo "&ensp;";
		echo '<input type="text" name="iterationexclusion'.$i.'"placeholder="Iteration'.$i.' Exclusion(Use comma to seperate multiple items)" />';
		echo "&ensp;";
		echo '<input type="text" name="iterationgetaway'.$i.'"placeholder="Iteration'.$i.' Getawys(Use comma to seperate multiple items)" />';
		echo "<br><br>";
	}
	
	echo "<br>";
	

	?>
	
	<label>Select Image (jpg only)</label>
	<input type="file" name="fileupld" /><br /><br />
	<input type="text" name="price" placeholder="Package Price"/><br />
	<input type="hidden" name="dcount" value="<?php echo $dcount; ?>"/><br />
	
	
	<input type="submit" value="Add Package" name="btn" />
</form>


