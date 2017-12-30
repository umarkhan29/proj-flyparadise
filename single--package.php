<?php
	include_once('home/catalog/connect.khan');
	include_once('home/catalog/session.khan');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fly Paradise</title>
    <link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
    <!--Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    <script src="https://use.fontawesome.com/441c105168.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="libraries/owl.carousel.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="libraries/js/main.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!--[if IE]>
            <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
        <![endif]-->
</head>

<body>
    <header class="alternate">
        <div class="main--header">
            <div class="menu--heading">
                <h1 class="logo left">fly paradise</h1>
                <img class="fp--logo" src="./assets/heros/logo.png" alt="Fly Paradise logo">
                <div class="main-menu right">
                    <li><a href="">Packages</a></li>
                    <li><a href="">Destinations</a></li>
                    <li><a href="">Honeymoon Packages</a></li>
                    <li><a href="">Weekend trips</a></li>
                    <li class="quote"><a href="">FREE QUOTE</a></li>
                </div>
            </div>
        </div>

    </header>
	
	
<?php
//Fetching single package
 $id=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['id']))));
 $query = "SELECT * FROM `packages` WHERE `id` = '$id';  ";
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
							'PRICE' 		=> 	$row['price'],
							'PATH' 			=> 	$row['path'],
							'PATH2' 			=> 	$row['path2'],
							'PATH3' 			=> 	$row['path3'],
							'CAB' 			=> 	$row['localcab'],
							'MEALS' 		=> 	$row['meals'],
							'SITESEEING' 	=> 	$row['siteseeing'],
							'STAY' 			=> 	$row['stay'],
							'ADDON' 		=> 	$row['addon'],
							'ITINERARY' 	=> 	$row['itinerary'],
							'INCLUSIONS'	=> 	$row['inclusions'],
							'EXCLUSIONS' 	=> 	$row['exclusions'],
							'GETAWAYS' 		=> 	$row['getaways'],
							'WORTHWATCHING' => 	$row['worthwatching'],
							'ITINERARYTITLE'=>  $row['itinerarytitle'],
							'ITINERARYTAGS' => 	$row['itinerarytags'],
							
						);
						$count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}
			
			
			if($count==0)
				header('location:index');

