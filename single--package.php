<?php
	require_once('config.khan');
	include_once('home/catalog/connect.khan');
	include_once('home/catalog/session.khan');
	include_once('home/components/int2txt.fly');
	if(isset($_GET['travellers']))
		$baseurl="../../";
	else
		$baseurl="../";
?>
<?php
//Fetching single package
 $title=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['id']))));
 $title=preg_replace("(-)", " ", $title);//replacing - with space
 $profitpercent=PROFIT;
 $query = "SELECT * FROM `packages` WHERE `title` = '$title';  ";
			if($result = mysqli_query($dbconn,$query)){
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$package[] = array(
							
							'ID'			=>	$row['id'],
							'TITLE' 		=> 	$row['title'],
							'DESTINATION' 	=> 	$row['destination'],
							'DURATION' 		=> 	$row['duration'],
							'CATEGORY' 		=> 	$row['category'],
							'HOTELSTAR' 	=> 	$row['hotelstar'],
							'DESCRIPTION' 	=> 	$row['description'],
							'FLIGHTS' 		=> 	$row['includeflights'],
							'PATH' 			=> 	$row['path'],
							'PATH2' 		=> 	$row['path2'],
							'PATH3' 		=> 	$row['path3'],
							'CAB' 			=> 	$row['localcab'],
							'MEALS' 		=> 	$row['meals'],
							'SITESEEING' 	=> 	$row['siteseeing'],
							'STAY' 			=> 	$row['stay'],
							'ADDON' 		=> 	$row['addon'],
							'CAMPS' 		=> 	$row['camps'],
							'HOUSEBOATS' 	=> 	$row['houseboats'],
							'ITINERARY' 	=> 	$row['itinerary'],
							'INCLUSIONS'	=> 	$row['inclusions'],
							'EXCLUSIONS' 	=> 	$row['exclusions'],
							'STAYS'		 	=> 	$row['stays'],
							'GETAWAYS' 		=> 	$row['getaways'],
							'WORTHWATCHING' => 	$row['worthwatching'],
							'ITINERARYTITLE'=>  $row['itinerarytitle'],
							'ITINERARYTAGS' => 	$row['itinerarytags'],
							'TAGS' 			=> 	$row['tags'],
							'ITINERARYDISTANCE' => 	$row['distance'],
							'ITINERARYFROM' => 	$row['itineraryfrom'],
							'ITINERARYTO' => 	$row['itineraryto'],
							'ITINERARYCABPRICE' => 	$row['itinerarycabprice'],
							
						);
						$count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}
			
			
			if($count==0)
				header('location:https://flyparadise.in/404');
				

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $package[0]['TITLE']; ?> | Fly Paradise</title>
	<meta name="description" content="<?php echo $package[0]['DESCRIPTION']; ?>">
    <meta name="keywords" content="<?php echo $package[0]['DESTINATION']; ?>,trips, tours, holidays, holiday packages, cheap packages, budget packages, tour packages, customize, customise, travel, wunderlust, solo, holidays, vacation, best travel site, best tour operator, trekking, trek">
    <link href="<?php echo $baseurl; ?>stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="<?php echo $baseurl; ?>stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
    <!--Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    <script src="https://use.fontawesome.com/441c105168.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="<?php echo $baseurl; ?>libraries/owl.carousel.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="<?php echo $baseurl; ?>libraries/js/main.js"></script>
    <script src="<?php echo $baseurl; ?>libraries/js/selec.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCotB6BSKESLUC2dNLnAT76EporwJBXMN4&v=3.exp&libraries=places"></script>
	<script src="<?php echo $baseurl; ?>libraries/js/select2dec.js"></script>
    <!--[if IE]>
            <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
        <![endif]-->
</head>

<body>
 
