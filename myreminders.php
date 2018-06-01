<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/common/employeeheader.fly');//adding employee header 
require_once('home/components/employeeauthorize.fly');
?>

<?php
  $employee=$_SESSION['current_loggedin_user'];
  $today=date("Y-m-d");
  $query="SELECT * FROM `reminder` WHERE `reminderby`='".$employee."' ORDER BY `id` DESC;";


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
			
			<th>Reminder Id</th>
			<th>Booking Id</th>
			<th>Reminder By</th>
			<th>Reminder Time</th>
			<th>Reminder</th>
			
			<?php for($i=0; $i<$count; $i++){ ?>
				<tr>
					<td>  <?php echo $reminder[$i]['ID']; ?> </td>
					<td>  <?php echo $reminder[$i]['BOOKINGID']; ?> </td>
					<td>  <?php echo $reminder[$i]['REMINDERBY']; ?> </td>
					<td>  <?php echo $reminder[$i]['TIME']; ?> </td>
					<td>  <?php echo $reminder[$i]['NOTES']; ?> </td>
				</tr>
			<?php } //ending for ?> 
	
		</table>
	</div>
<?php require_once('home/common/footer.fly'); ?>