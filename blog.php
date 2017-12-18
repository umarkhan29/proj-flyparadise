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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="libraries/owl.carousel.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="libraries/js/main.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!--[if IE]>
            <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
        <![endif]-->
	<?php include_once('home/ajaxcomponents/getblogs.php'); ?>
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
    <div class="blog--landing">
        <div class="hero--blog">
		
		
<?php
//Fetching Featured Blog
 $query = "SELECT * FROM `blog` order by `id` desc LIMIT 1 ";
			if($result = mysqli_query($dbconn,$query)){
				$blog;
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$blog[] = array(
							
							'ID'		=>	$row['id'],
							'PATH' 		=> 	$row['imgpath'],
							'AUTHOR' 	=> 	$row['author'],
							'ABOUT' 	=> 	$row['about'],
							'CONTENT' 	=> 	$row['content'],
							'THUMB' 	=> 	$row['thumb'],
							'TYPE'		=> 	$row['blogtype'],
							'DATE'		=> 	$row['date'],
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}

?>



            <div class="hero--image">
                <p class="tag"><?php echo $blog[0]['TYPE']; ?></p>
                <h2><?php echo $blog[0]['ABOUT']; ?></h2>
                <p class="teaser"><?php echo substr($blog[0]['CONTENT'],3,300); ?> </p>
                <a href="blog_landing.php?bid=<?php echo $blog[0]['ID']; ?>">READ MORE...</a>
            </div>
            <div class="featured--image">
                <img src="<?php echo $blog[0]['PATH']; ?>" alt="">
                <div class="author">
                    <img src="./assets/blogs/author/junaid.jpeg" alt="">
                    <div class="credts">
                        <span class="name"><?php echo $blog[0]['AUTHOR']; ?></span>
                        <span class="date">
							<?php 
								//echo $blog[0]['DATE'];
								$dt = new DateTime($blog[0]['DATE']);
								$date = $dt->format('jS F Y');
								echo $date;
							?>
						</span>
                    </div>
                </div>
                <div class="comments">
                    <img src="./assets/icons/social/comment.svg" alt="">
                    <span>4 Comments</span>
                </div>
            </div>

        </div>
        <div class="search--blog">
            <input class="search" id="blogsearch" type="search" placeholder="Search for Blogs, Stories and More">
            <input class="btn" type="submit" onClick="getsearchblogs('blog');">
        </div>
        <div class="latest--articles">
            <div class="article-top">
                <h4>latest Blogs</h4>
                <div class="select-2--wrapper" onchange="getblogs('blog');">
                    <span onchange="onselect('blog');">Sort by</span>
                    <select class="js-example-basic-single" name="blogsorting" id="" >
                            <option value="1">Popularity</option>
                            <option value="2">Comments</option>
                            <option value="3">Feature</option>
                            <option value="4">Recommendation</option>
                            <option value="5">A-Z</option>
                     </select>
                </div>
            </div>
            <!-- Elements are divided into three li's -->
			
<?php
//Fetching Blogs
 $query = "SELECT * FROM `blog` order by `id` desc LIMIT 6 ";
			if($result = mysqli_query($dbconn,$query)){
				$blogs;
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$blogs[] = array(
							
							'ID'		=>	$row['id'],
							'PATH' 		=> 	$row['imgpath'],
							'AUTHOR' 	=> 	$row['author'],
							'ABOUT' 	=> 	$row['about'],
							'CONTENT' 	=> 	$row['content'],
							'THUMB' 	=> 	$row['thumb'],
							'TYPE'		=> 	$row['blogtype'],
							'DATE'		=> 	$row['date'],
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}
			
			
			//displaying blogs
			
			for($i=0; $i<$count; $i++){
			
?>
	<div id="blog">
            <li>
                <div class="teaser-article border">
                    <img src="<?php echo $blogs[$i]['THUMB']; ?>" alt="">
                    <div class="teaser--div">
                        <h3><?php echo $blogs[$i]['ABOUT']; ?></h3>
                        <p class="teaser"><?php echo $trimtext=substr($blogs[$i]['CONTENT'],3,150); ?></p>
                        <div class="comments">
                            <img src="./assets/icons/social/comment.svg" alt="">
                            <span>22 Comments</span>
                        </div>
                        <div class="author">
                            <img src="./assets/blogs/author/junaid.jpeg" alt="">
                            <div class="credts">
                                <span class="name"><?php echo $blogs[$i]['AUTHOR']; ?></span>
                                <span class="date">
								<?php 
									$dt = new DateTime($blog[0]['DATE']);
									echo $date = $dt->format('jS F Y');
									$i=$i+1;
								?>	
								</span>
                            </div>
                        </div>
                        <img class="sharing" src="./assets/icons/social/share.svg" alt="">
                    </div>
                </div>
				
				<?php if($i!=$count){ ?>
                <div class="teaser-article border">
                    <img src="<?php echo $blogs[$i]['THUMB']; ?>" alt="">
                    <div class="teaser--div">
                        <h3><?php echo $blogs[$i]['ABOUT']; ?></h3>
                        <p class="teaser"><?php echo $trimtext=substr($blogs[$i]['CONTENT'],3,150); ?></p>
                        <div class="comments">
                            <img src="./assets/icons/social/comment.svg" alt="">
                            <span>22 Comments</span>
                        </div>
                        <div class="author">
                            <img src="./assets/blogs/author/junaid.jpeg" alt="">
                            <div class="credts">
                                <span class="name"><?php echo $blogs[$i]['AUTHOR']; ?></span>
                                <span class="date">
								<?php 
									$dt = new DateTime($blog[0]['DATE']);
									echo $date = $dt->format('jS F Y');
								?>	
								</span>
                            </div>
                        </div>
                        <img class="sharing" src="./assets/icons/social/share.svg" alt="">
                    </div>
                </div>
					<?php } //closing if ?>
            </li>
         <?php } ?> 
	
		</div>
		</div>
		</div>	
        </div>
        <div class="full--width-max">
            <div>
                <p>
                    Travelling leaves you speechless, Then turns you into a storyteller.
                </p>
                <a href="#">Be a Storyteller</a>
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