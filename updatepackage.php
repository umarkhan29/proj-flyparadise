<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/common/employeeheader.fly');//adding employee header 
require_once('home/components/employeeauthorize.fly');
?>


<body>

<?php 
  
	if(isset($_POST['updatepackage']))
		require_once('home/components/updatepackage.fly'); 

?>


<?php
	if(isset($_GET['token'])){
		$token=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['token']))));
		$query="SELECT * FROM `packages` WHERE `id`='$token' or `title` like  '%".$token."%' or `destination` = '$token'";
		
		if($result=mysqli_query($dbconn,$query)){ 
			$packages;
			$count=0;
			while($row = mysqli_fetch_assoc($result)){
				$packages[] = array(
						
							'ID'			=>	$row['id'],
							'TITLE' 		=> 	$row['title'],
							'DESTINATION' 	=> 	$row['destination'],
							'DURATION' 		=> 	$row['duration'],
							'CATEGORY' 		=> 	$row['category'],
							'HOTELSTAR' 	=> 	$row['hotelstar'],
							'DESCRIPTION' 	=> 	$row['description'],
							'FLIGHTS' 		=> 	$row['includeflights'],
							'PATH' 			=> 	$row['path'],
							'PATH2' 		=> 	$row['path2'],
							'PATH3' 		=> 	$row['path3'],
							'CAB' 			=> 	$row['localcab'],
							'MEALS' 		=> 	$row['meals'],
							'SITESEEING' 	=> 	$row['siteseeing'],
							'STAY' 			=> 	$row['stay'],
							'ADDON' 		=> 	$row['addon'],
							'ITINERARY' 	=> 	$row['itinerary'],
							'INCLUSIONS'	=> 	$row['inclusions'],
							'EXCLUSIONS' 	=> 	$row['exclusions'],
							'STAYS'		 	=> 	$row['stays'],
							'GETAWAYS' 		=> 	$row['getaways'],
							'WORTHWATCHING' => 	$row['worthwatching'],
							'ITINERARYTITLE'=>  $row['itinerarytitle'],
							'ITINERARYTAGS' => 	$row['itinerarytags'],
							'TAGS' 			=> 	$row['tags'],
							'ITINERARYDISTANCE' => 	$row['distance'],
							'ITINERARYFROM' => 	$row['itineraryfrom'],
							'ITINERARYTO' => 	$row['itineraryto'],
							'ITINERARYCABPRICE' => 	$row['itinerarycabprice'],
						
					);
					 $count=$count+1;
					
				}
				
			}else{
				echo "Something went wrong. Contact your administrator";
			}
		}
		else{
			echo "No Packages found !"; // make a redirection
		} 

