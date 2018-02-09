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
	
		
		$query="SELECT * FROM `enquiries` ";

		if($result = mysqli_query($dbconn,$query)){
				$blog;
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$blog[] = array(
							
							'ID'		=>	$row['id'],
							'FROM' 		=> 	$row['from'],
							'TO' 	=> 	$row['to'],
							'PHONE' 	=> 	$row['phone'],
							'EMAIL' 	=> 	$row['email'],
							'DATE' 	=> 	$row['date'],
							'NIGHTS'		=> 	$row['noofnights'],
							'CATEGORY'		=> 	$row['category'],
							'NOTES'		=> 	$row['notes'],
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
			<th>NOTES</th>
			<?php for($i=0; $i<$count; $i++){ ?>
				<tr>
					<td> <?php echo $blog[$i]['ID']; ?> </td>
					<td>  <?php echo $blog[$i]['FROM']; ?> </td>
					<td>  <?php echo $blog[$i]['TO']; ?> </td>
					<td>  <?php echo $blog[$i]['PHONE']; ?> </td>
					<td>  <?php echo $blog[$i]['EMAIL']; ?> </td>
					<td>  <?php echo $blog[$i]['DATE']; ?> </td>
					<td>  <?php echo $blog[$i]['NIGHTS']; ?> </td>
					<td>  <?php echo $blog[$i]['CATEGORY']; ?> </td>
					<td>  <?php echo $blog[$i]['NOTES']; ?> </td>
					<td>  Update Notes</td>
				</tr>
			<?php } //ending for ?> 
	
		</table>
	</div>
<?php require_once('home/common/footer.fly'); ?>
</body>
</html>
