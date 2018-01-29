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
    <header class="hero blog--landing">
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
<?php 
	include_once('home/catalog/connect.khan');
	include_once('home/catalog/session.khan');	
	
	if(isset($_GET['bid'])){
		$id=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['bid']))));
	}else{
		header('location:blog');
	}
?>

<?php
//Fetching the blog

 $query = "SELECT * FROM `blog` WHERE `id` = '$id' ";
			if($result = mysqli_query($dbconn,$query)){
				$populardest;
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$populardest[] = array(
							
							'ID'			=>	$row['id'],
							'PATH' 			=> 	$row['imgpath'],
							'AUTHOR' 	=> 	$row['author'],
							'ABOUT' 	=> 	$row['about'],
							'CONTENT' 	=> 	$row['content'],
							'THUMB' 	=> 	$row['thumb']
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
				
			}
			if(!isset($populardest)){
				header('location:blog');
			}
?>
        <h2 class="blog--title"><?php echo $populardest[0]['ABOUT']; ?></h2>
        <div class="blog-author">
            <a href="#"><?php echo $populardest[0]['AUTHOR']; ?></a>
        </div>
        <div class="prev--next">
            <div class="prev"><a href="blog">Back to blogs</a></div>
            <div class="next"><a href="blog_landing.php?bid=<?php echo $populardest[0]['ID']+1; ?>">Next blog</a></div>
        </div>
    </header>
    <div class="blog--landing-text">
	
		<?php echo $populardest[0]['CONTENT']; ?>
       
    </div>
    <div class="divider">
    </div>
    <div class="popular--articles">
	
	<?php
//Fetching Popuar Blogs
 $query = "SELECT * FROM `blog` where `blogtype` = 'popularity' order by `id` desc LIMIT 4 ";
			if($result = mysqli_query($dbconn,$query)){
				$populardest;
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$populardest[] = array(
							
							'ID'			=>	$row['id'],
							'PATH' 			=> 	$row['imgpath'],
							'AUTHOR' 	=> 	$row['author'],
							'ABOUT' 	=> 	$row['about'],
							'CONTENT' 	=> 	$row['content'],
							'THUMB' 	=> 	$row['thumb']
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}

?>
        <h4>Popular Blogs</h4>
        <!-- Elements are divided into three li's -->
        <li>
            <div class="teaser-article">
                <img src="<?php echo $populardest[0]['THUMB']; ?>" alt="">
                <div class="teaser--div">
                    <h3><?php echo $populardest[0]['ABOUT']; ?></h3>
                    <a href="blog_landing.php?bid=<?php echo $populardest[0]['ID']; ?>">Read more</a>
                </div>
            </div>
            <div class="teaser-article">
                <img src="<?php echo $populardest[1]['THUMB']; ?>" alt="">
                <div class="teaser--div">
                    <h3><?php echo $populardest[1]['ABOUT']; ?></h3>
                    <a href="blog_landing.php?bid=<?php echo $populardest[1]['ID']; ?>">Read more</a>
                </div>
            </div>
            <div class="teaser-article">
                <img src="<?php echo $populardest[2]['THUMB']; ?>" alt="">
                <div class="teaser--div">
                    <h3><?php echo $populardest[2]['ABOUT']; ?></h3>
                    <a href="blog_landing.php?bid=<?php echo $populardest[2]['ID']; ?>">Read more</a>
                </div>
            </div>
           <div class="teaser-article">
                <img src="<?php echo $populardest[3]['THUMB']; ?>" alt="">
                <div class="teaser--div">
                    <h3><?php echo $populardest[3]['ABOUT']; ?></h3>
                    <a href="blog_landing.php?bid=<?php echo $populardest[3]['ID']; ?>">Read more</a>
                </div>
            </div>
        </li>
		
	</div>	
<?php
	require_once('home/common/footer.fly');
?>
</body>

</html>