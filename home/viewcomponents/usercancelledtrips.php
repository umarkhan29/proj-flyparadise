<?php
		
include_once('../catalog/connect.khan');
$email="umar@gmail.com";
		$query="SELECT * FROM `bookings` WHERE `status`='Canceled' and email='$email'";
		
		$products=mysqli_query($dbconn,$query) or die("db error");
		$results="";
		if($products){
				$count=0;
				while($row = mysqli_fetch_assoc($products)){
						$results[] = array(
							
							'ID'			=>	$row['id'],
							'FROM'			=>	$row['from'],
							'TO'			=>	$row['to'],
							'ID'			=>	$row['id']
							
						);
					$count=	$count+1;
				}
			
			}
			else{
				echo "No results Found";
			}

			echo "<pre>";
			print_r($results);
			echo "</pre>";
?>