<?php
	
	require_once('home/catalog/connect.khan');
	require_once('home/catalog/session.khan');
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About | Fly Paradise</title>
	<link rel="shortcut icon" type="image/png" sizes="32x32" href="assets/heros/favicon-flyparadise.png" />
    <link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width">
    <!--Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="libraries/owl.carousel.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="libraries/js/main.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCotB6BSKESLUC2dNLnAT76EporwJBXMN4&v=3.exp&libraries=places"></script>
	<script src="libraries/js/select2dec.js"></script>
    <!--[if IE]>
        <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <![endif]-->
</head>

<body>
     <?php require_once('home/components/secondaryheader.fly');//adding secondary header ?>
	 
	<div id="main"> 
    <div class="about--cover">
        <img class="cover" src="./assets/centre-design/about-cover.jpg" alt="">
        <div class="about-text">
            <h2>engaging professionals!</h2>
            <span>We are bunch of professionals who are enthusiastic about travel, technology and what not. We are travellers at heart and know how travellers want their journeys to be. 
            </span>
        </div>
    </div>
    <div class="how-we-work">
        <h3>Brewing new destination for all</h3>
        <p>Started in 2010 fall, being another travel corporate, we were not clear on goals. But with time, meeting lot of people, making friends, leaving memories and travelling together with customers.
            We are now at a point where our vision and thoughts are changed from being a travel company to <b>Travel Doctor</b>.
        </p>
        <p>
                we are a 5 star rated travel company and we are sure with our continuous improved services we will stay same and be on top of services that we cater.  We have satisfied more than 100 thousand friends. For us our clients are our friends because meeting and connecting diversity of people makes us what we are today.
        </p>
        <div class="working">
            <img src="./assets/icons/one.png" alt="">
            <div>
                <h2>Pay less to travel the worlds</h2>
                <p>Fly Paradise offers flexible pricing plans and cater to suit your needs - If You're looking for an enriched cultural adventure, leave it to us.</p>
            </div>
        </div>
        <div class="working">
            <img src="./assets/icons/two.png" alt="">
            <div>
                <h2>Prices you cant Beat</h2>
                <p>We have an experience of over 8 years in creating tailor-made trips with comprehensive services and an excelent reputation under the normal prices belt. Fly paradise are here to make your trip as cheaper as possible.</p>
            </div>
        </div>
        <div class="working">
            <img src="./assets/icons/six.png" alt="">
            <div>
                <h2>More than 1 Lakh happy customers</h2>
                <p>Most Importantly, our trips are fun, memorable and crafted with care. We treat our customers as friends and we always value friendship more than anything.</p>
            </div>
        </div>
        <div class="working">
            <img src="./assets/icons/three.png" alt="">
            <div>
                <h2>Change bookings anytime</h2>
                <p>You can make changes, send a request or cancel in just a few clicks without any extra cost!</p>
            </div>
        </div>
        <div class="working">
            <img src="./assets/icons/four.png" alt="">
            <div>
                <h2>Countless reviews to trust from</h2>
                <p>Real Guests, Real stays. Only legitimate options that will help you make the right choice.</p>
            </div>
        </div>
        <div class="working">
            <img src="./assets/icons/five.png" alt="">
            <div>
                <h2>24 x 7 support</h2>
                <p>Find answers, edit your bookings and more in out Help centre. Our support team is fast as light and we love to hear our friends.</p>
            </div>
        </div>
    </div>
	</div>
   <?php
	require_once('home/common/footer.fly');
	
?>
</body>

</html>