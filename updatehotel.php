<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/common/employeeheader.fly');//adding employee header 
require_once('home/components/employeeauthorize.fly');
?>


<body>

<?php 

	  
	  
	if(isset($_POST['btn']))
		require_once('home/components/updatehotel.fly'); 

?>



<?php
	if(isset($_GET['token'])){
		$token=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['token']))));
		$query="SELECT * FROM `hotels` WHERE `id`='$token' or `name` like  '%".$token."%' or `location` = '$token'";
		
		if($result=mysqli_query($dbconn,$query)){ 
			$hotels;
			$count=0;
			while($row = mysqli_fetch_assoc($result)){
				$hotels[] = array(
						
						'ID'			=>	$row['id'],
						'TITLE' 		=> 	$row['name'],
						'DESC'	 		=> 	$row['desc'],
						'DESTINATION' 	=> 	$row['location'],
						'PLACE' 		=> 	$row['place'],
						'STARS' 		=> 	$row['stars'],
						'JAN2' 			=> 	$row['jan-2rooms'],
						'APRIL2' 		=> 	$row['april-2rooms'],
						'JULY2' 		=> 	$row['july-2rooms'],
						'OCT2' 			=> 	$row['oct-2rooms'],
						'JAN3' 			=> 	$row['jan-3rooms'],
						'APRIL3' 		=> 	$row['april-3rooms'],
						'JULY3' 		=> 	$row['july-3rooms'],
						'OCT3' 			=> 	$row['oct-3rooms'],
						'MEALS' 		=> 	$row['meals'],
						
						
						
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
		<form action="" method="POST">
			<input type="text" name="name" placeholder="Name" value="<?php echo $hotels[0]['TITLE']; ?> "/><br />
			<input type="text" name="location" placeholder="Destination" value="<?php echo $hotels[0]['DESTINATION']; ?> "/><br />
			<input type="text" name="place" placeholder="Place" value="<?php echo $hotels[0]['PLACE']; ?> "/><br />
			<input type="text" name="stars" placeholder="Star Rating" value="<?php echo $hotels[0]['STARS']; ?> "/><br />
			<input type="text" name="desc" placeholder="Description"/ value="<?php echo $hotels[0]['DESC']; ?> "><br /><br />
			Price : <br />
			
			<input type="text" name="jan2" placeholder="Jan - March (2 room)" value="<?php echo $hotels[0]['JAN2'];?>" /> <input type="text" name="jan3" placeholder="Jan - March(3 room)" value="<?php echo $hotels[0]['JAN3']; ?> "/><br />
			<input type="text" name="april2" placeholder="April - June (2 room)" value="<?php echo $hotels[0]['APRIL2']; ?> "/> <input type="text" name="april3" placeholder="April - June(3 room)" value="<?php echo $hotels[0]['APRIL3']; ?> "/><br />
			<input type="text" name="july2" placeholder="July - Sep (2 room)" value="<?php echo $hotels[0]['JULY2']; ?> "/> <input type="text" name="july3" placeholder="July - Sep(3 room)" value="<?php echo $hotels[0]['JULY3']; ?> "/><br />
			<input type="text" name="oct2" placeholder="Oct - Dec (2 room)" value="<?php echo $hotels[0]['OCT2']; ?> "/> <input type="text" name="oct3" placeholder="Oct - Dec(3 room)" value="<?php echo $hotels[0]['OCT3']; ?>" /> <br /><br />
			
			<input type="text" name="meals" placeholder="Meals Price (Per Person)"  value="<?php echo $hotels[0]['MEALS']; ?>" /><br /><br />
			<br /><br />
			<input type="hidden" name="token" value="<?php echo $hotels[0]['ID']; ?>"/>
			<input type="submit" name="btn" value="Update"/><br />
		</form>
	</div>
<?php require_once('home/common/footer.fly'); ?>
</body>
</html>
