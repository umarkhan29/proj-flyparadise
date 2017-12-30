<?php
	
	require_once('../catalog/connect.khan');
	require_once('../catalog/session.khan');
	
	  if(isset($_GET['from_place'])){
		  $from=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['from_place']))));
		  $to=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['to_loc']))));
		  $date=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['date']))));
		  $date=date("Y-m-d", strtotime($date));
		  $phone=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['phone']))));
		  $email=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['email'])))); 
		  $noofnights=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['nights']))));
		  $category=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['category']))));
		  $status="New";
	
		  echo $query="INSERT INTO `enquiries`(`from`, `to`, `date`, `phone`, `email`, `noofnights`, `status`, `category`) VALUES ('$from','$to','$date','$phone','$email', '$noofnights','$status', '$category');";
							
		if(mysqli_query($dbconn,$query)){ 
			
				$email = "umee909@gmail.com";
				$content = 'You have one new resquest';
				$subject = "1 new request";
				$headers = "From:Fly Paradise Enquiry";
				
				mail($email, $subject, $content, $headers );	
				echo "Submitted Sucessfully !!";
		}
		
		
	  }
?>