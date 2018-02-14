<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/components/employeeauthorize.fly');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Packages</title>
</head>

<body>
<?php require_once('home/common/employeeheader.fly');//adding employee header  ?>

<?php
//throwing success message
	  if(isset($_SESSION['resizedone'])){
		  if($_SESSION['resizedone']=="success"){
		  unset($_SESSION['resizedone']);
		  echo	"<div  style='padding:7px; border: 0px solid; height:90px; background:#F90; opacity: 0.5; width:100%; margin:10px; border-radius:5px; color:#ffffff; font-size:18px;'><p>Data Updated sucessfully ! </p>
				 </div>";
		  }
	  }
?>
<form action="" method="post">
	<input type="text" name="destination" placeholder="" />
	<input type="submit" value="Find" />
</form>

<?php
	
	if(isset($_POST['destination'])){
		$token=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['destination']))));
		$query="SELECT * FROM `destinations` WHERE (`id`='$token' or  `destination` like  '%".$token."%')";
	}
	else
	{	
		
		$query="SELECT * FROM `destinations`";
	}
		if($result = mysqli_query($dbconn,$query)){
				
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$destination[] = array(
							
							'ID'		=>	$row['id'],
							'DESTINATION' 	=> 	$row['destination'],
							'ALIAS' 	=> 	$row['alias'],
							'DESC' 		=> 	$row['desc'],
							'TAGS'		=> 	$row['tags'],
							
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}
	
?>
<br />
	<div>
		<table border="2">
			<th>ID</th>
			<th>Destination</th>
			<th>Alias</th>
			<th>Description</th>
			<th>Tag</th>
			<th>Update</th>
			<?php for($i=0; $i<$count; $i++){ ?>
				<tr>
					<td> <?php echo $destination[$i]['ID']; ?> </td>
					<td>  <?php echo $destination[$i]['DESTINATION']; ?> </td>
					<td>  <?php echo $destination[$i]['ALIAS']; ?> </td>
					<td>  <?php echo $destination[$i]['DESC']; ?> </td>
					<td>  <?php echo $destination[$i]['TAGS']; ?> </td>
					<td>  <a href="updatedestination.php?token=<?php echo $destination[$i]['ID']; ?>" > Update </a> </td>
				</tr>
			<?php } //ending for ?> 
	
		</table>
	</div>
<?php require_once('home/common/footer.fly'); ?>
</body>
</html>
