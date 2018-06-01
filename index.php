<?php
	require_once('home/catalog/connect.khan');
	require('home/catalog/session.khan');	
?>
		
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fly Paradise | We are travel doctors helping you to create unforgettable moments.</title>
	<link rel="shortcut icon" type="image/png" sizes="32x32" href="assets/heros/favicon-flyparadise.png" />
    <link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width">
	<meta name="description" content="Cheapest Holidays for you and your family, Whether you are solo or having a travel buddy. We have best deals for you. We are a five star rated travel company.">
    <meta name="keywords" content="trips, tours, holidays, holiday packages, cheap packages, budget packages, tour packages, customize, customise, travel, wunderlust, solo, holidays, vacation, best travel site, best tour operator, trekking, trek">
    <!--Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="libraries/owl.carousel.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="libraries/js/main.js"></script>
    <script src="libraries/js/selec.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCotB6BSKESLUC2dNLnAT76EporwJBXMN4&v=3.exp&libraries=places"></script>
    <!--[if IE]>
        <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <![endif]-->
	<meta name="google-site-verification" content="yjWHFX4E0QE7_TZI5u4TcRkq6o23one9y38lUwfeI0I" />
    <meta name="msvalidate.01" content="DFA0A3DF182E3C98147D4668C1BD06C1" />
</head>

<body>
    <header class="hero main--header home">
        <div class="header max-width">
            <h1>Fly Paradise</h1>
            <div class="main--nav">
                <li> <a href="single--package.php?id=41">Packages</a> </li>
                <li> <a href="destinations">Destinations</a> </li>
				<li> <a href="blog">Blog</a> </li>
                <li> <a href="about">About</a> </li>
                <li> <a href="">Saver Packages</a> </li>
                <li class="quote">FREE QUOTE</li>
            </div>
            <div class="search remove">
                <form action="search" method="POST">
                    <input class="input" type="text" name="searchtxtbox" placeholder="search">
                    <input class="button" name="btn" type="submit">
                </form>
            </div>
            <div class="account">
                <a href="get-in">login</a>
            </div>
        </div>

        <div class="hero--title">
            <p>Discover the World</p>
            <span>making friends while travelling</span>
            <a href="#">How it works</a>
        </div>
        <div class="hero-form--wrapper">
		<?php
		//Getting destinations
		 $query = "SELECT * FROM `destinations`";
					if($result = mysqli_query($dbconn,$query)){
						
						$count=0;
						while($row = mysqli_fetch_assoc($result)){
							$destlist[] = array(
									
									'DESTINATION' 	=> 	$row['destination']
									
								);
								 $count=$count+1;
								
						}
						
					}
					else{
						echo mysqli_error($dbconn);
					}
		
		?>
			<form action="destinations" method="GET">
				<div class="hero-form--input">
						<li class="select-2--wrapper">
							<span>Destination</span>

							<select class="js-example-basic-multiple" name="destination" multiple="multiple">
							<?php  for($i=0; $i<$count; $i++){ ?>
								<option value="<?php echo $destlist[$i]['DESTINATION']; ?>"><?php echo $destlist[$i]['DESTINATION']; ?></option>
							<?php } ?>
							</select>
						</li>
						<li class="day--counter no-of-day">
							<span class="hsidebar">Duration (in nights)</span>
							<input id="counter-no" name="duration" type="number" min="1" max="30" value="1" />
						</li>
						<li class="day--counter no-of-day">
							<span class="hsidebar">No of People</span>
							<input id="counter-no" name="noofpeople" type="number" min="1" max="30" value="1" />
						</li>
	
					<button class="hero--submit" name="hero-submit" value="sessid">
						<img src="./assets/icons/arroww.svg" alt="">
					</button>
				</div>
			</form>
        </div>
    </header>

    <!-- End of hero -->
	
	
