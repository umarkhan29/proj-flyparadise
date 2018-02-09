<?php
include_once('home/catalog/connect.khan');
include_once('home/catalog/session.khan');
require_once('home/common/employeeheader.fly');//adding employee header 
require_once('home/components/employeeauthorize.fly');
include_once('home/ajaxcomponents/packagecustomizationajaxsupport.php');

?>



<?php

if(isset($_POST['btn'])){
	
	$dcount=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['dcount']))));
	$itenaries="";
	
	//forming iterations
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
		  

	
		
	
	
	
	$title=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['title']))));
	$destination=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['destination']))));
	$duration=$dcount." Days".($dcount-1)." Nights";
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
		 $query="INSERT INTO `packages`( `title`,`destination`,`duration`,`category`, `hotelstar`, `description`, `includeflights`, `price`, `path`, `localcab`, `meals`,`siteseeing`,`stay`, `addon`, `itinerary`, `inclusions`, `exclusions`,`getaways`) VALUES ('$title','$destination','$duration','$category','$hotelstar','$description','$flight','$price','$path','$cab','$meals','$siteseeing','$stay','$addon','$itenaries','$inclusions','$exclusions','$getaways');";
							
		if(mysqli_query($dbconn,$query)){ 
			move_uploaded_file($_FILES['fileupld']['tmp_name'],$path);
			echo "<br>Package created ";
			
		}else{
			echo "Something went wrong. Contact your administrator";
			
		}
		
}		
?>
<?php require_once('home/common/footer.fly'); ?>