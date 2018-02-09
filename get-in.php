<?php 
	ob_start();	
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
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="libraries/owl.carousel.min.js"></script>
    <script src="libraries/js/main.js"></script>
    <!--[if IE]>
        <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <![endif]-->
</head>

<body>
   <?php require_once('home/components/secondaryheader.fly');//adding secondary header ?>
    <div class="get--in">
        <div class="left center">
            <img src="./assets/centre-design/gather.png" alt="">
            <p class="center register--get">We are gathering some content.</p>
            <p class="center sign--get remove">Sign in for Deals and mantain your Account.</p>
        </div>
		
		
        <div class="right">
		
            <p class="enabled sign">Sign In</p>
            <p class="disabled sign--up">Register</p>
            <div class="sign--in">
			 <form action="" method ="POST">
                <ul class="form">
                    <li>
                        <label for="">Email</label>

                        <div class="inp">
                            <img src="./assets/icons/social/mail.svg" alt="">
                            <input class="input-field" placeholder="Placeholder text" name="usernametxtbox" required type="email">
                        </div>
						<?php 
							
							
				
						 ?>
                        <span class="error">This is not a valid E-mail</span>
                    </li>
                    <li>
                        <label for="">Password</label>

                        <div class="inp">
                            <img src="./assets/icons/social/key.svg" alt="">
                            <input class="input-field" placeholder="Fill in your password" name="passwrdtxtbox" required type="password">
                        </div>
                        <span class="error">This is not a valid E-mail</span>
                    </li>
                </ul>
                <input class="submit log--in" type="submit" name="btn">
				</form>
				
				<div> <!--Login error message (like Invalid Login here)-->
				<?php 	
					require_once('home/components/val.php');
					 //Authentication module
					require_once('home/components/authenticate.php');
				?>
				</div>
            </div>
            <div class="register">
			<form action="" method="post">
                <div class="container">
                    <ul class="form">
                        <li>
                            <label for="">Enter your Name</label>
                            <div class="inp">
                                <img src="./assets/icons/social/user.svg" alt="">
                                <input class="input-field" placeholder="Placeholder text" required type="text" name="Username">
                            </div>
                        </li>
                        <li>
                            <label for="">Enter your Email</label>
                            <div class="inp">
                                <img src="./assets/icons/social/mail.svg" alt="">
                                <input class="input-field" placeholder="Placeholder text" required type="email" name="Email">
                            </div>
                        </li>
                        <li>
                            <label for="">Enter desired password</label>
                            <div class="inp">
                                <img src="./assets/icons/social/key.svg" alt="">
                                <input class="input-field" placeholder="Fill in your password" required type="password" name="Password">
                            </div>
                        </li>
                        <li>
                            <label for="">Re-Enter desired password</label>
                            <div class="inp">
                                <img src="./assets/icons/social/key.svg" alt="">
                                <input class="input-field" placeholder="Fill in your password" required type="password" name="CPassword">
                            </div>
                        </li>
                        <li>
                            <label for="">Enter Phone No.</label>
                            <div class="inp">
                                <img src="./assets/icons/social/smartphone.svg" alt="">
                                <input class="input-field" placeholder="Enter Phone" name="phone" required type="phone">
                            </div>
                        </li>
                    </ul>
                </div>
                <input class="submit log--in" type="submit" name="reg">
			</form>
			<div><!--Register error message -->
				<?php
				//Register module
				 require_once('home/components/register.fly');
				?>
			</div>
            </div>
			
        </div>
    </div>
<?php
	require_once('home/common/footer.fly');
?>
 <!-- PopUp wrapper -->
        <div class="pop-up remove">
            <!-- Calling popup from location partial -->
            <?php include_once('location.php'); ?>
       </div>
</body>

</html>
<?php ob_end_flush(); ?>