<?php
//Fetching popular Packages
 $query = "SELECT * FROM `packages` WHERE `tags` = 'popular' order by `id` desc LIMIT 4 ";
			if($result = mysqli_query($dbconn,$query)){
				$populardest;
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$populardest[] = array(
							
							'ID'			=>	$row['id'],
							'TITLE'			=>	$row['title'],
							'PATH' 			=> 	$row['path'],
							'STARS' 		=> 	$row['hotelstar'],
							'DURATION' 		=> 	$row['duration'],
							'DESTINATION' 	=> 	$row['destination'],
							'DESCRIPTION' 	=> 	$row['description'],
							'FLIGHTS' 		=> 	$row['includeflights'],
							'CAB' 			=> 	$row['localcab'],
							'MEALS' 		=> 	$row['meals'],
							'SITESEEING' 	=> 	$row['siteseeing'],
							'STAY' 			=> 	$row['stay'],
							'ADDON' 		=> 	$row['addon'],
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}

?>
	
	<h2 class="heading">Most Popular packages</h2>

    <div class="owl-carousel owl-theme homepage--packages">
	<?php for($i=0; $i<count($populardest);$i++){ ?>
        <div class="item">
            <div class="relative">
                    <img src="<?php echo $populardest[$i]['PATH']; ?>" alt="">
                    <img class="fav" src="./assets/icons/wishlistE.svg" alt="">
                    <img class="fav none" src="./assets/icons/wishlistF.svg" alt="">
					 <div class="amount"><?php echo $populardest[$i]['DESTINATION']; //no price avaliable, displaying destination here ?></div>
                   
            </div>
            <div class="border">
                <div class="details">
                    <h4><?php echo $populardest[$i]['TITLE']; ?> </h4>
                    <div class="rating"><img src="./assets/icons/star.svg" alt=""><span><?php echo $populardest[$i]['STARS']; ?></span></div>
                </div>
                <div class="offers">
                    <img src="./assets/icons/info.svg" alt="">
                    <span><?php echo $populardest[$i]['DURATION']; ?></span>
                </div>
                <div class="inclusions">
                    <label>Package Inclusions</label>
                    <div>
                        <div class="per-inc">
                           <?php 
						   //Showing Flight thumbnails
								if($populardest[$i]['FLIGHTS']=='Yes') 
									echo '<img src="./assets/icons/transport/air.svg" alt="Air Transfer" label="Air Transfer">';
								else
									echo '<img src="./assets/icons/transport/air.svg" alt="Flights not included" label="Flights not included" class="package--ex">';
							?>
                        
                        </div>
                        <div class="per-inc">
                           <?php 
						   //Showing Meals thumbnails
								if($populardest[$i]['MEALS']=='Yes') 
									echo '<img src="./assets/icons/transport/meals.svg" alt="Meals" label="Meals">';
								else
									echo '<img src="./assets/icons/transport/meals.svg" alt="Meals not included" label="Meals not included" class="package--ex">';
							?>
                        </div>
                        <div class="per-inc">
                            <?php
								//Showing Cab thumbnails
								if($populardest[$i]['CAB']=='Yes') 
									echo '<img src="./assets/icons/transport/transfer.svg" alt="Transfers">';
								else
									echo '<img src="./assets/icons/transport/transfer.svg" alt="Cab not included" label="Cab not included" class="package--ex">';
							
							?>
            
                        </div>
                        <div class="per-inc">
                           <?php
						   		//Showing Stay thumbnails
								if($populardest[$i]['STAY']=='Yes') 
									echo '<img src="./assets/icons/transport/stars.svg" alt="hotel stars">';
								else
									echo '<img src="./assets/icons/transport/stars.svg" alt="Stay not included" label="Stay not included" class="package--ex">';
						   
						   ?>
                        </div>
                        <div class="per-inc">
                            <?php
								//Showing SITESEEING thumbnails
								if($populardest[$i]['SITESEEING']=='Yes') 
									echo ' <img src="./assets/icons/transport/view.svg" alt="Site seeing">';
								else
									echo '<img src="./assets/icons/transport/view.svg" alt="Stay not included" label="Site seeing not included" class="package--ex">';
								
							
							?>
                    
                        </div>
                        <div class="per-inc">
                                <?php
									//Showing Addon thumbnails
									if($populardest[$i]['ADDON']=='Yes') 
										echo ' <img src="./assets/icons/transport/more.svg" alt="Complimentary from destination" >';
									else
										echo '<img src="./assets/icons/transport/more.svg" alt="Complimentary from destination" label="Complimentary from destination" class="package--ex">';
								
								?>
                            
                        </div>
                    </div>
                </div>
                <div class="quote">Customise</div>
            </div>
        </div>
		<?php } ?>
    </div>





<?php
//Fetching homepage  destinations (9)
 $query = "SELECT * FROM `homepagedestinations` order by `id` desc limit 8  ";
			if($result = mysqli_query($dbconn,$query)){
				
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$populardest[] = array(
							
							'ID'			=>	$row['id'],
							'PATH' 			=> 	$row['imgpath'],
							'DESTINATION' 	=> 	$row['destination'],
							'DESCRIPTION' 	=> 	$row['desc']
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}

?>
    <div class="where--to">
        <h2 class="heading">Where would you like to go?</h2>
        <span class="span--heading">Are you looking for the inspiration?</span>
        <div>
            <div id='tours'>
                <ul>
                    <li>
                        <div>
                            <h3><?php echo $populardest[3]['DESTINATION']; ?></h3>
                            <h4><?php echo $populardest[3]['DESCRIPTION']; ?></h4>
							<img class="arrow" src="./assets/icons/arrow.svg" alt="">
                        </div>
                       
                        <img alt='<?php echo $populardest[3]['DESTINATION']; ?>' src='<?php echo $populardest[3]['PATH']; ?>'>
                    </li>
                     <li>
                        <div>
                            <h3><?php echo $populardest[2]['DESTINATION']; ?></h3>
                            <h4><?php echo $populardest[2]['DESCRIPTION']; ?></h4>
							<img class="arrow" src="./assets/icons/arrow.svg" alt="">
                        </div>
                      
                        <img alt='<?php echo $populardest[2]['DESTINATION']; ?>' src='<?php echo $populardest[2]['PATH']; ?>'>
                    </li>
                    <li>
                        <div>
                            <h3><?php echo $populardest[1]['DESTINATION']; ?></h3>
                            <h4><?php echo $populardest[1]['DESCRIPTION']; ?></h4>
							<img class="arrow" src="./assets/icons/arrow.svg" alt="">
                        </div>
						
						<img alt='<?php echo $populardest[1]['DESTINATION']; ?>' src='<?php echo $populardest[1]['PATH']; ?>'>
                    </li>
                    <li>
                        <div>
                            <h3><?php echo $populardest[0]['DESTINATION']; ?></h3>
                            <h4><?php echo $populardest[0]['DESCRIPTION']; ?></h4>
							<img class="arrow" src="./assets/icons/arrow.svg" alt="">
                        </div>
                       
                        <img alt='<?php echo $populardest[0]['DESTINATION']; ?>' src='<?php echo $populardest[0]['PATH']; ?>'>
                    </li>
                    <li>
                        <div>
                            <h3><?php echo $populardest[4]['DESTINATION']; ?></h3>
                            <h4><?php echo $populardest[4]['DESCRIPTION']; ?></h4>
							<img class="arrow" src="./assets/icons/arrow.svg" alt="">
                        </div>
                      
                        <img alt='Denali, Alaska' src='<?php echo $populardest[4]['PATH']; ?>'>
                    </li>
                    <li>
                        <div>
                            <h3><?php echo $populardest[5]['DESTINATION']; ?></h3>
                            <h4><?php echo $populardest[5]['DESCRIPTION']; ?></h4>
							<img class="arrow" src="./assets/icons/arrow.svg" alt="">
                        </div>
                        
                        <img alt='Denali, Alaska' src='<?php echo $populardest[5]['PATH']; ?>'>
                    </li>
                    <li>
                        <div>
                            <h3><?php echo $populardest[6]['DESTINATION']; ?></h3>
                            <h4><?php echo $populardest[6]['DESCRIPTION']; ?></h4>
							<img class="arrow" src="./assets/icons/arrow.svg" alt="">
                        </div>
                        
                        <img alt='Denali, Alaska' src='<?php echo $populardest[6]['PATH']; ?>'>
                    </li>
                    <li>
                        <div>
                            <h3><?php echo $populardest[7]['DESTINATION']; ?></h3>
                            <h4><?php echo $populardest[7]['DESCRIPTION']; ?></h4>
							<img class="arrow" src="./assets/icons/arrow.svg" alt="">
                        </div>
                        
                        <img alt='Denali, Alaska' src='<?php echo $populardest[7]['PATH']; ?>'>
                    </li>
                     
                </ul>
            </div>
        </div>
        <div class="explore--more">
            <a href="#">explore more destinations</a>
        </div>
    </div>
	
<?php
//Fetching honeymoon destinations
 $query = "SELECT * FROM `honeymoonhp` order by `id` desc LIMIT 3 ";
			if($result = mysqli_query($dbconn,$query)){
				
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$honeymoon[] = array(
							
							'ID'			=>	$row['id'],
							'DESTINATION' 	=> 	$row['destination'],
							'PATH' 			=> 	$row['imgpath'],
							'DESCRIPTION' 	=> 	$row['desc'],
							'HEADING' 		=> 	$row['heading'],
							'DURATION' 		=> 	$row['duration'],
							'TYPE' 			=> 	$row['type']
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}

?>
    <div class="honeymoon--packages">
        <h2 class="heading">Where would you like to go on Honeymoon</h2>
        <span class="span--heading">Are you looking for the inspiration?</span>
        <div class="container">

            <section class="programs">
                <a href="#">
                    <div class="content">
                        <h2><?php echo $honeymoon[0]['DESTINATION']; ?></h2>
                        <h3><?php echo $honeymoon[0]['HEADING']; ?></h3>
                        <p><?php echo $honeymoon[0]['DESCRIPTION']; ?></p>
                        <ul>
                            <li><i class="fa fa-clock-o"></i><span>Duration: <?php echo $honeymoon[0]['DURATION']; ?></span></li>
                            <li><i class="fa fa-globe"></i><span>Type: <?php echo $honeymoon[0]['TYPE']; ?></span></li>
                        </ul>
                    </div>
                </a>
                <img src="<?php echo $honeymoon[0]['PATH']; ?>">
            </section>

            <section class="programs">
                <a href="#">
                    <div class="content">
                        <h2><?php echo $honeymoon[1]['DESTINATION']; ?></h2>
                        <h3><?php echo $honeymoon[1]['HEADING']; ?></h3>
                        <p><?php echo $honeymoon[1]['DESCRIPTION']; ?></p>
                        <ul>
                            <li><i class="fa fa-clock-o"></i><span>Duration: <?php echo $honeymoon[1]['DURATION']; ?></span></li>
                            <li><i class="fa fa-globe"></i><span>Type: <?php echo $honeymoon[1]['TYPE']; ?></span></li>
                        </ul>
                    </div>
                </a>
                <img src="<?php echo $honeymoon[1]['PATH']; ?>">
            </section>

            <section class="programs">
                <a href="#">
                    <div class="content">
                        <h2><?php echo $honeymoon[2]['DESTINATION']; ?></h2>
                        <h3><?php echo $honeymoon[2]['HEADING']; ?></h3>
                        <p><?php echo $honeymoon[2]['DESCRIPTION']; ?></p>
                        <ul>
                            <li><i class="fa fa-clock-o"></i><span>Duration: <?php echo $honeymoon[2]['DURATION']; ?></span></li>
                            <li><i class="fa fa-globe"></i><span>Type: <?php echo $honeymoon[2]['TYPE']; ?></span></li>
                        </ul>
                    </div>
                </a>
                <img src="<?php echo $honeymoon[2]['PATH']; ?>">
            </section>
        </div>
        <div class="explore--more">
            <a href="#">explore more honeymoon packages</a>
        </div>
    </div>
    
	
	<!-- Testimonials -->
	<?php
//Fetching reviews
 $query = "SELECT * FROM `reviews` order by `id` desc LIMIT 4 ";
			if($result = mysqli_query($dbconn,$query)){
				
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$reviews[] = array(
							
							'ID'			=>	$row['id'],
							'NAME' 			=> 	$row['name'],
							'ABOUT' 		=> 	$row['about'],
							'DESCRIPTION' 	=> 	$row['desc'],
							'PATH' 			=> 	$row['imgpath'],
							
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}

?>	
	
    <section id="wiseintro-testimonials">
        <row>
            <h2 class="heading">Travellers has a say</h2>
            <span class="span--heading">Are you looking for the inspiration?</span>
            <div class="col-md-10 col-md-push-1">
                <div id="owl" class="owl-carousel testimonial">
                    <div class="item">
                        <div class="quote-icon"><img src="https://s3.amazonaws.com/landing.wisestamp.com/7942a8680adc20f3bf052571b234e5ec/%E2%80%9C.svg"></div>
                        <div class="quote">
                            <p><?php echo $reviews[0]['DESCRIPTION']; ?></p>
                        </div>
                        <table>
                            <td class="person"><img src="<?php echo $reviews[0]['PATH']; ?>"></td>
                            <td class="name">
                                <p><?php echo $reviews[0]['NAME']; ?></p>
                                <p class="title"><?php echo $reviews[0]['ABOUT']; ?></p>
                            </td>
                        </table>
                    </div>


                    <!--item-->

                   <div class="item">
                        <div class="quote-icon"><img src="https://s3.amazonaws.com/landing.wisestamp.com/7942a8680adc20f3bf052571b234e5ec/%E2%80%9C.svg"></div>
                        <div class="quote">
                            <p><?php echo $reviews[1]['DESCRIPTION']; ?></p>
                        </div>
                        <table>
                            <td class="person"><img src="<?php echo $reviews[1]['PATH']; ?>"></td>
                            <td class="name">
                                <p><?php echo $reviews[1]['NAME']; ?></p>
                                <p class="title"><?php echo $reviews[1]['ABOUT']; ?></p>
                            </td>
                        </table>
                    </div>
					
					
                    <!--item-->

                   <div class="item">
                        <div class="quote-icon"><img src="https://s3.amazonaws.com/landing.wisestamp.com/7942a8680adc20f3bf052571b234e5ec/%E2%80%9C.svg"></div>
                        <div class="quote">
                            <p><?php echo $reviews[2]['DESCRIPTION']; ?></p>
                        </div>
                        <table>
                            <td class="person"><img src="<?php echo $reviews[2]['PATH']; ?>"></td>
                            <td class="name">
                                <p><?php echo $reviews[2]['NAME']; ?></p>
                                <p class="title"><?php echo $reviews[2]['ABOUT']; ?></p>
                            </td>
                        </table>
                    </div>
					
					
                    <!--item-->
<div class="item">
                        <div class="quote-icon"><img src="https://s3.amazonaws.com/landing.wisestamp.com/7942a8680adc20f3bf052571b234e5ec/%E2%80%9C.svg"></div>
                        <div class="quote">
                            <p><?php echo $reviews[3]['DESCRIPTION']; ?></p>
                        </div>
                        <table>
                            <td class="person"><img src="<?php echo $reviews[3]['PATH']; ?>"></td>
                            <td class="name">
                                <p><?php echo $reviews[3]['NAME']; ?></p>
                                <p class="title"><?php echo $reviews[3]['ABOUT']; ?></p>
                            </td>
                        </table>
                    </div>
                    <!--item-->

                </div>
                <!-- owl-->
            </div>

        </row>
    </section>
 
 <?php
	require_once('home/common/footer.fly');
?>
	
</body>

</html>