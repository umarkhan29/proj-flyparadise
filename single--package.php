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
 $id=12;
 $query = "SELECT * FROM `packages` WHERE `id` = '$id';  ";
			if($result = mysqli_query($dbconn,$query)){
				$package="";
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
							'CAB' 			=> 	$row['localcab'],
							'MEALS' 		=> 	$row['meals'],
							'SITESEEING' 	=> 	$row['siteseeing'],
							'STAY' 			=> 	$row['stay'],
							'ADDON' 			=> 	$row['addon']
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}

?>
    <div class="single--package">
        <div id="owl" class="owl-carousel single--package">
            <div class="item">
                <img src="assets/single--destination/one.png" alt="">
            </div>

            <div class="item">
                <img src="<?php echo $package[0]['PATH']; ?>" alt="">
            </div>

            <div class="item">
                <img src="assets/single--destination/one.png" alt="">
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
							echo '<img src="./assets/icons/transport/noimg.svg" alt="Flights not included" label="Flights not included">';
							
						
						//Showing Meals thumbnails
				   		if($package[0]['MEALS']=='Yes') 
				   			echo '<img src="./assets/icons/transport/meals.svg" alt="Meals">';
				   		else
							echo '<img src="./assets/icons/transport/meals.svg" alt="Meals not included" label="Meals not included" class="inactive-inclusion">';
						
						
						//Showing Cab thumbnails
				   		if($package[0]['CAB']=='Yes') 
				   			echo '<img src="./assets/icons/transport/transfer.svg" alt="Transfers">';
				   		else
							echo '<img src="./assets/icons/transport/noimg.svg" alt="Cab not included" label="Cab not included">';
						
						
						//Showing Stay thumbnails
				   		if($package[0]['STAY']=='Yes') 
				   			echo '<img src="./assets/icons/transport/stars.svg" alt="hotel stars">';
				   		else
							echo '<img src="./assets/icons/transport/noimg.svg" alt="Stay not included" label="Stay not included">';
						
						//Showing SITESEEING thumbnails
				   		if($package[0]['SITESEEING']=='Yes') 
				   			echo ' <img src="./assets/icons/transport/view.svg" alt="Site seeing">';
				   		else
							echo '<img src="./assets/icons/transport/noimg.svg" alt="Stay not included" label="Stay not included">';
						
						
						//Showing Cab thumbnails
				   		if($package[0]['ADDON']=='Yes') 
				   			echo ' <img src="./assets/icons/transport/more.svg" alt="Complimentary from destination">';
				   		else
							echo '<img src="./assets/icons/transport/noimg.svg" alt="Complimentary from destination" label="Complimentary from destination">';
						
				 
				    ?>
                    
                </div>
                <div class="stars border">
                    <ul class="hotel">
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
                            <div class="amount"><span>₹</span>3,000</div>
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
        <!-- Iternary timeline -->
        <div class="container experience">
            <div class="row">
                <div class="col-md-12">
                    <h4>ITERNARY</h4>
                    <section class="cd-horizontal-timeline container">
                        <div class="timeline">
                            <div class="events-wrapper">
                                <div class="events">
                                    <ol>
                                        <li>
                                            <a href="#0" data-date="01/05/2011" class="selected">
                                                <span class="iternary--date">One date</span></a>
                                        </li>
                                        <li>
                                            <a href="#0" data-date="01/03/2012">
                                                <span class="iternary--date">2nd date</span></a>
                                        </li>
                                        <li>
                                            <a href="#0" data-date="01/0/2013">
                                                <span class="iternary--date">3rd date</span></a>
                                        </li>
                                        <li>
                                            <a href="#0" data-date="01/05/2014">
                                                <span class="iternary--date">4rd date</span></a>
                                        </li>
                                        <li>
                                            <a href="#0" data-date="01/06/2015">
                                                <span class="iternary--date">5rd date</span></a>
                                        </li>
                                        <li>
                                            <a href="#0" data-date="01/07/2016">
                                                <span class="iternary--date">6rd date</span></a>
                                        </li>
                                    </ol>

                                    <span class="filling-line" aria-hidden="true"></span>
                                </div>
                                <!-- .events -->
                            </div>
                            <!-- .events-wrapper -->
                        </div>
                        <!-- .timeline -->

                        <div class="events-content">
                            <ol>
                                <li class="selected" data-date="01/05/2015">
                                    <h5>Day one khap khap </h5>
                                    <em>Today</em>
                                    <p>This is a test package</p>
                                    <br>
                                    <p>Dopmai az ladnaaw</p>
                                </li>

                                <li data-date="01/03/2014">
                                </li>

                                <li data-date="01/02/2013">
                                    <h5>Day one khap khap </h5>
                                    <em>Today</em>
                                    <p>This is a test package</p>
                                    <br>
                                    <p>Dopmai az ladnaaw</p>
                                </li>
                            </ol>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>

</html>