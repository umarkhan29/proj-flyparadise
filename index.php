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
    <title>Fly Paradise</title>
    <link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
    <!--Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="libraries/owl.carousel.min.js"></script>
    <script src="libraries/js/main.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCotB6BSKESLUC2dNLnAT76EporwJBXMN4&v=3.exp&libraries=places"></script>
    <!--[if IE]>
        <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <![endif]-->
</head>

<body>
   <header class="hero main--header home">
        <div class="header max-width">
            <h1>Fly Paradise</h1>
            <div class="main--nav">
                <li> <a href="single-package">Packages</a> </li>
                <li> <a href="destinations">Destinations</a> </li>
			    <li> <a href="blog">Blog</a> </li>
                <li> <a href="about.html">About</a> </li>
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
            <span>This is the tag line for hero banner</span>
            <a href="#">How it works</a>
        </div>
        <div class="hero-form--wrapper">
            <div class="hero--form">
                <span class="swtich-text">select your category</span>
                <div class="switcher">
                    <li>
                        <span class="domestic"></span>
                        <span>Domestic</span>
                    </li>
                    <li>
                        <span class="domestic"></span>
                        <span>International</span>
                    </li>
                    <li>
                        <span class="domestic"></span>
                        <span>family and Friends</span>
                    </li>
                    <li>
                        <span class="domestic"></span>
                        <span>Solo</span>
                    </li>
                </div>
            </div>
            <div class="hero-form--input">
                <div class="explore--form">
                    <span class="go"></span>
                    <input type="text" placeholder="to">
                </div>
                <div class="explore--form">
                    <span class="go"></span>
                    <select name="Month" id="">
                        <option value="">Any Date</option>
                        <option value="">August</option>
                        <option value="">September</option>
                        <option value="">October</option>
                        <option value="">November</option>

                    </select>
                </div>
                <div class="explore--form">
                    <span class="go"></span>
                    <input type="number" placeholder="Quantity">
                </div>
                <input class="hero--submit" type="submit">
            </div>
        </div>
    </header>

    <!-- End of hero -->


<?php
//Fetching popular destinations
 $query = "SELECT * FROM `populardesthp` order by `id` desc LIMIT 3 ";
			if($result = mysqli_query($dbconn,$query)){
				$populardest;
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
    <div class="packages">
        <h2 class="heading">Popular Destinations</h2>
        <span class="span--heading">Are you looking for the inspiration?</span>
        <ul class="top--packages">
            <li>
                <img src="<?php echo $populardest[0]['PATH']; ?>" alt="#">
                <div class="hover--div"></div>
                <div class="top--text">
                    <p><?php echo $populardest[0]['DESTINATION']; ?></p>
                    <h4><?php echo $populardest[0]['DESCRIPTION']; ?></h4>
                    <a href="#">Book Now</a>
                </div>
            </li>
            <li class="top">
                <img src="<?php echo $populardest[1]['PATH']; ?>" alt="#">
                <div class="hover--div"></div>
                <div class="top--text">
                    <p><?php echo $populardest[1]['DESTINATION']; ?></p>
                    <h4><?php echo $populardest[1]['DESCRIPTION']; ?></h4>
                    <a href="#">Book Now</a>
                </div>
            </li>
            <li>
               <img src="<?php echo $populardest[2]['PATH']; ?>" alt="#">
                <div class="hover--div"></div>
                <div class="top--text">
                    <p><?php echo $populardest[2]['DESTINATION']; ?></p>
                    <h4><?php echo $populardest[2]['DESCRIPTION']; ?></h4>
                    <a href="#">Book Now</a>
                </div>
            </li>
        </ul>
        <div class="explore--more">
            <a href="#">explore more popular destinations</a>
        </div>
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
	
	 <!-- PopUp wrapper -->
        <div class="pop-up remove">
            <!-- Calling popup from location partial -->
            <?php include_once('location.php'); ?>
       </div>
		
</body>
<!--Analytics Code-->
<!--  <script>
    !function(g,s,q,r,d){r=g[r]=g[r]||function(){(r.q=r.q||[]).push(
    arguments)};d=s.createElement(q);q=s.getElementsByTagName(q)[0];
    d.src='//d1l6p2sc9645hc.cloudfront.net/tracker.js';q.parentNode.
    insertBefore(d,q)}(window,document,'script','_gs');

    _gs('GSN-243866-Q');
    </script> -->

</html>