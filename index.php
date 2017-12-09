<?php
	require_once('home/catalog/connect.khan');
	require('home/catalog/session.khan');
	//var_dump($_SESSION);
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

<body>
    <header class="hero home">
        <div class="header max-width">
            <h1>Fly Paradise</h1>
            <div class="main--nav">
                <li> <a href="">Packages</a> </li>
                <li> <a href="">Destinations</a> </li>
                <li> <a href="">About</a> </li>
                <li> <a href="">Saver Packages</a> </li>
            </div>
            <div class="search">
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
				$populardest="";
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
                        </div>
                       
                        <img alt='<?php echo $populardest[3]['DESTINATION']; ?>' src='<?php echo $populardest[3]['PATH']; ?>'>
                    </li>
                     <li>
                        <div>
                            <h3><?php echo $populardest[2]['DESTINATION']; ?></h3>
                            <h4><?php echo $populardest[2]['DESCRIPTION']; ?></h4>
                        </div>
                      
                        <img alt='<?php echo $populardest[2]['DESTINATION']; ?>' src='<?php echo $populardest[2]['PATH']; ?>'>
                    </li>
                    <li>
                        <div>
                            <h3><?php echo $populardest[1]['DESTINATION']; ?></h3>
                            <h4><?php echo $populardest[1]['DESCRIPTION']; ?></h4>
                        </div>
						
						<img alt='<?php echo $populardest[1]['DESTINATION']; ?>' src='<?php echo $populardest[1]['PATH']; ?>'>
                    </li>
                    <li>
                        <div>
                            <h3><?php echo $populardest[0]['DESTINATION']; ?></h3>
                            <h4><?php echo $populardest[0]['DESCRIPTION']; ?></h4>
                        </div>
                       
                        <img alt='<?php echo $populardest[0]['DESTINATION']; ?>' src='<?php echo $populardest[0]['PATH']; ?>'>
                    </li>
                    <li>
                        <div>
                            <h3><?php echo $populardest[4]['DESTINATION']; ?></h3>
                            <h4><?php echo $populardest[4]['DESCRIPTION']; ?></h4>
                        </div>
                      
                        <img alt='Denali, Alaska' src='<?php echo $populardest[4]['PATH']; ?>'>
                    </li>
                    <li>
                        <div>
                            <h3><?php echo $populardest[5]['DESTINATION']; ?></h3>
                            <h4><?php echo $populardest[5]['DESCRIPTION']; ?></h4>
                        </div>
                        
                        <img alt='Denali, Alaska' src='<?php echo $populardest[5]['PATH']; ?>'>
                    </li>
                    <li>
                        <div>
                            <h3><?php echo $populardest[6]['DESTINATION']; ?></h3>
                            <h4><?php echo $populardest[6]['DESCRIPTION']; ?></h4>
                        </div>
                        
                        <img alt='Denali, Alaska' src='<?php echo $populardest[6]['PATH']; ?>'>
                    </li>
                    <li>
                        <div>
                            <h3><?php echo $populardest[7]['DESTINATION']; ?></h3>
                            <h4><?php echo $populardest[7]['DESCRIPTION']; ?></h4>
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
				$populardest="";
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$populardest[] = array(
							
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
                        <h2><?php echo $populardest[0]['DESTINATION']; ?></h2>
                        <h3><?php echo $populardest[0]['HEADING']; ?></h3>
                        <p><?php echo $populardest[0]['DESCRIPTION']; ?></p>
                        <ul>
                            <li><i class="fa fa-clock-o"></i><span>Duration: <?php echo $populardest[0]['DURATION']; ?></span></li>
                            <li><i class="fa fa-globe"></i><span>Type: <?php echo $populardest[0]['TYPE']; ?></span></li>
                        </ul>
                    </div>
                </a>
                <img src="<?php echo $populardest[0]['PATH']; ?>">
            </section>

            <section class="programs">
                <a href="#">
                    <div class="content">
                        <h2><?php echo $populardest[1]['DESTINATION']; ?></h2>
                        <h3><?php echo $populardest[1]['HEADING']; ?></h3>
                        <p><?php echo $populardest[1]['DESCRIPTION']; ?></p>
                        <ul>
                            <li><i class="fa fa-clock-o"></i><span>Duration: <?php echo $populardest[1]['DURATION']; ?></span></li>
                            <li><i class="fa fa-globe"></i><span>Type: <?php echo $populardest[1]['TYPE']; ?></span></li>
                        </ul>
                    </div>
                </a>
                <img src="<?php echo $populardest[1]['PATH']; ?>">
            </section>

            <section class="programs">
                <a href="#">
                    <div class="content">
                        <h2><?php echo $populardest[2]['DESTINATION']; ?></h2>
                        <h3><?php echo $populardest[2]['HEADING']; ?></h3>
                        <p><?php echo $populardest[2]['DESCRIPTION']; ?></p>
                        <ul>
                            <li><i class="fa fa-clock-o"></i><span>Duration: <?php echo $populardest[2]['DURATION']; ?></span></li>
                            <li><i class="fa fa-globe"></i><span>Type: <?php echo $populardest[2]['TYPE']; ?></span></li>
                        </ul>
                    </div>
                </a>
                <img src="<?php echo $populardest[2]['PATH']; ?>">
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
				$populardest="";
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$populardest[] = array(
							
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
                <div id="owl" class="owl-carousel">
                    <div class="item">
                        <div class="quote-icon"><img src="https://s3.amazonaws.com/landing.wisestamp.com/7942a8680adc20f3bf052571b234e5ec/%E2%80%9C.svg"></div>
                        <div class="quote">
                            <p><?php echo $populardest[0]['DESCRIPTION']; ?></p>
                        </div>
                        <table>
                            <td class="person"><img src="<?php echo $populardest[0]['PATH']; ?>"></td>
                            <td class="name">
                                <p><?php echo $populardest[0]['NAME']; ?></p>
                                <p class="title"><?php echo $populardest[0]['ABOUT']; ?></p>
                            </td>
                        </table>
                    </div>


                    <!--item-->

                   <div class="item">
                        <div class="quote-icon"><img src="https://s3.amazonaws.com/landing.wisestamp.com/7942a8680adc20f3bf052571b234e5ec/%E2%80%9C.svg"></div>
                        <div class="quote">
                            <p><?php echo $populardest[1]['DESCRIPTION']; ?></p>
                        </div>
                        <table>
                            <td class="person"><img src="<?php echo $populardest[1]['PATH']; ?>"></td>
                            <td class="name">
                                <p><?php echo $populardest[1]['NAME']; ?></p>
                                <p class="title"><?php echo $populardest[1]['ABOUT']; ?></p>
                            </td>
                        </table>
                    </div>
					
					
                    <!--item-->

                   <div class="item">
                        <div class="quote-icon"><img src="https://s3.amazonaws.com/landing.wisestamp.com/7942a8680adc20f3bf052571b234e5ec/%E2%80%9C.svg"></div>
                        <div class="quote">
                            <p><?php echo $populardest[2]['DESCRIPTION']; ?></p>
                        </div>
                        <table>
                            <td class="person"><img src="<?php echo $populardest[2]['PATH']; ?>"></td>
                            <td class="name">
                                <p><?php echo $populardest[2]['NAME']; ?></p>
                                <p class="title"><?php echo $populardest[2]['ABOUT']; ?></p>
                            </td>
                        </table>
                    </div>
					
					
                    <!--item-->
<div class="item">
                        <div class="quote-icon"><img src="https://s3.amazonaws.com/landing.wisestamp.com/7942a8680adc20f3bf052571b234e5ec/%E2%80%9C.svg"></div>
                        <div class="quote">
                            <p><?php echo $populardest[3]['DESCRIPTION']; ?></p>
                        </div>
                        <table>
                            <td class="person"><img src="<?php echo $populardest[3]['PATH']; ?>"></td>
                            <td class="name">
                                <p><?php echo $populardest[3]['NAME']; ?></p>
                                <p class="title"><?php echo $populardest[3]['ABOUT']; ?></p>
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
                <li class="bold">Offerings</li>
                <li><a href="#">Test link</a></li>
                <li><a href="#">Test link</a></li>
                <li><a href="#">Test link</a></li>
                <li><a href="#">Test link</a></li>
            </ul>
            <ul>
                <li class="bold">Our Policies</li>
                <li><a href="#">Test link</a></li>
                <li><a href="#">Test link</a></li>
                <li><a href="#">Test link</a></li>
                <li><a href="#">Test link</a></li>
            </ul>
            <ul>
                <li class="bold">What we write</li>
                <li><a href="#">Test link</a></li>
                <li><a href="#">Test link</a></li>
                <li><a href="#">Test link</a></li>
                <li><a href="#">Test link</a></li>
            </ul>
            <ul>
                <li class="bold">More</li>
                <li><a href="#">Test link</a></li>
                <li><a href="#">Test link</a></li>
                <li><a href="#">Test link</a></li>
                <li><a href="#">Test link</a></li>
            </ul>
        </div>

        <div class="footer--secondary">
            <div class="max-width">
                <div class="copyright f-left">made with
                    <section class="fave"></section>
                    in heaven.</div>
                <div class="connect f-right">
                    <a class="social fb" href="#">facebook</a>
                    <a class="social insta" href="#">instagram</a>
                    <a class="social tw" href="#">twitter</a>
                </div>
            </div>
        </div>
    </footer>
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