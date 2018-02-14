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
					 
				?>
                    <ul class="form">
                        <li>
                            <label for="">Email</label>

                            <div class="inp">
                                <img src="./assets/icons/social/mail.svg" alt="">
                                 <input class="input-field" placeholder="Fill in your Email" name="usernametxtbox" required type="email">
                            </div>
                            <span class="error"><?php if(isset($_POST['usernametxtbox'])) val_email($_POST['usernametxtbox']); ?></span>
                        </li>
                        <li>
                            <label for="">Password</label>

                            <div class="inp">
                                <img src="./assets/icons/social/key.svg" alt="">
                       
								<input class="input-field" placeholder="Fill in your password" name="passwrdtxtbox" required type="password">
                            </div>
                            <span class="error"></span>
                        </li>
                    </ul>
                    <input class="submit log--in" type="submit" name="btn">
					<?php 	
						 //Authentication module
						require_once('home/components/authenticate.php');
					?>
                </div>
			</form>
            </div>
        </div>
    </div>
    </div>
    <div class="discl acc">
        Dont have account, <a href="register">Register</a> here
    </div>
    <div class="discl">
        By clicking Submit, you agree to our <a href="#">Terms</a> and confirm that you have read our <a href="#">Privacy Policy</a>, including our <a href="">Cookie</a> Use Policy.
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