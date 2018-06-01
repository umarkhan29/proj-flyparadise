<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/common/employeeheader.fly');//adding employee header 
require_once('home/components/employeeauthorize.fly');
?>

<?php
  $employee=$_SESSION['current_loggedin_user'];
  $today=date("Y-m-d");
  
  if($_SESSION['current_loggedin_user_role'] == 'admin')
		$query="SELECT * FROM `reminder` WHERE `time` like '".$today."%' ORDER BY `id` DESC";
  else
		$query="SELECT * FROM `reminder` WHERE (`reminderby`='".$employee."' OR `bookingassignedto` = '".$employee."') and `time` like '".$today."%' ORDER BY `id` DESC";


$reminders=mysqli_query($dbconn,$query) or die(mysqli_error($dbconn));
$count=0;
if($reminders){
		
		while($row = mysqli_fetch_assoc($reminders)){
				$reminder[] = array(
					'ID'			=>	$row['id'],
					'BOOKINGID'		=>	$row['bookingid'],
					'REMINDERBY'	=>	$row['reminderby'],
					'NOTES'			=>	$row['notes'],
					'TIME'			=>	$row['time'],
					
							
				);
			$count=	$count+1;
		}
	
	}
	else{
		echo "No reminder Found";
	}
	
?>
<br />
	<div>
		<table border="2">
			<th>Booking Id</th>
			<th>Reminder By</th>
			<th>Reminder Time</th>
			<th>Reminder</th>
			
			<?php for($i=0; $i<$count; $i++){ ?>
				<tr>
					<td> <a href='viewenquiry.php?token=<?php echo $reminder[$i]['BOOKINGID'];?>'><?php echo $reminder[$i]['BOOKINGID']; ?> </a> </td>
					<td>  <?php echo $reminder[$i]['REMINDERBY']; ?> </td>
					<td>  <?php echo $reminder[$i]['TIME']; ?> </td>
					<td>  <?php echo $reminder[$i]['NOTES']; ?> </td>
				</tr>
			<?php } //ending for ?> 
	
		</table>
	</div>
<?php require_once('home/common/footer.fly'); ?>