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
$id=2;
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
                <div>
                    <label class="control control--checkbox">First checkbox
                        <input type="checkbox" checked="checked"/>
                        <div class="control__indicator"></div>
                    </label>
                </div>
            </div>
            <div class="main--content">

            </div>
        </div>
    </div>
</body>

</html>