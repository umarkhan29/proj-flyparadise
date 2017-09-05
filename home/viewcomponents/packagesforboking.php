<?php


include_once('../catalog/connect.khan');
	$tripid=56; //get from previous page
		$query="SELECT * FROM `custompackages` WHERE `tripid` = $tripid";
		
		$products=mysqli_query($dbconn,$query) or die("db error");
		$results="";
		if($products){
				$count=0;
				while($row = mysqli_fetch_assoc($products)){
						$results[] = array(
							
							'ID'			=>	$row['id'],
							
							
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