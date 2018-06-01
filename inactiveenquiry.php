<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/components/employeeauthorize.fly');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Inactive Enquiry</title>
</head>

<body>
<?php require_once('home/common/employeeheader.fly');//adding employee header  ?>


<?php
		if(isset($_GET['token']))
			$id=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['token']))));
		else
			header('location:viewenquiries');
		$query="SELECT * FROM `enquiries` WHERE `id` = '$id'";

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
							'ENQUIREDON'		=> 	$row['queriedon'],
							'ASSIGNEDTO'		=> 	$row['assignedto'],
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
			
			<?php for($i=0; $i<$count; $i++){ ?>
				<tr>
				<form action="" method="post">
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
					
				</form>
				</tr>
			<?php } //ending for ?> 
			
		</table>
		
		<?php
		//getting status via reminders
			$query="SELECT * FROM `reminder` WHERE `bookingid` = '$id' ORDER BY `id` DESC";
			$reminder;
			if($result = mysqli_query($dbconn,$query)){
					
					$count=0;
					while($row = mysqli_fetch_assoc($result)){
						$reminder[] = array(
								
								'ID'			=>	$row['id'],
								'REMINDERBY'	=>	$row['reminderby'],
								'TIME'			=>	$row['time'],
								'NOTE'			=>	$row['notes'],
								'ADDEDON'		=>	$row['addedon'],
							
							);
							$count=$count+1;
							
					}
					
				}
			else{
				echo "Error showing query status";
			}
		
		?>
		
		
		<b>Enquiry Status</b>
		
		
		<table border="2" cellpadding="3" cellspacing="3" >
			<th>ID</th>
			<th>NOTE BY</th>
			<th>ADDED ON</th>
			<th>REMINDER TIME</th>
			<th>NOTES</th>
			
			<?php for($i=0; $i<$count; $i++){ ?>
				<tr>
				
					<td> <?php echo $reminder[$i]['ID']; ?> </td>
					<td>  <?php echo $reminder[$i]['REMINDERBY']; ?> </td>
					<td>  <?php echo $reminder[$i]['ADDEDON']; ?> </td>
					<td>  <?php echo $reminder[$i]['TIME']; ?> </td>
					<td>  <?php echo $reminder[$i]['NOTE']; ?> </td>
			
				</tr>
			<?php } //ending for ?> 
			
		</table>
	<br />
	
	
	
	<br /><br />
	<?php if($_SESSION['current_loggedin_user_role'] == 'admin'){ ?>	
		<form action="viewenquiries" method="post">
			<input type="hidden" name="makeactive" value="<?php echo $enquiry[0]['ID']; ?>" />
			<input type="submit" name="makeactivebtn" value="Make Active" /> 
		</form>
	<?php } ?>
	</div>
<?php require_once('home/common/footer.fly'); ?>
</body>
</html>
