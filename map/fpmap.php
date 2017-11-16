<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
<?php 
$destination="srinagar";

?>
    <title>Find a route using Geolocation and Google Maps API</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4surkvbT4YrEdMSYmS-meJo6duaD1OKM&callback=myMap"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
		
        function calculateRoute(from, to) {
		 
			$("#error").empty();
             var myLatLng = {lat: 32.7266, lng: 74.8570};

            // Center initialized to Srinagar, India
            var myOptions = {
                zoom: 10,
                center: myLatLng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            // Draw the map
			
            var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
			
            var directionsService = new google.maps.DirectionsService();
			
            var directionsRequest = {
                origin: from,
                destination: to,
                travelMode: google.maps.DirectionsTravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC
            };
            directionsService.route(
                directionsRequest,
				
                function (response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        new google.maps.DirectionsRenderer({
                            map: mapObject,
                            directions: response
                        });
                        $('.distance-in-km').text(response.routes[0].legs[0].distance.value / 1000 + "km");

                       // alert( response.routes[0].legs[0].distance.value / 1000 + "km" ); // the distance in metres
                    } else
                        $("#error").append("Unable to retrieve your routesss<br />");
                }
            );
        }

        $(document).ready(function () {
            // If the browser supports the Geolocation API
            if (typeof navigator.geolocation == "undefined") {
                $("#error").text("Your browser doesn't support the Geolocation API");
                return;
            }

            navigator.geolocation.getCurrentPosition(function (position) {
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                            "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
                        },
                        function (results, status) {
						
                            if (status == google.maps.GeocoderStatus.OK) {
                                calculateRoute(results[0].formatted_address, "<?php echo $destination; ?>");
                            } else {
                                var marker = new google.maps.Marker({
                                    position: myLatLng,
                                    title: 'Fly Paradise'
                                  });

                                marker.setMap(mapObject);

                                $("#error").append("Unable to retrieve your address<br />");
                            }
                        });
                });
				<?php 
					$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
					
					if($query['country']!='')
						 $location= $query['regionName'];
					
				?>
				
				var fromloc="<?php echo $location; ?>";
				
                calculateRoute(fromloc, "<?php echo $destination; ?>");

            $("#calculate-route").submit(function (event) {
                event.preventDefault();

                calculateRoute($("#from").val(), "<?php echo $destination; ?>");
            });


            $('.verify-location > a').click(function(){
                $('.verify-location').hide();
                $('#calculate-route').show();
            });
        });
    </script>
    <style type="text/css">
        #map {
            width: 500px;
            height: 400px;
            margin-top: 10px;
        }
        #calculate-route {
            display: none;
        }
        .verify-location > a {
            cursor: pointer;
            color: #FCA2A2;
        }
    </style>
</head>

<body>
	
    <div id="map"></div>
    <p id="error"></p>
	<div class="verify-location">Is the your location (A) incorrect? <a>Click here to enter your location manually</a></div>
    <form id="calculate-route" name="calculate-route" action="#" method="get">
        <label for="from">From:</label>
        <input type="text" id="from" name="from" placeholder="Enter Address" size="30" />
         <button type="submit">Submit</button>
    </form>
    <p class="distance-in-km"></p>
</body>

</html>