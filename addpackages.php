<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/common/employeeheader.fly');//adding employee header 
require_once('home/components/employeeauthorize.fly');
include_once('home/ajaxcomponents/packagecustomizationajaxsupport.php');

?>



<?php
	//throwing success message
	  if(isset($_SESSION['resizedone'])){
		  if($_SESSION['resizedone']=="success"){
			  unset($_SESSION['resizedone']);
			  echo	"<div><p>Package created ! </p> </div>";	
		  }
	  }
	  
	  
	//defining variables to store data 
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
	
	//forming itinerary tags(day plan)
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
		
		//forming itenary stay
		$stays="";
		$abc="iterationstay";
		for($i=1;$i<=$dcount;$i++){
			${$abc.$i}=$abc.$i;
			$a= ${$abc.$i};
			${$abc.$i}=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST[$a]))));
			
			$stays.=${$abc.$i}."$$$$";
		}
		//////////////////////////////////////////////////////////////////////
		//forming itenary from
		$itineraryfrom="";
		$abc="iterationfrom";
		for($i=1;$i<=$dcount;$i++){
			${$abc.$i}=$abc.$i;
			$a= ${$abc.$i};
			${$abc.$i}=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST[$a]))));
			
			$itineraryfrom.=${$abc.$i}." $$$$ ";
		}
		
		
		
		//forming itenary to
		$itineraryto="";
		$abc="iterationto";
		for($i=1;$i<=$dcount;$i++){
			${$abc.$i}=$abc.$i;
			$a= ${$abc.$i};
			${$abc.$i}=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST[$a]))));
			
			$itineraryto.=${$abc.$i}." $$$$ ";
		}
		
		
		
		//forming itenary cab price
		$itinerarycabprice="";
		$abc="iterationcabprice";
		for($i=1;$i<=$dcount;$i++){
			${$abc.$i}=$abc.$i;
			$a= ${$abc.$i};
			${$abc.$i}=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST[$a]))));
			
			$itinerarycabprice.=${$abc.$i}." $$$$ ";
		}
		
		
		//day distance
		$itinerarydistance="";
		$abc="iterationtdistance";
		for($i=1;$i<=$dcount;$i++){
			${$abc.$i}=$abc.$i;
			$a= ${$abc.$i};
			${$abc.$i}=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST[$a]))));
			
			$itinerarydistance.=${$abc.$i}." $$$$ ";
		}
		  

	
		
	
	
	
	$title=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['title']))));
	$destination=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['destination']))));
	$duration=$dcount." Days ".($dcount-1)." Nights";
	$category=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['category']))));
	$hotelstar=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['hotelstar']))));
	$description=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['description']))));
	$flight=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['flight']))));
	$price=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['price']))));
	$path="images/packages/".$title.'1'.$destination.$_FILES['fileupld']['name'];
	$path2="images/packages/".$title.'2'.$destination.$_FILES['fileupld2']['name'];
	$path3="images/packages/".$title.'3'.$destination.$_FILES['fileupld3']['name'];
	$cab=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['cab']))));
	$meals=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['meals']))));
	$siteseeing=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['siteseeing']))));
	$stay=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['stay']))));
	$addon=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['addon']))));
	$tags=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['tags']))));
	
	
	
	
	
	//storing in DB
	 $query="INSERT INTO `packages`( `title`,`destination`,`duration`,`category`, `hotelstar`, `description`, `includeflights`, `price`, `path`, `path2`,`path3`,`localcab`, `meals`,`siteseeing`,`stay`, `addon`, `itinerary`, `inclusions`, `exclusions`,`getaways`,`worthwatching`,`itinerarytitle`,`itinerarytags`,`tags`,`stays`,`distance`,`itineraryfrom`,`itineraryto`,`itinerarycabprice`) VALUES ('$title','$destination','$duration','$category','$hotelstar','$description','$flight','$price','$path','$path2','$path3','$cab','$meals','$siteseeing','$stay','$addon','$itenaries','$inclusions','$exclusions','$getaways','$worthwatching','$itinerarytitle','$itinerarytags','$tags','$stays','$itinerarydistance','$itineraryfrom','$itineraryto','$itinerarycabprice');";
							
		if(mysqli_query($dbconn,$query)){ 
			move_uploaded_file($_FILES['fileupld']['tmp_name'],$path);
			move_uploaded_file($_FILES['fileupld2']['tmp_name'],$path2);
			move_uploaded_file($_FILES['fileupld3']['tmp_name'],$path3);
			
			//resizing images
			
			header('location:home/components/packageimgresize.php?img1='.$path.'&img2='.$path2.'&img3='.$path3);
			
			
		}else{
			echo "Something went wrong. Contact your administrator";
			
		} 
		
}		
?>

<?php require_once('home/common/footer.fly'); ?>