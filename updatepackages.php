<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/common/employeeheader.fly');//adding employee header 
require_once('home/components/employeeauthorize.fly');
?>



<body>
<form action="" method="post">
	<input type="text" name="packages" placeholder="" />
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
	if(isset($_POST['packages'])){
		$token=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['packages']))));
		$query="SELECT * FROM `packages` WHERE `id`='$token' or `title` like  '%".$token."%' or `destination` = '$token'";
	}else{
		$query="SELECT * FROM `packages`";
	}
		if($result=mysqli_query($dbconn,$query)){ 
			$packages;
			$count=0;
			while($row = mysqli_fetch_assoc($result)){
				$packages[] = array(
						
						'ID'			=>	$row['id'],
						'PATH' 			=> 	$row['path'],
						'TITLE' 		=> 	$row['title'],
						'DESC'	 		=> 	$row['description'],
						'DESTINATION' 	=> 	$row['destination'],
						'DURATION' 		=> 	$row['duration'],
						'CATEGORY' 		=> 	$row['category'],
						
					);
					 $count=$count+1;
					
			}
			
		
			
	
?>
<br />
	<div>
		<table border="2">
			<th>ID</th>
			<th>Title</th>
			<th>Destination</th>
			<th>Duration</th>
			<th>Category</th>
			<th>Description</th>
			<th>Update</th>
			<?php for($i=0; $i<$count; $i++){ ?>
				<tr>
					<td> <?php echo $packages[$i]['ID']; ?> </td>
					<td>  <?php echo $packages[$i]['TITLE']; ?> </td>
					<td>  <?php echo $packages[$i]['DESTINATION']; ?> </td>
					<td>  <?php echo $packages[$i]['DURATION']; ?> </td>
					<td>  <?php echo $packages[$i]['CATEGORY']; ?> </td>
					<td>  <?php echo $packages[$i]['DESC']; ?> </td>
					<td>  <a href="updatepackage.php?token=<?php echo $packages[$i]['ID']; ?>" > Update </a> </td>
				</tr>
			<?php } //ending for ?> 
	
		</table>
	</div>
<?php } ?>
<?php require_once('home/common/footer.fly'); ?>
</body>
</html>
