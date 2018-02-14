<?php
include_once('../catalog/connect.khan');
include_once('../catalog/session.khan');

//creating dynamic variables

$abc="iteration";
$dcount=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['duration']))));
echo "<br>";
?>
<form action="addpackages.php" method="POST" enctype="multipart/form-data">

	<input type="text" name="title" placeholder="Title"/><br />
	<input type="text" name="destination" placeholder="Destination"/><br />
	
	<label>Category</label>
	<select name="category" />
		<option value="Friends and Family">Friends and Family</option>
		<option  value="Solo">Solo</option>	
		<option  value="Honeymoon">Honeymoon</option>	
		<option  value="Adventure">Adventure</option>
		<option  value="Weekend">Weekend</option>				
		
	</select> <br />
	
	<label>Hotel Stars</label>
	<select name="hotelstar" />
		<option value="2">2 Star</option>
		<option  value="3">3 Star</option>	
		<option  value="4">4 Star</option>
		<option  value="5">5 Star</option>				
		
	</select> <br />
	
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
	
	<label>Camps</label>
	<select name="camps" />
		<option  value="No">No</option>
		<option  value="Yes">Yes</option>				
		
	</select> <br />
	
	<label>Houseboats</label>
	<select name="houseboats" />
		<option  value="No">No</option>
		<option  value="Yes">Yes</option>				
		
	</select> <br />
			
			
	<label>Stay Included</label>
	<select name="stay" />
		<option value="No">No</option>
		<option  value="Yes">Yes</option>				
		
	</select> <br /><br />
	
	Itineraries :	<br />
	<?php
//Defining Iterations

	for($i=1;$i<=$dcount;$i++){
		echo '<input type="text" name="iterationtitle'.$i.'"placeholder="Iteration'.$i.' Title" />';
		echo "&ensp;";
		echo '<input type="text" name="iterationtags'.$i.'"placeholder="Iteration'.$i.' Tags" />';
		echo "&ensp;";
		echo '<input type="text" name="iteration'.$i.'"placeholder="Iteration'.$i.'" />';
		echo "&ensp;";
		echo '<input type="text" name="iterationstay'.$i.'"placeholder="Iteration'.$i.' Stay" />';
		echo "&ensp;";
		echo '<input type="text" name="iterationinclusion'.$i.'"placeholder="Iteration'.$i.' Inclusion(Use comma to seperate multiple items)" />';
		echo "&ensp;";
		echo '<input type="text" name="iterationexclusion'.$i.'"placeholder="Iteration'.$i.' Exclusion(Use comma to seperate multiple items)" />';
		echo "&ensp;";
		echo '<input type="text" name="iterationworthwatching'.$i.'"placeholder="Iteration Worthwatching'.$i.' (Use comma to seperate multiple items)" />';
		echo "&ensp;";
		echo '<input type="text" name="iterationgetaway'.$i.'"placeholder="Iteration'.$i.' Getawys(Use comma to seperate multiple items)" />';
		echo "&ensp;"; //
		echo '<input type="text" name="iterationfrom'.$i.'"placeholder="Iteration'.$i.' From" />';
		echo "&ensp;";
		echo '<input type="text" name="iterationto'.$i.'"placeholder="Iteration'.$i.' To" />';
		echo "&ensp;";
		echo '<input type="text" name="iterationcabprice'.$i.'"placeholder="Cab Price for Iteration'.$i.'" />';
		echo "&ensp;";
		echo '<input type="text" name="iterationtdistance'.$i.'"placeholder="Iteration'.$i.' Distance" />';
		echo "&ensp;";
		
		echo "<br><br>";
	}
	
	echo "<br>";
	

	?>
	
	<label>Select Image</label>
	<input type="file" name="fileupld" /><br />
	<input type="file" name="fileupld2" /><br />
	<input type="file" name="fileupld3" /><br />
	<br />
		
	<select name="tags">
		<option value="Popular"  >Popular</option>
		<option value="Hot"  >Hot</option>
		<option value="Best Selling" >Best Selling</option>
	</select>
	<br />
	<input type="text" name="price" placeholder="Package Price"/><br />
	<input type="hidden" name="dcount" value="<?php echo $dcount; ?>"/><br />
	
	
	<input type="submit" value="Add Package" name="btn" />
</form>


