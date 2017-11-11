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
<?php 
	include_once('home/catalog/connect.khan');
	include_once('home/catalog/session.khan');		
?>
    <div class="blog--landing">
        <div class="hero--blog">
<?php
//Fetching Featured Blog
 $query = "SELECT * FROM `blog` WHERE `blogtype` = 'featured' order by `id` desc LIMIT 1 ";
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
            <div class="hero--image">
                <p>Featured Blog</p>
                <h2><?php echo $populardest[0]['ABOUT']; ?></h2>
                <p class="teaser"><?php //echo $populardest[0]['CONTENT']; ?>
				It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using
                    'Content here.</p>
                <a href="blog_landing.php?bid=<?php echo $populardest[0]['ID']; ?>">READ MORE...</a>
            </div>
            <img src="<?php echo $populardest[0]['PATH']; ?>" alt="">
        </div>
        <div class="divider">
        </div>
        <div class="latest--articles">
            <h4>latest Blogs</h4>
            <!-- Elements are divided into three li's -->

<?php
//Fetching Blogs
 $query = "SELECT * FROM `blog` order by `id` desc LIMIT 9 ";
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

			<?php 
				for($i=0; $i<$count; $i++){
			?>
				<li>
					<div class="teaser-article">
						<img src="<?php echo $populardest[$i]['THUMB']; ?>" alt="">
						<div class="teaser--div">
							<h3><?php echo $populardest[$i]['ABOUT']; ?></h3>
							<a href="blog_landing.php?bid=<?php echo $populardest[$i]['ID']; ?>">Read more</a>
						</div>
					</div>
					<div class="teaser-article">
						<img src="<?php $i++; echo $populardest[$i]['THUMB']; ?>" alt="">
						<div class="teaser--div">
							<h3><?php echo $populardest[$i]['ABOUT']; ?></h3>
							<a href="blog_landing.php?bid=<?php echo $populardest[$i]['ID']; ?>">Read more</a>
						</div>
					</div>
					<div class="teaser-article">
						<img src="<?php $i++; echo $populardest[$i]['THUMB']; ?>" alt="">
						<div class="teaser--div">
							<h3><?php echo $populardest[$i]['ABOUT']; ?></h3>
							<a href="blog_landing.php?bid=<?php echo $populardest[$i]['ID']; ?>">Read more</a>
						</div>
					</div>
				</li>
            <?php } ?>
        </div>
    </div>
</body>

</html>