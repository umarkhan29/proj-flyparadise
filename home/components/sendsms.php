<?php
	
	
	function sendsms($phone,$message){
		// Authorisation details.
		$username = "umee909@gmail.com";
		$hash = "8e5e426a6eef0b5dd891ce08344ed1ca543b93bbd54a5b80b1db7e965714d97e";
	
		// Config variables. Consult http://api.textlocal.in/docs for more info.
		$test = "0";
	
		// Data for text message. This is the text message data.
		$sender = "FLYTRV"; // This is who the message appears to be from.
		$numbers = $phone; // A single number or a comma-seperated list of numbers
		$message = $message;
		// 612 chars or less
		// A single number or a comma-seperated list of numbers
		$message = urlencode($message);
		$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
		$ch = curl_init('http://api.textlocal.in/send/?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); // This is the result from the API
		curl_close($ch);
	
	}
?>