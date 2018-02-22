
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
    <script src="libraries/js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCotB6BSKESLUC2dNLnAT76EporwJBXMN4&v=3.exp&libraries=places"></script>
	<script src="libraries/js/select2dec.js"></script>
	<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/0a36a9eded6bcb08c52ae527b/d0a0689c99e0088008a7127df.js");</script>
    <!--[if IE]>
            <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
        <![endif]-->
	
</head>

<body class="destination">
    <header class="alternate desktop--only">
        <div class="main--header">
            <div class="menu--heading">
                <h1 class="logo left">fly paradise</h1>
                <img class="fp--logo" src="./assets/heros/logo.svg" alt="Fly Paradise logo">
                <div class="main-menu right">
					
                    <li><a href="blog">Blog</a></li>
                    <li><a href="about">About Us</a></li>
					 <li><a href="get-in">Login</a></li>
                    <li class="quote">FREE QUOTE</li>
					
                </div>
            </div>
        </div>

    </header>
    <div id="mobile-menu--wrapper">
        <div class="mobile--only mobile--head">
            <header id="header-mobile">
                <ul id="brg-menu">
                    <li></li>
                    <li></li>
                    <li></li>
					 
                </ul>
                <div class="brand-logo">
                    <img class="fp--logo" src="./assets/heros/logo_m.svg" alt="Fly Paradise logo" class="quote">
                </div>
                <div class="login_m">
                    <img src="./assets/icons/log-in.svg" alt="" class="customise">
                </div>
            </header>

            <nav id="nav" role="navigation">
               <li><a href="blog">Blog</a></li>
				<li><a href="about">About Us</a></li>
				<li><a href="get-in">Login</a></li>
                    
            </nav>
        </div>	
	
    <div id="main" class="destination--hero">
        <div class="left--destination">
            <span class="location"></span>
            <h2>Kashmir</h2>
            <span>Best package , testing here</span>
            <div class="map">
               <a href="#distancetimeblock"> <img class="map" src="./assets/icons/transport/placeholder.svg" alt="" ></a>
            </div>
            <div class="info">
              <ul class="transportation">
			  	                    <span>Links to destination:</span>
											<img class="air" src="./assets/icons/transport/airplane.svg" alt="Air Transport">																		 
						
																							 <img class="road" src="./assets/icons/transport/bus.svg" alt="Bus Transport">						 
						
																													<img class="rail" src="./assets/icons/transport/train.svg" alt="Train Transport"> 
						
					                  
                </ul>
                <ul>
				                    <span>Worth Watching:</span>
											<li>Forests</li> 
						
											<li> islanda</li> 
						
											<li> Hills</li> 
						
											<li> Beauty Scenes</li> 
						
					 
			    </ul>
				
                <ul>
				                    <span>Getaways:</span>
                    						<li>Tea</li> 
						
											<li> Coffee</li> 
						
											<li> salt</li> 
						
					 
                </ul>
            </div>
        </div>
        <div class="right--destination">
            <img src="images/destinations/Kashmir101-book-talk-outdoors-nature-neuroscience.jpg" alt="">
			 <div class="temprature">
			             </div>
            <div class="overlay">
                <span class="weather">

                </span>

            </div>
        </div>
    </div>
   
   <div class="destination--info">
        <div class="dest">
            <h3></h3>
            <p></p>
            <div class="destination-information">
                <img src="images/destinations/Kashmir26905_Ladakh-Pangong-Lake-1024x618.jpg" alt="">
                <div class="accordion">
                    <div class="border">
                        <h4>History of <span>Kashmir</span> </h4>
                            <p class="remove"></p>
                    </div>
                    <div class="border">
                        <h4>Culture in <span>Kashmir</span> </h4>
                        <p class="remove"></p>
                    </div>
                    <div class="border">
                        <h4>Food in <span>Kashmir</span> </h4>
                        <p class="remove"></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
	
	<div class="distance--block" id="distancetimeblock">
		 
<script>
$(document).ready(function(){
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showLocation);
    }else{ 
        $('#location').html('Geolocation is not supported by this browser.');
    }
});


