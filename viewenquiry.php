<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/components/employeeauthorize.fly');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View Enquiry</title>
</head>

<body>
<?php require_once('home/common/employeeheader.fly');//adding employee header  ?>
<?php
//updating employee query assignmet
	if(isset($_POST['update'])){
		$id=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['qid']))));
		$assignedto=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['empassign']))));
		
		$query="UPDATE `enquiries` SET `assignedto` = '$assignedto' WHERE `id` = '$id';";	
		if($result = mysqli_query($dbconn,$query)){
			echo "Updated";
		}else{
			echo "Something went wrong";
		}
	
	}


?>

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
							'NOTES'		=> 	$row['notes'],
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

<?php
//getting employee list
$query="SELECT * FROM `users` WHERE `role` = 'employee'";

		if($result = mysqli_query($dbconn,$query)){
				$emp;
				$empcount=0;
				while($row = mysqli_fetch_assoc($result)){
					$emp[] = array(
							
							'NAME'		=>	$row['name'],
						
						);
						 $empcount=$empcount+1;
						
				}
				
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
			<?php if($_SESSION['current_loggedin_user_role'] == 'admin'){ ?>
			
			<th>ASSIGN TO</th>
			<th>NOTES</th>
			<?php } ?>
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
					<?php if($_SESSION['current_loggedin_user_role'] == 'admin'){ ?>
					<td>  
						<select name="empassign">
							<?php for($j=0; $j<$empcount; $j++){ ?>
								<option><?php echo $emp[$j]['NAME']; ?></option>
							<?php } ?>
						</select>
					
					</td>
					<td>  <?php echo $enquiry[$i]['NOTES']; ?> </td>
					<input type="hidden" name="qid" value="<?php echo $enquiry[$i]['ID']; ?>" />
					<td> <input type="submit" name="update" value="Update" /> </td>
					<?php } ?>
				</form>
				</tr>
			<?php } //ending for ?> 
			
		</table>
		
		
		<?php
		//getting  notes
			$query="SELECT * FROM `notes` WHERE `bookingid` = '$id' ORDER BY `id` DESC";
			$notes;
			if($result = mysqli_query($dbconn,$query)){
					
					$count=0;
					while($row = mysqli_fetch_assoc($result)){
						$notes[] = array(
								'ADDEDBY'		=>	$row['addedby'],
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
		
		
		<b>Enquiry Status (Notes)</b>
		
		
		<table border="2" cellpadding="3" cellspacing="3" >
			<th>S.No</th>
			<th>ADDED ON</th>
			<th>ADDED BY</th>
			<th>NOTES</th>
			
			<?php for($i=0; $i<$count; $i++){ $sno=$i+1; ?>
				<tr>
				
					<td> <?php echo $sno; ?> </td>
					<td>  <?php echo $notes[$i]['ADDEDON']; ?> </td>
					<td>  <?php echo $notes[$i]['ADDEDBY']; ?> </td>
					<td>  <?php echo $notes[$i]['NOTE']; ?> </td>
			
				</tr>
			<?php } //ending for ?> 
			
		</table>
	<br />
	
	
		<?php
		//getting  reminders
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
		
		
		<b>Reminders</b>
		
		
		<table border="2" cellpadding="3" cellspacing="3" >
			<th>S.No</th>
			<th>NOTE BY</th>
			<th>ADDED ON</th>
			<th>REMINDER TIME</th>
			<th>NOTES</th>
			
			<?php for($i=0; $i<$count; $i++){  $sno=$i+1;  ?>
				<tr>
				
					<td> <?php echo $sno; ?> </td>
					<td>  <?php echo $reminder[$i]['REMINDERBY']; ?> </td>
					<td>  <?php echo $reminder[$i]['ADDEDON']; ?> </td>
					<td>  <?php echo $reminder[$i]['TIME']; ?> </td>
					<td>  <?php echo $reminder[$i]['NOTE']; ?> </td>
			
				</tr>
			<?php } //ending for ?> 
			
		</table>
	<br />
	
	
	
	
	
	<a href="addnotes.php?token=<?php echo $enquiry[0]['ID']; ?>" >Add Notes </a>	
	<br /><br />
	<a href="addreminder.php?token=<?php echo $enquiry[0]['ID']; ?>" >Add Reminder </a>	
	<br /><br />
	<div style="width:10%;">
		<div style="float:left;" >
			<form action="viewenquiries" method="post">
					<input type="hidden" name="confirm" value="<?php echo $enquiry[0]['ID']; ?>" />
					<input type="submit" name="confirmbtn" value="Confirm" /> 
			</form>
		</div>
		<div style="float:right;">
			<form action="viewenquiries" method="post">
					<input type="hidden" name="hide" value="<?php echo $enquiry[0]['ID']; ?>" />
					<input type="submit" name="hidebtn" value="Hide" /> 
			</form>
		</div>
	</div>
	
	
	<br /><br />
	<?php if($_SESSION['current_loggedin_user_role'] == 'admin'){ ?>	
		<form action="viewenquiries" method="post">
			<input type="hidden" name="delid" value="<?php echo $enquiry[0]['ID']; ?>" />
			<input type="submit" name="deleteenquiry" value="Delete" /> 
		</form>
	<?php } ?>
	</div>
<?php require_once('home/common/footer.fly'); ?>
</body>
</html>
