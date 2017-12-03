<?php
	require_once('home/catalog/connect.khan');
	require_once('home/catalog/session.khan');
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="libraries/owl.carousel.min.js"></script>
    <script src="libraries/js/main.js"></script>
    <!--[if IE]>
            <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
        <![endif]-->
</head>

<body class="destination">
    <header class="alternate">
        <div class="main--header">
            <div class="menu--heading">
                <h1 class="logo left">fly paradise</h1>
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
//Fetching destination
$id=1;
 $query = "SELECT * FROM `destinations` WHERE `id` = '$id' ";
			if($result = mysqli_query($dbconn,$query)){
				$destinations;
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$destinations[] = array(
							
							'ID'			=>	$row['id'],
							'PATH' 			=> 	$row['img1'],
							'MAINHEADING' 	=> 	$row['mainheading'],
							'DESC'	 	=> 	$row['desc'],
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

?>
    <div class="destination--hero">
        <div class="left--destination">
            <span class="location"></span>
            <h2><?php echo $destinations[0]['MAINHEADING'] ?></h2>
            <span><?php echo $destinations[0]['DESC'] ?></span>
            <div class="map">
                <p class="map">View Location on Map</p>
            </div>
            <div class="info">
                <ul>
				<?php
				//getting seperate links
				$links=explode('$$$$',$destinations[0]['LINKS']);
				
				 ?>
                    <span>Links:</span>
                    <?php for($i=0;$i<count($links); $i++) { ?>
						<li><?php echo $links[$i]; ?></li> 
						
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
                <form class="day--counter">
                    <span class="hsidebar">Duration (in nights)</span>
                    <input id="counter-no" type="number" min="1" max="30" value="1" />
                </form>
                <div>
                    <span class="hsidebar">Categories</span>
                    <label class="control control--checkbox">Honeymoon
                        <input type="checkbox" checked="checked"/>
                        <div class="control__indicator"></div>
                    </label>
                    <label class="control control--checkbox">Solo trip
                        <input type="checkbox"/>
                        <div class="control__indicator"></div>
                    </label>
                    <label class="control control--checkbox">Family and Friends
                        <input type="checkbox"/>
                        <div class="control__indicator"></div>
                    </label>
                </div>
                <!-- RATING - Form -->
                <form class="rating-form" action="#" method="post" name="rating-movie">
                    <span class="hsidebar">Stay star rating</span>
                    <fieldset class="form-group">
                        <legend class="form-legend">Rating:</legend>
                        <div class="form-item">
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
                                <input class="btn-reset" type="reset" value="Reset" />
                            </div>
                            <div class="form-output">
                                ? / 5
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>

            <div class="main--content">
                <div class="package--tailored">
                    <img src="./assets/destinations/particular-dest/thumb.png" alt="">
                    <div class="destination--info">
                        <h3>Kashmir enchanting</h3>
                        <span class="duration">4 days 3 nights</span>
                        <div class="price">19,000/-</div>
                        <div class="inclusions">
                            <img src="./assets/icons/transport/meals.svg" alt="Meals">
                            <img src="./assets/icons/transport/stars.svg" alt="hotel stars">
                            <img src="./assets/icons/transport/view.svg" alt="Site seeing">
                            <img src="./assets/icons/transport/more.svg" alt="Complimentary from destination">
                        </div>
                        <button class="view--package">View this Package</button>
                    </div>
                </div>
                <div class="package--tailored">
                    <img src="./assets/destinations/particular-dest/thumb.png" alt="">
                    <div class="destination--info">
                        <h3>Kashmir enchanting</h3>
                        <span class="duration">5 days 4 nights</span>
                        <div class="price">19,000/-</div>
                        <div class="inclusions">
                            <img src="./assets/icons/transport/meals.svg" alt="Meals">
                            <img src="./assets/icons/transport/stars.svg" alt="hotel stars">
                            <img src="./assets/icons/transport/view.svg" alt="Site seeing">
                            <img src="./assets/icons/transport/more.svg" alt="Complimentary from destination">
                        </div>
                        <button class="view--package">View this Package</button>
                    </div>
                </div>
                <div class="package--tailored">
                    <img src="./assets/destinations/particular-dest/thumb.png" alt="">
                    <div class="destination--info">
                        <h3>Kashmir enchanting</h3>
                        <span class="duration">6 days 5 nights</span>
                        <div class="price">19,000/-</div>
                        <div class="inclusions">
                            <img src="./assets/icons/transport/meals.svg" alt="Meals">
                            <img src="./assets/icons/transport/stars.svg" alt="hotel stars">
                            <img src="./assets/icons/transport/view.svg" alt="Site seeing">
                            <img src="./assets/icons/transport/more.svg" alt="Complimentary from destination">
                        </div>
                        <button class="view--package">View this Package</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>