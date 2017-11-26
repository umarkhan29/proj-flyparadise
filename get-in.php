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
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="libraries/owl.carousel.min.js"></script>
    <script src="libraries/js/main.js"></script>
    <!--[if IE]>
        <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <![endif]-->
	<?php include_once('home/components/googleloginheader.khan'); ?>
</head>

<body>
    <div class="get--in">
        <div class="left center">
            <img src="./assets/centre-design/gather.png" alt="">
            <p class="center register--get">We are gathering some content.</p>
            <p class="center sign--get remove">Sign in for Deals and mantain your Account.</p>
        </div>
        <div class="right">
            <p class="enabled sign">Sign In</p>
            <p class="disabled sign--up">Register</p>
            <form action="" method ="POST">
				<div class="sign--in">
				<?php require_once('home/components/val.php');
				
					  //Authentication module
					  require_once('home/components/authenticate.php');
				
				 ?>
					<div class="container">
						<div class="col-3 input-effect">
							<input class="effect-17" type="email" placeholder="" name="usernametxtbox">
							<label>Enter Email</label>
							<span class="focus-border"></span>
						</div>
						<div class="col-3 input-effect">
							<input class="effect-17" type="password" placeholder="" name="passwrdtxtbox">
							<label>Enter Password</label>
							<span class="focus-border"></span>
						</div>
					</div>
					<input class="submit log--in" type="submit" name="btn">
				</div>
			</form>
			
			
			<form action="" method ="POST">
				<div class="register">
				<?php
				//Authentication module
				 require_once('home/components/register.khan');
				?>
					<div class="container">
						<div class="col-3 input-effect">
							<input class="effect-17" type="text" placeholder="" name="Username">
							<label>Enter name</label>
							<span class="focus-border"></span>
						</div>
						<div class="col-3 input-effect">
							<input class="effect-17" type="email" placeholder="" name="Email">
							<label>Enter email</label>
							<span class="focus-border"></span>
						</div>
						<div class="col-3 input-effect">
							<input class="effect-17" type="password" placeholder="" name="Password">
							<label>Enter desired Password</label>
							<span class="focus-border"></span>
						</div>
						<div class="col-3 input-effect">
							<input class="effect-17" type="password" placeholder="" name="CPassword">
							<label>Re-enter desired Password</label>
							<span class="focus-border"></span>
						</div>
					</div>
					<input class="submit log--in" type="submit" name="reg">
				</div>
				
			</form>
        </div>
    </div>
<div class="g-signin2" data-onsuccess="onSignIn"></div>

</body>

</html>