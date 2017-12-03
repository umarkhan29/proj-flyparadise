 <?php
			 //fetching temprature
			 error_reporting(0);
			 	$des="kashmir";
				$jsonurl = "http://api.openweathermap.org/data/2.5/weather?q=".$des."&appid=536a874ed7c30387414c700ed1990ce5";
				$json = file_get_contents($jsonurl);
				$celcius="";
				
				if($json!=""){
					$weather = json_decode($json);
					$kelvin = $weather->main->temp;
					echo $celcius = $kelvin - 273.15; //Converting Kelvin to celcius
				}
			 ?>