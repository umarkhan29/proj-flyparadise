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
</head>

<body class="full-width">
<div id="queryresponse">

</div>
<?php include_once('home/ajaxcomponents/getquery.php'); ?>
    <ul class="form">
        <li>
            <label for="">Departure point</label>

            <div class="inp">
                <img src="./assets/icons/social/location.svg" alt="">
                <input class="input-field" id="from_place" placeholder="Placeholder text" type="text">
            </div>
        </li>
        <li>
            <label for="">Arrival at</label>

            <div class="inp">
                <img src="./assets/icons/social/location.svg" alt="">
                <input class="input-field" id="to_loc" placeholder="Placeholder text" type="text">
            </div>
        </li>
        <li>
            <label for="">Enter Phone No.</label>
            <div class="inp">
                <img src="./assets/icons/social/smartphone.svg" alt="">
                <input class="input-field" id="phone" placeholder="Enter Phone" required type="phone">
            </div>
        </li>
        <li>
            <label for="">Enter your Email</label>
            <div class="inp">
                <img src="./assets/icons/social/mail.svg" alt="">
                <input class="input-field" id="email" placeholder="Placeholder text" required type="email">
            </div>
        </li>
    </ul>
    <ul class="depart-date">
        <li><label for="datepicker">Departure date</label>
            <input id="datepicker"  type="date" /></li>
        <li class="day--counter no-of-day">
            <span class="hsidebar">Duration (in nights)</span>
            <input id="counter-no" type="number" min="1" max="30" value="1" />
        </li>

        </form>
    </ul>
    <ul class="hotel radio no-border">
        <li>
            <input type="radio" id="f-option" value="Honeymoon" name="selector">
            <label for="f-option">Honeymoon</label>

            <div class="check"></div>
        </li>

        <li>
            <input type="radio" id="s-option" value="Solo" name="selector">
            <label for="s-option">Solo</label>

            <div class="check">
                <div class="inside"></div>
            </div>
        </li>

        <li>
            <input type="radio" id="t-option" value="Family" name="selector">
            <label for="t-option">Family</label>

            <div class="check">
                <div class="inside"></div>
            </div>
        </li>
        <li>
            <input type="radio" id="w-option" value="Weekend" name="selector">
            <label for="w-option">Weekend</label>

            <div class="check">
                <div class="inside"></div>
            </div>
        </li>
        <li>
            <input type="radio" id="x-option" value="Friends" name="selector">
            <label for="x-option">Friends</label>

            <div class="check">
                <div class="inside"></div>
            </div>
        </li>
    </ul>
    <button class="cta" type="submit" value="Curate my package" onClick="getquery('queryresponse');">Curate my Package</button>
</body>

</html>