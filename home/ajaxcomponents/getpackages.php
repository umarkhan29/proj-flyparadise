<?php
	require_once('../../config.khan');
	require_once('../catalog/connect.khan');
	require_once('../catalog/session.khan');
?>

<?php
	$maxpackages=0;
	$profitpercent=PROFIT;
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
	
	
	 $query.="ORDER BY `id` ASC";
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
		if(!empty($packages)) $packages="";
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
					'CAB' 			=> 	$row['localcab'],
					'MEALS' 		=> 	$row['meals'],
					'SITESEEING' 	=> 	$row['siteseeing'],
					'STAY' 			=> 	$row['stay'],
					'ADDON' 		=> 	$row['addon'],
					'CAMPS' 		=> 	$row['camps'],
					'HOUSEBOATS' 	=> 	$row['houseboats'],
					
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
						$hlocations.=trim($locationlist[$l])."%'";
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
					//echo "Hotel: ".$hoteltotalprice."    Meals: ".$meals."   CAB :".$cabtotalprice;
					if($flag==0){
						$price = $hoteltotalprice+$cabtotalprice+$meals;
						//adding profit
						$profit=($price*$profitpercent)/100;
						$price=$price+$profit;
					}	
					else
						$price = "Not Avaliable";
					
					
					//converting spaces to hyphen for url
					$packagetitle=$packages[$i]['TITLE'];
					$packagetitle=preg_replace("(\s)", "-", $packagetitle);
					?> 
					<?php 
						
						if(($price<=$setprice || $setprice==0 ) AND  ($maxpackages<7)) { 
							$maxpackages=$maxpackages+1;
						
						?>
				<div class="package--tailored">
                    <img src="<?php echo $packages[$i]['PATH']; ?>" alt="">
                    <div class="destination--info">
                        <div>
                            <h3><?php echo $packages[$i]['TITLE']; ?></h3>
                            <span class="duration"><?php echo $packages[$i]['DURATION']; ?></span>
							<div>
								<div class="price" id="pprice<?php echo $i; ?>"><?php echo $price; ?>/-</div>
								<div class="perse">(<?php if($travellers==1)echo "Per"; ?> <span><?php if($travellers>1)echo $travellers; ?></span> person<?php if($travellers>1) echo "s"; ?>)</div>
							</div>
                        </div>
                        <div class="inclusions border">
                   <?php 
                       
				   //Showing Flight thumbnails
				   		if($packages[$i]['FLIGHTS']=='Yes') 
				   			echo '<div> <img src="assets/icons/transport/air.svg" alt="Air Transfer" label="Air Transfer"> <span>Tickets</span></div>';
				   		else
							echo '<div class="package--ex"><img src="assets/icons/transport/air.svg" alt="Flights not included" label="Flights not included" > <span>Tickets</span></div>';
							
						
						//Showing Meals thumbnails
				   		if($packages[$i]['MEALS']=='Yes') 
				   			
							echo '<div> <img src="assets/icons/transport/meals.svg" alt="Meals" label="Meals"> <span>Meals</span></div>';
				   		else
							echo '<div class="package--ex"><img src="assets/icons/transport/meals.svg" alt="Meals not included" label="Meals not included" ><span>Meals</span></div>';
						
						
						//Showing Cab thumbnails
				   		if($packages[$i]['CAB']=='Yes') 
				   			echo '<div><img src="assets/icons/transport/transfer.svg" alt="Cab"><span>Cab</span></div>';
				   		else
							echo '<div class="package--ex"><img src="assets/icons/transport/transfer.svg" alt="Cab not included" label="Cab not included"><span>Cab</span></div>';
						
						
						//Showing Stay thumbnails
				   		if($packages[$i]['STAY']=='Yes') 
				   			echo '<div><img src="assets/icons/transport/stars.svg" alt="hotel stars"><span>Stay</span></div>';
				   		else
							echo '<div class="package--ex"><img src="assets/icons/transport/stars.svg" alt="Stay not included" label="Stay not included" ><span>Stay</span></div>';
						
						//Showing SITESEEING thumbnails
				   		if($packages[$i]['SITESEEING']=='Yes') 
				   			echo '<div ><img src="assets/icons/transport/view.svg" alt="Site seeing"><span>Siteseeing</span></div>';
				   		else
							echo '<div class="package--ex"><img src="assets/icons/transport/view.svg" alt="Stay not included" label="Siteseeing not included" ><span>Siteseeing</span></div>';
						
						//Showing Campimg thumbnails
				   		if($packages[$i]['CAMPS']=='Yes') 
				   			echo '<div><img src="assets/icons/transport/tent.svg" alt="Camping" ><span>Camping</span></div>';
				   		else
							echo '<div class="package--ex"><img src="assets/icons/transport/tent.svg" alt="Camping" label="Campingn" ><span>Camping</span></div>';
							
					
					//Showing houseboat thumbnails
				   		if($packages[$i]['HOUSEBOATS']=='Yes') 
				   			echo '<div><img src="assets/icons/transport/hb.svg" alt="Houseboat" ><span>Houseboat</span></div>';
				   		else
							echo '<div class="package--ex"><img src="assets/icons/transport/hb.svg" alt="Houseboat" label="Houseboat" ><span>Houseboat</span></div>';
						
						
						
						//Showing Addon thumbnails
				   		if($packages[$i]['ADDON']=='Yes') 
				   			echo '<div><img src="assets/icons/transport/more.svg" alt="Complimentary from destination" ><span>Compliment</span></div>';
				   		else
							echo '<div class="package--ex"><img src="assets/icons/transport/more.svg" alt="Complimentary from destination" label="Compliment" ><span>Compliment</span></div>';
						
				 
				    ?>
                        </div>
                       <form class="list hotel radio no-border">
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice<?php echo $i; ?>',<?php echo $i; ?>);" class="radio"  name="foo<?php echo $i; ?>" <?php if($packages[$i]['HOTELSTAR']==2) echo "checked"; ?>>
                                                  Budget Stay
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice<?php echo $i; ?>',<?php echo $i; ?>);" class="radio" name="foo<?php echo $i; ?>" <?php if($packages[$i]['HOTELSTAR']==3) echo "checked"; ?>>
                                                  3 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice<?php echo $i; ?>',<?php echo $i; ?>);" class="radio" name="foo<?php echo $i; ?>" <?php if($packages[$i]['HOTELSTAR']==4) echo "checked"; ?>>
                                                  4 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio"  onChange="stay('pprice<?php echo $i; ?>',<?php echo $i; ?>);"  class="radio" name="foo<?php echo $i; ?>" <?php if($packages[$i]['HOTELSTAR']==5) echo "checked"; ?>>
                                                  5 star
                                              </label>
                            </li>
                        </form>
						<input type="hidden" id="destinations<?php echo $i; ?>" value="<?php echo $packages[$i]['DESTINATION']; ?>" />
						<input type="hidden" id="stays<?php echo $i; ?>" value="<?php echo $packages[$i]['STAYS']; ?>" />
						<input type="hidden" id="cp<?php echo $i; ?>" value="<?php echo $packages[$i]['ITINERARYCABPRICE']; ?>" />
                        <div class="flex">
                          <a class="customise" href="#" onclick="formopen();">Customise</a>
                            <a href="packages/<?php echo $packagetitle; ?>/<?php echo $travellers; ?>" target="_blank"><button class="view--package">View this Package</button></a>
                        </div>
                    </div>
				</div>
					<?php } ?>
	<?php }//end packages (for)
	
		} //ending if
	
	else{
		echo "No packages found!";
	}
	
	 ?>  
	 
