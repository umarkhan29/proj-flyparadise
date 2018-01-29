<?php
	require_once('../catalog/connect.khan');
	require_once('../catalog/session.khan');
?>

<?php
	//fetching filtered packages
	 $destination=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['destination']))));
	 $stars=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['stars']))));
	 $honeymoon=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['honeymoon']))));
	 $solo=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['solo']))));
	 $ff=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['ff']))));
	 $duration=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['duration']))));
	 $travellers=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['traveller']))));
	 
	 if($_GET['price']>0){
		 $price=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['price']))));
		 $price=explode('₹',$price);
		 $price=$price[1];
		 $price=explode(',',$price);
		 $price=$price[0].$price[1];
	}
	 
	 $query = "SELECT * FROM `packages` WHERE `destination` = '$destination' ";
	 
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
	 
	 if($honeymoon=='Yes' || $solo=='Yes' || $ff=='Yes')
	 	$query.=")";
	//end query formulation for catagories
	
	//query formulation for duration
	$query.=" AND `duration` like  '%$duration nights' ";
	
	
	
	
	
	//query formulation for pricing
	 if($_GET['price']>0){
		 $query.= "AND `price` < '$price' ";
	 }
	
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
					
				);
				 $count=$count+1;
				
		}
		
	}
	else{
		echo mysqli_error($dbconn);
	}
?>
		
		
<?php
	if($count>0){
			 for($i=0;$i<6;$i++) {  //Loading Packages 
						//formulating query for getting seperate hotelprice on basis of number of travellers
			  		 $query = "SELECT * FROM `hotels` WHERE `stars` = ".$packages[$i]['HOTELSTAR']." AND `location` = '".$packages[$i]['DESTINATION']."' ORDER BY `".$date3."` ASC LIMIT 1";
					$hotelresult="";
					$hotelprice="";
					if($hotelresult = mysqli_query($dbconn,$query)){
						
						while($row = mysqli_fetch_assoc($hotelresult)){
							$hotelprice[] = array(
										
									'PRICE3'		 	=> 	$row[$date3],
									'PRICE2'		 	=> 	$row[$date2],
									
								);
								
						}
						
					}
						 
					 $hotelprice=($room3*$hotelprice[0]['PRICE3'])+($room2*$hotelprice[0]['PRICE2']);
					 
					
					
					?>
						<div class="package--tailored">
							<img src="<?php echo $packages[$i]['PATH'] ?>" alt="">
							<div class="destination--info">
								<h3><?php echo $packages[$i]['TITLE']; ?></h3>
								<span class="duration"><?php echo $packages[$i]['DURATION'] ?></span><br />
								<span><?php echo $travellers; ?> persons</span>
								<div class="price"><?php  echo ($packages[$i]['PRICE']*$travellers)+$hotelprice; ?>/-</div>
								<div class="inclusions">
									<img src="./assets/icons/transport/meals.svg" alt="Meals">
									<img src="./assets/icons/transport/stars.svg" alt="hotel stars">
									<img src="./assets/icons/transport/view.svg" alt="Site seeing">
									<img src="./assets/icons/transport/more.svg" alt="Complimentary from destination">
								</div>
								<a href="single--package.php?id=<?php echo $packages[$i]['ID']; ?>&travellers=<?php echo $travellers; ?>"><button class="view--package">View this Package</button></a>
							</div>
						</div>
	<?php }//end packages (for)
	
	}//end if
	else{
		echo "No packages found!";
	}
	
	 ?>  