<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/common/employeeheader.fly');//adding employee header 
require_once('home/components/employeeauthorize.fly');
?>



<body>
<form action="" method="post">
	<input type="text" name="hotels" placeholder="" />
	<input type="submit" value="Find" />
</form>

<?php

//throwing success message
	  if(isset($_SESSION['resizedone'])){
		  if($_SESSION['resizedone']=="success"){
			  unset($_SESSION['resizedone']);
			  echo	"<div><p>Package Updated ! </p> </div>";	
		  }
	  }
	  
	  //getting packages
	if(isset($_POST['hotels'])){
		$token=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['hotels']))));
	    $query="SELECT * FROM `hotels` WHERE `id`='$token' or `name` like  '%".$token."%' or `location` = '$token' or `place` = '$token' or `stars` = '$token'";
	}else{
		$query="SELECT * FROM `hotels`";
	}
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
						
					);
					 $count=$count+1;
					
			}
			
		
			
	
?>
<br />
	<div>
		<table border="2">
			<th>ID</th>
			<th>Name</th>
			<th>Destination</th>
			<th>Place</th>
			<th>Stars</th>
			<th>Update</th>
			
			<?php for($i=0; $i<$count; $i++){ ?>
				<tr>
					<td> <?php echo $hotels[$i]['ID']; ?> </td>
					<td>  <?php echo $hotels[$i]['TITLE']; ?> </td>
					<td>  <?php echo $hotels[$i]['DESTINATION']; ?> </td>
					<td>  <?php echo $hotels[$i]['PLACE']; ?> </td>
					<td>  <?php echo $hotels[$i]['STARS']; ?> </td>
					
					<td>  <a href="updatehotel.php?token=<?php echo $hotels[$i]['ID']; ?>" > Update </a> </td>
				</tr>
			<?php } //ending for ?> 
	
		</table>
	</div>
<?php } ?>
<?php require_once('home/common/footer.fly'); ?>
</body>
</html>
