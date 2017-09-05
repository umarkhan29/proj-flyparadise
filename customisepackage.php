<?php
include_once('home/catalog/connect.khan');
include_once('home/ajaxcomponents/packagecustomizationajaxsupport.php');

?>



<?php

if(isset($_POST['btn'])){
	
	$dcount=$_POST['dcount'];
	$icount=$_POST['icount'];
	$ecount=$_POST['ecount'];

	$itenaries="";
	$inclusions="";
	$exclusions="";

	
	//forming iterations
	$abc="iteration";
	for($i=1;$i<=$dcount;$i++){
		${$abc.$i}=$abc.$i;
		$a= ${$abc.$i};
		${$abc.$i}=$_POST[$a];
		
		$itenaries.=${$abc.$i}." $$$$ ";
	}
	
	
	//forming inclusions
	$abc="inclusion";
	for($i=1;$i<=$icount;$i++){
		${$abc.$i}=$abc.$i;
		$a= ${$abc.$i};
		${$abc.$i}=$_POST[$a];
		
		$inclusions.=${$abc.$i}." $$$$ ";
	}
	

	
		//forming exclusions
	$abc="exclusion";
	for($i=1;$i<=$ecount;$i++){
		${$abc.$i}=$abc.$i;
		$a= ${$abc.$i};
		${$abc.$i}=$_POST[$a];
		
		$exclusions.=${$abc.$i}." $$$$ ";
	}
	
	
	
	$price=$_POST['price'];
	$hotel=$_POST['hotel'];
	$cab=$_POST['cab'];
	$flight=$_POST['flight'];;
	$tripid=55;
	
	//storing in DB
		$query="INSERT INTO `custompackages`(`tripid`, `price`, `hotel`, `flight`, `cab`, `inclusions`, `exclusions`, `iterations`) VALUES ('$tripid','$price','$hotel','$flight','$cab','$inclusions','$exclusions','$itenaries');";
							
		if(mysqli_query($dbconn,$query)){ 
			echo "<br>Package created ";
			
		}else{
			echo "Something went wrong. Contact your administrator";
			
		}	
}		
?>