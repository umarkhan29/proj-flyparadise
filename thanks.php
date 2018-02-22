<?php
	require_once('home/catalog/connect.khan');
	require_once('home/catalog/session.khan');
	error_reporting(0);
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    <script src="https://use.fontawesome.com/441c105168.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="libraries/owl.carousel.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="libraries/js/main.js"></script>
    <script src="libraries/js/select2dec.js"></script>
    <!--[if IE]>
                <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
            <![endif]-->
</head>

<body>
    <?php require_once('home/components/secondaryheader.fly');//adding secondary header ?>
        <div class="recieved" id="main">
		<?php require_once('home/components/__GetQuery.php');
			if(!empty($_POST['phone'])){
		 ?>
            <div class="border">
                <img src="./assets/heros/tick.png" alt="">
                <p>Thanks,</p>
                <p>We have recieved your interest in visiting <span><?php echo $to; ?></span></p>
                <p>We know you are excited to visit <span><?php echo $to; ?></span></p>
                <p>We are curating best package for you and will be contacting you sooner regarding same.</p>
                <p>Your info ID is <span><?php echo $tripid; ?></span> </p>
            </div>
			<?php } ?>
            <div class="th">
                <p><?php if(!empty($_POST['phone'])) echo "Meanwhile, "?> You can look for best offers for following destinations in this peak season</p>
                <a class="quote" href="https://flyparadise.in/ladakh">Ladakh</a>
                <a class="quote" href="https://flyparadise.in/kashmir">Kashmir</a>
            </div>
        </div>
    </div>
  
<?php
	
	require_once('home/common/footer.fly');
?>

</body>

</html>