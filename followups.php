<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
if($_SESSION['current_loggedin_user_role'] != 'admin')
	header('location:viewenquiries');
require_once('home/components/employeeauthorize.fly');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Follow Up's</title>
</head>

<body>
<?php require_once('home/common/employeeheader.fly');//adding employee header  ?>

		
		<?php
		//getting status via reminders
			$today=date("Y-m-d");
			$query="SELECT * FROM `reminder` WHERE `addedon` like '".$today."%' ORDER BY `id` DESC";
			$reminder;
			if($result = mysqli_query($dbconn,$query)){
					
					$count=0;
					while($row = mysqli_fetch_assoc($result)){
						$reminder[] = array(
								
								'ID'			=>	$row['bookingid'],
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
			<th>TRIP ID</th>
			<th>NOTE BY</th>
			<th>ADDED ON</th>
			<th>REMINDER TIME</th>
			<th>NOTE</th>
			
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
	
	</div>
<?php require_once('home/common/footer.fly'); ?>
</body>
</html>
