<?php
//php daemon process

include_once('home/catalog/connect.khan');
require_once('home/components/sendsms.php');



   /*Checkif sms need to be sent */
    $today=date("Y-m-d");
	
	if(isset($results))
		unset($results);
	if(isset($delayrem))
		unset($delayrem);		
		
	
//getting delayed notifications

		
	$query="SELECT * FROM `delayednotifications` WHERE `flag` = 'No' AND  `remindertime` like '".$today."%'" ;
	$count=0;
	$delayrem=mysqli_query($dbconn,$query) or die(mysqli_error($dbconn));
	if($delayrem){
			
			while($row = mysqli_fetch_assoc($delayrem)){
					$results[] = array(
						'ID'			=>	$row['id'],
						'BOOKINGID'		=>	$row['bookingid'],
						'NOTES'			=>	$row['notes'],
						'TIME'			=>	$row['remindertime'],
						'REMINDERBY'	=>	$row['reminderby'],
						'ASSIGNEDTO'	=>	$row['bookingassignedto'],
						'TABLE'			=>	'delayednotifications'
					);
				$count=	$count+1;
				
			}
		
		}
	
	

	for($i=0; $i<$count; $i++){			
	
		$time_pre = strtotime($results[$i]['TIME']);//converting to unix time stamp
		$time_pre-=12600; // removing time zone conflict //19800 for producttion
		$time_post = strtotime(date("Y-m-d H:i:s"));
	
		$exec_time = $time_post - $time_pre; //for testing purposes
		
		if($time_post>$time_pre){ //here we needto send sms
			//finding employee sms and email
			if(isset($bookingassignedto))
				unset($bookingassignedto);
			$bookingassignedto=$results[$i]['ASSIGNEDTO'];
			$query="SELECT * FROM `users` WHERE `name` = '".$bookingassignedto."' AND `role` = 'employee' LIMIT 1";
			
			if(isset($emp))
				unset($emp);
			
			if($result = mysqli_query($dbconn,$query)){
					$emp;
					$empcount=0;
					while($row = mysqli_fetch_assoc($result)){
						$emp[] = array(
								
								'PHONE'		=>	$row['phone'],
								'EMAIL'		=>	$row['email'],
							
							);
							 $empcount=$empcount+1;
							
					}
					
				}
			
			
			
			//send SMS,EMAIL here
			$headers = "From:support@flyparadise.in";
			
			if(isset($phone))
				unset($phone);
			$phone=$emp[0]['PHONE'];
			
			if(isset($email))
				unset($email);
			$email=$emp[0]['EMAIL'];
			$message="Notification Reminder%nBooking Id : ".$results[$i]['BOOKINGID']."%nFollowUp Time: ".$results[$i]['TIME']."%nReminder : ".$results[$i]['NOTES'];
			sendsms($phone,$message);
			mail($email,"Reminder | Fly Paradise",$message,$headers);
			
			
			//reset flag
			$query="UPDATE `".$results[$i]['TABLE']."` SET `flag`= 'Yes' WHERE `id` = '".$results[$i]['ID']."'";
			mysqli_query($dbconn,$query);
			
		
		}//end if 
			
	}//end for 
	
?>