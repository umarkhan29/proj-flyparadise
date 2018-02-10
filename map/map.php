
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

	var dest="<?php echo $destinations[0]['ALIAS']; //change to alias ?>";
	var destination="<?php echo $destinations[0]['DESTINATION']; ?>";
	
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

