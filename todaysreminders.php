<?php

include_once('home/catalog/connect.khan');
 $empid=67; //replace by empid
 $today=date("Y-m-d");
 $query="SELECT * FROM `reminder` WHERE `empid`=".$empid." and `time`like '".$today."%'";

$products=mysqli_query($dbconn,$query) or die(mysqli_error($dbconn));
$count=0;
$results="";
if($products){
		
		while($row = mysqli_fetch_assoc($products)){
				$results[] = array(
					'ID'			=>	$row['id'],
					'BOOKINGID'		=>	$row['bookingid'],
					'NOTES'			=>	$row['notes'],
					'TIME'			=>	$row['time']
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