?>
</body>

	<div>
		
		<form action="" method="post" enctype="multipart/form-data">
			<input type="text" name="title" placeholder="Title" value="<?php echo $packages[0]['TITLE']; ?>" /><br />
			<input type="text" name="destination" placeholder="Destination" value="<?php echo $packages[0]['DESTINATION']; ?>" /><br />
			<input type="text" name="category" placeholder="Category" value="<?php echo $packages[0]['CATEGORY']; ?>" /><br />
			<input type="text" name="hotelstar" placeholder="Hotel Star" value="<?php echo $packages[0]['HOTELSTAR']; ?>" /><br />
			<input type="text" name="description" placeholder="Description" value="<?php echo $packages[0]['DESCRIPTION']; ?>" /><br />
			
			
			<label>Meals</label>
			<select name="meals" />
				<option value="No">No</option>
				<option  value="Yes" <?php if($packages[0]['MEALS']=="Yes") echo "selected";?> >Yes</option>				
				
			</select> <br />
			
			<label>Siteseeing</label>
			<select name="siteseeing" />
				<option value="No">No</option>
				<option  value="Yes" <?php if($packages[0]['SITESEEING']=="Yes") echo "selected";?>>Yes</option>				
				
			</select> <br />
			
			<label>Addon</label>
			<select name="addon" />
				<option value="No">No</option>
				<option  value="Yes" <?php if($packages[0]['ADDON']=="Yes") echo "selected";?> >Yes</option>				
				
			</select> <br />
		
			<label>Flights Included</label>
			<select name="flight" />
				<option value="No">No</option>
				<option  value="Yes" <?php if($packages[0]['FLIGHTS']=="Yes") echo "selected";?> >Yes</option>				
				
			</select> <br />
			
			
			<label>Local Cab Included</label>
			<select name="cab" />
				<option  value="No">No</option>
				<option  value="Yes" <?php if($packages[0]['CAB']=="Yes") echo "selected";?>>Yes</option>				
				
			</select> <br />
			
			
			<label>Stay Included</label>
			<select name="stay" />
				<option value="No">No</option>
				<option  value="Yes" <?php if($packages[0]['STAY']=="Yes") echo "selected";?>>Yes</option>				
				
			</select> <br /><br />
		
			<?php 
				//getting itineraries
				$itenaries=explode('$$$$',$packages[0]['ITINERARY']);
				
				//getting itenariestitle
				$itenariestitle=explode('$$$$',$packages[0]['ITINERARYTITLE']);
				//////
				
				
				//getting itenariestags
				$itenariestags=explode('$$$$',$packages[0]['ITINERARYTAGS']);
				
				
				//getting itenariesstay
				$itenariesstay=explode('$$$$',$packages[0]['STAYS']);
				
				
				//getting itenariesinclusions
				$itenariesinclusions=explode('$$$$',$packages[0]['INCLUSIONS']);
				
				
				//getting itenariesexclusions
				$itenariesexclusions=explode('$$$$',$packages[0]['EXCLUSIONS']);
				
				
				//getting itenariesworthwatching
				$itenariesworthwatching=explode('$$$$',$packages[0]['WORTHWATCHING']);
				
				
				//getting itenariesgetaways
				$itenariesgetaways=explode('$$$$',$packages[0]['GETAWAYS']);
				
				
				//getting itenariesfrom
				$itenariesfrom=explode('$$$$',$packages[0]['ITINERARYFROM']);
				
				
				//getting itenariesto
				$itenariesto=explode('$$$$',$packages[0]['ITINERARYTO']);
				
				
				//getting itenariestitle
				$itenariescabprice=explode('$$$$',$packages[0]['ITINERARYCABPRICE']);
				
				
				//getting itenariestitle
				$itenariesdistance=explode('$$$$',$packages[0]['ITINERARYDISTANCE']);
				
				/////////////////////////////////
				
				
				
				//defining iteration fields
				for($j=0;$j<count($itenaries)-1;$j++){
					$i=$j+1;
					echo '<input type="text" name="iterationtitle'.$i.'"placeholder="Iteration'.$i.' Title" value="'.$itenariestitle[$j].'" />';
					echo "&ensp;";
					echo '<input type="text" name="iterationtags'.$i.'"placeholder="Iteration'.$i.' Tags" value="'.$itenariestags[$j].'" />';
					echo "&ensp;";
					echo '<input type="text" name="iteration'.$i.'"placeholder="Iteration'.$i.'" value="'.$itenaries[$j].'"/>';
					echo "&ensp;";
					echo '<input type="text" name="iterationstay'.$i.'"placeholder="Iteration'.$i.' Stay" value="'.$itenariesstay[$j].'" />';
					echo "&ensp;";
					echo '<input type="text" name="iterationinclusion'.$i.'"placeholder="Iteration'.$i.' Inclusion(Use comma to seperate multiple items)" value="'.$itenariesinclusions[$j].'" />';
					echo "&ensp;";
					echo '<input type="text" name="iterationexclusion'.$i.'"placeholder="Iteration'.$i.' Exclusion(Use comma to seperate multiple items)" value="'.$itenariesexclusions[$j].'" />';
					echo "&ensp;";
					echo '<input type="text" name="iterationworthwatching'.$i.'"placeholder="Iteration Worthwatching'.$i.' (Use comma to seperate multiple items)" value="'.$itenariesworthwatching[$j].'" />';
					echo "&ensp;";
					echo '<input type="text" name="iterationgetaway'.$i.'"placeholder="Iteration'.$i.' Getawys(Use comma to seperate multiple items)" value="'.$itenariesgetaways[$j].'" />';
					echo "&ensp;"; //
					echo '<input type="text" name="iterationfrom'.$i.'"placeholder="Iteration'.$i.' From" value="'.$itenariesfrom[$j].'"  />';
					echo "&ensp;";
					echo '<input type="text" name="iterationto'.$i.'"placeholder="Iteration'.$i.' To" value="'.$itenariesto[$j].'" />';
					echo "&ensp;";
					echo '<input type="text" name="iterationcabprice'.$i.'"placeholder="Cab Price for Iteration'.$i.'" value="'.$itenariescabprice[$j].'" />';
					echo "&ensp;";
					echo '<input type="text" name="iterationtdistance'.$i.'"placeholder="Iteration'.$i.' Distance" value="'.$itenariesdistance[$j].'"  />';
					echo "&ensp;";
					
					echo "<br><br>";
				}
			
			//getting dcount from durations
			$dcount=explode('Days',$packages[0]['DURATION']);
			$dcount=$dcount[0];
			
			?>
			
		<label>Select Image </label>
		<input type="file" name="fileupld" /><br />
		<input type="file" name="fileupld2"  /><br />
		<input type="file" name="fileupld3"  /><br />
		<br />
		<input type="hidden" name="oldpath1" value="<?php echo $packages[0]['PATH']; ?>"/><br />
		<input type="hidden" name="oldpath2" value="<?php echo $packages[0]['PATH2']; ?>"/><br />
		<input type="hidden" name="oldpath3" value="<?php echo $packages[0]['PATH3']; ?>"/><br />
		
		
		<input type="hidden" name="token" value="<?php echo $token; ?>"/><br />
		<input type="hidden" name="dcount" value="<?php echo $dcount; ?>"/><br />
		<select name="tags">
			<option value="Popular" <?php if($packages[0]['TAGS']=="Popular") echo "selected";?>>Popular</option>
			<option value="Hot" <?php if($packages[0]['TAGS']=="Hot") echo "selected";?>  >Hot</option>
			<option value="Best Selling" <?php if($packages[0]['TAGS']=="Best Selling") echo "selected";?> >Best Selling</option>
		</select>
		<br /><br />
		<input type="submit" name="updatepackage" value="Update Package" />
	</form>
	</div>
<?php require_once('home/common/footer.fly'); ?>
</body>
</html>
