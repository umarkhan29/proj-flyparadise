<?php
include_once('home/catalog/connect.khan');
include_once('home/catalog/session.khan');
include_once('home/ajaxcomponents/packagecustomizationajaxsupport.php');

?>



<?php

if(isset($_POST['btn'])){
	
	$dcount=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['dcount']))));
	
	
	
	//forming itinerary title
	$itinerarytitle="";
	$abc="iterationtitle";
	for($i=1;$i<=$dcount;$i++){
		${$abc.$i}=$abc.$i;
		$a= ${$abc.$i};
		${$abc.$i}=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST[$a]))));
		
		$itinerarytitle.=${$abc.$i}." $$$$ ";
	}
	
	//forming itinerary tags
	$itinerarytags="";
	$abc="iterationtags";
	for($i=1;$i<=$dcount;$i++){
		${$abc.$i}=$abc.$i;
		$a= ${$abc.$i};
		${$abc.$i}=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST[$a]))));
		
		$itinerarytags.=${$abc.$i}." $$$$ ";
	}
	
	//forming itinerary
	$itenaries="";
	$abc="iteration";
	for($i=1;$i<=$dcount;$i++){
		${$abc.$i}=$abc.$i;
		$a= ${$abc.$i};
		${$abc.$i}=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST[$a]))));
		
		$itenaries.=${$abc.$i}." $$$$ ";
	}
	
	
	//forming inclusions
	$inclusions="";
	$abc="iterationinclusion";
	for($i=1;$i<=$dcount;$i++){
		${$abc.$i}=$abc.$i;
		$a= ${$abc.$i};
		${$abc.$i}=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST[$a]))));
		
		$inclusions.=${$abc.$i}." $$$$ ";
	}
	
	
	//forming exclusions
	$exclusions="";
	$abc="iterationexclusion";
	for($i=1;$i<=$dcount;$i++){
		${$abc.$i}=$abc.$i;
		$a= ${$abc.$i};
		${$abc.$i}=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST[$a]))));
		
		$exclusions.=${$abc.$i}." $$$$ ";
	}
	
	
	//forming getaways
		$getaways="";
		$abc="iterationgetaway";
		for($i=1;$i<=$dcount;$i++){
			${$abc.$i}=$abc.$i;
			$a= ${$abc.$i};
			${$abc.$i}=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST[$a]))));
			
			$getaways.=${$abc.$i}." $$$$ ";
		}
		
		
		//forming worthwatching
		$worthwatching="";
		$abc="iterationworthwatching";
		for($i=1;$i<=$dcount;$i++){
			${$abc.$i}=$abc.$i;
			$a= ${$abc.$i};
			${$abc.$i}=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST[$a]))));
			
			$worthwatching.=${$abc.$i}." $$$$ ";
		}
		  

	
		
	
	
	
	$title=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['title']))));
	$destination=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['destination']))));
	$duration=$dcount." Days ".($dcount-1)." Nights";
	$category=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['category']))));
	$hotelstar=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['hotelstar']))));
	$description=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['description']))));
	$flight=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['flight']))));
	$price=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['price']))));
	$path="images/packages/".$title.$destination.$_FILES['fileupld']['name'];
	$cab=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['cab']))));
	$meals=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['meals']))));
	$siteseeing=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['siteseeing']))));
	$stay=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['stay']))));
	$addon=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['addon']))));
	
	
	
	
	
	//storing in DB
	 $query="INSERT INTO `packages`( `title`,`destination`,`duration`,`category`, `hotelstar`, `description`, `includeflights`, `price`, `path`, `localcab`, `meals`,`siteseeing`,`stay`, `addon`, `itinerary`, `inclusions`, `exclusions`,`getaways`,`worthwatching`,`itinerarytitle`,`itinerarytags`) VALUES ('$title','$destination','$duration','$category','$hotelstar','$description','$flight','$price','$path','$cab','$meals','$siteseeing','$stay','$addon','$itenaries','$inclusions','$exclusions','$getaways','$worthwatching','$itinerarytitle','$itinerarytags');";
							
		if(mysqli_query($dbconn,$query)){ 
			move_uploaded_file($_FILES['fileupld']['tmp_name'],$path);
			echo "<br>Package created ";
			
		}else{
			echo "Something went wrong. Contact your administrator";
			
		} 
		
}		
?>