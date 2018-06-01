<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/components/employeeauthorize.fly');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View Enquiries</title>
</head>

<body>
<?php require_once('home/common/employeeheader.fly');//adding employee header  ?>
<?php
//Deleting query
	if(isset($_POST['deleteenquiry'])){
		$id=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['delid']))));
		$query="DELETE FROM `enquiries` WHERE `id` = '$id';";
			
			if(mysqli_query($dbconn,$query)){
				echo "Enquiry Deleted";				
			} else{
				echo "Failed to delete Enquiry. Contact Administrator.";
			}
	}
?>

<?php
//Confirm query
	if(isset($_POST['confirm'])){
		$id=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['confirm']))));
		$query="UPDATE `enquiries` SET `status` = 'Confirmed' WHERE `id` = '$id';";
			
			if(mysqli_query($dbconn,$query)){
				echo "Enquiry Confirmed";				
			} else{
				echo "Failed to Confirm Enquiry. Contact Administrator.";
			}
	}
?>

<?php
//Hide query
	if(isset($_POST['hide'])){
		$id=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['hide']))));
		$query="UPDATE `enquiries` SET `status` = 'Hidden' WHERE `id` = '$id';";
			
			if(mysqli_query($dbconn,$query)){
				echo "Enquiry Hidden";				
			} else{
				echo "Failed to Hide Enquiry. Contact Administrator.";
			}
	}
?>

<?php
//Make active Enquiry
	if(isset($_POST['makeactive'])){
		$id=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['makeactive']))));
		$query="UPDATE `enquiries` SET `status` = 'Active' WHERE `id` = '$id';";
			
			if(mysqli_query($dbconn,$query)){
				echo "Enquiry is set to Active";				
			} else{
				echo "Failed to make Enquiry Active. Contact Administrator.";
			}
	}
?>


<?php
		$employee=$_SESSION['current_loggedin_user'];
		if($_SESSION['current_loggedin_user_role'] == 'admin')
			$query="SELECT * FROM `enquiries` WHERE `status` = 'Active' ORDER BY `id` DESC ";
		else
			$query="SELECT * FROM `enquiries` WHERE `status` = 'Active' AND `assignedto` = '$employee' ORDER BY `id` DESC ";

		if($result = mysqli_query($dbconn,$query)){
				$enquiry;
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$enquiry[] = array(
							
							'ID'		=>	$row['id'],
							'FROM' 		=> 	$row['from'],
							'TO' 	=> 	$row['to'],
							'PHONE' 	=> 	$row['phone'],
							'EMAIL' 	=> 	$row['email'],
							'DATE' 	=> 	$row['date'],
							'NIGHTS'		=> 	$row['noofnights'],
							'CATEGORY'		=> 	$row['category'],
							'NOTES'		=> 	$row['notes'],
							'ASSIGNEDTO'		=> 	$row['assignedto'],
							'ENQUIREDON'		=> 	$row['queriedon'],
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}
	
?>
<br />
	<div style="padding:5px;">
		<table border="2" cellpadding="3" cellspacing="3" >
			<th>ID</th>
			<th>FROM</th>
			<th>TO</th>
			<th>PHONE</th>
			<th>EMAIL</th>
			<th>DATE</th>
			<th>NIGHTS</th>
			<th>CATEGORY</th>
			<th>ENQUIRED ON</th>
			<th>ASSIGNED TO</th>
			<th>NOTES</th>
			<th>ADD NOTES</th>
			<th>ADD REMINDER</th>
			<?php for($i=0; $i<$count; $i++){ ?>
				<tr>
					<td> <?php echo $enquiry[$i]['ID']; ?> </td>
					<td>  <?php echo $enquiry[$i]['FROM']; ?> </td>
					<td>  <?php echo $enquiry[$i]['TO']; ?> </td>
					<td>  <?php echo $enquiry[$i]['PHONE']; ?> </td>
					<td>  <?php echo $enquiry[$i]['EMAIL']; ?> </td>
					<td>  <?php echo $enquiry[$i]['DATE']; ?> </td>
					<td>  <?php echo $enquiry[$i]['NIGHTS']; ?> </td>
					<td>  <?php echo $enquiry[$i]['CATEGORY']; ?> </td>
					<td>  <?php echo $enquiry[$i]['ENQUIREDON']; ?> </td>
					<td>  <?php echo $enquiry[$i]['ASSIGNEDTO']; ?> </td>
					<td>  <?php echo $enquiry[$i]['NOTES']; ?> </td>
					<td> <a href="addnotes.php?token=<?php echo $enquiry[$i]['ID']; ?>" target="_blank" > Add Notes </a>   </td>
					<td> <a href="addreminder.php?token=<?php echo $enquiry[$i]['ID']; ?>" target="_blank" > Add Reminder </a>   </td>
					<td> <a href="viewenquiry.php?token=<?php echo $enquiry[$i]['ID']; ?>" target="_blank"> View </a></td>
				</tr>
			<?php } //ending for ?> 
	
		</table>
	</div>
<?php require_once('home/common/footer.fly'); ?>
</body>
</html>
