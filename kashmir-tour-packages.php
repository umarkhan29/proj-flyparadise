<?php
	require_once('config.khan');
	require_once('home/catalog/connect.khan');
	require_once('home/catalog/session.khan');
	error_reporting(0);
?>
<?php
//Fetching destination

	$dest="Kashmir";
		
$profitpercent=PROFIT;


$query = "SELECT * FROM `destinations` WHERE `destination` like '%".$dest."%' ";

$destination=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['states']))));

			if($result = mysqli_query($dbconn,$query)){
				$destinations;
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$destinations[] = array(
							
							'ID'			=>	$row['id'],
							'PATH' 			=> 	$row['img1'],
							'DESTINATION' 	=> 	$row['destination'],
							'DESC'	 		=> 	$row['desc'],
							'LINKS' 		=> 	$row['links'],
							'WORHWATCHING' 	=> 	$row['worthwatching'],
							'GETAWAYS' 		=> 	$row['getaways'],
							'HEADING2' 		=> 	$row['heading2'],
							'DESC2' 		=> 	$row['desc2'],
							'PATH2' 		=> 	$row['path2'],
							'HISTORY' 		=> 	$row['history'],
							'CULTURE' 		=> 	$row['culture'],
							'FOOD' 			=> 	$row['food'],
							'ALIAS' 		=> 	$row['alias'],
							
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}
 //setting seesion destination for form
 $_SESSION['formdest']=$destinations[0]['DESTINATION'];
			if(!$count>0)
				header('location:index');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title><?php echo $destinations[0]['DESTINATION']; ?> | Fly Paradise</title>
   <link rel="shortcut icon" type="image/png" sizes="32x32" href="assets/heros/favicon-flyparadise.png" />
	<meta name="description" content="<?php echo $destinations[0]['DESC']; ?>">
    <meta name="keywords" content="<?php echo $destinations[0]['DESTINATION']; ?>,kashmir houseboat, sightseeing of kashmir, kashmir tour travels, sight seeing of kashmir, places to visit in srinagar kashmir, best travel packages for kashmir, tourist spots in srinagar kashmir, kashmir sightseeing tours, places to visit in kashmir and srinagar, kashmir heaven on earth, jammu and kashmir travel and tourism, 4 days 3 nights trip, places to visit in srinagar jammu and kashmir, dal lake kashmir, Fly Paradisetrips, tours, holidays, holiday packages, cheap packages, budget packages, tour packages, customize, customise, travel, wunderlust, solo, holidays, vacation, best travel site, best tour operator, trekking, trek, kashmir tour, kashmir tours, kashmir travel, kashmir travels, kashmir trip, kashmir trips, kashmir  trip packages, Leh packages, kashmir Holiday, kashmir holidays, kashmir holiday  packages, kashmir  group tours, kashmir  group tours packages, kashmir  tour plan, kashmir packages, kashmir tour  packages, Best kashmir tour pacakages, Best kashmir  travel packages, kashmir honeymoon  packages, Cheapest kashmir package, Cheapest kashmir tour package, kashmir package cost, Cheapest kashmir package, Cheapest tour package cost for kashmir, kashmir budget tour package, kashmir travel agents, Local travel agent in kashmir, How to book kashmir tour package, Kashmir kashmir package, Cheapest Kashmir kashmir package, kashmir trekking package, kashmir adventure package, kashmir tracking, kashmir tour package, kashmir travel package, kashmir tour package price, trips, tours, holidays, holiday packages, cheap packages, budget packages, tour packages, customize, customise, travel, wunderlust, solo, holidays, vacation, best travel site, best tour operator, trekking, trek">
    <link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    <script async src="https://use.fontawesome.com/441c105168.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script  src="libraries/owl.carousel.min.js"></script>
    <script  src="libraries/js/main.js"></script>
	<script  src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCotB6BSKESLUC2dNLnAT76EporwJBXMN4&v=3.exp&libraries=places"></script>
	<script  src="libraries/js/select2dec.js"></script>
	<script async id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/0a36a9eded6bcb08c52ae527b/d0a0689c99e0088008a7127df.js");</script>
    <!--[if IE]>
            <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
        <![endif]-->
	
</head>

<body class="destination">
    <?php require_once('home/components/secondaryheader.fly');//adding secondary header ?>
	
	

    <div id="main" class="destination--hero">
        <div class="left--destination">
            <span class="location"></span>
            <h2><?php echo $destinations[0]['DESTINATION']; ?> Packages</h2>
            <span><?php echo $destinations[0]['DESC']; ?></span>
            <div class="map">
               <a href="#distancetimeblock"> <img class="map" src="./assets/icons/transport/placeholder.svg" alt="" ></a>
            </div>
            <div class="info">
              <ul class="transportation">
			  	<?php
					//getting seperate links
					$links=explode('$$$$',$destinations[0]['LINKS']);
				?>
                    <span>Links to destination:</span>
					<?php for($i=0;$i<count($links); $i++) { ?>
						<?php  if($links[$i]=='Air')echo '<img class="air" src="./assets/icons/transport/airplane.svg" alt="Air Transport">'; ?>
						<?php  if($links[$i]=='Water')echo '<img class="water" src="./assets/icons/transport/yacht.svg" alt="Water Transport">'; ?>
						<?php  if($links[$i]=='Road')echo ' <img class="road" src="./assets/icons/transport/bus.svg" alt="Bus Transport">'; ?>
						<?php  if($links[$i]=='Rail')echo '<img class="rail" src="./assets/icons/transport/train.svg" alt="Train Transport">'; ?> 
						
					<?php } ?>
                  
              </ul>
                <ul>
				<?php
				//getting seperate worthwatching
				$worthwatching=explode('$$$$',$destinations[0]['WORHWATCHING']);
				
				 ?>
                    <span>Worth Watching:</span>
					<?php for($i=0;$i<count($worthwatching); $i++) { ?>
						<li><?php echo $worthwatching[$i]; ?></li> 
						
					<?php } ?> 
			    </ul>
				
                <ul>
				<?php
				//getting seperate getaways
				$getaways=explode('$$$$',$destinations[0]['GETAWAYS']);
				
				 ?>
                    <span>Getaways:</span>
                    <?php for($i=0;$i<count($getaways); $i++) { ?>
						<li><?php echo $getaways[$i]; ?></li> 
						
					<?php } ?> 
                </ul>
            </div>
        </div>
        <div class="right--destination">
            <img src="<?php echo $destinations[0]['PATH']; ?>" alt="">
			 <div class="temprature">
			 <?php
			 //fetching temprature
				$jsonurl = "http://api.openweathermap.org/data/2.5/weather?q=".$destinations[0]['ALIAS']."&appid=536a874ed7c30387414c700ed1990ce5";
				$json = file_get_contents($jsonurl);
				$celcius="";
				if($json!=""){
					$weather = json_decode($json);
					$kelvin = $weather->main->temp;
					$celcius = $kelvin - 273.15; //Converting Kelvin to celcius
					$celcius=$celcius/2; //improving accuracy on data from open weather api
				
			 ?>
                <img src="./assets/icons/transport/temperature.svg" alt="">
                <span><?php  echo substr($celcius, 0, 5);  ?>  &deg;</span>
				
			<?php } //ending if-temprature ?>
            </div>
            <div class="overlay">
                <span class="weather">

                </span>

            </div>
        </div>
    </div>
   
   <div class="destination--info">
        <div class="dest">
            <h3><?php echo $destinations[0]['HEADING2']; ?></h3>
            <p><?php echo $destinations[0]['DESC2']; ?></p>
            <div class="destination-information">
                <img src="<?php echo $destinations[0]['PATH2']; ?>" alt="">
                <div class="accordion">
                    <div class="border">
                        <h4>History of <span><?php echo $destinations[0]['DESTINATION']; ?></span> </h4>
                            <p class="remove"><?php echo $destinations[0]['HISTORY']; ?></p>
                    </div>
                    <div class="border">
                        <h4>Culture in <span><?php echo $destinations[0]['DESTINATION']; ?></span> </h4>
                        <p class="remove"><?php echo $destinations[0]['CULTURE']; ?></p>
                    </div>
                    <div class="border">
                        <h4>Food in <span><?php echo $destinations[0]['DESTINATION']; ?></span> </h4>
                        <p class="remove"><?php echo $destinations[0]['FOOD']; ?></p>
                    </div>
              </div>
          </div>
     </div>
</div>
	
	<div class="distance--block" id="distancetimeblock">
		 <?php //require_once('map/map.php'); //for distance time cloud block ?>
		 <!--Loading Distance time block -->	
	</div>
 
	
	
	
	
          <div class="destination--packages">
            <div class="sidebar">
                <form class="day--counter" onClick="showpackages('cpackages');" >
                    <span class="hsidebar">Duration (in nights)</span>
                    <input id="counter-no" type="number" min="1" max="30" value="3" />
                </form>
				
				<form class="day--counter" onClick="showpackages('cpackages');" >
                    <span class="hsidebar">No of travellers</span>
                    <input id="traveller-no" type="number" min="1" max="30" value="2" />
                </form>
				
				
                <div >
                    <span class="hsidebar">Categories</span>
                    <label class="control control--checkbox" onClick="showpackages('cpackages');">Honeymoon
                        <input type="checkbox"  name="Honeymoon" checked value="Honeymoon"/>
                        <div class="control__indicator"></div>
                    </label>
                    <label class="control control--checkbox" onClick="showpackages('cpackages');">Solo trip
                        <input type="checkbox" name="Solo" value="Solo"/>
                        <div class="control__indicator"></div>
                    </label>
                    <label class="control control--checkbox" onClick="showpackages('cpackages');">Family and Friends
                        <input type="checkbox" name="Family and Friends" checked value="Family and Friends"/>
                        <div class="control__indicator"></div>
                    </label>
					<label class="control control--checkbox" onClick="showpackages('cpackages');">Adventure
                        <input type="checkbox" name="Adventure" value="Adventure"/>
                        <div class="control__indicator"></div>
                    </label>
					
					<?php if($destinations[0]['DESTINATION'] != 'Ladakh'){ //disabling for ladakh ?>
					<label class="control control--checkbox" onClick="showpackages('cpackages');">Weekend
                        <input id="Weekend" type="checkbox" name="Weekend" value="Weekend"/>
                        <div class="control__indicator"></div>
                    </label>
					<?php } //ending if ?>
                </div>
                <!-- RATING - Form -->
                <form class="remove rating-form" action="#" method="post" name="rating-movie">
                    <span class="hsidebar">Stay star rating</span>
                    <fieldset class="form-group">
                        <legend class="form-legend">Rating:</legend>
                        <div class="form-item" onClick="showpackages('cpackages');">
                            <input id="rating-5" name="rating" type="radio" value="5" />
                            <label for="rating-5" data-value="5">
                                <span class="rating-star">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star"></i>
                                </span>
                                <span class="ir">5</span>
                            </label>
                            <input id="rating-4" name="rating" type="radio" value="4" />
                            <label for="rating-4" data-value="4">
                                <span class="rating-star">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star"></i>
                                </span>
                                <span class="ir">4</span>
                            </label>
                            <input id="rating-3" name="rating" type="radio" value="3" />
                            <label for="rating-3" data-value="3">
                                <span class="rating-star">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star"></i>
                                </span>
                                <span class="ir">3</span>
                            </label>
                            <input id="rating-2" name="rating" type="radio" value="2" />
                            <label for="rating-2" data-value="2">
                                <span class="rating-star">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star"></i>
                                </span>
                                <span class="ir">2</span>
                            </label>
                            <input id="rating-1" name="rating" type="radio" value="1" />
                            <label for="rating-1" data-value="1">
                                <span class="rating-star">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star"></i>
                                </span>
                                <span class="ir">1</span>
                            </label>
                            <div class="form-action">
                                <input class="btn-reset" type="reset" value="Reset" onClick="showpackages('cpackages');"/>
                            </div>
                            <div class="form-output">
                                ? / 5
                            </div>
                        </div>
                    </fieldset>
                </form>
				<section id="content" class="price--slider">
                    <span class="hsidebar">What is your budget?</span>
                    <div class="cube">

                        <div id="slider-range-min" onClick="showpackages('cpackages');"></div>
                    </div>
                    <input type="text" id="amount" readonly="" onClick="showpackages('cpackages');"/>
                </section>
            </div>
	
	
	<?php
	//getting hotel price
				if(isset($_GET['noofpeople']))
				 	$travellers=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['noofpeople']))));
				 else
				 	$travellers=2;
					
					
					require_once('home/components/getroomsforpackage.fly');
					
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
					
					
					
					 
					 
					 
					 
					 
	//fetching initial packages (on page load)
	 $destination= $destinations[0]['DESTINATION'];
	 $query = "SELECT * FROM `packages` WHERE `destination` like '%".$destination."%' AND (`category` = 'Honeymoon' OR `category` = 'Friends and Family') AND `duration` like  '%3 nights'  ORDER BY `duration` ASC LIMIT 7";
			if($result = mysqli_query($dbconn,$query)){
				
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
		
		
            <div class="main--content">
				<div id="cpackages">
					<?php for($i=0;$i<$totalpackages;$i++) {  //Loading Packages 
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
					for($l=1;$l<count($locationlist)+1;$l++){
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
				//	echo "Hotel: ".$hoteltotalprice."    Meals: ".$meals."   CAB :".$cabtotalprice;
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
                            <a class="customise" href="#">Customise</a>
                            <a href="packages/<?php echo $packagetitle; ?>/<?php echo $travellers; ?>" target="_blank"><button class="view--package">View this Package</button></a>
                        </div>
                    </div>
				</div>
					<?php } //end outer for ?>  
				</div>
            </div>
        </div>
    </div>

	</div>
<?php
	require_once('home/common/footer.fly');
	
?>
<script>
	//form popup after 9 sec
	$(document).ready(function() {
	  setTimeout(function() {
		
		$('.pop-up').toggleClass('remove');
	
	  }, 9000);
	});

</script>
</body>
<?php include_once("home/ajaxcomponents/pullpackages.php"); ?>
<?php include_once("home/ajaxcomponents/updatestay.php"); ?>

</html>