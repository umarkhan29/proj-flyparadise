<?php
	include_once('home/catalog/connect.khan');
	include_once('home/catalog/session.khan');
	include_once('home/components/int2txt.fly');
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
    <meta name="viewport" content="width=device-width">
    <!--Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="libraries/owl.carousel.min.js"></script>
    <script src="libraries/js/main.js"></script>
    <script src="libraries/js/select2dec.js"></script>
    <!--[if IE]>
        <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <![endif]-->
</head>

<body>
     <?php require_once('home/components/secondaryheader.fly');//adding secondary header ?>
        <div id="main" class="get--in">
            <div>
			<form action="" method ="POST">
                <div class="sign--in">
				<?php 	
					require_once('home/components/val.php');
					 //Authentication module
					require_once('home/components/authenticate.php');
				?>
                    <ul class="form">
                        <li>
                            <label for="">Email</label>

                            <div class="inp">
                                <img src="./assets/icons/social/mail.svg" alt="">
                                 <input class="input-field" placeholder="Fill in your Email" name="usernametxtbox" required type="email">
                            </div>
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
                </div>
			</form>
            </div>
        </div>
    </div>
    </div>
    <div class="discl acc">
        Dont have account, <a href="#">Register</a> here
    </div>
    <div class="discl">
        By clicking Submit, you agree to our <a href="#">Terms</a> and confirm that you have read our <a href="#">Privacy Policy</a>, including our <a href="">Cookie</a> Use Policy.
    </div>
    <footer>
        <div class="secondary--footer">
            <div class="sec-ftr">
                <span>We promise to stay best in class</span>
                <div class="footer-phone">
                    <span class="tel">1800 1000 123</span>
                    <span class="tagl">24/7 Dedicated Support</span>
                </div>
                <div class="quote">Book a destination</div>
            </div>
        </div>
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