<header class="alternate desktop--only">
        <div class="main--header">
            <div class="menu--heading">
                <h1 class="logo left">fly paradise</h1>
                <img class="fp--logo" src="<?php echo $baseurl; ?>assets/heros/logo.svg" alt="Fly Paradise logo">
                <div class="main-menu right">
                   <li><a href="<?php echo $baseurl; ?>blog">Blog</a></li>
                    <li><a href="<?php echo $baseurl; ?>about">About Us</a></li>
					 <li><a href="<?php echo $baseurl; ?>get-in">Login</a></li>
                    <li class="quote">FREE QUOTE</li>
                </div>
            </div>
        </div>

    </header>
    <div id="mobile-menu--wrapper">
        <div class="mobile--only mobile--head">
            <header id="header-mobile">
                <ul id="brg-menu">
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <div class="brand-logo">
                    <img class="fp--logo" src="<?php echo $baseurl; ?>assets/heros/logo_m.svg" alt="Fly Paradise logo" class="quote">
                </div>
                <div class="login_m">
                    <img src="<?php echo $baseurl; ?>assets/icons/log-in.svg" alt="" class="customise">
                </div>
            </header>

            <nav id="nav" role="navigation">
                <li><a href="<?php echo $baseurl; ?>blog">Blog</a></li>
				<li><a href="<?php echo $baseurl; ?>about">About Us</a></li>
				<li><a href="<?php echo $baseurl; ?>get-in">Login</a></li>
            </nav>
        </div>	

	
	<div class="breadcrumb">
        <ul class="breadcrumbs">
            <li>Home</li>
            <li>Destinations</li>
            <li><?php echo $package[0]['DESTINATION']; ?></li>
			 <li><?php echo $package[0]['TITLE']; ?></li>
        </ul>
    </div>
	
	
    <div id="main" class="single--package">
        <div id="owl" class="owl-carousel single--package">
            <div class="item">
                 <img src="<?php echo $baseurl; ?><?php echo $package[0]['PATH']; ?>" alt="">
            </div>

            <div class="item">
                <img src="<?php echo $baseurl; ?><?php echo $package[0]['PATH2']; ?>" alt="">
            </div>

            <div class="item">
                <img src="<?php echo $baseurl; ?><?php echo $package[0]['PATH3']; ?>" alt="">
            </div>
        </div>
        <div class="single--packing_desc">
            <div class="border">
                <h2 class="pack-heading"><?php echo $package[0]['TITLE']; ?> <span><?php echo $package[0]['DURATION']; ?></span></h2>
                <p class="description"><?php echo $package[0]['DESCRIPTION']; ?></p>
            </div>
            <div class="inclusions--package">
                <div class="inclusions border">
                   <?php 
                       
				   //Showing Flight thumbnails
				   		if($package[0]['FLIGHTS']=='Yes') 
				   			echo '<div> <img src="'.$baseurl.'assets/icons/transport/air.svg" alt="Air Transfer" label="Air Transfer"> <span>Tickets</span></div>';
				   		else
							echo '<div class="package--ex"><img src="'.$baseurl.'assets/icons/transport/air.svg" alt="Flights not included" label="Flights not included" > <span>Tickets</span></div>';
							
						
						//Showing Meals thumbnails
				   		if($package[0]['MEALS']=='Yes') 
				   			
							echo '<div> <img src="'.$baseurl.'assets/icons/transport/meals.svg" alt="Meals" label="Meals"> <span>Meals</span></div>';
				   		else
							echo '<div class="package--ex"><img src="'.$baseurl.'assets/icons/transport/meals.svg" alt="Meals not included" label="Meals not included" ><span>Meals</span></div>';
						
						
						//Showing Cab thumbnails
				   		if($package[0]['CAB']=='Yes') 
				   			echo '<div><img src="'.$baseurl.'assets/icons/transport/transfer.svg" alt="Cab"><span>Cab</span></div>';
				   		else
							echo '<div class="package--ex"><img src="'.$baseurl.'assets/icons/transport/transfer.svg" alt="Cab not included" label="Cab not included"><span>Cab</span></div>';
						
						
						//Showing Stay thumbnails
				   		if($package[0]['STAY']=='Yes') 
				   			echo '<div><img src="'.$baseurl.'assets/icons/transport/stars.svg" alt="hotel stars"><span>Stay</span></div>';
				   		else
							echo '<div class="package--ex"><img src="'.$baseurl.'assets/icons/transport/stars.svg" alt="Stay not included" label="Stay not included" ><span>Stay</span></div>';
						
						//Showing SITESEEING thumbnails
				   		if($package[0]['SITESEEING']=='Yes') 
				   			echo '<div ><img src="'.$baseurl.'assets/icons/transport/view.svg" alt="Site seeing"><span>Siteseeing</span></div>';
				   		else
							echo '<div class="package--ex"><img src="'.$baseurl.'assets/icons/transport/view.svg" alt="Stay not included" label="Siteseeing not included" ><span>Siteseeing</span></div>';
						
						//Showing Campimg thumbnails
				   		if($package[0]['CAMPS']=='Yes') 
				   			echo '<div><img src="'.$baseurl.'assets/icons/transport/tent.svg" alt="Camping" ><span>Camping</span></div>';
				   		else
							echo '<div class="package--ex"><img src="'.$baseurl.'assets/icons/transport/tent.svg" alt="Camping" label="Campingn" ><span>Camping</span></div>';
							
					
					//Showing houseboat thumbnails
				   		if($package[0]['HOUSEBOATS']=='Yes') 
				   			echo '<div><img src="'.$baseurl.'assets/icons/transport/hb.svg" alt="Houseboat" ><span>Houseboat</span></div>';
				   		else
							echo '<div class="package--ex"><img src="'.$baseurl.'assets/icons/transport/hb.svg" alt="Houseboat" label="Houseboat" ><span>Houseboat</span></div>';
						
						
						
						//Showing Addon thumbnails
				   		if($package[0]['ADDON']=='Yes') 
				   			echo '<div><img src="'.$baseurl.'assets/icons/transport/more.svg" alt="Complimentary from destination" ><span>Compliment</span></div>';
				   		else
							echo '<div class="package--ex"><img src="'.$baseurl.'assets/icons/transport/more.svg" alt="Complimentary from destination" label="Compliment" ><span>Compliment</span></div>';
						
				 
				    ?>
					 
                    
                </div>
				
				
				<div class="stars border">
				
				<form class="list hotel radio no-border">
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice');"  class="radio"  name="foo" <?php if($package[0]['HOTELSTAR']==2) echo "checked"; ?>>
                                                  Budget Stay
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice');"  class="radio" name="foo" <?php if($package[0]['HOTELSTAR']==3) echo "checked"; ?>>
                                                  3 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice');"  class="radio" name="foo" <?php if($package[0]['HOTELSTAR']==4) echo "checked"; ?>>
                                                  4 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice');"  class="radio" name="foo" <?php if($package[0]['HOTELSTAR']==5) echo "checked"; ?>>
                                                  5 star
                                              </label>
                            </li>
                        </form>
						
						
						
						
						
                
					
					<?php

						//Generating Itineraries, Inclusions, Exclusions, worthwatching,Getaways and itinary stay
						 $itinerarytitle=explode('$$$$',$package[0]['ITINERARYTITLE']);
						 $itinerarytags=explode('$$$$',$package[0]['ITINERARYTAGS']);
						 $itinerary=explode('$$$$',$package[0]['ITINERARY']);
						 $inclusions=explode('$$$$',$package[0]['INCLUSIONS']);
						 $exclusions=explode('$$$$',$package[0]['EXCLUSIONS']);
						 $worthwatching=explode('$$$$',$package[0]['WORTHWATCHING']);
						 $getaways=explode('$$$$',$package[0]['GETAWAYS']);
						 $stays=explode('$$$$',$package[0]['STAYS']);
						 $distance=explode('$$$$',$package[0]['ITINERARYDISTANCE']);
					
					
					?>
		
					<?php
					//price updation on basis of hotel selected
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
					
					$today3=$date."-3rooms";
					$today2=$date."-2rooms";
					
				if(isset($_GET['travellers']))
				 	$travellers=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['travellers']))));
				 else
				 	$travellers=1;
					
					
					require_once('home/components/getroomsforpackage.fly');
					$flag=0;
					$hoteltotalprice=0;
					$meals=0; 
					for($i=0;$i<count($stays)-2;$i++){
					//getting destination list (incase of multiple destinations of a package "seperated bty ,")
					$locationlists=$package[0]['DESTINATION'];
					$locationlist=explode(',',$locationlists);
					$hlocations="( `location` like '%".trim($locationlist[0])."%'";
					for($l=1;$l<count($locationlist);$l++){
						$hlocations.=" OR `location` like '%";
						$hlocations.=trim($locationlist[$l])."%'";
					}
					
					//formulating query for getting seperate hotelprice on basis of number of travellers and itenariy stay
					 $query = "SELECT * FROM `hotels` WHERE `stars` = ".$package[0]['HOTELSTAR']." AND ".$hlocations.") AND `place` = '".$stays[$i]."' ORDER BY `".$today3."` ASC LIMIT 1";
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
					
					
				
					//getting total cab price
					$cabprice=explode('$$$$',$package[0]['ITINERARYCABPRICE']);
					$cabtotalprice=0;
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
                    <div class="price--tag">
                        <div class="price--starting">
                            <span>starting from (<?php echo $travellers; ?> person)</span>
							<input type="hidden" id="sessid" value="<?php echo $package[0]['PRICE']; ?>" />
                            <div class="amount"><span>₹</span><span id="pprice"><?php echo $price; ?></span></div>
                        </div>
                        <div class="select-2--wrapper">
						
						
                            <span>For the Month of</span>
                            <select class="js-example-basic-single" name="listing" onChange="stay('pprice');" id="stay">
                                <option value="<?php echo $date=date("F"); ?>"><?php echo $date=date("F Y"); ?> </option>
                                <option value="<?php echo $date=date("F", strtotime("+1 month")); ?>"><?php echo $date=date("F Y", strtotime("+1 month")); ?></option>
                                <option value="<?php echo $date=date("F", strtotime("+2 month")); ?>"><?php echo $date=date("F Y", strtotime("+2 month")); ?></option>
                                <option value="<?php echo $date=date("F", strtotime("+3 month")); ?>"><?php echo $date=date("F Y", strtotime("+3 month")); ?></option>
                                <option value="<?php echo $date=date("F", strtotime("+4 month")); ?>"><?php echo $date=date("F Y", strtotime("+4 month")); ?></option>
								<option value="<?php echo $date=date("F", strtotime("+5 month")); ?>"><?php echo $date=date("F Y", strtotime("+5 month")); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="cta"><div class="customise">Submit</div></button>
				</div>
            </div>
        </div>
	</div>
    <!-- Iternary timeline -->
	
	
    <div class="main-content">
        <div class="with--sidebar itinerary border">
		
		
		
		
		<?php for($i=0;$i<count($itinerary)-1;$i++){ ?>
            <div class="day">
                <div class="internal--perday">
   <img class="arrival" src="<?php if($i==0) { echo $baseurl;  ?>assets/icons/arrival.svg <?php } elseif($i==count($itinerary)-2){ echo $baseurl; ?>/assets/icons/depart.svg <?php } else{ echo $baseurl;  ?>/assets/icons/it-trans.svg<?php } ?>" alt="arrival">
                    <div class="inc">
                        <h5><?php echo $itinerarytitle[$i]; ?></h5>
						
                        <span class="day--today">Day <?php int2txt($i);?></span>
						
						<?php 
							$tags=explode(',',$itinerarytags[$i]);
							for($j=0;$j<count($tags);$j++){ 
								if($j!=count($tags)-1)
									echo '<span>'.$tags[$j].'</span>';
								else
									echo '<span class="last">'.$tags[$j].'</span>'; 
							}
						 ?>
							
                    </div>
				
				<span class="dest-distance tag">Distance: <?php echo $distance[$i]; ?> KM</span>
                
				</div>
                <div class="darkborder inc--per--package bg-blue">
                    <span class="label">Worth Watching:</span><span><?php echo $worthwatching[$i]; ?></span>
                </div>
                <div class="darkborder inc--per--package bg-blue">
                    <span class="label">Getaways:</span><span><?php echo $getaways[$i]; ?></span>
                </div>
                <div class="darkborder margin-top bg-blue">
                    <ul class="checklist">
					<?php 
					
						
							$inclusion=explode(',',$inclusions[$i]);
							
							for($k=0;$k<count($inclusion);$k++){
					 ?>
                       			 <li><img src="<?php echo $baseurl; ?>assets/icons/checklist.svg" alt=""><?php echo $inclusion[$k]; ?></li>
					<?php 
							} //ending internal loop (comma seperator)
							
					?>
                    </ul>
                    <p class="more--details"><?php echo $itinerary[$i]; ?>
					
                    </p>
                </div>
            </div>
   
   		<?php } ?>
   
        </div>
        <div class="sidebar">
            <div class="help--box border">
                <img src="<?php echo $baseurl; ?>assets/icons/call24.svg" alt="call">
                <div>
                    <p>Need help with your trip?</p>
                    <span>Please call <a href="tel:18001232262">1800 123 2262</a></span>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="secondary--footer">
            <div class="sec-ftr">
                <span>We promise to stay best in class</span>
            <div class="footer-phone">
                <span class="tel">1800 123 2262</span>
                <span class="tagl">24/7 Dedicated Support</span>
            </div>
            <li class="quote">Book a destination</li>
            </div>
        </div>
            <div class="footer--primary max-width">
                <ul>
                    <li><a href="<?php echo $baseurl; ?>about">About Us</a></li>
                    <li><a href="<?php echo $baseurl; ?>whatmakesus">What makes Us</a></li>
                    <li><a href="<?php echo $baseurl; ?>blog">Blogs</a></li>
                    <li><a href="<?php echo $baseurl; ?>careers">Careers</a></li>
                    <li><a href="<?php echo $baseurl; ?>terms">Terms &amp; Conditions</a></li>
                    <li><a href="<?php echo $baseurl; ?>privacypolicy">Privacy Policy</a></li>
                </ul>
            </div>
    
            <div class="footer--secondary">
                <div class="max-width">
                    <div class="connect">
                        <a class="social" href="https://www.facebook.com/flyparadisetravels" target="_blank"><img src="<?php echo $baseurl; ?>assets/icons/social/facebook.svg" alt="Facebook"></a>
                        <a class="social" href="https://www.instagram.com/flyparadisetravels/" target="_blank"><img src="<?php echo $baseurl; ?>assets/icons/social/insta.svg" alt="Instagram"></a>
                        <a class="social" href="https://twitter.com/flyparadise_" target="_blank"><img src="<?php echo $baseurl; ?>assets/icons/social/twitter.svg" alt="twitter"></a>
                        <a class="social" href="https://www.linkedin.com/company/fly-paradise/" target="_blank"><img src="<?php echo $baseurl; ?>assets/icons/social/in.svg" alt="linkedIn"></a>
                    </div>
                </div>
            </div>
            <div class="copyright">
                &copy; 2010 - 2018 Fly Paradise Travels
            </div>
        </footer>
	

 <div class="pop-up remove">
 <form action="<?php echo $baseurl; ?>thanks" method="post">
	<div class="pop-up-form">
	<p class="remove-popup">X</p>
    <div class="form-image">
        <img src="<?php echo $baseurl; ?>assets/form/form.png" alt="">
    </div>
    <div class="form-fields">
        <ul class="form">
            <li>
                <script>
                    function init() {
                        var input = document.getElementById('locationTextFieldD');
                        var autocomplete = new google.maps.places.Autocomplete(input);
                    }
                    google.maps.event.addDomListener(window, 'load', init);
                </script>
                <label for="locationTextField">Departure point</label>

                <div class="inp">
                    <img src="<?php echo $baseurl; ?>assets/icons/social/location.svg" alt="">
                    <input id="locationTextFieldD" class="input-field" placeholder="Leaving from this place" type="text" size="50" name="from_place">
                </div>
            </li>
            <li>
                <script>
                    function init() {
                        var input = document.getElementById('locationTextFieldA');
                        var autocomplete = new google.maps.places.Autocomplete(input);
                    }
                    google.maps.event.addDomListener(window, 'load', init);
                </script>
                <label for="locationTextField">Arrival point</label>

                <div class="inp">
                    <img src="<?php echo $baseurl; ?>assets/icons/social/location.svg" alt="">
                    <input id="locationTextFieldA" class="input-field" placeholder="Want to see" type="text" size="50" name="to_loc" value="<?php if(!empty($_SESSION['formdest'])) echo $_SESSION['formdest']; ?>">
                </div>
            </li>
            <li>
                <label for="">Enter Phone No.</label>
                <div class="inp">
                    <img src="<?php echo $baseurl; ?>assets/icons/social/smartphone.svg" alt="">
                    <input class="input-field" placeholder="Enter Phone" min="9" max="10" required type="tel" name="phone">
                </div>
            </li>
            <li>
                <label for="">Enter your Email</label>
                <div class="inp">
                    <img src="<?php echo $baseurl; ?>assets/icons/social/mail.svg" alt="">
                    <input class="input-field" placeholder="Your email-ID" required type="email" name="email">
                </div>
            </li>
        </ul>
        <ul class="depart-date">
            <li><label for="datepicker">Departure date</label>
                <input id="datepicker" placeholder="Preferred date of travel" type="date" name="date"/></li>
            <ul class="number-counter--popup">
                <li class="day--counter no-of-day">
                    <span class="hsidebar">Duration (in nights)</span>
                    <input id="counter-no" type="number" min="1" max="30" value="1"  name="nights"/>
                </li>
                <li class="day--counter no-of-people">
                    <span class="hsidebar">Number of Travellers</span>
                    <input id="counter-no" type="number" min="1" max="30" value="1" name="travellers" />
                </li>
            </ul>

            </form>
        </ul>
        <form class="list hotel radio no-border">
            <li class="list__item">
                <label class="label--radio">
                              <input type="radio" class="radio" checked value="Honeymoon"  name="foo">
                             Honeymoon
                          </label>
            </li>
            <li class="list__item">
                <label class="label--radio">
                              <input type="radio" class="radio" value="Friends and Family" name="foo">
                             Friends & Family
                          </label>
            </li>
            <li class="list__item">
                <label class="label--radio">
                              <input type="radio" class="radio" value="Adventure" name="foo">
                              Adventure
                          </label>
            </li>
            <li class="list__item">
                <label class="label--radio">
                              <input type="radio" class="radio" value="Solo" name="foo">
                             Solo
                          </label>
            </li>
			<li class="list__item">
                <label class="label--radio">
                              <input type="radio" class="radio" value="Weekend" name="foo">
                             Weekend
                          </label>
            </li>
        </form>
        <button class="cta" type="submit" value="Curate my package">Curate my Package</button>
    </div>
</div>
<!--End of form -->
</form>

</div>



       </div>
	   
	   <script type="text/javascript">	
	function stay(thediv){
	
		//getting stay details
		var stay;
		if(document.getElementsByName('foo')[0].checked == true) {
			 stay=2;
		}
		
		if(document.getElementsByName('foo')[1].checked == true) {
			 stay=3;
			
		}
		if(document.getElementsByName('foo')[2].checked == true) {
			  stay=4;
			
		}
		if(document.getElementsByName('foo')[3].checked == true) {
			  stay=5;
			
		}
		
		
		
		//getting month details
		
		var month=document.getElementById('stay').value;
		
		//getting basic price
		var pprice=document.getElementById('sessid').value;
		
		//getting location
		var loc="<?php echo $package[0]['DESTINATION']; ?>";
		
		//getting travellers
		var travellers="<?php if(isset($_GET['travellers']))
								echo $travellers=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['travellers']))));
							 else
								echo $travellers=1;
						?>";
		//getting itenary stays
		var stays=[<?php for($z=0;$z<count($stays)-1;$z++) echo "'".$stays[$z]."',"; ?>];
		
		
		//getting cab prices
		var cabprices='<?php echo $package[0]['ITINERARYCABPRICE']; ?>';
		
		
		//processing filter
		if(window.XMLHttpRequest){
			xmlhttp=new XMLHttpRequest();
		}
		else{
			xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
		}
		
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				document.getElementById(thediv).innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open('GET','<?php echo $baseurl; ?>home/ajaxcomponents/updatepackageprice.php?month='+month+'&stay='+stay+'&loc='+loc+'&travellers='+travellers+'&stays='+stays+'&cabprices='+cabprices,true);

		xmlhttp.send();
		
	}
</script>
<!-- Hotjar Tracking Code for flyparadise.in -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:699414,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-93046908-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-93046908-1');
</script>
</body>

</html>