function showLocation(position){
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
   
   //ajax request to fetch distance and time

	var dest="Srinagar";
	var destination="Kashmir";
	
	if(window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById('distancetimeblock').innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open('GET','map/getLocation.php?latitude='+latitude+'&longitude='+longitude+'&dest='+dest+'&destination='+destination,true);
	
	xmlhttp.send();
}
</script>

		 <!--Loading Distance time block -->	
	</div>
 
	
	
	
	
          <div class="destination--packages">
            <div class="sidebar">
                <form class="day--counter" onClick="showpackages('cpackages');" >
                    <span class="hsidebar">Duration (in nights)</span>
                    <input id="counter-no" type="number" min="1" max="30" value="3" />
                </form>
				
				<form class="day--counter" onClick="showpackages('cpackages');" >
                    <span class="hsidebar">No of travellers</span>
                    <input id="traveller-no" type="number" min="1" max="30" value="1" />
                </form>
				
				
                <div >
                    <span class="hsidebar">Categories</span>
                    <label class="control control--checkbox" onClick="showpackages('cpackages');">Honeymoon
                        <input type="checkbox"  name="Honeymoon" checked value="Honeymoon"/>
                        <div class="control__indicator"></div>
                    </label>
                    <label class="control control--checkbox" onClick="showpackages('cpackages');">Solo trip
                        <input type="checkbox" name="Solo" value="Solo"/>
                        <div class="control__indicator"></div>
                    </label>
                    <label class="control control--checkbox" onClick="showpackages('cpackages');">Family and Friends
                        <input type="checkbox" name="Family and Friends" checked value="Family and Friends"/>
                        <div class="control__indicator"></div>
                    </label>
					<label class="control control--checkbox" onClick="showpackages('cpackages');">Adventure
                        <input type="checkbox" name="Adventure" value="Adventure"/>
                        <div class="control__indicator"></div>
                    </label>
					
										<label class="control control--checkbox" onClick="showpackages('cpackages');">Weekend
                        <input id="Weekend" type="checkbox" name="Weekend" value="Weekend"/>
                        <div class="control__indicator"></div>
                    </label>
					                </div>
                <!-- RATING - Form -->
                <form class="rating-form" action="#" method="post" name="rating-movie">
                    <span class="hsidebar">Stay star rating</span>
                    <fieldset class="form-group">
                        <legend class="form-legend">Rating:</legend>
                        <div class="form-item" onClick="showpackages('cpackages');">
                            <input id="rating-5" name="rating" type="radio" value="5" />
                            <label for="rating-5" data-value="5">
                                <span class="rating-star">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star"></i>
                                </span>
                                <span class="ir">5</span>
                            </label>
                            <input id="rating-4" name="rating" type="radio" value="4" />
                            <label for="rating-4" data-value="4">
                                <span class="rating-star">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star"></i>
                                </span>
                                <span class="ir">4</span>
                            </label>
                            <input id="rating-3" name="rating" type="radio" value="3" />
                            <label for="rating-3" data-value="3">
                                <span class="rating-star">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star"></i>
                                </span>
                                <span class="ir">3</span>
                            </label>
                            <input id="rating-2" name="rating" type="radio" value="2" />
                            <label for="rating-2" data-value="2">
                                <span class="rating-star">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star"></i>
                                </span>
                                <span class="ir">2</span>
                            </label>
                            <input id="rating-1" name="rating" type="radio" value="1" />
                            <label for="rating-1" data-value="1">
                                <span class="rating-star">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star"></i>
                                </span>
                                <span class="ir">1</span>
                            </label>
                            <div class="form-action">
                                <input class="btn-reset" type="reset" value="Reset" onClick="showpackages('cpackages');"/>
                            </div>
                            <div class="form-output">
                                ? / 5
                            </div>
                        </div>
                    </fieldset>
                </form>
				<section id="content" class="price--slider">
                    <span class="hsidebar">What is your budget?</span>
                    <div class="cube">

                        <div id="slider-range-min" onClick="showpackages('cpackages');"></div>
                    </div>
                    <input type="text" id="amount" readonly="" onClick="showpackages('cpackages');"/>
                </section>
            </div>
	
	
			
		
            <div class="main--content">
				<div id="cpackages">
					Hotel: 0    Meals: 0   CAB :58500					
						
				<div class="package--tailored">
                    <img src="images/packages/Wanderlust Ladakh1Manali, Ladakh, Kashmir" alt="">
                    <div class="destination--info">
                        <div>
                            <h3>Wanderlust Manali, Ladakh, Kashmir</h3>
                            <span class="duration">10 Days 9 Nights</span>
							<div>
								<div class="price" id="pprice0">Not Avaliable/-</div>
								<div class="perse">(Per <span></span> person)</div>
							</div>
                        </div>
                        <div class="inclusions border">
                   <div class="package--ex"><img src="assets/icons/transport/air.svg" alt="Flights not included" label="Flights not included" > <span>Tickets</span></div><div> <img src="assets/icons/transport/meals.svg" alt="Meals" label="Meals"> <span>Meals</span></div><div><img src="assets/icons/transport/transfer.svg" alt="Cab"><span>Cab</span></div><div><img src="assets/icons/transport/stars.svg" alt="hotel stars"><span>Stay</span></div><div ><img src="assets/icons/transport/view.svg" alt="Site seeing"><span>Siteseeing</span></div><div class="package--ex"><img src="assets/icons/transport/tent.svg" alt="Camping" label="Campingn" ><span>Camping</span></div><div class="package--ex"><img src="assets/icons/transport/tent.svg" alt="Houseboat" label="Houseboat" ><span>Houseboat</span></div><div class="package--ex"><img src="assets/icons/transport/more.svg" alt="Complimentary from destination" label="Compliment" ><span>Compliment</span></div>                        </div>
                       <form class="list hotel radio no-border">
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice0',0);" class="radio"  name="foo0" >
                                                  Budget Stay
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice0',0);" class="radio" name="foo0" checked>
                                                  3 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice0',0);" class="radio" name="foo0" >
                                                  4 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio"  onChange="stay('pprice0',0);"  class="radio" name="foo0" >
                                                  5 star
                                              </label>
                            </li>
                        </form>
						<input type="hidden" id="destinations0" value="Manali, Ladakh, Kashmir" />
						<input type="hidden" id="stays0" value="Sarchu$$$$Leh$$$$Nubra$$$$Leh$$$$Leh$$$$Tso moriri$$$$Leh$$$$Kargil$$$$Srinagar$$$$$$$$" />
						<input type="hidden" id="cp0" value="10000 $$$$ 10000 $$$$ 3850 $$$$ 3850 $$$$ 7800 $$$$ 5500 $$$$ 5500 $$$$ 4000 $$$$ 4000 $$$$ 4000 $$$$ " />
                        <div class="flex">
                            <a class="customise" href="#">Customise</a>
                            <a href="packages/Wanderlust Manali, Ladakh, Kashmir/1" target="_blank"><button class="view--package">View this Package</button></a>
                        </div>
                    </div>
				</div>
					Hotel: 1233    Meals: 250   CAB :200					
						
				<div class="package--tailored">
                    <img src="images/packages/Visit to Kashmir1Kashmir01-book-talk-outdoors-nature-neuroscience.jpg" alt="">
                    <div class="destination--info">
                        <div>
                            <h3>Visit to Kashmir</h3>
                            <span class="duration">2 Days 1 Nights</span>
							<div>
								<div class="price" id="pprice1">2019.6/-</div>
								<div class="perse">(Per <span></span> person)</div>
							</div>
                        </div>
                        <div class="inclusions border">
                   <div class="package--ex"><img src="assets/icons/transport/air.svg" alt="Flights not included" label="Flights not included" > <span>Tickets</span></div><div> <img src="assets/icons/transport/meals.svg" alt="Meals" label="Meals"> <span>Meals</span></div><div><img src="assets/icons/transport/transfer.svg" alt="Cab"><span>Cab</span></div><div><img src="assets/icons/transport/stars.svg" alt="hotel stars"><span>Stay</span></div><div class="package--ex"><img src="assets/icons/transport/view.svg" alt="Stay not included" label="Siteseeing not included" ><span>Siteseeing</span></div><div class="package--ex"><img src="assets/icons/transport/tent.svg" alt="Camping" label="Campingn" ><span>Camping</span></div><div class="package--ex"><img src="assets/icons/transport/tent.svg" alt="Houseboat" label="Houseboat" ><span>Houseboat</span></div><div><img src="assets/icons/transport/more.svg" alt="Complimentary from destination" ><span>Compliment</span></div>                        </div>
                       <form class="list hotel radio no-border">
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice1',1);" class="radio"  name="foo1" >
                                                  Budget Stay
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice1',1);" class="radio" name="foo1" checked>
                                                  3 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice1',1);" class="radio" name="foo1" >
                                                  4 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio"  onChange="stay('pprice1',1);"  class="radio" name="foo1" >
                                                  5 star
                                              </label>
                            </li>
                        </form>
						<input type="hidden" id="destinations1" value="Kashmir" />
						<input type="hidden" id="stays1" value="Srinagar$$$$Gulmarg$$$$" />
						<input type="hidden" id="cp1" value="100 $$$$ 100 $$$$ " />
                        <div class="flex">
                            <a class="customise" href="#">Customise</a>
                            <a href="packages/Visit to Kashmir/1" target="_blank"><button class="view--package">View this Package</button></a>
                        </div>
                    </div>
				</div>
					Hotel: 0    Meals: 0   CAB :32300					
						
				<div class="package--tailored">
                    <img src="images/packages/Discover Ladakh1Srinagar, Ladakh" alt="">
                    <div class="destination--info">
                        <div>
                            <h3>Discover Kashmir, Ladakh</h3>
                            <span class="duration">7 Days 6 Nights</span>
							<div>
								<div class="price" id="pprice2">Not Avaliable/-</div>
								<div class="perse">(Per <span></span> person)</div>
							</div>
                        </div>
                        <div class="inclusions border">
                   <div class="package--ex"><img src="assets/icons/transport/air.svg" alt="Flights not included" label="Flights not included" > <span>Tickets</span></div><div> <img src="assets/icons/transport/meals.svg" alt="Meals" label="Meals"> <span>Meals</span></div><div><img src="assets/icons/transport/transfer.svg" alt="Cab"><span>Cab</span></div><div><img src="assets/icons/transport/stars.svg" alt="hotel stars"><span>Stay</span></div><div ><img src="assets/icons/transport/view.svg" alt="Site seeing"><span>Siteseeing</span></div><div class="package--ex"><img src="assets/icons/transport/tent.svg" alt="Camping" label="Campingn" ><span>Camping</span></div><div class="package--ex"><img src="assets/icons/transport/tent.svg" alt="Houseboat" label="Houseboat" ><span>Houseboat</span></div><div class="package--ex"><img src="assets/icons/transport/more.svg" alt="Complimentary from destination" label="Compliment" ><span>Compliment</span></div>                        </div>
                       <form class="list hotel radio no-border">
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice2',2);" class="radio"  name="foo2" >
                                                  Budget Stay
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice2',2);" class="radio" name="foo2" checked>
                                                  3 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice2',2);" class="radio" name="foo2" >
                                                  4 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio"  onChange="stay('pprice2',2);"  class="radio" name="foo2" >
                                                  5 star
                                              </label>
                            </li>
                        </form>
						<input type="hidden" id="destinations2" value="Kashmir, Ladakh" />
						<input type="hidden" id="stays2" value="Kargil$$$$Leh$$$$Leh$$$$Nubra$$$$Pangong$$$$Leh$$$$$$$$" />
						<input type="hidden" id="cp2" value="6500 $$$$ 6500 $$$$ 2200 $$$$ 5500 $$$$ 5500 $$$$ 5500 $$$$ 600 $$$$ " />
                        <div class="flex">
                            <a class="customise" href="#">Customise</a>
                            <a href="packages/Discover Kashmir, Ladakh/1" target="_blank"><button class="view--package">View this Package</button></a>
                        </div>
                    </div>
				</div>
					Hotel: 0    Meals: 0   CAB :30300					
						
				<div class="package--tailored">
                    <img src="images/packages/Heaven to Paradise1Ladakh, Kashmir635982646968672800-1766933105_fresh_nature-1280x72" alt="">
                    <div class="destination--info">
                        <div>
                            <h3>Heaven to Paradise</h3>
                            <span class="duration">8 Days 7 Nights</span>
							<div>
								<div class="price" id="pprice3">Not Avaliable/-</div>
								<div class="perse">(Per <span></span> person)</div>
							</div>
                        </div>
                        <div class="inclusions border">
                   <div class="package--ex"><img src="assets/icons/transport/air.svg" alt="Flights not included" label="Flights not included" > <span>Tickets</span></div><div> <img src="assets/icons/transport/meals.svg" alt="Meals" label="Meals"> <span>Meals</span></div><div><img src="assets/icons/transport/transfer.svg" alt="Cab"><span>Cab</span></div><div><img src="assets/icons/transport/stars.svg" alt="hotel stars"><span>Stay</span></div><div ><img src="assets/icons/transport/view.svg" alt="Site seeing"><span>Siteseeing</span></div><div class="package--ex"><img src="assets/icons/transport/tent.svg" alt="Camping" label="Campingn" ><span>Camping</span></div><div class="package--ex"><img src="assets/icons/transport/tent.svg" alt="Houseboat" label="Houseboat" ><span>Houseboat</span></div><div class="package--ex"><img src="assets/icons/transport/more.svg" alt="Complimentary from destination" label="Compliment" ><span>Compliment</span></div>                        </div>
                       <form class="list hotel radio no-border">
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice3',3);" class="radio"  name="foo3" >
                                                  Budget Stay
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice3',3);" class="radio" name="foo3" checked>
                                                  3 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice3',3);" class="radio" name="foo3" >
                                                  4 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio"  onChange="stay('pprice3',3);"  class="radio" name="foo3" >
                                                  5 star
                                              </label>
                            </li>
                        </form>
						<input type="hidden" id="destinations3" value="Ladakh, Kashmir" />
						<input type="hidden" id="stays3" value="Leh$$$$Leh$$$$Hunder$$$$Leh$$$$Leh$$$$Kargil$$$$Srinagar$$$$$$$$" />
						<input type="hidden" id="cp3" value="600 $$$$ 2200 $$$$ 3850 $$$$ 3850 $$$$ 7800 $$$$ 4000 $$$$ 4000 $$$$ 4000 $$$$ " />
                        <div class="flex">
                            <a class="customise" href="#">Customise</a>
                            <a href="packages/Heaven to Paradise/1" target="_blank"><button class="view--package">View this Package</button></a>
                        </div>
                    </div>
				</div>
					Hotel: 0    Meals: 0   CAB :50200					
						
				<div class="package--tailored">
                    <img src="images/packages/Formidable Ladakh1Kashmir, Ladakh, Manali" alt="">
                    <div class="destination--info">
                        <div>
                            <h3>Formidable Kashmir, Ladakh, Manali</h3>
                            <span class="duration">8 Days 7 Nights</span>
							<div>
								<div class="price" id="pprice4">Not Avaliable/-</div>
								<div class="perse">(Per <span></span> person)</div>
							</div>
                        </div>
                        <div class="inclusions border">
                   <div class="package--ex"><img src="assets/icons/transport/air.svg" alt="Flights not included" label="Flights not included" > <span>Tickets</span></div><div> <img src="assets/icons/transport/meals.svg" alt="Meals" label="Meals"> <span>Meals</span></div><div><img src="assets/icons/transport/transfer.svg" alt="Cab"><span>Cab</span></div><div><img src="assets/icons/transport/stars.svg" alt="hotel stars"><span>Stay</span></div><div ><img src="assets/icons/transport/view.svg" alt="Site seeing"><span>Siteseeing</span></div><div class="package--ex"><img src="assets/icons/transport/tent.svg" alt="Camping" label="Campingn" ><span>Camping</span></div><div class="package--ex"><img src="assets/icons/transport/tent.svg" alt="Houseboat" label="Houseboat" ><span>Houseboat</span></div><div class="package--ex"><img src="assets/icons/transport/more.svg" alt="Complimentary from destination" label="Compliment" ><span>Compliment</span></div>                        </div>
                       <form class="list hotel radio no-border">
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice4',4);" class="radio"  name="foo4" >
                                                  Budget Stay
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice4',4);" class="radio" name="foo4" checked>
                                                  3 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice4',4);" class="radio" name="foo4" >
                                                  4 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio"  onChange="stay('pprice4',4);"  class="radio" name="foo4" >
                                                  5 star
                                              </label>
                            </li>
                        </form>
						<input type="hidden" id="destinations4" value="Kashmir, Ladakh, Manali" />
						<input type="hidden" id="stays4" value="Kargil$$$$Leh$$$$Leh$$$$Nubra$$$$Pangong$$$$Leh$$$$Sarchu$$$$$$$$" />
						<input type="hidden" id="cp4" value="6500 $$$$ 6500 $$$$ 2200 $$$$ 5500 $$$$ 5500 $$$$ 5500 $$$$ 9250 $$$$ 9250 $$$$ " />
                        <div class="flex">
                            <a class="customise" href="#">Customise</a>
                            <a href="packages/Formidable Kashmir, Ladakh, Manali/1" target="_blank"><button class="view--package">View this Package</button></a>
                        </div>
                    </div>
				</div>
					Hotel: 0    Meals: 0   CAB :48500					
						
				<div class="package--tailored">
                    <img src="images/packages/Stupendous Ladakh1Manali, Ladakh, Kashmir" alt="">
                    <div class="destination--info">
                        <div>
                            <h3>Stupendous Manali, Ladakh, Kashmir</h3>
                            <span class="duration">8 Days 7 Nights</span>
							<div>
								<div class="price" id="pprice5">Not Avaliable/-</div>
								<div class="perse">(Per <span></span> person)</div>
							</div>
                        </div>
                        <div class="inclusions border">
                   <div class="package--ex"><img src="assets/icons/transport/air.svg" alt="Flights not included" label="Flights not included" > <span>Tickets</span></div><div> <img src="assets/icons/transport/meals.svg" alt="Meals" label="Meals"> <span>Meals</span></div><div><img src="assets/icons/transport/transfer.svg" alt="Cab"><span>Cab</span></div><div><img src="assets/icons/transport/stars.svg" alt="hotel stars"><span>Stay</span></div><div ><img src="assets/icons/transport/view.svg" alt="Site seeing"><span>Siteseeing</span></div><div class="package--ex"><img src="assets/icons/transport/tent.svg" alt="Camping" label="Campingn" ><span>Camping</span></div><div class="package--ex"><img src="assets/icons/transport/tent.svg" alt="Houseboat" label="Houseboat" ><span>Houseboat</span></div><div class="package--ex"><img src="assets/icons/transport/more.svg" alt="Complimentary from destination" label="Compliment" ><span>Compliment</span></div>                        </div>
                       <form class="list hotel radio no-border">
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice5',5);" class="radio"  name="foo5" >
                                                  Budget Stay
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice5',5);" class="radio" name="foo5" checked>
                                                  3 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice5',5);" class="radio" name="foo5" >
                                                  4 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio"  onChange="stay('pprice5',5);"  class="radio" name="foo5" >
                                                  5 star
                                              </label>
                            </li>
                        </form>
						<input type="hidden" id="destinations5" value="Manali, Ladakh, Kashmir" />
						<input type="hidden" id="stays5" value="Sarchu$$$$Leh$$$$Nubra$$$$Pangong$$$$Leh$$$$Kargil$$$$Srinagar$$$$$$$$" />
						<input type="hidden" id="cp5" value="10000 $$$$ 10000 $$$$ 5500 $$$$ 5500 $$$$ 5500 $$$$ 4000 $$$$ 4000 $$$$ 4000 $$$$ " />
                        <div class="flex">
                            <a class="customise" href="#">Customise</a>
                            <a href="packages/Stupendous Manali, Ladakh, Kashmir/1" target="_blank"><button class="view--package">View this Package</button></a>
                        </div>
                    </div>
				</div>
					Hotel: 0    Meals: 0   CAB :50700					
						
				<div class="package--tailored">
                    <img src="images/packages/Tremendous Ladakh1Srinagar, Ladakh, Manali" alt="">
                    <div class="destination--info">
                        <div>
                            <h3>Tremendous Kashmir, Ladakh, Manali</h3>
                            <span class="duration">9 Days 8 Nights</span>
							<div>
								<div class="price" id="pprice6">Not Avaliable/-</div>
								<div class="perse">(Per <span></span> person)</div>
							</div>
                        </div>
                        <div class="inclusions border">
                   <div class="package--ex"><img src="assets/icons/transport/air.svg" alt="Flights not included" label="Flights not included" > <span>Tickets</span></div><div> <img src="assets/icons/transport/meals.svg" alt="Meals" label="Meals"> <span>Meals</span></div><div><img src="assets/icons/transport/transfer.svg" alt="Cab"><span>Cab</span></div><div><img src="assets/icons/transport/stars.svg" alt="hotel stars"><span>Stay</span></div><div ><img src="assets/icons/transport/view.svg" alt="Site seeing"><span>Siteseeing</span></div><div class="package--ex"><img src="assets/icons/transport/tent.svg" alt="Camping" label="Campingn" ><span>Camping</span></div><div class="package--ex"><img src="assets/icons/transport/tent.svg" alt="Houseboat" label="Houseboat" ><span>Houseboat</span></div><div class="package--ex"><img src="assets/icons/transport/more.svg" alt="Complimentary from destination" label="Compliment" ><span>Compliment</span></div>                        </div>
                       <form class="list hotel radio no-border">
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice6',6);" class="radio"  name="foo6" >
                                                  Budget Stay
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice6',6);" class="radio" name="foo6" checked>
                                                  3 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio" onChange="stay('pprice6',6);" class="radio" name="foo6" >
                                                  4 star
                                              </label>
                            </li>
                            <li class="list__item">
                                <label class="label--radio">
                                                  <input type="radio"  onChange="stay('pprice6',6);"  class="radio" name="foo6" >
                                                  5 star
                                              </label>
                            </li>
                        </form>
						<input type="hidden" id="destinations6" value="Kashmir, Ladakh, Manali" />
						<input type="hidden" id="stays6" value="Kargil$$$$Leh$$$$Leh$$$$Nubra$$$$Pangong$$$$Leh$$$$Sarchu$$$$Manali$$$$$$$$" />
						<input type="hidden" id="cp6" value="6500 $$$$ 6500 $$$$ 2200 $$$$ 5500 $$$$ 5500 $$$$ 5500 $$$$ 9250 $$$$ 9250 $$$$ 500 $$$$ " />
                        <div class="flex">
                            <a class="customise" href="#">Customise</a>
                            <a href="packages/Tremendous Kashmir, Ladakh, Manali/1" target="_blank"><button class="view--package">View this Package</button></a>
                        </div>
                    </div>
				</div>
					  
				</div>
            </div>
        </div>
    </div>

	</div>
    <footer>
        <div class="secondary--footer">
            <div class="sec-ftr">
                <span>We promise to stay best in class</span>
            <div class="footer-phone">
                <span class="tel">1800 123 2262</span>
                <span class="tagl">24/7 Dedicated Support</span>
            </div>
            <li class="quote">Book a destination</li>
            </div>
        </div>
            <div class="footer--primary max-width">
                <ul>
                    <li><a href="about">About Us</a></li>
                    <li><a href="#">What makes Us</a></li>
                    <li><a href="blog">Blogs</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
    
            <div class="footer--secondary">
                <div class="max-width">
                    <div class="connect">
                        <a class="social" href="https://www.facebook.com/flyparadisetravels" target="_blank"><img src="./assets/icons/social/facebook.svg" alt="Facebook"></a>
                        <a class="social" href="https://www.instagram.com/flyparadisetravels/" target="_blank"><img src="./assets/icons/social/insta.svg" alt="Instagram"></a>
                        <a class="social" href="https://twitter.com/flyparadise_" target="_blank"><img src="./assets/icons/social/twitter.svg" alt="twitter"></a>
                        <a class="social" href="https://www.linkedin.com/company/fly-paradise/" target="_blank"><img src="./assets/icons/social/in.svg" alt="linkedIn"></a>
                    </div>
                </div>
            </div>
            <div class="copyright">
                &copy; 2010 - 2018 Fly Paradise Travels
            </div>
        </footer>
		
		<!-- Hotjar Tracking Code for http://junaidmasoodi.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:699414,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>



 <div class="pop-up remove">
 <form action="thanks" method="post">
	<div class="pop-up-form">
	<p class="remove-popup">X</p>
    <div class="form-image">
        <img src="./assets/form/form.png" alt="">
    </div>
    <div class="form-fields">
        <ul class="form">
            <li>
                <script>
                    function init() {
                        var input = document.getElementById('locationTextFieldD');
                        var autocomplete = new google.maps.places.Autocomplete(input);
                    }
                    google.maps.event.addDomListener(window, 'load', init);
                </script>
                <label for="locationTextField">Departure point</label>

                <div class="inp">
                    <img src="./assets/icons/social/location.svg" alt="">
                    <input id="locationTextFieldD" class="input-field" placeholder="Leaving from this place" type="text" size="50" name="from_place">
                </div>
            </li>
            <li>
                <script>
                    function init() {
                        var input = document.getElementById('locationTextFieldA');
                        var autocomplete = new google.maps.places.Autocomplete(input);
                    }
                    google.maps.event.addDomListener(window, 'load', init);
                </script>
                <label for="locationTextField">Arrival point</label>

                <div class="inp">
                    <img src="./assets/icons/social/location.svg" alt="">
                    <input id="locationTextFieldA" class="input-field" placeholder="Want to see" type="text" size="50" name="to_loc" value="Kashmir">
                </div>
            </li>
            <li>
                <label for="">Enter Phone No.</label>
                <div class="inp">
                    <img src="./assets/icons/social/smartphone.svg" alt="">
                    <input class="input-field" placeholder="Enter Phone" min="9" max="10" required type="tel" name="phone">
                </div>
            </li>
            <li>
                <label for="">Enter your Email</label>
                <div class="inp">
                    <img src="./assets/icons/social/mail.svg" alt="">
                    <input class="input-field" placeholder="Your email-ID" required type="email" name="email">
                </div>
            </li>
        </ul>
        <ul class="depart-date">
            <li><label for="datepicker">Departure date</label>
                <input id="datepicker" placeholder="Preferred date of travel" type="date" name="date"/></li>
            <ul class="number-counter--popup">
                <li class="day--counter no-of-day">
                    <span class="hsidebar">Duration (in nights)</span>
                    <input id="counter-no" type="number" min="1" max="30" value="1"  name="nights"/>
                </li>
                <li class="day--counter no-of-people">
                    <span class="hsidebar">Number of Travellers</span>
                    <input id="counter-no" type="number" min="1" max="30" value="1" name="travellers" />
                </li>
            </ul>

            </form>
        </ul>
        <form class="list hotel radio no-border">
            <li class="list__item">
                <label class="label--radio">
                              <input type="radio" class="radio" checked value="Honeymoon"  name="foo">
                             Honeymoon
                          </label>
            </li>
            <li class="list__item">
                <label class="label--radio">
                              <input type="radio" class="radio" value="Friends and Family" name="foo">
                             Friends & Family
                          </label>
            </li>
            <li class="list__item">
                <label class="label--radio">
                              <input type="radio" class="radio" value="Adventure" name="foo">
                              Adventure
                          </label>
            </li>
            <li class="list__item">
                <label class="label--radio">
                              <input type="radio" class="radio" value="Solo" name="foo">
                             Solo
                          </label>
            </li>
			<li class="list__item">
                <label class="label--radio">
                              <input type="radio" class="radio" value="Weekend" name="foo">
                             Weekend
                          </label>
            </li>
        </form>
        <button class="cta" type="submit" value="Curate my package">Curate my Package</button>
    </div>
</div>
<!--End of form -->
</form>

</div>

</body>
<script type="text/javascript">	
	function showpackages(thediv){
	
		//Getting destination
		var destination="Kashmir";
		
		//Getting star filter
		var stars;
		for (i = 0; i < document.getElementsByName('rating').length; i++) {
					if(document.getElementsByName('rating')[i].checked == true) {
						var stars = document.getElementsByName('rating')[i].value;
						break;
					}
		 }
		 
		//Getting category
		//getting Honeymoon checkbox
		var honeymoon;
		if(document.getElementsByName('Honeymoon')[0].checked == true) {
			 honeymoon="Yes";
			
		}else{
			honeymoon="No";
		}
		//getting Solo checkbox
		var solo;
		if(document.getElementsByName('Solo')[0].checked == true) {
			 solo="Yes";
			
		}else{
			solo="No";
		}
		//getting Family and Friends checkbox
		var ff;
		if(document.getElementsByName('Family and Friends')[0].checked == true) {
			 ff="Yes";
			
		}else{
			ff="No";
		}
		
		//getting Adventure checkbox
		var adventure;
		if(document.getElementsByName('Adventure')[0].checked == true) {
			 adventure="Yes";
			
		}else{
			adventure="No";
		}
		
		//getting Weekend checkbox
		var weekend;
		var isweekendset=document.getElementsByName('Weekend')[0];
		if(typeof isweekendset != 'undefined'){
			if(document.getElementsByName('Weekend')[0].checked == true) {
				 weekend="Yes";
				
			}else{
				weekend="No";
			}
		}else{
			weekend="No";
		}	
		
		
		//getting package duration
		var duration=document.getElementById('counter-no').value;
		
		
		//getting noof travellers
		var traveller=document.getElementById('traveller-no').value;
		
		//getting filter price
		var price=document.getElementById('amount').value;
		
		
		//processing filter
		if(window.XMLHttpRequest){
			xmlhttp=new XMLHttpRequest();
		}
		else{
			xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
		}
		
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				document.getElementById(thediv).innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open('GET','home/ajaxcomponents/getpackages.php?stars='+stars+'&destination='+destination+'&honeymoon='+honeymoon+'&solo='+solo+'&ff='+ff+'&adventure='+adventure+'&weekend='+weekend+'&duration='+duration+'&price='+price+'&traveller='+traveller,true);

		xmlhttp.send();
		
	}
</script><script type="text/javascript">	
	function stay(thediv,id){
	
		//getting stay details
		var foo="foo";
		foo+=id;
		var stay;
		if(document.getElementsByName(foo)[0].checked == true) {
			 stay=2;
		}
		
		if(document.getElementsByName(foo)[1].checked == true) {
			 stay=3;
			
		}
		if(document.getElementsByName(foo)[2].checked == true) {
			  stay=4;
			
		}
		if(document.getElementsByName(foo)[3].checked == true) {
			  stay=5;
			
		}
		
		
		//getting month details
		
		//var month=document.getElementById('stay').value;
		
		
		//getting location
		
		var loc=document.getElementById("destinations"+id).value;
		
		//getting travellers
		var travellers="1";
		//getting itenary stays
		var stays=document.getElementById("stays"+id).value;
		
		
		//getting cab prices
		var cabprices=document.getElementById("cp"+id).value;
		
		
		//processing filter
		if(window.XMLHttpRequest){
			xmlhttp=new XMLHttpRequest();
		}
		else{
			xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
		}
		
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				document.getElementById(thediv).innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open('GET','home/ajaxcomponents/updatepackagepricedestination.php?stay='+stay+'&loc='+loc+'&travellers='+travellers+'&stays='+stays+'&cabprices='+cabprices,true);

		xmlhttp.send();
		
	}
</script>
</html>