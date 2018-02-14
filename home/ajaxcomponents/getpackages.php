<?php
	require_once('../catalog/connect.khan');
	require_once('../catalog/session.khan');
?>

<?php

	$profitpercent=10;
	//fetching filtered packages
	 $destination=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['destination']))));
	 $stars=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['stars']))));
	 $honeymoon=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['honeymoon']))));
	 $solo=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['solo']))));
	 $ff=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['ff']))));
	 $adventure=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['adventure']))));
	 $weekend=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['weekend']))));
	 $duration=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['duration']))));
	 $travellers=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['traveller']))));
	 
	 //getting price
	 $setprice=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['price']))));
	 $setprice=explode('₹',$setprice);
	 $setprice=$setprice[1];
	 $setprice=explode(',',$setprice);
	 $setprice=$setprice[0].$setprice[1];

	 
	 $query = "SELECT * FROM `packages` WHERE `destination` like '%".$destination."%' ";
	 
	 //query formulation for stars
	 if($stars != 'undefined')
	 $query.=" AND `hotelstar` = '$stars' ";
	 
	 
	 //Start -- query formulation for catagories
	 if($honeymoon=='Yes'){
		 $query.=" AND ( `category` = 'honeymoon' ";
	 }
	 
	 if($solo=='Yes'){
	 	if($honeymoon=='Yes')
			$query.=" OR ";
		else
			$query.=" AND (";
		 $query.="  `category` = 'Solo' ";
	 }
	 
	 if($ff=='Yes'){
	 	if($honeymoon=='Yes' || $solo=='Yes')
			$query.=" OR ";
		else
			$query.=" AND (";
			
		 $query.="  `category` = 'Friends and Family' ";
	 }
	 
	  if($adventure=='Yes'){
	 	if($honeymoon=='Yes' || $solo=='Yes' || $ff=='Yes')
			$query.=" OR ";
		else
			$query.=" AND (";
			
		 $query.="  `category` = 'Adventure' ";
	 }
	 
	
	 if($weekend=='Yes'){
	 	if($honeymoon=='Yes' || $solo=='Yes' || $ff=='Yes' || $adventure=='Yes')
			$query.=" OR ";
		else
			$query.=" AND (";
			
		 $query.="  `category` = 'Weekend' ";
	 }
	 
	 
	 
	 if($honeymoon=='Yes' || $solo=='Yes' || $ff=='Yes' || $adventure=='Yes' || $weekend=='Yes')
	 	$query.=")";
	//end query formulation for catagories
	
	//query formulation for duration
	$query.=" AND `duration` like  '%$duration nights' ";
	
	
	 $query.="ORDER BY `id` DESC";
	//
	require_once('../components/getroomsforpackage.fly');
					
	//getting current date
	$date=date("F");
	if($date=="January" || $date=="February" || $date=="March"){
		$date="jan";
	
	}
	if($date=="April" || $date=="May" || $date=="June"){
		$date="april";
	
	}
	if($date=="July" || $date=="August" || $date=="September"){
		$date="july";
	
	}
	
	if($date=="October" || $date=="November" || $date=="December"){
		$date="oct";
	
	}
	
	$date3=$date."-3rooms";
	$date2=$date."-2rooms";
	
	
	 //fetching filtered results
	if($result = mysqli_query($dbconn,$query)){
		$packages;
		$count=0;
		while($row = mysqli_fetch_assoc($result)){
			$packages[] = array(
					
					'ID'			=>	$row['id'],
					'PATH' 			=> 	$row['path'],
					'TITLE' 		=> 	$row['title'],
					'DESC'	 		=> 	$row['description'],
					'DESTINATION' 	=> 	$row['destination'],
					'DURATION' 		=> 	$row['duration'],
					'HOTELSTAR' 	=> 	$row['hotelstar'],
					'FLIGHTS' 		=> 	$row['includeflights'],
					'PRICE' 		=> 	$row['price'],
					'STAYS' 		=> 	$row['stays'],
					'ITINERARYCABPRICE' => 	$row['itinerarycabprice'],
					
				);
				 $count=$count+1;
				
		}
		
	}
	else{
		echo mysqli_error($dbconn);
	}
	$totalpackages=$count;
?>
		
		
<?php
	if($count>0){
			  for($i=0;$i<$totalpackages;$i++) {  //Loading Packages 
						$price=0;  //resetting variables for next iteration
						$cabtotalprice=0;
						$noofcabs=0;
						$profit=0;
						
						
					$stays=explode('$$$$',$packages[$i]['STAYS']);
					
					$flag=0;
			  		$hoteltotalprice=0; 
					$meals=0;
					for($z=0;$z<count($stays)-2;$z++){
					//getting destination list (incase of multiple destinations of a package "seperated bty ,")
					$locationlists=$packages[$i]['DESTINATION'];
					$locationlist=explode(',',$locationlists);
					
					$hlocations="( `location` like '%".$locationlist[0]."%'";
					for($l=1;$l<count($locationlist);$l++){
						$hlocations.=" OR `location` like '%";
						$hlocations.=$locationlist[$l]."%'";
					}
					
					//formulating query for getting seperate hotelprice on basis of number of travellers and itenariy stay
					 $query = "SELECT * FROM `hotels` WHERE `stars` = ".$packages[$i]['HOTELSTAR']." AND ".$hlocations.") AND `place` = '".$stays[$z]."' ORDER BY `".$date3."` ASC LIMIT 1";
						
						if(!empty($hotelprice)) unset($hotelprice);
						if($result = mysqli_query($dbconn,$query)){
							$count=0;
							while($row = mysqli_fetch_assoc($result)){
								$hotelprice[] = array(
											
										'PRICE3'		 	=> 	$row[$date3],
										'PRICE2'		 	=> 	$row[$date2],
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
						
					}//end internal for
					
					//getting total cab price
					$cabprice=explode('$$$$',$packages[$i]['ITINERARYCABPRICE']);
					
					
					for($c=0;$c<count($cabprice)-1;$c++)
						$cabtotalprice=$cabtotalprice+$cabprice[$c];
					
					
					
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
					
					?>
					<?php 
						//setting max packagesto 7
						
						if(($price<=$setprice || $setprice==0 ) AND ($price!="Not Avaliable") AND ($i<7)) { 
					
						
						?>
						<div class="package--tailored">
							<img src="<?php echo $packages[$i]['PATH'] ?>" alt="">
							<div class="destination--info">
								<h3><?php echo $packages[$i]['TITLE']; ?></h3>
								<span class="duration"><?php echo $packages[$i]['DURATION'] ?></span><br />
								<span><?php echo $travellers; ?> persons</span>
								<div class="price"><?php  echo $price; ?>/-</div>
								<div class="inclusions">
									<img src="./assets/icons/transport/meals.svg" alt="Meals">
									<img src="./assets/icons/transport/stars.svg" alt="hotel stars">
									<img src="./assets/icons/transport/view.svg" alt="Site seeing">
									<img src="./assets/icons/transport/more.svg" alt="Complimentary from destination">
								</div>
								<a href="packages/<?php echo $packages[$i]['ID']; ?>/<?php echo $travellers; ?>" target="_blank"><button class="view--package">View this Package</button></a>
							</div>
						</div>
					<?php } ?>
	<?php }//end packages (for)
		} //ending if
	
	else{
		echo "No packages found!";
	}
	
	 ?>  