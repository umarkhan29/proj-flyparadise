<?php
	require_once('home/catalog/connect.khan');
	require_once('home/catalog/session.khan');
	error_reporting(0);
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
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCotB6BSKESLUC2dNLnAT76EporwJBXMN4&v=3.exp&libraries=places"></script>
    <!--[if IE]>
            <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
        <![endif]-->
	
</head>

<body class="destination">
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
                    <li class="quote">FREE QUOTE</li>
                </div>
            </div>
        </div>

    </header>
	
	
<?php
//Fetching destination
$destination=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['states']))));
$query = "SELECT * FROM `destinations` WHERE `destination` like '%".$destination."%' ";

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
							
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}

			if(!$count>0)
				header('location:index');
?>
    <div class="destination--hero">
        <div class="left--destination">
            <span class="location"></span>
            <h2><?php echo $destinations[0]['DESTINATION']; ?></h2>
            <span><?php echo $destinations[0]['DESC']; ?></span>
            <div class="map">
                <img class="map" src="./assets/icons/transport/placeholder.svg" alt="">
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
			 	$des="srinagar";
				$jsonurl = "http://api.openweathermap.org/data/2.5/weather?q=".$des."&appid=536a874ed7c30387414c700ed1990ce5";
				$json = file_get_contents($jsonurl);
				$celcius="";
				if($json!=""){
					$weather = json_decode($json);
					$kelvin = $weather->main->temp;
					$celcius = $kelvin - 273.15; //Converting Kelvin to celcius
				
			 ?>
                <img src="./assets/icons/transport/temperature.svg" alt="">
                <span><?php echo $celcius;  ?>  &deg;</span>
				
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
            <h3><?php echo $destinations[0]['HEADING2'] ?></h3>
            <p><?php echo $destinations[0]['DESC2'] ?></p>
        </div>
          <div class="destination--packages">
            <div class="sidebar">
                <form class="day--counter" onClick="showpackages('cpackages');" >
                    <span class="hsidebar">Duration (in nights)</span>
                    <input id="counter-no" type="number" min="1" max="30" value="1" />
                </form>
                <div >
                    <span class="hsidebar">Categories</span>
                    <label class="control control--checkbox" onClick="showpackages('cpackages');">Honeymoon
                        <input type="checkbox" checked="checked" name="Honeymoon" value="Honeymoon"/>
                        <div class="control__indicator"></div>
                    </label>
                    <label class="control control--checkbox" onClick="showpackages('cpackages');">Solo trip
                        <input type="checkbox" name="Solo" value="Solo"/>
                        <div class="control__indicator"></div>
                    </label>
                    <label class="control control--checkbox" onClick="showpackages('cpackages');">Family and Friends
                        <input type="checkbox" name="Family and Friends" value="Family and Friends"/>
                        <div class="control__indicator"></div>
                    </label>
                </div>
                <!-- RATING - Form -->
                <form class="rating-form" action="#" method="post" name="rating-movie">
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
                    <input type="text" id="amount" onClick="showpackages('cpackages');"/>
                </section>
            </div>
	
	
	<?php
	//fetching initial packages (on page load)
	 $destination= $destinations[0]['DESTINATION'];
	 $query = "SELECT * FROM `packages` WHERE `destination` = '$destination' ";
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
		
		
            <div class="main--content">
				<div id="cpackages">
					<?php for($i=0;$i<6;$i++) {  //Loading Packages ?>
						<div class="package--tailored">
							<img src="<?php echo $packages[$i]['PATH'] ?>" alt="">
							<div class="destination--info">
								<h3><?php echo $packages[$i]['TITLE']; ?></h3>
								<span class="duration"><?php echo $packages[$i]['DURATION'] ?></span>
								<div class="price"><?php echo $packages[$i]['PRICE'] ?>/-</div>
								<div class="inclusions">
									<img src="./assets/icons/transport/meals.svg" alt="Meals">
									<img src="./assets/icons/transport/stars.svg" alt="hotel stars">
									<img src="./assets/icons/transport/view.svg" alt="Site seeing">
									<img src="./assets/icons/transport/more.svg" alt="Complimentary from destination">
								</div>
								<a href="single--package.php?id=<?php echo $packages[$i]['ID']; ?>"><button class="view--package">View this Package</button></a>
							</div>
						</div>
					<?php } ?>  
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
<div>
	<?php
		//include_once('map/fpmap.php');
	?>
</div>

 <!-- PopUp wrapper -->
        <div class="pop-up remove">
            <!-- Calling popup from location partial -->
            <?php include_once('location.php'); ?>
       </div>
</body>
<?php include_once("home/ajaxcomponents/pullpackages.php"); ?>
</html>