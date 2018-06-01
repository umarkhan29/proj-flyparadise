<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/components/employeeauthorize.fly');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Confirmed Enquiries</title>
</head>

<body>
<?php require_once('home/common/employeeheader.fly');//adding employee header  ?>

	<?php
	
		if($_SESSION['current_loggedin_user_role'] == 'admin')
			$query="SELECT * FROM `enquiries` WHERE `status` = 'Confirmed' ORDER BY `id` DESC ";
		else
			$query="SELECT * FROM `enquiries` WHERE `status` = 'Confirmed' AND `assignedto` = '$employee' ORDER BY `id` DESC ";

	
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
	Confirmed Enquiries:
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
					
					<td> <a href="inactiveenquiry.php?token=<?php echo $enquiry[$i]['ID']; ?>" target="_blank"> View History </a></td>
				</tr>
			<?php } //ending for ?> 
	
		</table>
	</div>
<?php require_once('home/common/footer.fly'); ?>
</body>
</html>
