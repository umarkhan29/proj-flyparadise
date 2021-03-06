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
?>

<?php
//Fetching the blog
 $query = "SELECT * FROM `blog` WHERE `id` = 48";
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
        <h2 class="blog--title"><?php echo $populardest[0]['ABOUT']; ?></h2>
        <div class="blog-author">
            <a href="#"><?php echo $populardest[0]['AUTHOR']; ?></a>
        </div>
        <div class="prev--next">
            <div class="prev">Back to blogs</div>
            <div class="next">Next blog</div>
        </div>
    </header>
    <div class="blog--landing-text">
	

        <div>
            <div class="testimonial-quote group">
                <blockquote>
                    <p>Overall, fantastic! I'd recommend them to anyone looking for a creative, thoughtful, and professional team.�</p>
                </blockquote>
            </div>

        </div>
        <p>
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
            content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
            Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        </p>
        <p>
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
            content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
            Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        </p>
        <img src="./assets/blogs/particular-blog/test.png" alt="">
        <p>
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
            content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
            Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        </p>
        <p>
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
            content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
            Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        </p>
        <div class="video--embed">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/H3fLpHEHFEU?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>
        <p>
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
            content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
            Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        </p>
        <div class="testimonial-quote group">
            <blockquote>
                <p>Overall, fantastic! I'd recommend them to anyone looking for a creative, thoughtful, and professional team.�</p>
            </blockquote>
        </div>
        <p>
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
            content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
            Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        </p>
    </div>
    <div class="divider">
    </div>
    <div class="popular--articles">
        <h4>Popular Blogs</h4>
        <!-- Elements are divided into three li's -->
        <li>
            <div class="teaser-article">
                <img src="./assets/blogs/thumbs/thumb.png" alt="">
                <div class="teaser--div">
                    <h3>This is a teaser title</h3>
                    <a href="">Read more</a>
                </div>
            </div>
            <div class="teaser-article">
                <img src="./assets/blogs/thumbs/thumb.png" alt="">
                <div class="teaser--div">
                    <h3>This is a teaser title</h3>
                    <a href="">Read more</a>
                </div>
            </div>
            <div class="teaser-article">
                <img src="./assets/blogs/thumbs/thumb.png" alt="">
                <div class="teaser--div">
                    <h3>This is a teaser title</h3>
                    <a href="">Read more</a>
                </div>
            </div>
            <div class="teaser-article">
                <img src="./assets/blogs/thumbs/thumb.png" alt="">
                <div class="teaser--div">
                    <h3>This is a teaser title</h3>
                    <a href="">Read more</a>
                </div>
            </div>
        </li>
</body>

</html>