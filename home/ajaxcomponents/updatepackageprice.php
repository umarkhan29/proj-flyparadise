<?php
	require_once('../catalog/connect.khan');
	require_once('../catalog/session.khan');
?>
<?php

	//price updation on basis of hotel selected
				$profitpercent=10;
				$today=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['month']))));
				$stars=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['stay']))));
			    $location=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['loc']))));
				$travellers=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['travellers']))));
			   
				$stays=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['stays']))));
				$stays=explode(',',$stays);
				
				$cabprices=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['cabprices']))));
				$cabprices=explode('$$$$',$cabprices);
			
				
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
				
				require_once('../components/getroomsforpackage.fly');
				$flag=0;
				$hoteltotalprice=0;
				$meals=0; 
				
				for($i=0;$i<count($stays)-1;$i++){
					//getting destination list (incase of multiple destinations of a package "seperated bty ,")
					$locationlists=$location;
					$locationlist=explode(',',$locationlists);
					
					$hlocations="( `location` like '%".$locationlist[0]."%'";
					for($l=1;$l<count($locationlist);$l++){
						$hlocations.=" OR `location` like '%";
						$hlocations.=$locationlist[$l]."%'";
					}
					
					//formulating query for getting seperate hotelprice on basis of number of travellers and itenariy stay
					 $query = "SELECT * FROM `hotels` WHERE `stars` = ".$stars." AND ".$hlocations.") AND `place` = '".$stays[$i]."' ORDER BY `".$today3."` ASC LIMIT 1";
					 
						if(!empty($hotelprice)) unset($hotelprice);
						if($result = mysqli_query($dbconn,$query)){
							$count=0;
							while($row = mysqli_fetch_assoc($result)){
								$hotelprice[] = array(
											
										'PRICE3'		 	=> 	$row[$today3],
										'PRICE2'		 	=> 	$row[$today2],
										'MEALS'			 	=> 	$row['meals'],
										
									);
									$count=$count+1;
									
							}
							
						} 
					
					if($count==0)
						$flag=1;
						
						if($flag==0){
							$hoteltotalprice+=($room3*$hotelprice[0]['PRICE3'])+($room2*$hotelprice[0]['PRICE2']);//getting hotel final rates
							$meals+=$hotelprice[0]['MEALS']*$travellers;
						}
						
						
						}//end for
						
						
					//cab prices
					$cabtotalprice=0;
					for($c=0;$c<count($cabprices)-1;$c++)
						$cabtotalprice=$cabtotalprice+$cabprices[$c];
					
					
					
					$noofcabs=ceil($travellers/4);
				    $cabtotalprice=$cabtotalprice*$noofcabs;
					
					if($flag==0){
						 $price = $hoteltotalprice+$cabtotalprice+$meals;
						//adding profit
						$profit=($price*$profitpercent)/100;
						$price=$price+$profit;
						
					}	
					else
						$price = "Not Avaliable";
					
					
					//displaying final price
					
					echo $price;

?>