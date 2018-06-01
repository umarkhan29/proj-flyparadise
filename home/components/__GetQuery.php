<?php

	  if(isset($_POST['from_place'])){
		  $from=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['from_place']))));
		  $to=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['to_loc']))));
		  $date=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['date']))));
		  $date=date("Y-m-d", strtotime($date));
		  $phone=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['phone']))));
		  $email=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['email'])))); 
		  $noofnights=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['nights']))));
		  $travellers=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['travellers']))));
		  $category=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['foo']))));
		  $status="Active";
		 $tripid="FP-";
		   $query="INSERT INTO `enquiries`(`from`, `to`, `date`, `phone`, `email`, `noofnights`,`travellers`, `status`, `category`) VALUES ('$from','$to','$date','$phone','$email', '$noofnights','$travellers','$status', '$category');";
							
		if(mysqli_query($dbconn,$query)){ 
			
				$email = "umee909@gmail.com";
				$content = 'You have one new resquest';
				$subject = "1 new request";
				$headers = "From:Fly Paradise Enquiry";
				
				mail($email, $subject, $content, $headers );	
				$tripid.=mysqli_insert_id($dbconn);
				
		}
		
		
	  }
?>