?>
	
	<div class="breadcrumb">
        <ul class="breadcrumbs">
            <li>Home</li>
            <li>Destinations</li>
            <li>Kashmir</li>
        </ul>
    </div>
	
	
    <div class="single--package">
        <div id="owl" class="owl-carousel single--package">
            <div class="item">
                 <img src="<?php echo $package[0]['PATH']; ?>" alt="">
            </div>

            <div class="item">
                <img src="<?php echo $package[0]['PATH2']; ?>" alt="">
            </div>

            <div class="item">
                <img src="<?php echo $package[0]['PATH3']; ?>" alt="">
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
				   			echo '<img src="./assets/icons/transport/air.svg" alt="Air Transfer" label="Air Transfer">';
				   		else
							echo '<img src="./assets/icons/transport/air.svg" alt="Flights not included" label="Flights not included" class="package--ex">';
							
						
						//Showing Meals thumbnails
				   		if($package[0]['MEALS']=='Yes') 
				   			echo '<img src="./assets/icons/transport/meals.svg" alt="Meals">';
				   		else
							echo '<img src="./assets/icons/transport/meals.svg" alt="Meals not included" label="Meals not included" class="package--ex">';
						
						
						//Showing Cab thumbnails
				   		if($package[0]['CAB']=='Yes') 
				   			echo '<img src="./assets/icons/transport/transfer.svg" alt="Transfers">';
				   		else
							echo '<img src="./assets/icons/transport/transfer.svg" alt="Cab not included" label="Cab not included" class="package--ex">';
						
						
						//Showing Stay thumbnails
				   		if($package[0]['STAY']=='Yes') 
				   			echo '<img src="./assets/icons/transport/stars.svg" alt="hotel stars">';
				   		else
							echo '<img src="./assets/icons/transport/stars.svg" alt="Stay not included" label="Stay not included" class="package--ex">';
						
						//Showing SITESEEING thumbnails
				   		if($package[0]['SITESEEING']=='Yes') 
				   			echo ' <img src="./assets/icons/transport/view.svg" alt="Site seeing">';
				   		else
							echo '<img src="./assets/icons/transport/view.svg" alt="Stay not included" label="Stay not included" class="package--ex">';
						
						
						//Showing Cab thumbnails
				   		if($package[0]['ADDON']=='Yes') 
				   			echo ' <img src="./assets/icons/transport/more.svg" alt="Complimentary from destination" >';
				   		else
							echo '<img src="./assets/icons/transport/more.svg" alt="Complimentary from destination" label="Complimentary from destination" class="package--ex">';
						
				 
				    ?>
                    
                </div>
                <div class="stars border">
                    <ul class="hotel radio">
                        <li>
                            <input type="radio" id="f-option" name="selector" <?php if($package[0]['HOTELSTAR']==2) echo "checked"; ?> >
                            <label for="f-option">Budget stay</label>

                            <div class="check"></div>
                        </li>

                        <li>
                            <input type="radio" id="s-option" name="selector" <?php if($package[0]['HOTELSTAR']==3) echo "checked"; ?> >
                            <label for="s-option">3 Star</label>

                            <div class="check">
                                <div class="inside"></div>
                            </div>
                        </li>

                        <li>
                            <input type="radio" id="t-option" name="selector" <?php if($package[0]['HOTELSTAR']==4) echo "checked"; ?>>
                            <label for="t-option">4 star</label>

                            <div class="check">
                                <div class="inside"></div>
                            </div>
                        </li>
                        <li>
                            <input type="radio" id="w-option" name="selector" <?php if($package[0]['HOTELSTAR']==5) echo "checked"; ?> >
                            <label for="w-option">5 star</label>

                            <div class="check">
                                <div class="inside"></div>
                            </div>
                        </li>
                    </ul>
                    <div class="price--tag">
                        <div class="price--starting">
                            <span>starting from (per person)</span>
                            <div class="amount"><span>₹</span><?php echo $package[0]['PRICE']; ?></div>
                        </div>
                        <div class="select-2--wrapper">
                            <span>For the Month of</span>
                            <select class="js-example-basic-single" name="listing" id="">
                                <option value="1">Jan 2018</option>
                                <option value="2">Feb 2018</option>
                                <option value="3">Mar 2018</option>
                                <option value="4">Apr 2018</option>
                                <option value="5">May 2018</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="cta">Submit</button>
            </div>
        </div>
	</div>
    <!-- Iternary timeline -->
	
	
    <div class="main-content">
        <div class="with--sidebar itinerary border">
		
		
		<?php
			//Generating Itineraries, Inclusions, Exclusions, worthwatching,Getaways
			 $itinerarytitle=explode('$$$$',$package[0]['ITINERARYTITLE']);
			 $itinerarytags=explode('$$$$',$package[0]['ITINERARYTAGS']);
			 $itinerary=explode('$$$$',$package[0]['ITINERARY']);
			 $inclusions=explode('$$$$',$package[0]['INCLUSIONS']);
			 $exclusions=explode('$$$$',$package[0]['EXCLUSIONS']);
			 $worthwatching=explode('$$$$',$package[0]['WORTHWATCHING']);
			 $getaways=explode('$$$$',$package[0]['GETAWAYS']);
		
		
		?>
		
		
		<?php for($i=0;$i<count($itinerary)-1;$i++){ ?>
            <div class="day">
                <div class="internal--perday">
                    <img class="arrival" src="./assets/icons/arrival.svg" alt="arrival">
                    <div class="inc">
                        <h5><?php echo $itinerarytitle[$i]; ?></h5>
						
                        <span class="day--today">Day <?php echo "One";?></span>
						
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
                       			 <li><img src="./assets/icons/checklist.svg" alt=""><?php echo $inclusion[$k]; ?></li>
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
                <img src="./assets/icons/call24.svg" alt="call">
                <div>
                    <p>Need help with your trip?</p>
                    <span>Please call <a href="tel:18001232262">1800 123 2262</a></span>
                </div>
            </div>
        </div>
    </div>
	
	  <footer>
        <div class="footer--primary max-width">
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">What makes Us</a></li>
                <li><a href="#">Blogs</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Terms &amp; Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </div>

        <div class="footer--secondary">
            <div class="max-width">
                <div class="connect">
                    <a class="social" href="#"><img src="./assets/icons/social/facebook.svg" alt="Facebook"></a>
                    <a class="social" href="#"><img src="./assets/icons/social/insta.svg" alt="Instagram"></a>
                    <a class="social" href="#"><img src="./assets/icons/social/twitter.svg" alt="twitter"></a>
                    <a class="social" href="#"><img src="./assets/icons/social/in.svg" alt="linkedIn"></a>
                </div>
            </div>
        </div>
        <div class="copyright">
            &copy; 2010 - 2018 Fly Paradise Travels
        </div>
    </footer>
</body>

</html>