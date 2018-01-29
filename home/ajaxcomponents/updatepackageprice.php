<?php
	require_once('../catalog/connect.khan');
	require_once('../catalog/session.khan');
?>
<?php

	//price updation on basis of hotel selected
				$today=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['month']))));
				$stars=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['stay']))));
				$location=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['loc']))));
				$travellers=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['travellers']))));
			    $sessid=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['sessid'])))); //sessid is basic package price
				
				if($today=="January" || $today=="February" || $today=="March"){
					$today="jan";
				
				}
				if($today=="April" || $today=="May" || $today=="June"){
					$today="april";
				
				}
				if($today=="July" || $today=="August" || $today=="September"){
					$today="july";
				
				}
				
				if($today=="October" || $today=="November" || $today=="December"){
					$today="oct";
				
				}
				$today3=$today."-3rooms";
				$today2=$today."-2rooms";
				
				 $query = "SELECT * FROM `hotels` WHERE `stars` = ".$stars." AND `location` = '".$location."' ORDER BY `".$today3."` ASC LIMIT 1";
					
					if($result = mysqli_query($dbconn,$query)){
						$count=0;
						while($row = mysqli_fetch_assoc($result)){
							$pprice[] = array(
										
									'PRICE2'		 	=> 	$row[$today2],
									'PRICE3'		 	=> 	$row[$today3],
									
								);
								$count=$count+1;
								
						}
						
					}
					
					require_once('../components/getroomsforpackage.fly');
					
					$pprice=($room3*$pprice[0]['PRICE3'])+($room2*$pprice[0]['PRICE2']); //getting hotel final rates
					
					$packageprice=$travellers*$sessid; //final package price
					
					$fpprice = $pprice+$packageprice;	 //final package price
					
					if($count>=1)
						echo $fpprice;
						
				

?>