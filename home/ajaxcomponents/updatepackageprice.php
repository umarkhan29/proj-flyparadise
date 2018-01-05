<?php
	require_once('../catalog/connect.khan');
	require_once('../catalog/session.khan');
?>
<?php

	//price updation on basis of hotel selected
				$today=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['month']))));
				$stars=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['stay']))));
				$location=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['loc']))));
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
				
				
				
				 $query = "SELECT * FROM `hotels` WHERE `stars` = ".$stars." AND `location` = '".$location."' ORDER BY ".$today." ASC LIMIT 1";
					
					if($result = mysqli_query($dbconn,$query)){
						$count=0;
						while($row = mysqli_fetch_assoc($result)){
							$pprice[] = array(
										
									'PRICE'		 	=> 	$row[$today],
									
								);
								$count=$count+1;
								
						}
						
					}
					
					if($count>=1)
						echo ($pprice[0]['PRICE']+$sessid);
							
				

?>