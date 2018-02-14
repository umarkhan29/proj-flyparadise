<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/common/employeeheader.fly');//adding employee header 
require_once('home/components/employeeauthorize.fly');
?>

<?php 
 
	if(isset($_POST['btn']))
		require_once('home/components/updatedestination.fly'); 

?>

<?php
	//getting destination information
	
	if(isset($_GET['token'])){
		$token=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['token']))));
		$query = "SELECT * FROM `destinations` WHERE `id` = '$token' LIMIT 1 ";
			if($result = mysqli_query($dbconn,$query)){
				$destination="";
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$destination[] = array(
							'ID'		=>	$row['id'],
							'DESTINATION' 	=> 	$row['destination'],
							'ALIAS' 	=> 	$row['alias'],
							'DESC' 		=> 	$row['desc'],
							'LINKS' 	=> 	$row['links'],
							'WORTHWATCHING' 	=> 	$row['worthwatching'],
							'GETAWAYS' 	=> 	$row['getaways'],
							'HEADING2'	=> 	$row['heading2'],
							'DESC2'		=> 	$row['desc2'],
							'IMG' 		=> 	$row['img1'],
							'TAGS'		=> 	$row['tags'],
							'IMG2'		=> 	$row['path2'],
							'HISTORY' 	=> 	$row['history'],
							'CULTURE'	=> 	$row['culture'],
							'FOOD'		=> 	$row['food'],
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}
	
		
			
	//formulating worthwatching
		$worthwatching="";
		 $worthwatchings=explode('$$$$',$destination[0]["WORTHWATCHING"]);
		  for($j=0;$j<count($worthwatchings);$j++){
				$worthwatching.=$worthwatchings[$j];
				if($j<count($worthwatchings)-1)
			 		$worthwatching.=",";
		  }
		
		//formulating getaways
		$getaway="";
		 $getaways=explode('$$$$',$destination[0]["GETAWAYS"]);
		  for($j=0;$j<count($getaways);$j++){
			 $getaway.=$getaways[$j];
			 if($j<count($getaways)-1)
			 	$getaway.=",";
			}
		 
		 
		 //formulating links
		$link="";
		 $links=explode('$$$$',$destination[0]["LINKS"]);
		 
		
	}
	
?>



<p>
<form action="" method="POST"  enctype="multipart/form-data">
			
			<input type="text" name="destination" placeholder="Destination" value="<?php echo$destination[0]["DESTINATION"] ?>"/><br />
			<input type="text" name="alias" placeholder="Destination Alias" value="<?php echo$destination[0]["ALIAS"] ?>" /><br />
			<input type="text" name="description" placeholder="Description" value="<?php echo$destination[0]["DESC"] ?>" /><br />
			<input type="text" name="heading2" placeholder="heading2" value="<?php echo $destination[0]["HEADING2"] ?>" /><br />
			<input type="text" name="description2" placeholder="Sub description" value="<?php echo $destination[0]["DESC2"] ?>" /><br />
			<label>Select Image</label>
			<input type="file" name="fileupld" placeholder="Choose Image" /><br />
			
			Links Via:
			<input type="checkbox" name="air-link" value="Air"  <?php for($j=0;$j<count($links);$j++){ if($links[$j]=="Air") { echo "checked"; break; }}?>>Flight
			<input type="checkbox" name="water-link" value="Water" <?php for($j=0;$j<count($links);$j++){ if($links[$j]=="Water") { echo "checked"; break; }}?> >Water
			<input type="checkbox" name="road-link" value="Road" <?php for($j=0;$j<count($links);$j++){ if($links[$j]=="Road") { echo "checked"; break; }}?>>Road
			<input type="checkbox" name="rail-link" value="Rail" <?php for($j=0;$j<count($links);$j++){ if($links[$j]=="Rail") { echo "checked"; break; }}?> >Rail
			<br />
			Worth Watching (Seperate each worth watching item with a comma ',') 
			<input type="text" name="worthwatching" placeholder="Worth Watching" value="<?php echo $worthwatching; ?>"/><br />
			Getaways (Seperate each getaway item with a comma ',') 
			<input type="text" name="getaways" placeholder="Getaways" value="<?php echo $getaway; ?>"/><br />
			<label>Select Sub Image</label>
			<input type="file" name="fileupld2" placeholder="Choose Image" /><br />
		
			<input type="text" name="history" placeholder="History" value="<?php echo $destination[0]["HISTORY"] ?>"/><br />
			<input type="text" name="culture" placeholder="Culture" value="<?php echo $destination[0]["CULTURE"] ?>"/><br />
			<input type="text" name="food" placeholder="Food" value="<?php echo $destination[0]["FOOD"] ?>"/><br />
			<input type="text" name="tags" placeholder="Poular, Hot etc" value="<?php echo $destination[0]["TAGS"] ?>"/><br />
			<input type="hidden" name="token" value="<?php echo $destination[0]["ID"] ?>" />
			<input type="hidden" name="oldpath1" value="<?php echo $destination[0]['IMG']; ?>"/><br />
			<input type="hidden" name="oldpath2" value="<?php echo $destination[0]['IMG2']; ?>"/><br />
			<input type="submit" name="btn" value="Update Destination"/><br />
</form>
</p>

<?php require_once('home/common/footer.fly'); ?>
</body>
</html>
