<?php
	include_once('home/catalog/connect.khan');
	include_once('home/catalog/session.khan');
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
	  
	  <?php
	  	//loading vaidation component
	  	require_once('home/components/val.php');

	  ?>
		
		
        <div id="main" class="register">
			<form action="" method="post">
            <div class="container">
                <ul class="form">
                    <li>
                        <label for="">Enter your Name</label>
                        <div class="inp">
                            <img src="./assets/icons/social/user.svg" alt="">
                             <input class="input-field" placeholder="Fill in your Name" required type="text" name="Username">
                        </div>
						<span class="error"><?php if(isset($_POST['Username'])) val_name($_POST['Username']); ?></span>
                    </li>
                    <li>
                        <label for="">Enter your Email</label>
                        <div class="inp">
                            <img src="./assets/icons/social/mail.svg" alt="">
                           <input class="input-field" placeholder="Fill in your Email" required type="email" name="Email">
                        </div>
						<span class="error"><?php if(isset($_POST['email'])) val_email($_POST['email']); ?></span>
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
						 <span class="error">
							 <?php 
							 if(isset($_POST['CPassword'])){
							 	if($_POST['Password'] != $_POST['CPassword']){
									echo "Password do not match";
									$GLOBALS['__ValFlag']="0";
								}
							}
							 ?>
						 </span>
                    </li>
                    <li>
                        <label for="">Enter Phone No.</label>
                        <div class="inp">
                            <img src="./assets/icons/social/smartphone.svg" alt="">
                             <input class="input-field" placeholder="Enter Phone" name="phone" required type="phone">
							 <span class="error"><?php if(isset($_POST['phone'])) val_phone($_POST['phone']); ?></span>
                        </div>
                    </li>
                </ul>
                <input class="submit log--in" type="submit" name="reg">
            </div>
			</form>
        </div>
    </div>
	
	<?php
		//Register module
		require_once('home/components/register.fly');
	?>
    <div class="discl acc">
        Already have an account, <a href="get-in">Sign In</a> here
    </div>
    <div class="discl">
        By clicking Submit, you agree to our <a href="#">Terms</a> and confirm that you have read our <a href="#">Privacy Policy</a>, including our <a href="">Cookie</a> Use Policy.
    </div>

<?php
	require_once('home/common/footer.fly');
	ob_end_flush();
?>
 <!-- PopUp wrapper -->
        <div class="pop-up remove">
            <!-- Calling popup from location partial -->
            <?php include_once('location.php'); ?>
       </div>
</body>

</html>